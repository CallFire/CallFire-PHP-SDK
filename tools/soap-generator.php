<?php
namespace CallFire\Generator;

use CallFire\Generator\Soap as SoapGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\FileGenerator;
use Zend\Code\Generator\ValueGenerator;

require __DIR__."/../vendor/autoload.php";

$name = "Client";
$namespace = "CallFire\Api";
$soapNamespace = "Soap";
$extendedClass = "SoapClient";
$wsdlURL = "http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl";

$requestNamespacePart = SoapGenerator::REQUEST_NAMESPACE_ALIAS;
$requestNamespace = "{$namespace}\\{$soapNamespace}\\{$requestNamespacePart}";

$responseNamespacePart = SoapGenerator::RESPONSE_NAMESPACE_ALIAS;
$responseNamespace = "{$namespace}\\{$soapNamespace}\\{$responseNamespacePart}";

$structureNamespacePart = SoapGenerator::STRUCTURE_NAMESPACE_ALIAS;
$structureNamespace = "{$namespace}\\{$soapNamespace}\\{$structureNamespacePart}";

$sourceDirectory = realpath(__DIR__."/../src").'/'.str_replace('\\', '/', $namespace);

$generator = new SoapGenerator($wsdlURL);

$classGenerator = new ClassGenerator($name, "{$namespace}\\{$soapNamespace}", null, $extendedClass);
$classGenerator->addUse($extendedClass);
$generator->setClassGenerator($classGenerator);

$generator->generateFunctions($requestNamespace);
$generator->generateStructures($requestNamespace);
$requestTypes = $generator->getRequestStructures();
$responseTypes = $generator->getResponseStructures();
$generator->generateClasses($requestNamespace, $responseNamespace, $structureNamespace);
$classFiles = $generator->generateClassFiles();
$structureFiles = $generator->generateStructureFiles();

if (!is_dir($sourceDirectory)) {
    mkdir($sourceDirectory, 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$soapNamespace}")) {
    mkdir("{$sourceDirectory}/{$soapNamespace}", 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$soapNamespace}/{$requestNamespacePart}")) {
    mkdir("{$sourceDirectory}/{$soapNamespace}/{$requestNamespacePart}", 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$soapNamespace}/{$responseNamespacePart}")) {
    mkdir("{$sourceDirectory}/{$soapNamespace}/{$responseNamespacePart}", 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$soapNamespace}/{$structureNamespacePart}")) {
    mkdir("{$sourceDirectory}/{$soapNamespace}/{$structureNamespacePart}", 0777, true);
}

foreach ($classFiles as $classFile) {
    $classFile->setFilename("{$sourceDirectory}/{$soapNamespace}/{$classFile->getClass()->getName()}.php");
    $classFile->write();
}

$classmap = array();

foreach ($structureFiles as $structureFile) {
    if (in_array($structureFile->getClass()->getName(), $requestTypes)) {
        $type = $requestNamespacePart;
        $structureFile->getClass()->setNamespaceName($requestNamespace);
    } elseif (in_array($structureFile->getClass()->getName(), $responseTypes)) {
        $type = $responseNamespacePart;
        $structureFile->getClass()->setNamespaceName($responseNamespace);
    } else {
        $type = $structureNamespacePart;
        $structureFile->getClass()->setNamespaceName($structureNamespace);
    }
    $structureFile->setFilename("{$sourceDirectory}/{$soapNamespace}/{$type}/{$structureFile->getClass()->getName()}.php");
    $structureFile->write();

    $classmap[$structureFile->getClass()->getName()] = $structureFile->getClass()->getNamespaceName().'\\'.$structureFile->getClass()->getName();
}

$classmapValueGenerator = new ValueGenerator($classmap);
$classmapFileGenerator = new FileGenerator;
$classmapFileGenerator->setBody('return '.$classmapValueGenerator->generate().';');
$classmapFileGenerator->setFilename("{$sourceDirectory}/{$soapNamespace}/classmap.php");
$classmapFileGenerator->write();

passthru('php '.__DIR__.'/../vendor/fabpot/php-cs-fixer/php-cs-fixer fix '.__DIR__.'/../src/CallFire/Api/Soap/ --level=all');
