<?php
namespace CallFire\Generator\Rest;

use CallFire\Generator\Rest\Swagger\Description as SwaggerDescription;
use CallFire\Generator\Rest\Swagger\Api as SwaggerApi;
use CallFire\Generator\Rest\Swagger\Operation as SwaggerOperation;

use Zend\Code\Generator as CodeGenerator;

class Service
{
    protected $classGenerator;

    protected $description;

    protected $requestClasses = array();

    public function generate()
    {
        $classGenerator = $this->getClassGenerator();

        $description = $this->getDescription();

        $classGenerator->setName($description->getName());

        $basePathProperty = new CodeGenerator\PropertyGenerator;
        $basePathProperty->setName('basePath');
        $basePathProperty->setDefaultValue($description->getBasePath());
        $classGenerator->addPropertyFromGenerator($basePathProperty);

        foreach ($description->getApis() as $api) {
            foreach ($api->getOperations() as $operation) {
                $function = $this->generateFunction($api, $operation);
                if ($function instanceof CodeGenerator\MethodGenerator) {
                    $classGenerator->addMethodFromGenerator($function);
                }
            }
        }
    }

    protected function generateFunction(SwaggerApi $api, SwaggerOperation $operation)
    {
        switch ($operation->getHttpMethod()) {
            case SwaggerOperation::METHOD_GET:
                $function = new Action\Get;
                break;
            case SwaggerOperation::METHOD_POST:
                $function = new Action\Post;
                break;
            case SwaggerOperation::METHOD_PUT:
                $function = new Action\Put;
                break;
            case SwaggerOperation::METHOD_DELETE:
                $function = new Action\Delete;
                break;
            default:
                return false;
        }

        $function->setApi($api);
        $function->setOperation($operation);
        $function->generate();

        if (($requestClass = $function->getParameterClassGenerator()) && count($requestClass->getProperties())) {
            $this->addRequestClass($requestClass);
        }

        return $function->getMethodGenerator();
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

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(SwaggerDescription $description)
    {
        $this->description = $description;

        return $this;
    }

    public function getRequestClasses()
    {
        return $this->requestClasses;
    }

    public function setRequestClasses($requestClasses)
    {
        $this->requestClasses = $requestClasses;

        return $this;
    }

    public function addRequestClass($requestClass)
    {
        $this->requestClasses[] = $requestClass;

        return $this;
    }
}
