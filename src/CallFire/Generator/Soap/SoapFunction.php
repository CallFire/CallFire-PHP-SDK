<?php
namespace CallFire\Generator\Soap;

use CallFire\Generator\Soap;

use Zend\Code\Generator as CodeGenerator;

class SoapFunction
{
    protected $methodGenerator;
    
    protected $bodyGenerator;
    
    protected $requestNamespace;
    
    protected $requestStructure;
    
    protected $responseStructure;
    
    public function getMethodGenerator() {
        if(!$this->methodGenerator) {
            $this->methodGenerator = new CodeGenerator\MethodGenerator;
        }
        return $this->methodGenerator;
    }
    
    public function setMethodGenerator($methodGenerator) {
        $this->methodGenerator = $methodGenerator;
        return $this;
    }
    
    public function getBodyGenerator() {
        if(!$this->bodyGenerator) {
            $this->bodyGenerator = new CodeGenerator\BodyGenerator;
            $this->bodyGenerator->setContent('$method = __FUNCTION__;'.PHP_EOL.'return parent::$method();');
        }
        return $this->bodyGenerator;
    }
    
    public function setBodyGenerator($bodyGenerator) {
        $this->bodyGenerator = $bodyGenerator;
        return $this;
    }
    
    public function getRequestNamespace() {
        return $this->requestNamespace;
    }
    
    public function setRequestNamespace($requestNamespace) {
        $this->requestNamespace = $requestNamespace;
        return $this;
    }
    
    public function getRequestStructure() {
        return $this->requestStructure;
    }
    
    public function setRequestStructure($requestStructure) {
        $this->requestStructure = $requestStructure;
        return $this;
    }
    
    public function getResponseStructure() {
        return $this->responseStructure;
    }
    
    public function setResponseStructure($responseStructure) {
        $this->responseStructure = $responseStructure;
        return $this;
    }
    
    /**
     * Generate the method generator from a SOAP function description
     * e.g. "KeywordQueryResult SearchAvailableKeywords(SearchAvailableKeywords $Request)"
     *
     * @param string $description
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
        
        $body = $this->generateBody($requestTypeName, $requestType);
        $methodGenerator->setBody($body->generate());
    }
    
    /**
     * Generate a parameter generator from a SOAP function description's parameter name
     * and type.
     *
     * @param string $requestTypeName
     * @param string $requestType
     * @return SoapParameter
     */
    protected function generateParameter($requestTypeName, $requestType)
    {
        if($requestNamespace = $this->getRequestNamespace()) {
            $requestType = Soap::REQUEST_NAMESPACE_ALIAS.'\\'.$requestType;
        }
    
        $parameter = new SoapParameter;
        $parameter->generate($requestTypeName, $requestType);
        
        return $parameter;
    }
    
    protected function generateBody($requestTypeName, $requestType) {
        $body = $this->getBodyGenerator();
        
        return $body;
    }
}
