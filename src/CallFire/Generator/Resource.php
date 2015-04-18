<?php
namespace CallFire\Generator;

use Zend\Code\Generator as CodeGenerator;

use DOMDocument;
use DOMNode;
use DOMNodeList;
use DOMXPath;

class Resource
{
    protected static $xsdNs = array(
        '_' => 'http://www.w3.org/2001/XMLSchema',
        'tns' => 'http://api.callfire.com/data',
        'ann' => 'http://api.callfire.com/annotations',
        'jaxb' => 'http://java.sun.com/xml/ns/jaxb'
    );

    protected $resources = array();

    protected $queryMap = array();

    protected $xsd;

    protected $xsdXPath;

    protected $classGenerator;

    protected $propertyGenerator;

    protected $propertyDocblockGenerator;

    protected $propertyGetterGenerator;

    protected $propertySetterGenerator;

    protected $fileGenerator;

    public function generate()
    {
        $xpath = $this->getXsdXPath();

        $complexTypes = $xpath->query('_:complexType[@name]');
        foreach ($complexTypes as $complexType) {
            $this->generateResource($complexType);
        }

        $elements = $xpath->query('_:element[@name]');
        foreach ($elements as $element) {
            $this->generateResource($element);
        }
    }

    public function generateResourceFiles()
    {
        $files = array();
        foreach ($this->getResources() as $resourceGenerator) {
            $fileGenerator = clone $this->getFileGenerator();
            $fileGenerator->setClass($resourceGenerator);
            $files[] = $fileGenerator;
        }

        return $files;
    }

    public function generateResource(DOMNode $element)
    {
        $xpath = $this->getXsdXPath();
        $classGenerator = clone $this->getClassGenerator();
        $map = array();

        $isComplexType = ($element->nodeName == 'complexType');
        $isSubclass = false;
        $extendedClass = null;

        if ($extensionNode = $xpath->query('_:complexType/_:complexContent/_:extension[@base]', $element)->item(0)) {
            $isSubclass = true;
            $extendedClass = substr($xpath->query('@base', $extensionNode)->item(0)->textContent, 4);
        } elseif ($isComplexType && $extensionNode = $xpath->query('_:complexContent/_:extension[@base]', $element)->item(0)) {
            $isSubclass = true;
            $extendedClass = substr($xpath->query('@base', $extensionNode)->item(0)->textContent, 4);
        } elseif (($typeNode = $xpath->query('@type', $element)->item(0)) && $typeNode->textContent !== "base64Binary") {
            $isSubclass = true;
            $extendedClass = substr($typeNode->textContent, 4);
        }

        $resourceName = $xpath->query('@name', $element)->item(0)->textContent;

        $classGenerator->setName($resourceName);
        if ($isSubclass) {
            $classGenerator->setExtendedClass($extendedClass);
        }

        $abstract = $xpath->query('@abstract', $element)->item(0);
        if ($abstract && $abstract->textContent == 'true') {
            $classGenerator->setAbstract(true);
        }

        // First-class attributes of the resource (e.g. resource identifier)
        $attributesQuery = $isComplexType?'_:attribute[@name]':'_:complexType/_:attribute[@name]';
        if ($isSubclass) {
            $attributesQuery = '_:complexType/_:complexContent/_:extension/_:attribute[@name]';
        }

        $attributes = $xpath->query($attributesQuery, $element);
        $this->handleFirstClassAttributes($classGenerator, $map, $attributes, $element, $xpath);

        // Second-class attributes of the resource (e.g. name, description)
        $sequenceElementsQuery = $isComplexType?'_:sequence/_:element[@name][@type]':'_:complexType/_:sequence/_:element[@name][@type]';
        if ($isSubclass) {
            $sequenceElementsQuery = $isComplexType?
                '_:complexContent/_:extension/_:sequence/_:element[@ref or (@name and @type)]'
                :'_:complexType/_:complexContent/_:extension/_:sequence/_:element[@name][@type]';
        }

        $sequenceElements = $xpath->query($sequenceElementsQuery, $element);
        $this->handleSecondClassAttributes($classGenerator, $map, $sequenceElements, $element, $xpath);

        // Second-class choice attributes of the resource (e.g. ToNumber, ContactListId)
        $sequenceChoiceElementsQuery = '_:complexType/_:sequence/_:choice/_:element[@name][@type]';
        if ($isSubclass) {
            $sequenceChoiceElementsQuery = '_:complexType/_:complexContent/_:extension/_:sequence/_:choice/_:element[@name][@type]';
        }

        $sequenceChoiceElements = $xpath->query($sequenceChoiceElementsQuery, $element);
        $this->handleSecondClassAttributes($classGenerator, $map, $sequenceChoiceElements, $element, $xpath);

        // Second-class object attributes of the resource (e.g. IvrBroadcastConfig for Broadcast)
        $choicesQuery = '_:complexType/_:sequence/_:choice/_:element[@ref]';
        $choiceElements = $xpath->query($choicesQuery, $element);
        $this->handleChoiceElements($classGenerator, $map, $choiceElements, $element, $xpath);

        // Complex second-class types (e.g. question-response, broadcast result statistics)
        $secondClassElementsQuery = $isComplexType?'_:sequence/_:element[@name or @ref][not(@type)]':'_:complexType/_:sequence/_:element[@name or @ref][not(@type)]';
        if ($isSubclass) {
            $secondClassElementsQuery = '_:complexType/_:complexContent/_:extension/_:sequence/_:element[@name][not(@type)]';
        }

        $secondClassElements = $xpath->query($secondClassElementsQuery, $element);
        $this->handleSecondClassElements($classGenerator, $map, $secondClassElements, $element, $xpath);

        // Complex second-class object attributes (e.g. CallRecord for call)
        $secondClassAttributesQuery = '_:complexType/_:complexContent/_:extension/_:sequence/_:element[@ref]';
        $secondClassAttributes = $xpath->query($secondClassAttributesQuery, $element);
        $this->handleSecondClassElements($classGenerator, $map, $secondClassAttributes, $element, $xpath);

        if (!$this->hasResource($resourceName)) {
            $this->addResource($resourceName, $classGenerator);
            $this->transformResource($resourceName, $classGenerator, $map);
            $this->setQueryMapEntry($resourceName, $map);
        }
    }

