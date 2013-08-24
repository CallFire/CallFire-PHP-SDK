<?php
namespace CallFire\Common\Ivr\Dialplan;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Filter;

use InvalidArgumentException;

use DOMElement;

abstract class AbstractTag extends DOMElement
{
    const NAME_ATTR = 'name';
    
    protected $hydrator;

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
    
    public function getName() {
        return $this->getAttribute(static::NAME_ATTR);
    }
    
    public function setName($name) {
        $this->setAttribute(static::NAME_ATTR, $name);
        return $this;
    }
    
    public function getContent() {
        return $this->nodeValue;
    }
    
    public function setContent($content) {
        $this->nodeValue = $content;
        return $this;
    }
    
    public function getHydrator() {
        if(!$this->hydrator) {
            $hydrator = new ClassMethods;
            
            $hydrator->addFilter('getHydrator', new Filter\MethodMatchFilter('getHydrator'), Filter\FilterComposite::CONDITION_AND);
            foreach(get_class_methods(get_parent_class()) as $parentMethod) {
                if(!preg_match('/^get/', $parentMethod) && !preg_match('/^has/', $parentMethod)) {
                    continue;
                }
                $hydrator->addFilter($parentMethod, new Filter\MethodMatchFilter($parentMethod), Filter\FilterComposite::CONDITION_AND);
            }
            
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }
    
    public function setHydrator($hydrator) {
        $this->hydrator = $hydrator;
        return $this;
    }
    
    public function __call($name, $arguments)
    {
        $tagName = self::ns()."\\{$name}Tag";
        if(!class_exists($tagName)) {
            throw new InvalidArgumentException('Tag type '. $tagName .' does not exist');
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
