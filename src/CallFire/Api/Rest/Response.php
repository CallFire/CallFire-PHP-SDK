<?php
namespace CallFire\Api\Rest;

use DOMDocument;
use DOMXPath;
use UnexpectedValueException;

abstract class Response
{
    protected static $namespaces = array(
        'r' => 'http://api.callfire.com/resource'
    );

    public static function fromXml($document)
    {
        $document = static::getXmlDocument($document);
                
        switch ($document->firstChild->nodeName) {
            case 'r:ResourceList':
                return Response\ResourceList::fromXml($document);
        }

        throw new UnexpectedValueException('Response type not recognized');
    }

    public static function fromJson($data)
    {
        throw new UnexpectedValueException('JSON is not yet supported');
    }
    
    protected static function getXmlDocument($document)
    {
        if (is_string($document)) {
            $data = $document;
            $document = new DOMDocument;
            $document->loadXML($data);
            unset($data);
        }
        
        return $document;
    }
    
    protected static function getXPath(DOMDocument $document)
    {
        $xpath = new DOMXPath($document);
        foreach(static::$namespaces as $prefix => $uri) {
            $xpath->registerNamespace($prefix, $uri);
        }
        
        return $xpath;
    }
}
