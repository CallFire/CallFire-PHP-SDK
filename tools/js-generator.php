<?php
require __DIR__.'/../vendor/autoload.php';

$resourcePath = __DIR__.'/../src/CallFire/Common/Resource';
$resourceNamespace = CallFire\Common\Resource\AbstractResource::ns();

$codePath = __DIR__.'/../js';

$queryMapPath = __DIR__.'/../src/CallFire/Api/Rest/querymap.php';

$assignmentCode = '';

foreach(glob($resourcePath.'/*.php') as $resourceFile) {
    $class = basename($resourceFile, '.php');
    
    $reflector = new ReflectionClass($resourceNamespace.'\\'.$class);
    
    if($reflector->getShortName() == 'AbstractResource') {
        continue;
    }
    
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
var <?=$reflector->getShortName()?> = function() {
    <?=$isChildResource?$parentReflector->getShortName():'Resource'?>.apply(this, arguments);
}
util.inherits(<?=$reflector->getShortName()?>, <?=$isChildResource?$parentReflector->getShortName():'Resource'?>);
module.exports = <?=$reflector->getShortName()?>;
with({proto: <?=$reflector->getShortName()?>.prototype}) {
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
    ]

<?php
foreach($reflector->getProperties() as $property) {
    if($property->getName() == 'hydrator') {
        continue;
    }
?>
    proto.<?=$property->getName()?> = null;
<?php
}
?>
}
<?php
    $code = ob_get_clean();
    
    ob_start();
?>
    proto.resource.<?=$reflector->getShortName()?> = require('./Resource/<?=$reflector->getShortName()?>');
<?php
    $assignmentCode .= ob_get_clean();
    file_put_contents($codePath.'/Resource/'.$reflector->getShortName().'.js', $code);
}

file_put_contents($codePath.'/callfire-resources.js', $assignmentCode);

$queryMap = require $queryMapPath;

foreach($queryMap as $resourceName => &$resourceMap) {
    foreach($resourceMap as $key => &$path) {
        $path = ltrim($path, '_:');
    }
}

file_put_contents($codePath.'/querymap.json', json_encode($queryMap, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT));
