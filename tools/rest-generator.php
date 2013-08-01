<?php
namespace CallFire\Generator;

use CallFire\Generator\Soap as SoapGenerator;
use CallFire\Generator\Rest as RestGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\FileGenerator;
use Zend\Code\Generator\ValueGenerator;

require __DIR__."/../vendor/autoload.php";

$name = "Client";
$namespace = "CallFire\Api";
$restNamespace = "Rest";
$extendedClass = "AbstractClient";
$swaggerUrl = 'https://www.callfire.com/api/1.1/wsdl/swagger';

$requestNamespacePart = SoapGenerator::REQUEST_NAMESPACE_ALIAS;
$requestNamespace = "{$namespace}\\Rest\\{$requestNamespacePart}";

$responseNamespacePart = SoapGenerator::RESPONSE_NAMESPACE_ALIAS;
$responseNamespace = "{$namespace}\\Rest\\{$responseNamespacePart}";

$structureNamespacePart = SoapGenerator::STRUCTURE_NAMESPACE_ALIAS;
$structureNamespace = "{$namespace}\\Rest\\{$structureNamespacePart}";

$sourceDirectory = realpath(__DIR__."/../src").'/'.str_replace('\\', '/', $namespace);

$generator = new RestGenerator($swaggerUrl);

$classGenerator = new ClassGenerator($name, "{$namespace}\\{$restNamespace}", null, $extendedClass);
$classGenerator->addUse($extendedClass);
$generator->setClassGenerator($classGenerator);

$generator->generateClasses($requestNamespace, $responseNamespace, $structureNamespace);
$classFiles = $generator->generateClassFiles();

foreach($classFiles as $file) {
    echo $file->generate();
}
exit;

if(!is_dir($sourceDirectory)) {
    mkdir($sourceDirectory, 0777, true);
}
if(!is_dir("{$sourceDirectory}/{$restNamespace}")) {
    mkdir("{$sourceDirectory}/{$restNamespace}", 0777, true);
}

foreach($classFiles as $classFile) {
    $classFile->setFilename("{$sourceDirectory}/{$restNamespace}/{$classFile->getClass()->getName()}.php");
    $classFile->write();
}

passthru('php '.__DIR__.'/../vendor/fabpot/php-cs-fixer/php-cs-fixer fix '.__DIR__.'/../src/CallFire/Api/Rest/ --level=all');
