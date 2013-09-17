<?php
namespace CallFire\Generator\Soap;

use CallFire\Generator\Soap;

use CallFire\Generator\Soap\SoapService;
use CallFire\Generator\Soap\SoapFunction;

use Zend\Code\Generator as CodeGenerator;

use SoapClient;

class SoapService
{
    protected $requestNamespace;

    protected $wsdl;

    protected $xPath;

    protected $binding;

    protected $bindingName;

    protected $soapClient;

    protected $functions = array();

    protected $requestStructures = array();

    protected $responseStructures = array();

    protected $constructorGenerator;

    protected $classGenerator;

    protected $fileGenerator;

    public function __construct($xpath, $binding, $soapClient)
    {
        $this->setXPath($xpath);
        $this->setBinding($binding);
        $this->setSoapClient($soapClient);
    }

    public function generateFunctions($requestNamespace = null)
    {
        $xpath = $this->getXPath();
        $binding = $this->getBinding();
        $soapClient = $this->getSoapClient();

        $operations = $xpath->query('_:operation', $binding);
        foreach ($operations as $operation) {
            $soapFunction = new SoapFunction($operation, $xpath);
            $soapFunction->setRequestNamespace($requestNamespace);
            $soapFunction->generate();
            if ($requestStructure = $soapFunction->getRequestStructure()) {
                $this->addRequestStructure($requestStructure);
            }
            if ($responseStructure = $soapFunction->getResponseStructure()) {
                $this->addResponseStructure($responseStructure);
            }
            $this->addFunction($soapFunction);
        }

        return $this->getFunctions();
    }

    public function generateClass($requestNamespace = null, $responseNamespace = null, $structureNamespace = null)
    {
        $classGenerator = $this->getClassGenerator();
        if ($requestNamespace) {
            $classGenerator->addUse($requestNamespace, Soap::REQUEST_NAMESPACE_ALIAS);
        }
        if ($responseNamespace) {
            $classGenerator->addUse($responseNamespace, Soap::RESPONSE_NAMESPACE_ALIAS);
        }
        if ($structureNamespace) {
            $classGenerator->addUse($structureNamespace, Soap::STRUCTURE_NAMESPACE_ALIAS);
        }

        $classGenerator->setName($this->getBindingName());
        $classGenerator->addMethodFromGenerator($this->getConstructorGenerator());

        foreach ($this->getFunctions() as $function) {
            $classGenerator->addMethodFromGenerator($function->getMethodGenerator());
        }

        return $classGenerator;
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

    public function getWsdl()
    {
        return $this->wsdl;
    }

    public function setWsdl($wsdl)
    {
        $this->wsdl = $wsdl;

        return $this;
    }

    public function getXPath()
    {
        return $this->xPath;
    }

    public function setXPath($xPath)
    {
        $this->xPath = $xPath;

        return $this;
    }

    public function getBinding()
    {
        return $this->binding;
    }

    public function setBinding($binding)
    {
        $this->binding = $binding;

        return $this;
    }

    public function getBindingName()
    {
        if (!$this->bindingName) {
            $binding = $this->getBinding();
            if ($binding) {
                $bindingName = $binding->getAttribute('name');
                if (substr($bindingName, -15, 15) == 'ServicePortType') {
                    $bindingName = substr($bindingName, 0, strlen($bindingName)-15);
                }

                $this->bindingName = $bindingName;
            }
        }

        return $this->bindingName;
    }

    public function setBindingName($bindingName)
    {
        $this->bindingName = $bindingName;

        return $this;
    }

    public function getSoapClient()
    {
        return $this->soapClient;
    }

    public function setSoapClient($soapClient)
    {
        $this->soapClient = $soapClient;

        return $this;
    }

    public function getFunctions()
    {
        return $this->functions;
    }

    public function setFunctions($functions)
    {
        $this->functions = $functions;

        return $this;
    }

    public function addFunction(SoapFunction $function)
    {
        $this->functions[] = $function;
    }

    public function getRequestStructures()
    {
        return $this->requestStructures;
    }

    public function setRequestStructures($requestStructures)
    {
        $this->requestStructures = $requestStructures;

        return $this;
    }

    public function addRequestStructure($structureName)
    {
        $this->requestStructures[] = $structureName;
    }

    public function getResponseStructures()
    {
        return $this->responseStructures;
    }

    public function setResponseStructures($responseStructures)
    {
        $this->responseStructures = $responseStructures;

        return $this;
    }

    public function addResponseStructure($responseStructure)
    {
        $this->responseStructures[] = $responseStructure;

        return $this;
    }

    public function getConstructorGenerator()
    {
        if (!$this->constructorGenerator && ($extendedClass = $this->getClassGenerator()->getExtendedClass())) {
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

            $constructorGenerator->setBody("parent::__construct(\$wsdl, \$options);");

            $this->constructorGenerator = $constructorGenerator;
        }

        return $this->constructorGenerator;
    }

    public function setConstructorGenerator($constructorGenerator)
    {
        $this->constructorGenerator = $constructorGenerator;

        return $this;
    }

    public function getClassGenerator()
    {
        if (!$this->classGenerator) {
            $this->classGenerator = new CodeGenerator\ClassGenerator;
        }

        return $this->classGenerator;
    }

    public function setClassGenerator($classGenerator)
    {
        $this->classGenerator = $classGenerator;

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
}
