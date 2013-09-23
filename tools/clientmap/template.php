<?php
$trimLength = strlen(realpath(__DIR__.'/../../'));
?>
REST Client
===========

<?php
foreach($restClients as $clientName => $client):
    $fileName = substr($client->getFileName(), $trimLength);
?>
* [<?=$client->getShortName()?>](<?=$fileName?>)
<?php
    foreach($client->getMethods(ReflectionMethod::IS_PUBLIC) as $method):
        if(strpos($method->getDocComment(), '@api') === false)
            continue;
        $methodFileName = substr($method->getFileName(), $trimLength);
?>
    * [<?=$method->getName()?>](<?=$methodFileName?>#<?=$method->getStartLine()?>)
<?php endforeach; ?>
<?php
endforeach;
?>
