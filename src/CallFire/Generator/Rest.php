<?php
namespace CallFire\Generator;

use CallFire\Generator\Rest\SwaggerDescription;

class Rest
{
    protected $swaggerUrl;

    protected $swaggerDescription;

    protected $apis = array();

    public function __construct($swaggerUrl = null)
    {
        if ($swaggerUrl) {
            $this->setSwaggerUrl($swaggerUrl);
        }
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

    public function getApis()
    {
        if (empty($this->apis) && ($description = $this->getSwaggerDescription())) {
            $basePath = $description->getBasePath();
            foreach ($description->getApis() as $api) {
                $json = file_get_contents("{$basePath}{$api->getPath()}");
                $apiDescription = SwaggerDescription::fromJson($json);
                $this->addApi($apiDescription);
            }
        }

        return $this->apis;
    }

    public function setApis($apis)
    {
        $this->apis = $apis;

        return $this;
    }

    public function addApi(SwaggerDescription $api)
    {
        $this->apis[] = $api;
    }
}
