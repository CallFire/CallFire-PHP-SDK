<?php
namespace CallFire\Generator\Soap;

use CallFire\Generator\Soap;

use Zend\Code\Generator as CodeGenerator;

class SoapFunction
{
    protected $scalarTypes = array(
        "void" => "void",
        "long" => "int",
        "base64Binary" => "string"
    );

    protected $methodGenerator;

    protected $bodyGenerator;

    protected $docblockGenerator;

    protected $requestNamespace;

    protected $requestStructure;

    protected $responseStructure;

    public function getScalarTypes()
    {
        return $this->scalarTypes;
    }

    public function setScalarTypes($scalarTypes)
    {
        $this->scalarTypes = $scalarTypes;

        return $this;
    }

    public function getMethodGenerator()
    {
        if (!$this->methodGenerator) {
            $this->methodGenerator = new CodeGenerator\MethodGenerator;
        }

        return $this->methodGenerator;
    }

    public function setMethodGenerator($methodGenerator)
    {
        $this->methodGenerator = $methodGenerator;

        return $this;
    }

    public function getBodyGenerator()
    {
        if (!$this->bodyGenerator) {
            $this->bodyGenerator = new CodeGenerator\BodyGenerator;
        }

        return $this->bodyGenerator;
    }

    public function setBodyGenerator($bodyGenerator)
    {
        $this->bodyGenerator = $bodyGenerator;

        return $this;
    }

    public function getDocblockGenerator()
    {
        if (!$this->docblockGenerator) {
            $this->docblockGenerator = new CodeGenerator\DocBlockGenerator;
        }

        return $this->docblockGenerator;
    }

    public function setDocblockGenerator($docblockGenerator)
    {
        $this->docblockGenerator = $docblockGenerator;

        return $this;
    }

    public function getRequestNamespace()
    {
        return $this->requestNamespace;
    }

    public function setRequestNamespace($requestNamespace)
    {
        $this->requestNamespace = $requestNamespace;

        return $this;
    }

    public function getRequestStructure()
    {
        return $this->requestStructure;
    }

    public function setRequestStructure($requestStructure)
    {
        $this->requestStructure = $requestStructure;

        return $this;
    }

    public function getResponseStructure()
    {
        return $this->responseStructure;
    }

    public function setResponseStructure($responseStructure)
    {
        $this->responseStructure = $responseStructure;

        return $this;
    }

    /**
     * Generate the method generator from a SOAP function description
     * e.g. "KeywordQueryResult SearchAvailableKeywords(SearchAvailableKeywords $Request)"
     *
     * @param  string $description
     * @return void
     */
    public function generateFromDescription($description)
    {
        preg_match('#^(\w+) (\w+)\((\w+) \$(\w+)\)#U', $description, $parts);

        list($originalDescription, $returnType, $functionName, $requestType, $requestTypeName) = $parts;

        $methodGenerator = $this->getMethodGenerator();
        $methodGenerator->setName($functionName);

        $parameter = $this->generateParameter($requestTypeName, $requestType);
        $methodGenerator->setParameter($parameter->getParameterGenerator());
        $this->setRequestStructure($requestType);

        $this->setResponseStructure($returnType);

        $body = $this->generateBody();
        $methodGenerator->setBody($body->generate());

        $docblock = $this->generateDocblock($requestTypeName, $requestType, $returnType);
        $methodGenerator->setDocBlock($docblock);
    }

    /**
     * Generate a parameter generator from a SOAP function description's parameter name
     * and type.
     *
     * @param  string        $requestTypeName
     * @param  string        $requestType
     * @return SoapParameter
     */
    protected function generateParameter($requestTypeName, $requestType)
    {
        if ($requestNamespace = $this->getRequestNamespace()) {
            $requestType = Soap::REQUEST_NAMESPACE_ALIAS.'\\'.$requestType;
        }

        $parameter = new SoapParameter;
        $parameter->generate($requestTypeName, $requestType);

        return $parameter;
    }

    protected function generateBody()
    {
        $body = $this->getBodyGenerator();

        $params = $this->getMethodGenerator()->getParameters();
        $paramNames = array();
        foreach ($params as $param) {
            $paramNames[] = '$'.$param->getName();
        }

        $paramNames = implode(', ', $paramNames);

        $body->setContent('$method = __FUNCTION__;'.PHP_EOL.'return parent::$method('.$paramNames.');');

        return $body;
    }

    protected function generateDocblock($requestTypeName, $requestType, $returnType)
    {
        $docblock = $this->getDocblockGenerator();

        $scalarTypes = $this->getScalarTypes();
        $isScalarReturn = false;

        if (isset($scalarTypes[$returnType])) {
            $returnType = $scalarTypes[$returnType];
            $isScalarReturn = true;
        }

        if ($requestNamespace = $this->getRequestNamespace()) {
            $requestType = Soap::REQUEST_NAMESPACE_ALIAS.'\\'.$requestType;
            if (!$isScalarReturn) {
                $returnType = Soap::RESPONSE_NAMESPACE_ALIAS.'\\'.$returnType;
            }
        }

        $parameterTag = new CodeGenerator\DocBlock\Tag\ParamTag;
        $parameterTag->setDataType($requestType);
        $parameterTag->setParamName($requestTypeName);
        $docblock->setTag($parameterTag);

        $returnTag = new CodeGenerator\DocBlock\Tag\ReturnTag;
        $returnTag->setDataType($returnType);
        $docblock->setTag($returnTag);

        return $docblock;
    }
}
