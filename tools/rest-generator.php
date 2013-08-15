<?php
namespace CallFire\Generator;

use CallFire\Generator\Rest as RestGenerator;
use Zend\Code\Generator\ClassGenerator;

require __DIR__."/../vendor/autoload.php";

$name = "Client";
$namespace = "CallFire\Api";
$restNamespace = "Rest";
$extendedClass = "AbstractClient";
$swaggerUrl = 'https://www.callfire.com/api/1.1/wsdl/swagger';

$requestNamespacePart = RestGenerator::REQUEST_NAMESPACE_ALIAS;
$requestNamespace = "{$namespace}\Rest\\{$requestNamespacePart}";

$responseNamespacePart = RestGenerator::RESPONSE_NAMESPACE_ALIAS;
$responseNamespace = "{$namespace}\Rest\\{$responseNamespacePart}";

$structureNamespacePart = RestGenerator::STRUCTURE_NAMESPACE_ALIAS;
$structureNamespace = "{$namespace}\Rest\\{$structureNamespacePart}";

$sourceDirectory = realpath(__DIR__."/../src").'/'.str_replace('\\', '/', $namespace);

$generator = new RestGenerator($swaggerUrl);

$classGenerator = new ClassGenerator($name, "{$namespace}\\{$restNamespace}\Client", null, $extendedClass);
$classGenerator->addUse("{$namespace}\\{$restNamespace}\\{$extendedClass}");
$generator->setClassGenerator($classGenerator);

$generator->generateClasses($requestNamespace, $responseNamespace, $structureNamespace);
$classFiles = $generator->generateClassFiles();
$requestClassFiles = $generator->generateRequestClassFiles();

if (!is_dir($sourceDirectory)) {
    mkdir($sourceDirectory, 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$restNamespace}")) {
    mkdir("{$sourceDirectory}/{$restNamespace}", 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$restNamespace}/Client")) {
    mkdir("{$sourceDirectory}/{$restNamespace}/Client", 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$restNamespace}/Request")) {
    mkdir("{$sourceDirectory}/{$restNamespace}/Request", 0777, true);
}

foreach ($classFiles as $classFile) {
    $classFile->setFilename("{$sourceDirectory}/{$restNamespace}/Client/{$classFile->getClass()->getName()}.php");
    $classFile->write();
}

foreach ($requestClassFiles as $requestClassFile) {
    $requestClassFile->getClass()->setNamespacename("{$namespace}\\{$restNamespace}\Request");
    $requestClassFile->getClass()->addUse("{$namespace}\\{$restNamespace}\Request", RestGenerator::ABSTRACT_REQUEST_ALIAS);
    $requestClassFile->setFilename("{$sourceDirectory}/{$restNamespace}/Request/{$requestClassFile->getClass()->getName()}.php");
    $requestClassFile->write();
}

passthru('php '.__DIR__.'/../vendor/fabpot/php-cs-fixer/php-cs-fixer fix '.__DIR__.'/../src/CallFire/Api/Rest/ --level=all');
