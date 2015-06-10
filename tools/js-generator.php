<?php
require __DIR__.'/../vendor/autoload.php';

$clientPath = __DIR__.'/../src/CallFire/Api/Rest/Client';
$clientNamespace = CallFire\Api\Rest\AbstractClient::ns();

$resourcePath = __DIR__.'/../src/CallFire/Common/Resource';
$resourceNamespace = CallFire\Common\Resource\AbstractResource::ns();

$requestPath = __DIR__.'/../src/CallFire/Api/Rest/Request';
$requestNamespace = CallFire\Api\Rest\Request::ns();

$codePath = __DIR__.'/../js';

$queryMapPath = __DIR__.'/../src/CallFire/Api/Rest/querymap.php';

$assignmentCode = '';

foreach(glob($clientPath.'/*.php') as $clientFile) {
    $class = basename($clientFile, '.php');
    $reflector = new ReflectionClass($clientNamespace.'\\'.$class);
    
    ob_start();
?>
var Client = require('../Client'),
    util = require('util');

(function() {
    'use strict';
    
    var <?=$reflector->getShortName()?> = function() {
        Client.apply(this, arguments);
    };
    module.exports = <?=$reflector->getShortName()?>;
    util.inherits(<?=$reflector->getShortName()?>, Client);
    var proto = <?=$reflector->getShortName()?>.prototype;

<?php
foreach($reflector->getMethods() as $method) {
    if($method->class == $reflector->name) {
        $parameters = $method->getParameters();
        $newParameters = array();
        $pathParameters = array();
        $requestType = null;
        foreach($parameters as $parameter) {
            $newParameters[] = $parameter->getName();
            if($parameter->getClass()) {
                $requestType = $parameter->getName();
            } else {
                $pathParameters[] = $parameter->getName();
            }
        }
        $newParameters = empty($newParameters)?'':implode(', ', $newParameters).', ';
        $pathParameters = empty($pathParameters)?'':', '.implode(', ', $pathParameters);
        
        $startLine = $method->getStartLine() - 1;
        $endLine = $method->getEndLine();
        $length = $endLine - $startLine;
        
        $source = file($method->getFileName());
        $body = implode("", array_slice($source, $startLine, $length));
        
        preg_match('#this->getUri\(\'(.*)\'#', $body, $matches);
        $uri = $matches[1];
        unset($matches);
        
        preg_match('#this->(post|get|put|delete)\(#', $body, $matches);
        $requestMethod = $matches[1];
        unset($matches);
?>
    proto.<?=$method->getName()?> = function(<?=$newParameters?>callback) {
        var uri = this.get_uri('<?=$uri?>'<?=$pathParameters?>);
        return this.<?=$requestMethod?>(uri, <?=$requestType?:'{}'?>, callback);
    };

<?php
    }
}
?>
}) ();
<?php
    $code = ob_get_clean();
    
    ob_start();
?>
    proto.client.<?=$reflector->getShortName()?> = require('./Client/<?=$reflector->getShortName()?>');
<?php
    $assignmentCode .= ob_get_clean();
    file_put_contents($codePath.'/Client/'.$reflector->getShortName().'.js', $code);
}

$assignmentCode .= PHP_EOL;

foreach(glob($resourcePath.'/*.php') as $resourceFile) {
    $class = basename($resourceFile, '.php');
    
    $reflector = new ReflectionClass($resourceNamespace.'\\'.$class);
    
    if($reflector->getShortName() == 'AbstractResource') {
        continue;
    }
    
    $defaultProperties = $reflector->getDefaultProperties();
    
    $parentReflector = $reflector->getParentClass();
    $isChildResource = ($parentReflector->getShortName() != 'AbstractResource');
    
    ob_start();
?>
var util = require('util');
<?php
if($isChildResource) {
?>
var <?=$parentReflector->getShortName()?> = require('./<?=$parentReflector->getShortName()?>');

<?php
} else {
?>
var Resource = require('../Resource');

<?php
}
?>
(function() {
    'use strict';
    
    var <?=$reflector->getShortName()?> = function() {
        <?=$isChildResource?$parentReflector->getShortName():'Resource'?>.apply(this, arguments);
    };
    module.exports = <?=$reflector->getShortName()?>;
    util.inherits(<?=$reflector->getShortName()?>, <?=$isChildResource?$parentReflector->getShortName():'Resource'?>);
    var proto = <?=$reflector->getShortName()?>.prototype;
    
    proto.types = [
<?php
$ancestor = $reflector;
while($ancestor->getShortName() != 'AbstractResource') {
?>
        '<?=$ancestor->getShortName()?>'<?=($ancestor->getParentClass()->getShortName() != 'AbstractResource')?',':''?>

<?php
    $ancestor = $ancestor->getParentClass();
}
?>
    ];

<?php
foreach($reflector->getProperties() as $property) {
    if($property->getName() == 'hydrator') {
        continue;
    }
    $property->setAccessible(true);
?>
    proto.<?=$property->getName()?> = <?=is_array($defaultProperties[$property->getName()])?'[]':'null'?>;
<?php
}
?>
}) ();
<?php
    $code = ob_get_clean();
    
    ob_start();
?>
    proto.resource.<?=$reflector->getShortName()?> = require('./Resource/<?=$reflector->getShortName()?>');
<?php
    $assignmentCode .= ob_get_clean();
    
    file_put_contents($codePath.'/Resource/'.$reflector->getShortName().'.js', $code);
}

$assignmentCode .= PHP_EOL;

foreach(glob($requestPath.'/*.php') as $requestFile) {
    $class = basename($requestFile, '.php');
    $reflector = new ReflectionClass($requestNamespace.'\\'.$class);
    
    ob_start();
?>
(function() {
    'use strict';
    
    var <?=$reflector->getShortName()?> = function() {
        
    };
    module.exports = <?=$reflector->getShortName()?>;
    var proto = <?=$reflector->getShortName()?>.prototype;

<?php
foreach($reflector->getProperties() as $property) {
    if($property->getName() == 'hydrator') {
        continue;
    }
    $property->setAccessible(true);
?>
    proto.<?=$property->getName()?> = null;

<?php
}
?>
}) ();
<?php
    $code = ob_get_clean();
    
    ob_start();
?>
    proto.request.<?=$reflector->getShortName()?> = require('./Request/<?=$reflector->getShortName()?>');
<?php
    $assignmentCode .= ob_get_clean();
    
    file_put_contents($codePath.'/Request/'.$reflector->getShortName().'.js', $code);
}

file_put_contents($codePath.'/callfire-resources.js', $assignmentCode);

$queryMap = require $queryMapPath;

/*
foreach($queryMap as $resourceName => &$resourceMap) {
    foreach($resourceMap as $key => &$path) {
        $path = ltrim($path, '_:');
    }
}*/

file_put_contents($codePath.'/querymap.json', json_encode($queryMap, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT));
