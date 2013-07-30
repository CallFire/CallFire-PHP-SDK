<?php
namespace CallFire\Generator\Rest;

use CallFire\Generator\Rest\SwaggerApi;

use Zend\Stdlib\Hydrator;
use InvalidArgumentException;

class SwaggerDescription
{
    protected $apiVersion;
    
    protected $swaggerVersion;
    
    protected $basePath;
    
    protected $resourcePath;
    
    protected $apis = array();
    
    protected $hydrator;
    
    public static function fromJson($json, Hydrator\HydratorInterface $hydrator = null) {
        if(is_string($json)) {
            $json = json_decode($json, true);
        }
        
        if(!is_array($json)) {
            throw new InvalidArgumentException('The provided specification must be a JSON-decodeable string, or an associative array');
        }
        
        $description = new self;
        
        if($hydrator) {
            $description->setHydrator($hydrator);
        }
        
        $description->hydrate($json);
        
        return $description;
    }
    
    public function getApiVersion() {
        return $this->apiVersion;
    }
    
    public function setApiVersion($apiVersion) {
        $this->apiVersion = (string) $apiVersion;
        return $this;
    }
    
    public function getSwaggerVersion() {
        return $this->swaggerVersion;
    }
    
    public function setSwaggerVersion($swaggerVersion) {
        $this->swaggerVersion = (string) $swaggerVersion;
        return $this;
    }
    
    public function getBasePath() {
        return $this->basePath;
    }
    
    public function setBasePath($basePath) {
        $this->basePath = $basePath;
        return $this;
    }
    
    public function getResourcePath() {
        return $this->resourcePath;
    }
    
    public function setResourcePath($resourcePath) {
        $this->resourcePath = $resourcePath;
        return $this;
    }
    
    public function getApis() {
        return $this->apis;
    }
    
    public function setApis($apis) {
        $this->apis = $apis;
        return $this;
    }
    
    public function addApi(SwaggerApi $api) {
        $this->apis[] = $api;
    }
    
    public function getHydrator() {
        if(!$this->hydrator) {
            $this->hydrator = new Hydrator\ClassMethods;
        }
        return $this->hydrator;
    }
    
    public function setHydrator(Hydrator\HydratorInterface $hydrator) {
        $this->hydrator = $hydrator;
        return $this;
    }
    
    public function hydrate($data, Hydrator\HydratorInterface $apiHydrator = null) {
        if(isset($data['apis']) && ($apis = $data['apis'])) {
            unset($data['apis']);
        
            $apiProto = new SwaggerApi;
            if($apiHydrator) {
                $apiProto->setHydrator($apiHydrator);
            }
            
            foreach($apis as $apiData) {
                $api = clone $apiProto;
                $api->hydrate($apiData);
                $this->addApi($api);
            }
        }
    
        $hydrator = $this->getHydrator();
        $hydrator->hydrate($data, $this);
        
        return $this;
    }
}
