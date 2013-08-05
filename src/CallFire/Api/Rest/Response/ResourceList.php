<?php
namespace CallFire\Api\Rest\Response;

use CallFire\Api\Rest\Response as AbstractResponse;

class ResourceList extends AbstractResponse
{
    public static function fromXml($document)
    {
        if (is_string($document)) {
            $data = $document;
            $document = new DOMDocument;
            $document->load($data);
            unset($data);
        }

        $response = new self;
    }
}
