<?php
namespace CallFire\Common\Response;

use IteratorAggregate;

interface ResourceListInterface extends IteratorAggregate
{
    public function getTotalResults();

    public function getResources();
}
