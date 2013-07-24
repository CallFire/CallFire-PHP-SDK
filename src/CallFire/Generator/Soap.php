<?php
namespace CallFire\Generator;

use CallFire\Generator\Soap\SoapFunction;

use Zend\Code\Generator as CodeGenerator;
use SoapClient;

class Soap
{
    protected $wsdl;
    
    protected $soapClient;
    
    protected $functions = array();
    
    protected $types = array();
    
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
            $this->addFunction($soapFunction);
        }
    }
    
    public function generateClass($requestNamespace = null)
    {
        $classGenerator = $this->getClassGenerator();
        if($requestNamespace) {
            $classGenerator->addUse($requestNamespace, SoapFunction::REQUEST_NAMESPACE_ALIAS);
        }
        foreach($this->getFunctions() as $function) {
            $classGenerator->addMethodFromGenerator($function->getMethodGenerator());
        }
    }
    
    public function generateClassFiles()
    {
        $fileGenerator = $this->getFileGenerator();
        $fileGenerator->setClass($this->getClassGenerator());
    }
    
    public function generateTypeFiles()
    {
        
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
    
    public function getTypes() {
        return $this->types;
    }
    
    public function setTypes($types) {
        $this->types = $types;
        return $this;
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