    protected function handleFirstClassAttributes(CodeGenerator\ClassGenerator $classGenerator, array &$map, DOMNodeList $attributes, DOMNode $element, DOMXPath $xpath)
    {
        foreach ($attributes as $attribute) {
            $attributeName = $xpath->query('@name', $attribute)->item(0)->textContent;
            $attributeTypeNode = $xpath->query('@type', $attribute)->item(0);
            $attributeType = $attributeTypeNode?$attributeTypeNode->textContent:'';

            if (substr($attributeType, 0, 4) == 'tns:') {
                $attributeType = 'string';
            }

            $propertyName = lcfirst($attributeName);

            $attributeDescriptionNode = $xpath->query('annotation/documentation/ann:summary', $element)->item(0);
            $attributeDescription = $attributeDescriptionNode?$attributeDescriptionNode->textContent:'';

            $attributeProperty = clone $this->getPropertyGenerator();
            $attributeProperty->setName($propertyName);

            if ($attributeType || $attributeDescription) {
                $attributePropertyDocblock = clone $this->getPropertyDocblockGenerator();
                $attributeProperty->setDocBlock($attributePropertyDocblock);

                $attributePropertyDocblock->setShortDescription($attributeDescription);

                if ($attributeType) {
                    $typeTag = new CodeGenerator\DocBlock\Tag;
                    $typeTag->setName('var');
                    $typeTag->setDescription($attributeType);
                    $attributePropertyDocblock->setTag($typeTag);
                }
            }

            $classGenerator->addPropertyFromGenerator($attributeProperty);
            $map[$attributeName] = "@{$attributeName}";

            $getterGenerator = $this->generatePropertyGetter($propertyName);
            $setterGenerator = $this->generatePropertySetter($propertyName);
            $classGenerator->addMethods(array(
                $getterGenerator,
                $setterGenerator
            ));
        }
    }

