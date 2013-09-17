<?php
namespace CallFire\Generator;

use CallFire\Generator\Soap\SoapService;
use CallFire\Generator\Soap\SoapStructure;

use Zend\Code\Generator as CodeGenerator;
use SoapClient;

use DOMDocument;
use DOMXPath;

class Soap
{
    const CLIENT_NAMESPACE_ALIAS = "Client";

    const REQUEST_NAMESPACE_ALIAS = "Request";

    const RESPONSE_NAMESPACE_ALIAS = "Result";

    const STRUCTURE_NAMESPACE_ALIAS = "Structure";

    const ABSTRACT_REQUEST_ALIAS = "AbstractRequest";

    const ABSTRACT_RESPONSE_ALIAS = "AbstractResponse";

    protected static $wsdlNamespaces = array(
        '_' => 'http://schemas.xmlsoap.org/wsdl/',
        'svc' => 'http://api.callfire.com/service/wsdl',
        'wsdl' => 'http://schemas.xmlsoap.org/wsdl/',
        'tns' => 'http://api.callfire.com/service/wsdl/http/soap12',
        'soap12' => 'http://schemas.xmlsoap.org/wsdl/soap12/'
    );

    protected $wsdl;

    protected $fullWsdl;

    protected $wsdlDocument;

    protected $wsdlXPath;

    protected $soapClient;

    protected $services = array();

    protected $structures = array();

    protected $classGenerator;

    protected $fileGenerator;

    public function __construct($wsdl = null, $fullWsdl = null)
    {
        if ($wsdl) {
            $this->setWsdl($wsdl);
        }
        if ($fullWsdl) {
            $this->setFullWsdl($fullWsdl);
        }
    }

    public function generateServices($requestNamespace = null)
    {
        $xpath = $this->getWsdlXPath();
        $soapClient = $this->getSoapClient();

        foreach ($xpath->query('_:portType') as $binding) {
            $service = new SoapService($xpath, $binding, $soapClient);
            $service->setWsdl($this->getWsdl());
            $service->setClassGenerator(clone $this->getClassGenerator());
            $service->setRequestNamespace($requestNamespace);
            $service->generateFunctions($requestNamespace);

            $this->addService($service);
        }
    }

    public function generateStructures($requestNamespace = null)
    {
        $types = $this->getSoapClient()->__getTypes();
        foreach ($types as $description) {
            $soapStructure = new SoapStructure;
            $soapStructure->generateFromDescription($description);
            if ($soapStructure->isStructure()) {
                $this->addStructure($soapStructure);
            }
        }
    }

    public function generateClasses($requestNamespace = null, $responseNamespace = null, $structureNamespace = null)
    {
        foreach ($this->getServices() as $service) {
            $service->generateClass($requestNamespace, $responseNamespace, $structureNamespace);
        }
    }

    public function generateClassFiles()
    {
        $files = array();
        foreach ($this->getServices() as $service) {
            $fileGenerator = clone $this->getFileGenerator();
            $fileGenerator->setClass($service->getClassGenerator());
            $files[] = $fileGenerator;
        }

        return $files;
    }

    public function generateStructureFiles()
    {
        $files = array();
        foreach ($this->getStructures() as $structure) {
            $fileGenerator = clone $this->getFileGenerator();
            $fileGenerator->setClass($structure->getClassGenerator());
            $files[] = $fileGenerator;
        }

        return $files;
    }

    public function getRequestStructures()
    {
        $structures = array();

        foreach ($this->getServices() as $service) {
            $serviceStructures = $service->getRequestStructures();
            $structures = array_merge($structures, $serviceStructures);
        }

        return $structures;
    }

    public function getResponseStructures()
    {
        $structures = array();

        foreach ($this->getServices() as $service) {
            $serviceStructures = $service->getResponseStructures();
            $structures = array_merge($structures, $serviceStructures);
        }

        return $structures;
    }

    public static function getWsdlNamespaces()
    {
        return static::$wsdlNamespaces;
    }

    public static function setWsdlNamespaces($wsdlNamespaces)
    {
        static::$wsdlNamespaces = $wsdlNamespaces;

        return $this;
    }

    public static function addWsdlNamespace($wsdlNamespace)
    {
        static::$wsdlNamespaces[] = $wsdlNamespace;
    }

    public function getWsdl()
    {
        return $this->wsdl;
    }

    public function setWsdl($wsdl)
    {
        $this->wsdl = $wsdl;
        $this->setSoapClient(null);

        return $this;
    }

    public function getFullWsdl()
    {
        return $this->fullWsdl;
    }

    public function setFullWsdl($fullWsdl)
    {
        $this->fullWsdl = $fullWsdl;

        return $this;
    }

    public function getWsdlDocument()
    {
        if (!$this->wsdlDocument) {
            $document = new DOMDocument;
            $document->load($this->getFullWsdl());

            $this->wsdlDocument = $document;
        }

        return $this->wsdlDocument;
    }

    public function setWsdlDocument($wsdlDocument)
    {
        $this->wsdlDocument = $wsdlDocument;

        return $this;
    }

    public function getWsdlXPath()
    {
        if (!$this->wsdlXPath) {
            $xpath = new DOMXPath($this->getWsdlDocument());

            foreach (static::getWsdlNamespaces() as $prefix => $uri) {
                $xpath->registerNamespace($prefix, $uri);
            }

            $this->wsdlXPath = $xpath;
        }

        return $this->wsdlXPath;
    }

    public function setWsdlXPath($wsdlXPath)
    {
        $this->wsdlXPath = $wsdlXPath;

        return $this;
    }

    public function getSoapClient()
    {
        if (!$this->soapClient) {
            $this->soapClient = new SoapClient($this->getWsdl());
        }

        return $this->soapClient;
    }

    public function setSoapClient($soapClient)
    {
        $this->soapClient = $soapClient;

        return $this;
    }

    public function getServices()
    {
        return $this->services;
    }

    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    public function addService($service)
    {
        $this->services[] = $service;

        return $this;
    }

    public function getStructures()
    {
        return $this->structures;
    }

    public function setStructures($structures)
    {
        $this->structures = $structures;

        return $this;
    }

    public function addStructure(SoapStructure $structure)
    {
        $this->structures[] = $structure;
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
