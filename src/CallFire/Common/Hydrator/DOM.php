<?php
namespace CallFire\Common\Hydrator;

use DOMNode;
use DOMElement;
use DOMXPath;
use InvalidArgumentException;
use BadMethodCallException;

use Zend\Stdlib\Hydrator as ZendHydrator;

class DOM extends ZendHydrator\AbstractHydrator implements ZendHydrator\HydratorOptionsInterface
{
    protected $queryMap = array();
    protected $namespaces = array();
    protected $xpath;

    public function __construct($queryMap = null, $namespaces = null, $xpath = null)
    {
        parent::__construct();

        $this->setQueryMap($queryMap);
        $this->setNamespaces($namespaces);
        $this->setXPath($xpath);
    }

    public function setOptions($options)
    {
        if ($options instanceof Traversable) {
            $options = ArrayUtils::iteratorToArray($options);
        } elseif (!is_array($options)) {
            throw new InvalidArgumentException(
                'The options parameter must be an array or a Traversable'
            );
        }

        if (isset($options['queryMap'])) {
            $this->setQueryMap($options['queryMap']);
        }

        if (isset($options["namespaces"])) {
            $this->setNamespaces($options["namespaces"]);
        }

        if (isset($options["xpath"])) {
            $this->setXPath($options["xpath"]);
        }

        return $this;
    }

    public function getQueryMap()
    {
        return $this->queryMap?:array();
    }

    public function setQueryMap($queryMap)
    {
        $queryMap = is_array($queryMap)?$queryMap:null;
        $this->queryMap = $queryMap;

        return $this;
    }

    public function getNamespaces()
    {
        return $this->namespaces?:array();
    }

    public function setNamespaces($namespaces)
    {
        $this->namespaces = $namespaces;

        return $this;
    }

    public function getXPath()
    {
        return $this->xpath;
    }

    public function setXPath($xpath)
    {
        if(!is_null($xpath) && !($xpath instanceof DOMXPath))
            throw new InvalidArgumentException(
                "The xpath must be null or a DOMXPath"
            );

        $this->xpath = $xpath;

        return $this;
    }

    public function extract($node)
    {
        if(!($node instanceof DOMElement))
            throw new BadMethodCallException(sprintf(
                '%s expects the provided $object to be a DOMElement', __METHOD__
            ));

        if (!($this->xpath instanceof DOMXPath)) {
            $this->setXPath(new DOMXPath($node->ownerDocument));
        }

        $xpath = $this->getXPath();
        foreach ($this->getNamespaces() as $prefix => $namespace) {
            $xpath->registerNamespace($prefix, $namespace);
        }

        $attributes = array();

        foreach ($this->getQueryMap() as $attribute => $query) {
            $attributeNodes = $xpath->query($query, $node);
            if(!$attributeNodes)
                throw new InvalidArgumentException("Malformed query");
            if ($attributeNodes->length === 1) {
                $attributeNode = $attributeNodes->item(0);
                if ($attributeNode instanceof DOMNode) {
                    $attributes[$attribute] = $attributeNode->nodeValue;
                }
            } elseif ($attributeNodes->length > 1) {
                $attributes[$attribute] = array();
                foreach ($attributeNodes as $attributeNode) {
                    if ($attributeNode instanceof DOMNode) {
                        $attributes[$attribute][] = $attributeNode->nodeValue;
                    }
                }
            }
        }

        return $attributes;
    }

    public function hydrate(array $data, $node)
    {
        if(!($node instanceof DOMElement))
            throw new BadMethodCallException(sprintf(
                '%s expects the provided $object to be a DOMElement)', __METHOD__
            ));

        if (!($this->xpath instanceof DOMXPath)) {
            $this->setXPath(new DOMXPath($node->ownerDocument));
        }

        $xpath = $this->getXPath();
        foreach ($this->getNamespaces() as $prefix => $namespace) {
            $xpath->registerNamespace($prefix, $namespace);
        }

        $queryMap = $this->getQueryMap();

        foreach ($data as $attribute => $value) {
            if(!isset($queryMap[$attribute]))
                continue;

            $attributeNode = $xpath->query($query, $node)->item(0);
            if ($attributeNode instanceof DOMNode) {
                $attributeNode->nodeValue = $value;
            }
        }

        return $node;
    }
}
