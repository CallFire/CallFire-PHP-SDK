<?php
namespace CallFire\Generator;

use CallFire\Generator\Soap as SoapGenerator;
use CallFire\Generator\Resource as ResourceGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\FileGenerator;
use Zend\Code\Generator\ValueGenerator;

use DOMDocument;

require __DIR__."/../vendor/autoload.php";

$name = "Client";
$namespace = "CallFire\Api";
$soapNamespace = "Soap";
$extendedClass = "AbstractClient";
$wsdlURL = "http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl";
$fullWsdlURL = "https://www.callfire.com/api/1.1/wsdl/callfire-service.wsdl";

$commonResourceNamespace = "CallFire\Common\Resource";

$structureNamespace = "CallFire\Api\Soap\Structure";
$xsdUrl = 'https://www.callfire.com/api/1.1/wsdl/callfire-service.xsd';

$structureSourceDirectory = realpath(__DIR__."/../src").'/'.str_replace('\\', '/', $namespace);
$commonResourceDirectory = realpath(__DIR__."/../src").'/'.str_replace('\\', '/', $commonResourceNamespace);

$clientNamespacePart = SoapGenerator::CLIENT_NAMESPACE_ALIAS;
$clientNamespace = "{$namespace}\\{$soapNamespace}\\{$clientNamespacePart}";

$requestNamespacePart = SoapGenerator::REQUEST_NAMESPACE_ALIAS;
$requestNamespace = "{$namespace}\\{$soapNamespace}\\{$requestNamespacePart}";

$responseNamespacePart = SoapGenerator::RESPONSE_NAMESPACE_ALIAS;
$responseNamespace = "{$namespace}\\{$soapNamespace}\\{$responseNamespacePart}";

$structureNamespacePart = SoapGenerator::STRUCTURE_NAMESPACE_ALIAS;
$structureNamespace = "{$namespace}\\{$soapNamespace}\\{$structureNamespacePart}";

$sourceDirectory = realpath(__DIR__."/../src").'/'.str_replace('\\', '/', $namespace);

$generator = new SoapGenerator($wsdlURL, $fullWsdlURL);

$classGenerator = new ClassGenerator($name, $clientNamespace, null, $extendedClass);
$classGenerator->addUse("{$namespace}\\{$soapNamespace}\\{$extendedClass}");
$generator->setClassGenerator($classGenerator);

$generator->generateServices($requestNamespace);
$generator->generateStructures($requestNamespace);
$requestTypes = $generator->getRequestStructures();
$responseTypes = $generator->getResponseStructures();
$responseTypes[] = "QueryResult";
$responseTypes[] = "ServiceFaultInfo";
$generator->generateClasses($requestNamespace, $responseNamespace, $structureNamespace);
$classFiles = $generator->generateClassFiles();
$structureFiles = $generator->generateStructureFiles();

if (!is_dir($sourceDirectory)) {
    mkdir($sourceDirectory, 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$soapNamespace}")) {
    mkdir("{$sourceDirectory}/{$soapNamespace}", 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$soapNamespace}/Client")) {
    mkdir("{$sourceDirectory}/{$soapNamespace}/Client", 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$soapNamespace}/{$requestNamespacePart}")) {
    mkdir("{$sourceDirectory}/{$soapNamespace}/{$requestNamespacePart}", 0777, true);
}
if (!is_dir("{$sourceDirectory}/{$soapNamespace}/{$structureNamespacePart}")) {
    mkdir("{$sourceDirectory}/{$soapNamespace}/{$structureNamespacePart}", 0777, true);
}

foreach ($classFiles as $classFile) {
    $classFile->getClass()->setNamespaceName($clientNamespace);
    $classFile->setFilename("{$sourceDirectory}/{$soapNamespace}/Client/{$classFile->getClass()->getName()}.php");
    $classFile->write();
}

/* Structure generation */

$xsdContent = file_get_contents($xsdUrl);

$xsdDocument = new DOMDocument;
$xsdDocument->loadXML($xsdContent);
unset($xsdContent);

$resourceGenerator = new ResourceGenerator;
$resourceGenerator->setXsd($xsdDocument);

