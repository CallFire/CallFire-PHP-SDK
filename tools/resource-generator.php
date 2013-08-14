<?php
namespace CallFire\Generator;

use CallFire\Generator\Resource as ResourceGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\FileGenerator;
use Zend\Code\Generator\ValueGenerator;

use DOMDocument;

require __DIR__."/../vendor/autoload.php";

$namespace = "CallFire\Common\Resource";
$extendedClass = "AbstractResource";
$xsdUrl = 'https://www.callfire.com/api/1.1/wsdl/callfire-data.xsd';

$sourceDirectory = realpath(__DIR__."/../src").'/'.str_replace('\\', '/', $namespace);
$queryMapPath = realpath(__DIR__."/../src").'/CallFire/Api/Rest/querymap.php';

$xsdContent = file_get_contents($xsdUrl);

$xsdDocument = new DOMDocument;
$xsdDocument->loadXML($xsdContent);
unset($xsdContent);

$resourceGenerator = new ResourceGenerator;
$resourceGenerator->setXsd($xsdDocument);

$resourceClassGenerator = new ClassGenerator;
$resourceClassGenerator->setExtendedClass($extendedClass);
$resourceClassGenerator->setNamespaceName($namespace);
$resourceGenerator->setClassGenerator($resourceClassGenerator);

$resourceGenerator->generate();
$resourceFiles = $resourceGenerator->generateResourceFiles();
$queryMap = $resourceGenerator->getQueryMap();

if (!is_dir($sourceDirectory)) {
    mkdir($sourceDirectory, 0777, true);
}

foreach ($resourceFiles as $resourceFile) {
    $resourceFile->setFilename("{$sourceDirectory}/{$resourceFile->getClass()->getName()}.php");
    $resourceFile->write();
}

$queryMapFile = new FileGenerator;
$queryMapFile->setFilename($queryMapPath);
$queryMapFile->setBody('return '.(new ValueGenerator($queryMap))->generate().';');
$queryMapFile->write();

passthru('php '.__DIR__.'/../vendor/fabpot/php-cs-fixer/php-cs-fixer fix '.__DIR__.'/../src/CallFire/Common/Resource/ --level=all');