    protected function handleSecondClassAttributes(CodeGenerator\ClassGenerator $classGenerator, array &$map, DOMNodeList $sequenceElements, DOMNode $element, DOMXPath $xpath)
    {
        foreach ($sequenceElements as $sequenceElement) {
            if ($refNode = $xpath->query('@ref', $sequenceElement)->item(0)) {
                if (substr($refNode->textContent, 0, 4) == 'tns:') {
                    $sequenceElementName = substr($refNode->textContent, 4);
                } elseif (substr($refNode->textContent, 0, 5) == 'data:') {
                    $sequenceElementName = substr($refNode->textContent, 5);
                }
                $sequenceElementType = $sequenceElementName;
            } else {
                $sequenceElementName = $xpath->query('@name', $sequenceElement)->item(0)->textContent;
                $sequenceElementTypeNode = $xpath->query('@type', $sequenceElement)->item(0);
                $sequenceElementType = $sequenceElementTypeNode?$sequenceElementTypeNode->textContent:'';
            }

            $maxOccursNode = $xpath->query('@maxOccurs', $sequenceElement)->item(0);
            $maxOccurs = $maxOccursNode?$maxOccursNode->textContent:null;
            $unbounded = ($maxOccurs == 'unbounded');

            if (substr($sequenceElementType, 0, 4) == 'tns:') {
                $sequenceElementType = 'string';
            } elseif (substr($sequenceElementType, 0, 5) == 'data:') {
                $sequenceElementType = 'string';
            }

            if ($unbounded) {
                $sequenceElementType .= '[]';
            }

            $propertyName = lcfirst($sequenceElementName);

            $sequenceElementProperty = clone $this->getPropertyGenerator();
            $sequenceElementProperty->setName($propertyName);

            if ($sequenceElementType) {
                $sequenceElementPropertyDocblock = clone $this->getPropertyDocblockGenerator();
                $sequenceElementProperty->setDocBlock($sequenceElementPropertyDocblock);

                $typeTag = new CodeGenerator\DocBlock\Tag;
                $typeTag->setName('var');
                $typeTag->setDescription($sequenceElementType);
                $sequenceElementPropertyDocblock->setTag($typeTag);
            }

            $classGenerator->addPropertyFromGenerator($sequenceElementProperty);
            $map[$sequenceElementName] = "_:{$sequenceElementName}";

            $getterGenerator = $this->generatePropertyGetter($propertyName);
            $setterGenerator = $this->generatePropertySetter($propertyName);
            $classGenerator->addMethods(array(
                $getterGenerator,
                $setterGenerator
            ));
        }
    }

    protected function handleChoiceElements(CodeGenerator\ClassGenerator $classGenerator, array &$map, DOMNodeList $choiceElements, DOMNode $element, DOMXPath $xpath)
    {
        foreach ($choiceElements as $choiceElement) {
            $choiceClass = substr($xpath->query('@ref', $choiceElement)->item(0)->textContent, 4);
            $propertyName = lcfirst($choiceClass);

            $choiceProperty = clone $this->getPropertyGenerator();
            $choiceProperty->setName($propertyName);

            $choicePropertyDocblock = clone $this->getPropertyDocblockGenerator();
            $choiceProperty->setDocBlock($choicePropertyDocblock);

            $typeTag = new CodeGenerator\DocBlock\Tag;
            $typeTag->setName('var');
            $typeTag->setDescription($choiceClass);
            $choicePropertyDocblock->setTag($typeTag);

            $classGenerator->addPropertyFromGenerator($choiceProperty);
            $map["#{$choiceClass}"] = $choiceClass;

            $getterGenerator = $this->generatePropertyGetter($propertyName);
            $setterGenerator = $this->generatePropertySetter($propertyName);

            $setterParams = $setterGenerator->getParameters();
            $setterParam = reset($setterParams);
            $setterParam->setType($choiceClass);

            $classGenerator->addMethods(array(
                $getterGenerator,
                $setterGenerator
            ));
        }
    }

