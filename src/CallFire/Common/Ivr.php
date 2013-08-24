<?php
namespace CallFire\Common;

use CallFire\Common\Ivr\Dialplan;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;

class Ivr extends DOMDocument
{
    protected $tagList = array();

    public function load($filename, $options = 0)
    {
        parent::load($filename, $options);
        
        $this->transmuteTags();
    }
    
    public function loadXML($source, $options = 0)
    {
        parent::loadXML($source, $options);
        
        $this->transmuteTags();
    }

    public function getDialplan() {
        if(!$this->firstChild) {
            $dialplan = new Dialplan;
            $this->appendChild($dialplan);
        }
        return $this->firstChild;
    }
    
    public function setDialplan(DOMElement $dialplan) {
        $this->replaceChild($dialplan, $this->firstChild);
        return $this;
    }
    
    public function getTagList() {
        if(empty($this->tagList)) {
            foreach(glob(__DIR__.'/Ivr/Dialplan/*.php') as $filename) {
                $tagName = basename($filename, '.php');
                if($tagName == "AbstractTag") {
                    continue;
                }
                $tagClass = Dialplan::ns().'\\'.$tagName;
                $this->tagList[$tagName] = $tagClass::NODE_NAME;
            }
        }
        return $this->tagList;
    }
    
    public function setTagList($tagList) {
        $this->tagList = $tagList;
        return $this;
    }
    
    public function addTagToList($tagName, $nodeName) {
        $this->tagList[$tagName] = $nodeName;
        return $this;
    }
    
    protected function transmuteTags(DOMNode $contextNode = null)
    {
        $xpath = new DOMXPath($this);
        $tagList = $this->getTagList();
        
        if(!$contextNode) {
            $contextNode = $this->documentElement;
        }
        
        if($contextNode->hasChildNodes()) {
            foreach($contextNode->childNodes as $tag) {
                if($tagName = array_search($tag->nodeName, $tagList)) {
                    $tagClass = Dialplan::ns().'\\'.$tagName;
                    $newTag = new $tagClass;
                    $contextNode->replaceChild($newTag, $tag);
                    static::transmuteTag($tag, $newTag);
                    $this->transmuteTags($newTag);
                } else {
                    $this->transmuteTags($tag);
                }
            }
        }
    }
    
    protected static function transmuteTag(DOMNode $tag, DOMNode $newTag)
    {
        foreach($tag->attributes as $attribute) {
            $tag->removeAttribute($attribute);
            $newTag->setAttributeNode($attribute);
        }
        foreach($tag->childNodes as $child) {
            $tag->removeChild($child);
            $newTag->appendChild($child);
        }
    }
}
