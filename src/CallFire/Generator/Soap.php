<?php
namespace CallFire\Generator;

use CallFire\Generator\Soap\SoapFunction;
use CallFire\Generator\Soap\SoapStructure;

use Zend\Code\Generator as CodeGenerator;
use SoapClient;

class Soap
{
    const REQUEST_NAMESPACE_ALIAS = "Request";
    
    const RESPONSE_NAMESPACE_ALIAS = "Response";
    
    const STRUCTURE_NAMESPACE_ALIAS = "Structure";

    protected $wsdl;
    
    protected $soapClient;
    
    protected $constructorGenerator;
    
    protected $functions = array();
    
    protected $structures = array();
    
    protected $requestStructures = array();
    
    protected $responseStructures = array();
    
    protected $classGenerator;
    
    protected $fileGenerator;

    public function __construct($wsdl = null)
    {
        if($wsdl) {
            $this->setWsdl($wsdl);
        }
    }
    
    public function generateFunctions($requestNamespace = null)
    {
        $functions = $this->getSoapClient()->__getFunctions();
        foreach($functions as $description) {
            $soapFunction = new SoapFunction;
            $soapFunction->setRequestNamespace($requestNamespace);
            $soapFunction->generateFromDescription($description);
            if($requestStructure = $soapFunction->getRequestStructure()) {
                $this->addRequestStructure($requestStructure);
            }
            if($responseStructure = $soapFunction->getResponseStructure()) {
                $this->addResponseStructure($responseStructure);
            }
            $this->addFunction($soapFunction);
        }
    }
    
    public function generateStructures($requestNamespace = null)
    {
        $types = $this->getSoapClient()->__getTypes();
        foreach($types as $description) {
            $soapStructure = new SoapStructure;
            $soapStructure->generateFromDescription($description);
            if($soapStructure->isStructure()) {
                $this->addStructure($soapStructure);
            }
        }
    }
    
    public function generateClasses($requestNamespace = null, $responseNamespace = null, $structureNamespace = null)
    {
        $classGenerator = $this->getClassGenerator();
        if($constructorGenerator = $this->getConstructorGenerator()) {
            $classGenerator->addMethodFromGenerator($constructorGenerator);
        }
        if($requestNamespace) {
            $classGenerator->addUse($requestNamespace, self::REQUEST_NAMESPACE_ALIAS);
        }
        if($responseNamespace) {
            $classGenerator->addUse($responseNamespace, self::RESPONSE_NAMESPACE_ALIAS);
        }
        if($structureNamespace) {
            $classGenerator->addUse($structureNamespace, self::STRUCTURE_NAMESPACE_ALIAS);
        }
        foreach($this->getFunctions() as $function) {
            $classGenerator->addMethodFromGenerator($function->getMethodGenerator());
        }
    }
    
    public function generateClassFiles()
    {
        $files = array();
        $fileGenerator = clone $this->getFileGenerator();
        $fileGenerator->setClass($this->getClassGenerator());
        $files[] = $fileGenerator;
        
        return $files;
    }
    
    public function generateStructureFiles() 
    {
        $files = array();
        foreach($this->getStructures() as $structure) {
            $fileGenerator = clone $this->getFileGenerator();
            $fileGenerator->setClass($structure->getClassGenerator());
            $files[] = $fileGenerator;
        }
        
        return $files;
    }
    
    public function getWsdl() {
        return $this->wsdl;
    }
    
    public function setWsdl($wsdl) {
        $this->wsdl = $wsdl;
        $this->setSoapClient(null);
        return $this;
    }
    
    public function getSoapClient() {
        if(!$this->soapClient) {
            $this->soapClient = new SoapClient($this->getWsdl());
        }
    
        return $this->soapClient;
    }
    
    public function setSoapClient($soapClient) {
        $this->soapClient = $soapClient;
        return $this;
    }
    
    public function getConstructorGenerator() {
        if(!$this->constructorGenerator && ($extendedClass = $this->getClassGenerator()->getExtendedClass())) {
            $constructorGenerator = new CodeGenerator\MethodGenerator;
            $constructorGenerator->setName('__construct');
            
            $wsdlParameter = new CodeGenerator\ParameterGenerator;
            $wsdlParameter->setName('wsdl');
            $wsdlParameter->setDefaultValue($this->getWsdl());
            $constructorGenerator->setParameter($wsdlParameter);
            
            $optionsParameter = new CodeGenerator\ParameterGenerator;
            $optionsParameter->setName('options');
            $optionsParameter->setDefaultValue(array());
            $constructorGenerator->setParameter($optionsParameter);
            
            if(method_exists($extendedClass, "__construct")) {
                $constructorGenerator->setBody("parent::__construct(\$wsdl, \$options);");
            } elseif(method_exists($extendedClass, $extendedClass)) {
                $constructorGenerator->setBody("parent::{$extendedClass}(\$wsdl, \$options);");
            }
            
            $this->constructorGenerator = $constructorGenerator;
        }
        return $this->constructorGenerator;
    }
    
    public function setConstructorGenerator($constructorGenerator) {
        $this->constructorGenerator = $constructorGenerator;
        return $this;
    }
    
    public function getFunctions() {
        return $this->functions;
    }
    
    public function setFunctions($functions) {
        $this->functions = $functions;
        return $this;
    }
    
    public function addFunction(SoapFunction $function)
    {
        $this->functions[] = $function;
    }
    
    public function getStructures() {
        return $this->structures;
    }
    
    public function setStructures($structures) {
        $this->structures = $structures;
        return $this;
    }
    
    public function addStructure(SoapStructure $structure)
    {
        $this->structures[] = $structure;
    }
    
    public function getRequestStructures() {
        return $this->requestStructures;
    }
    
    public function setRequestStructures($requestStructures) {
        $this->requestStructures = $requestStructures;
        return $this;
    }
    
    public function addRequestStructure($structureName) {
        $this->requestStructures[] = $structureName;
    }
    
    public function getResponseStructures() {
        return $this->responseStructures;
    }
    
    public function setResponseStructures($responseStructures) {
        $this->responseStructures = $responseStructures;
        return $this;
    }
    
    public function addResponseStructure($responseStructure) {
        $this->responseStructures[] = $responseStructure;
    }
    
    public function getClassGenerator() {
        if(!$this->classGenerator) {
            $this->classGenerator = new CodeGenerator\ClassGenerator;
        }
        return $this->classGenerator;
    }
    
    public function setClassGenerator($classGenerator) {
        $this->classGenerator = $classGenerator;
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
}