    protected function handleSecondClassElements(CodeGenerator\ClassGenerator $classGenerator, array &$map, DOMNodeList $secondClassElements, DOMNode $element, DOMXPath $xpath)
    {
        foreach ($secondClassElements as $secondClassElement) {
            $maxOccursNode = $xpath->query('@maxOccurs', $secondClassElement)->item(0);
            $maxOccurs = $maxOccursNode?$maxOccursNode->textContent:null;
            $unbounded = ($maxOccurs == 'unbounded');
            $hydrationModifier = '#';

            $secondClassElementName = null;
            $secondClassElementNameNode = $xpath->query('@name', $secondClassElement)->item(0);
            if ($secondClassElementNameNode) {
                $secondClassElementName = $secondClassElementNameNode->textContent;
                $this->generateResource($secondClassElement);
            } else {
                $secondClassElementNameNode = $xpath->query('@ref', $secondClassElement)->item(0);
                if ($secondClassElementNameNode) {
                    if (substr($secondClassElementNameNode->textContent, 0, 4) == "tns:") {
                        $secondClassElementName = substr($secondClassElementNameNode->textContent, 4);
                    } elseif (substr($secondClassElementNameNode->textContent, 0, 5) == "data:") {
                        $secondClassElementName = substr($secondClassElementNameNode->textContent, 5);
                    }
                }
            }
            if (!$secondClassElementName) {
                continue;
            }
            $secondClassElementType = $secondClassElementName;
            if ($unbounded) {
                $secondClassElementType .= "[]";
            }

            $propertyName = lcfirst($secondClassElementName);
            if ($unbounded) {
                $propertyName .= 's';
            }

            $secondClassElementProperty = clone $this->getPropertyGenerator();
            $secondClassElementProperty->setName($propertyName);
            if ($unbounded) {
                $secondClassElementProperty->setDefaultValue(
                    new CodeGenerator\PropertyValueGenerator(array())
                );
                $hydrationModifier .= '@';
                $mapKeyName = "{$secondClassElementName}s";
            } else {
                $mapKeyName = $secondClassElementName;
            }

            if ($secondClassElementType) {
                $secondClassElementPropertyDocblock = clone $this->getPropertyDocblockGenerator();
                $secondClassElementProperty->setDocBlock($secondClassElementPropertyDocblock);

                $typeTag = new CodeGenerator\DocBlock\Tag;
                $typeTag->setName('var');
                $typeTag->setDescription($secondClassElementType);
                $secondClassElementPropertyDocblock->setTag($typeTag);
            }

            $classGenerator->addPropertyFromGenerator($secondClassElementProperty);
            $getterGenerator = $this->generatePropertyGetter($propertyName);
            $setterGenerator = $this->generatePropertySetter($propertyName);
            $classGenerator->addMethods(array(
                $getterGenerator,
                $setterGenerator
            ));

            $map["{$hydrationModifier}{$mapKeyName}"] = "_:{$secondClassElementName}";
        }
    }

    public function generatePropertyGetter($propertyName)
    {
        $methodName = 'get'.ucfirst($propertyName);

        $getterGenerator = clone $this->getPropertyGetterGenerator();
        $getterGenerator->setName($methodName);

        $getterGenerator->setBody("return \$this->{$propertyName};");

        return $getterGenerator;
    }

    public function generatePropertySetter($propertyName)
    {
        $methodName = 'set'.ucfirst($propertyName);

        $setterGenerator = clone $this->getPropertySetterGenerator();
        $setterGenerator->setName($methodName);

        $parameter = new CodeGenerator\ParameterGenerator;
        $parameter->setName($propertyName);
        $setterGenerator->setParameter($parameter);

        $setterGenerator->setBody("\$this->{$propertyName} = \${$propertyName};\nreturn \$this;");

        return $setterGenerator;
    }

    public function transformResource($resourceName, $classGenerator, &$map)
    {
        $transformName = "CallFire\Generator\Resource\Transform\\{$resourceName}";
        if (class_exists($transformName)) {
            $transform = new $transformName($classGenerator, $map);
            $transform->setPropertyGenerator($this->getPropertyGenerator());
            $transform->transform();
        }

        if ($extendedResourceName = $classGenerator->getExtendedClass()) {
            $extendedTransformName = "CallFire\Generator\Resource\Transform\\{$extendedResourceName}";
            if (class_exists($extendedTransformName) && method_exists($extendedTransformName, "transformDescendent")) {
                $transform = new $extendedTransformName($classGenerator, $map);
                $transform->setPropertyGenerator($this->getPropertyGenerator());
                $transform->transformDescendent();
            }
        }
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
    }

