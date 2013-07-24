<?php
namespace CallFire\Generator;

use CallFire\Generator\Soap as SoapGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\FileGenerator;

require __DIR__."/../vendor/autoload.php";

$name = "Soap";
$namespace = "CallFire\Api";
$extendedClass = "SoapClient";
$wsdlURL = "http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl";

$requestNamespace = "{$namespace}\Request";

$generator = new SoapGenerator($wsdlURL);

$classGenerator = new ClassGenerator($name, $namespace, null, $extendedClass);
$generator->setClassGenerator($classGenerator);

$generator->generateFunctions($requestNamespace);
$generator->generateClass($requestNamespace);
$generator->generateClassFiles();
$generator->generateTypeFiles();

echo $generator->getFileGenerator()->generate();
