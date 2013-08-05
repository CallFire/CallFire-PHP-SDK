<?php
namespace CallFire\Api\Rest\Response;

class ResourceList extends Response
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