    public function addResource($name, CodeGenerator\ClassGenerator $resource)
    {
        $this->resources[$name] = $resource;

        return $this;
    }

    public function hasResource($name)
    {
        return isset($this->resources[$name]);
    }

    public function getQueryMap()
    {
        return $this->queryMap;
    }

    public function setQueryMap($queryMap)
    {
        $this->queryMap = $queryMap;

        return $this;
    }

    public function setQueryMapEntry($name, $map)
    {
        $this->queryMap[$name] = $map;
    }

    public function getXsd()
    {
        return $this->xsd;
    }

    public function setXsd(DOMDocument $xsd)
    {
        $this->xsd = $xsd;

        return $this;
    }

    public function getXsdXPath()
    {
        if (!$this->xsdXPath && ($xsd = $this->getXsd())) {
            $xpath = new DOMXPath($xsd);
            static::registerXsdNamespaces($xpath);
            $this->xsdXPath = $xpath;
        }

        return $this->xsdXPath;
    }

    public function setXsdXPath(DOMXPath $xsdXPath)
    {
        $this->xsdXPath = $xsdXPath;

        return $this;
    }

    public function getClassGenerator()
    {
        if (!$this->classGenerator) {
            $this->classGenerator = new CodeGenerator\ClassGenerator;
        }

        return $this->classGenerator;
    }

    public function setClassGenerator(CodeGenerator\ClassGenerator $classGenerator)
    {
        $this->classGenerator = $classGenerator;

        return $this;
    }

    public function getPropertyGenerator()
    {
        if (!$this->propertyGenerator) {
            $generator = new CodeGenerator\PropertyGenerator;
            $generator->setVisibility($generator::VISIBILITY_PROTECTED);

            $this->propertyGenerator = $generator;
        }

        return $this->propertyGenerator;
    }

    public function setPropertyGenerator($propertyGenerator)
    {
        $this->propertyGenerator = $propertyGenerator;

        return $this;
    }

    public function getPropertyDocblockGenerator()
    {
        if (!$this->propertyDocblockGenerator) {
            $this->propertyDocblockGenerator = new CodeGenerator\DocBlockGenerator;
        }

        return $this->propertyDocblockGenerator;
    }

    public function setPropertyDocblockGenerator($propertyDocblockGenerator)
    {
        $this->propertyDocblockGenerator = $propertyDocblockGenerator;

        return $this;
    }

    public function getPropertyGetterGenerator()
    {
        if (!$this->propertyGetterGenerator) {
            $this->propertyGetterGenerator = new CodeGenerator\MethodGenerator;
        }

        return $this->propertyGetterGenerator;
    }

    public function setPropertyGetterGenerator($propertyGetterGenerator)
    {
        $this->propertyGetterGenerator = $propertyGetterGenerator;

        return $this;
    }

    public function getPropertySetterGenerator()
    {
        if (!$this->propertySetterGenerator) {
            $this->propertySetterGenerator = new CodeGenerator\MethodGenerator;
        }

        return $this->propertySetterGenerator;
    }

    public function setPropertySetterGenerator($propertySetterGenerator)
    {
        $this->propertySetterGenerator = $propertySetterGenerator;

        return $this;
    }

    public function getFileGenerator()
    {
        if (!$this->fileGenerator) {
            $this->fileGenerator = new CodeGenerator\FileGenerator;
        }

        return $this->fileGenerator;
    }

    public function setFileGenerator($fileGenerator)
    {
        $this->fileGenerator = $fileGenerator;

        return $this;
    }

    protected static function registerXsdNamespaces(DOMXPath $xpath)
    {
        foreach (static::$xsdNs as $prefix => $uri) {
            $xpath->registerNamespace($prefix, $uri);
        }
    }
}
