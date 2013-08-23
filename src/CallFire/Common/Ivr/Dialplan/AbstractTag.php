<?php
namespace CallFire\Common\Ivr\Dialplan;

use InvalidArgumentException;

use DOMElement;

abstract class AbstractTag extends DOMElement
{
    public static function ns()
    {
        $ns = explode('\\', __CLASS__);
        array_pop($ns);
        $ns = implode('\\', $ns);

        return $ns;
    }

    public function __construct($name = null, $value = null, $namespaceURI = null)
    {
        parent::__construct($name?:static::NODE_NAME, $value, $namespaceURI);
    }
    
    public function __call($name, $arguments)
    {
        $tagName = self::ns().'\\'.$name;
        if(!class_exists($tagName)) {
            throw new InvalidArgumentException('Tag type does not exist');
        }
        
        if(!empty($arguments)) {
            $reflect = new ReflectionClass($tagName);
            $tag = $reflect->newInstanceArgs($arguments);
        } else {
            $tag = new $tagName;
        }
        
        $this->appendChild($tag);
        
        return $tag;
    }
}
