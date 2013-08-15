<?php
namespace CallFire\Generator;

use CallFire\Generator\Rest\Swagger\Description as SwaggerDescription;
use Zend\Code\Generator as CodeGenerator;

class Rest
{
    const REQUEST_NAMESPACE_ALIAS = "Request";

    const RESPONSE_NAMESPACE_ALIAS = "Response";

    const STRUCTURE_NAMESPACE_ALIAS = "Structure";

    const ABSTRACT_REQUEST_ALIAS = "AbstractRequest";

    /**
     * URI to the primary API swagger aggregation.
     * E.g. https://www.callfire.com/api/1.1/wsdl/swagger
     *
     * @var string
     */
    protected $swaggerUrl;

    /**
     * @var SwaggerDescription
     */
    protected $swaggerDescription;

    /**
     * @var SwaggerDescription[]
     */
    protected $services = array();

    /**
     * API class generators
     *
     * @var Rest\Service[]
     */
    protected $classes = array();

    /**
     * Prototype ClassGenerator for API classes
     *
     * @var CodeGenerator\ClassGenerator
     */
    protected $classGenerator;

    protected $fileGenerator;

    public function __construct($swaggerUrl = null)
    {
        if ($swaggerUrl) {
            $this->setSwaggerUrl($swaggerUrl);
        }
    }

    /**
     * Populate the API class generators from the available
     * API data.
     *
     * @param  string $requestNamespace   = null
     * @param  string $responseNamespace  = null
     * @param  string $structureNamespace = null
     * @return array
     */
    public function generateClasses($requestNamespace = null, $responseNamespace = null, $structureNamespace = null)
    {
        $classGenerator = $this->getClassGenerator();
        if ($constructorGenerator = $this->getConstructorGenerator()) {
            $classGenerator->addMethodFromGenerator($constructorGenerator);
        }
        if ($requestNamespace) {
            $classGenerator->addUse($requestNamespace, self::REQUEST_NAMESPACE_ALIAS);
        }
        if ($responseNamespace) {
            $classGenerator->addUse($responseNamespace, self::RESPONSE_NAMESPACE_ALIAS);
        }
        if ($structureNamespace) {
            $classGenerator->addUse($structureNamespace, self::STRUCTURE_NAMESPACE_ALIAS);
        }

        foreach ($this->getServices() as $service) {
            $serviceGenerator = new Rest\Service;
            $serviceGenerator->setClassGenerator(clone $classGenerator);
            $serviceGenerator->setDescription($service);
            $serviceGenerator->generate();

            $this->transformService($serviceGenerator);

            $this->addClass($serviceGenerator);
        }

        return $this->getClasses();
    }

    public function generateClassFiles()
    {
        $files = array();
        foreach ($this->getClasses() as $class) {
            $fileGenerator = clone $this->getFileGenerator();
            $fileGenerator->setClass($class->getClassGenerator());
            $files[] = $fileGenerator;
        }

        return $files;
    }

    public function generateRequestClassFiles()
    {
        $files = array();
        foreach ($this->getClasses() as $serviceClass) {
            $requestClasses = $serviceClass->getRequestClasses();
            foreach ($requestClasses as $requestClass) {
                $fileGenerator = clone $this->getFileGenerator();
                $fileGenerator->setClass($requestClass);
                $files[] = $fileGenerator;
            }
        }

        return $files;
    }

    public function transformService(Rest\Service $service)
    {
        $serviceName = $service->getClassGenerator()->getName();
        $transformName = "CallFire\Generator\Rest\Transform\Client\\{$serviceName}";
        if (!class_exists($transformName)) {
            return;
        }

        $transform = new $transformName($service);

        return $transform->transform();
    }

    public function getConstructorGenerator()
    {
        return null;
    }

    public function getSwaggerUrl()
    {
        return $this->swaggerUrl;
    }

    public function setSwaggerUrl($swaggerUrl)
    {
        $this->swaggerUrl = $swaggerUrl;

        return $this;
    }

    public function getSwaggerDescription()
    {
        if (!$this->swaggerDescription) {
            $json = file_get_contents($this->getSwaggerUrl());
            $description = SwaggerDescription::fromJson($json);
            if ($description) {
                $this->swaggerDescription = $description;
            }
        }

        return $this->swaggerDescription;
    }

    public function setSwaggerDescription(SwaggerDescription $swaggerDescription)
    {
        $this->swaggerDescription = $swaggerDescription;

        return $this;
    }

    public function getServices()
    {
        if (empty($this->services) && ($description = $this->getSwaggerDescription())) {
            $basePath = $description->getBasePath();
            foreach ($description->getApis() as $api) {
                $json = file_get_contents("{$basePath}{$api->getPath()}");
                $serviceDescription = SwaggerDescription::fromJson($json);
                $this->addService($serviceDescription);
            }
        }

        return $this->services;
    }

    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    public function addService(SwaggerDescription $service)
    {
        $this->services[] = $service;
    }

    public function getClasses()
    {
        return $this->classes;
    }

    public function setClasses($classes)
    {
        $this->classes = $classes;

        return $this;
    }

    public function addClass($class)
    {
        $this->classes[] = $class;

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
