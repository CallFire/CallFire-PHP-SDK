<?php
$fixtures = array();
foreach(glob(__DIR__.'/Results/*.php') as $filename) {
    $fixtures = array_merge($fixtures, include $filename);
}

return $fixtures;
