<?php
namespace CallFire\Generator;

use Zend\Code\Generator as CodeGenerator;
use CallFire\Common\Resource\AbstractResource;

use DOMDocument;
use DOMNode;
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
        foreach($complexTypes as $complexType) {
            $this->generateResource($complexType);
        }
        
        $elements = $xpath->query('_:element[@name]');
        foreach($elements as $element) {
            $this->generateResource($element);
        }
    }
    
    public function generateResourceFiles()
    {
        $files = array();
        foreach($this->getResources() as $resourceGenerator) {
            $fileGenerator = clone $this->getFileGenerator();
            $fileGenerator->setClass($resourceGenerator);
            $files[] = $fileGenerator;
        }
        
        return $files;
    }
    
    public function generateResource(DOMNode $element) {
        $xpath = $this->getXsdXPath();
        $classGenerator = clone $this->getClassGenerator();
        $map = array();
        
        $isComplexType = ($element->nodeName == 'complexType');
        $extensionNode = $xpath->query('_:complexType/_:complexContent/_:extension[@base]', $element)->item(0);
        $isSubclass = (bool) $extensionNode;
        $extendedClass = $isSubclass?substr($xpath->query('@base', $extensionNode)->item(0)->textContent, 4):null;
        
        $resourceName = $xpath->query('@name', $element)->item(0)->textContent;
        if($this->hasResource($resourceName)) {
            continue;
        }
        
        $classGenerator->setName($resourceName);
        if($isSubclass) {
            $classGenerator->setExtendedClass($extendedClass);
        }
        
        $abstract = $xpath->query('@abstract', $element)->item(0);
        if($abstract && $abstract->textContent == 'true') {
            $classGenerator->setAbstract(true);
        }
        
        $attributesQuery = $isComplexType?'_:attribute[@name]':'_:complexType/_:attribute[@name]';
        if($isSubclass) {
            $attributesQuery = '_:complexType/_:complexContent/_:extension/_:attribute[@name]';
        }
        
        // First-class attributes of the resource (e.g. resource identifier)
        $attributes = $xpath->query($attributesQuery, $element);
        foreach($attributes as $attribute) {
            $attributeName = $xpath->query('@name', $attribute)->item(0)->textContent;
            $attributeTypeNode = $xpath->query('@type', $attribute)->item(0);
            $attributeType = $attributeTypeNode?$attributeTypeNode->textContent:'';
            
            if(substr($attributeType, 0, 4) == 'tns:') {
                $attributeType = 'string';
            }
            
            $propertyName = lcfirst($attributeName);

            $attributeDescriptionNode = $xpath->query('annotation/documentation/ann:summary', $element)->item(0);
            $attributeDescription = $attributeDescriptionNode?$attributeDescriptionNode->textContent:'';
            
            $attributeProperty = clone $this->getPropertyGenerator();
            $attributeProperty->setName($propertyName);
            
            if($attributeType || $attributeDescription) {
                $attributePropertyDocblock = clone $this->getPropertyDocblockGenerator();
                $attributeProperty->setDocBlock($attributePropertyDocblock);
                
                $attributePropertyDocblock->setShortDescription($attributeDescription);
                
                if($attributeType) {
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
        
        $sequenceElementsQuery = $isComplexType?'_:sequence/_:element[@name][@type]':'_:complexType/_:sequence/_:element[@name][@type]';
        if($isSubclass) {
            $sequenceElementsQuery = '_:complexType/_:complexContent/_:extension/_:sequence/_:element[@name][@type]';
        }
        
        // Second-class attributes of the resource (e.g. name, description)
        $sequenceElements = $xpath->query($sequenceElementsQuery, $element);
        foreach($sequenceElements as $sequenceElement) {
            $sequenceElementName = $xpath->query('@name', $sequenceElement)->item(0)->textContent;
            $sequenceElementTypeNode = $xpath->query('@type', $sequenceElement)->item(0);
            $sequenceElementType = $sequenceElementTypeNode?$sequenceElementTypeNode->textContent:'';
            
            if(substr($sequenceElementType, 0, 4) == 'tns:') {
                $sequenceElementType = 'string';
            }
            
            $propertyName = lcfirst($sequenceElementName);
            
            $sequenceElementProperty = clone $this->getPropertyGenerator();
            $sequenceElementProperty->setName($propertyName);
            
            if($sequenceElementType) {
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
        
        $secondClassElementsQuery = $isComplexType?'_:sequence/_:element[@name][not(@type)]':'_:complexType/_:sequence/_:element[@name][not(@type)]';
        if($isSubclass) {
            $secondClassElementsQuery = '_:complexType/_:complexContent/_:extension/_:sequence/_:element[@name][not(@type)]';
        }
        
        // Complex second-class types (e.g. question-response, broadcast result statistics)
        $secondClassElements = $xpath->query($secondClassElementsQuery, $element);
        foreach($secondClassElements as $secondClassElement) {
            $this->generateResource($secondClassElement);
            
            $maxOccursNode = $xpath->query('@maxOccurs', $secondClassElement)->item(0);
            $maxOccurs = $maxOccursNode?$maxOccursNode->textContent:null;
            $unbounded = ($maxOccurs == 'unbounded');
            
            $secondClassElementName = $xpath->query('@name', $secondClassElement)->item(0)->textContent;
            $secondClassElementType = $secondClassElementName;
            if($unbounded) {
                $secondClassElementType .= "[]";
            }
            
            $propertyName = lcfirst($secondClassElementName);
            if($unbounded) {
                $propertyName .= 's';
            }
            
            $secondClassElementProperty = clone $this->getPropertyGenerator();
            $secondClassElementProperty->setName($propertyName);
            if($unbounded) {
                $secondClassElementProperty->setDefaultValue(
                    new CodeGenerator\PropertyValueGenerator(array())
                );
            }
            
            if($secondClassElementType) {
                $secondClassElementPropertyDocblock = clone $this->getPropertyDocblockGenerator();
                $secondClassElementProperty->setDocBlock($secondClassElementPropertyDocblock);
                
                $typeTag = new CodeGenerator\DocBlock\Tag;
                $typeTag->setName('var');
                $typeTag->setDescription($secondClassElementType);
                $secondClassElementPropertyDocblock->setTag($typeTag);
            }
            
            $classGenerator->addPropertyFromGenerator($secondClassElementProperty);
            $map["#{$secondClassElementName}"] = "_:{$secondClassElementName}";
            
            $getterGenerator = $this->generatePropertyGetter($propertyName);
            $setterGenerator = $this->generatePropertySetter($propertyName);
            $classGenerator->addMethods(array(
                $getterGenerator,
                $setterGenerator
            ));
        }
        
        $this->addResource($resourceName, $classGenerator);
        $this->setQueryMapEntry($resourceName, $map);
    }
    
    public function generatePropertyGetter($propertyName) {
        $methodName = 'get'.ucfirst($propertyName);
    
        $getterGenerator = clone $this->getPropertyGetterGenerator();
        $getterGenerator->setName($methodName);
        
        $getterGenerator->setBody("return \$this->{$propertyName};");
        
        return $getterGenerator;
    }
    
    public function generatePropertySetter($propertyName) {
        $methodName = 'set'.ucfirst($propertyName);
        
        $setterGenerator = clone $this->getPropertySetterGenerator();
        $setterGenerator->setName($methodName);
        
        $parameter = new CodeGenerator\ParameterGenerator;
        $parameter->setName($propertyName);
        $setterGenerator->setParameter($parameter);
        
        $setterGenerator->setBody("\$this->{$propertyName} = \${$propertyName};\nreturn \$this;");
        
        return $setterGenerator;
    }
    
    public function getResources() {
        return $this->resources;
    }
    
    public function setResources($resources) {
        $this->resources = $resources;
        return $this;
    }
    
    public function addResource($name, CodeGenerator\ClassGenerator $resource) {
        $this->resources[$name] = $resource;
        return $this;
    }
    
    public function hasResource($name) {
        return isset($this->resources[$name]);
    }
    
    public function getQueryMap() {
        return $this->queryMap;
    }
    
    public function setQueryMap($queryMap) {
        $this->queryMap = $queryMap;
        return $this;
    }
    
    public function setQueryMapEntry($name, $map) {
        $this->queryMap[$name] = $map;
    }
    
    public function getXsd() {
        return $this->xsd;
    }
    
    public function setXsd(DOMDocument $xsd) {
        $this->xsd = $xsd;
        return $this;
    }
    
    public function getXsdXPath() {
        if(!$this->xsdXPath && ($xsd = $this->getXsd())) {
            $xpath = new DOMXPath($xsd);
            static::registerXsdNamespaces($xpath);
            $this->xsdXPath = $xpath;
        }
        return $this->xsdXPath;
    }
    
    public function setXsdXPath(DOMXPath $xsdXPath) {
        $this->xsdXPath = $xsdXPath;
        return $this;
    }
    
    public function getClassGenerator() {
        if(!$this->classGenerator) {
            $this->classGenerator = new CodeGenerator\ClassGenerator;
        }
        return $this->classGenerator;
    }
    
    public function setClassGenerator(CodeGenerator\ClassGenerator $classGenerator) {
        $this->classGenerator = $classGenerator;
        return $this;
    }
    
    public function getPropertyGenerator() {
        if(!$this->propertyGenerator) {
            $this->propertyGenerator = new CodeGenerator\PropertyGenerator;
        }
        return $this->propertyGenerator;
    }
    
    public function setPropertyGenerator($propertyGenerator) {
        $this->propertyGenerator = $propertyGenerator;
        return $this;
    }
    
    public function getPropertyDocblockGenerator() {
        if(!$this->propertyDocblockGenerator) {
            $this->propertyDocblockGenerator = new CodeGenerator\DocBlockGenerator;
        }
        return $this->propertyDocblockGenerator;
    }
    
    public function setPropertyDocblockGenerator($propertyDocblockGenerator) {
        $this->propertyDocblockGenerator = $propertyDocblockGenerator;
        return $this;
    }
    
    public function getPropertyGetterGenerator() {
        if(!$this->propertyGetterGenerator) {
            $this->propertyGetterGenerator = new CodeGenerator\MethodGenerator;
        }
        return $this->propertyGetterGenerator;
    }
    
    public function setPropertyGetterGenerator($propertyGetterGenerator) {
        $this->propertyGetterGenerator = $propertyGetterGenerator;
        return $this;
    }
    
    public function getPropertySetterGenerator() {
        if(!$this->propertySetterGenerator) {
            $this->propertySetterGenerator = new CodeGenerator\MethodGenerator;
        }
        return $this->propertySetterGenerator;
    }
    
    public function setPropertySetterGenerator($propertySetterGenerator) {
        $this->propertySetterGenerator = $propertySetterGenerator;
        return $this;
    }
    
    public function getFileGenerator() {
        if(!$this->fileGenerator) {
            $this->fileGenerator = new CodeGenerator\FileGenerator;
        }
        return $this->fileGenerator;
    }
    
    public function setFileGenerator($fileGenerator) {
        $this->fileGenerator = $fileGenerator;
        return $this;
    }
    
    protected static function registerXsdNamespaces(DOMXPath $xpath) {
        foreach(static::$xsdNs as $prefix => $uri) {
            $xpath->registerNamespace($prefix, $uri);
        }
    }
}
