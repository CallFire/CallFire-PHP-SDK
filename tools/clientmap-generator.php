<?php
namespace CallFire\Generator;

use ReflectionClass;

include __DIR__.'/../vendor/autoload.php';

$mapPath = __DIR__.'/../client-map.md';

$restGlob = __DIR__.'/../src/CallFire/Api/Rest/Client/*.php';
$soapGlob = __DIR__.'/../src/CallFire/Api/Soap/Client/*.php';

$restNamespace = 'CallFire\Api\Rest\Client';
$soapNamespace = 'CallFire\Api\Soap\Client';

$restClientFiles = glob($restGlob);
$restClients = array();

foreach($restClientFiles as $filename) {
    $clientName = basename($filename, '.php');
    $clientFQName = $restNamespace.'\\'.$clientName;
    
    $restClients[$clientName] = new ReflectionClass($clientFQName);
}

$soapClientFiles = glob($soapGlob);
$soapClients = array();

foreach($soapClientFiles as $filename) {
    $clientName = basename($filename, '.php');
    $clientFQName = $soapNamespace.'\\'.$clientName;
    
    $soapClients[$clientName] = new ReflectionClass($clientFQName);
}

ob_start();
include __DIR__.'/clientmap/template.php';
$result = ob_get_clean();

file_put_contents($mapPath, $result);