$resourceClassGenerator = new ClassGenerator;
$resourceClassGenerator->setNamespaceName($namespace);
$resourceGenerator->setClassGenerator($resourceClassGenerator);

$resourceGenerator->generate();
$resourceFiles = $resourceGenerator->generateResourceFiles();

if (!is_dir($structureSourceDirectory)) {
    mkdir($structureSourceDirectory, 0777, true);
}

$changed = 0;
do { // Continue until we've resolved everything
    $changed = 0;
    
    foreach($requestTypes as $requestType) {
        foreach($resourceFiles as $resourceFile) {
            if(($resourceFile->getClass()->getName() === $requestType) && ($extendedClass = $resourceFile->getClass()->getExtendedClass())) {
                if(!in_array($extendedClass, $requestTypes) && !empty($extendedClass)) {
                    $requestTypes[] = $extendedClass;
                    $changed++;
                }
            }
        }
    }
} while($changed !== 0);

$requestTypes = array_unique($requestTypes);
sort($requestTypes);

$changed = 0;
do { // Continue until we've resolved everything
    $changed = 0;
    
    foreach($responseTypes as $responseType) {
        foreach($resourceFiles as $resourceFile) {
            if(($resourceFile->getClass()->getName() === $responseType) && ($extendedClass = $resourceFile->getClass()->getExtendedClass())) {
                if(!in_array($extendedClass, $responseTypes) && !empty($extendedClass)) {
                    $responseTypes[] = $extendedClass;
                    $changed++;
                }
            }
        }
    }
} while($changed !== 0);

$responseTypes = array_unique($responseTypes);
sort($responseTypes);

$classmap = array();

foreach ($resourceFiles as $resourceFile) {
    if($resourceFile->getClass()->getName() == "CreatedId") {
        continue;
    }

    $extendedClass = $resourceFile->getClass()->getExtendedClass();
    if (in_array($resourceFile->getClass()->getName(), $requestTypes) || in_array($extendedClass, $requestTypes)) {
        $type = $requestNamespacePart;
        $resourceFile->getClass()
            ->setNamespaceName($requestNamespace);
        if(!$extendedClass) {
            $resourceFile->getClass()
                ->setExtendedClass(SoapGenerator::ABSTRACT_REQUEST_ALIAS)
                ->addUse("{$namespace}\\{$soapNamespace}\AbstractRequest", SoapGenerator::ABSTRACT_REQUEST_ALIAS);
        }
    } elseif(in_array($resourceFile->getClass()->getName(), $responseTypes) || in_array($extendedClass, $responseTypes)) {
        $type = $responseNamespacePart;
        $resourceFile->getClass()
            ->setNamespaceName($responseNamespace);
        if(!$extendedClass) {
            $resourceFile->getClass()
                ->setExtendedClass(SoapGenerator::ABSTRACT_RESPONSE_ALIAS)
                ->addUse("{$namespace}\\{$soapNamespace}\AbstractResult", SoapGenerator::ABSTRACT_RESPONSE_ALIAS);
        }
    } else {
        $type = $structureNamespacePart;
        $resourceFile->getClass()->setNamespaceName($structureNamespace);
    }
    
    $resourceFile->setFilename("{$sourceDirectory}/{$soapNamespace}/{$type}/{$resourceFile->getClass()->getName()}.php");
    $resourceFile->write();

    $classmap[$resourceFile->getClass()->getName()] = $resourceFile->getClass()->getNamespaceName().'\\'.$resourceFile->getClass()->getName();
}

foreach(glob("{$commonResourceDirectory}/*.php") as $fileName) {
    $className = basename($fileName, ".php");
    $classmap[$className] = "{$commonResourceNamespace}\\{$className}";
}

$classmapValueGenerator = new ValueGenerator($classmap);
$classmapFileGenerator = new FileGenerator;
$classmapFileGenerator->setBody('return '.$classmapValueGenerator->generate().';');
$classmapFileGenerator->setFilename("{$sourceDirectory}/{$soapNamespace}/classmap.php");
$classmapFileGenerator->write();

passthru('php '.__DIR__.'/../vendor/fabpot/php-cs-fixer/php-cs-fixer fix '.__DIR__.'/../src/CallFire/Api/Soap/ --level=all');
