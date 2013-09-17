<?php
namespace CallFire\Generator\Soap;

use Zend\Code\Generator as CodeGenerator;

class SoapParameter
{
    protected $parameterGenerator;

    public function getParameterGenerator()
    {
        if (!$this->parameterGenerator) {
            $this->parameterGenerator = new CodeGenerator\ParameterGenerator;
        }

        return $this->parameterGenerator;
    }

    public function setParameterGenerator($parameterGenerator)
    {
        $this->parameterGenerator = $parameterGenerator;

        return $this;
    }

    public function generate($name, $type)
    {
        $parameterGenerator = $this->getParameterGenerator();
        $parameterGenerator->setName(lcfirst($name));
        $parameterGenerator->setType($type);
    }
}
