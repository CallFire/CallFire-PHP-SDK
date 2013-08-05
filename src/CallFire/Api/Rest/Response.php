<?php
namespace CallFire\Api\Rest;

use UnexpectedValueException;

abstract class Response
{
    public static function fromXml($document)
    {
        if (is_string($document)) {
            $data = $document;
            $document = new DOMDocument;
            $document->load($data);
            unset($data);
        }

        switch ($document->documentElement->tagName) {
            case 'ResourceList':
                return Response\ResourceList::fromXml($document);
        }

        throw new UnexpectedValueException('Response type not recognized');
    }

    public static function fromJson($data)
    {
        throw new UnexpectedValueException('JSON is not yet supported');
    }
}
