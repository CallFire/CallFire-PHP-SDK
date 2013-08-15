<?php
namespace CallFire\Generator\Rest\Action;

use CallFire\Generator\Rest\Action as AbstractAction;

use Zend\Code\Generator as CodeGenerator;

class Delete extends AbstractAction
{
    protected function getBody($routeParams = array(), $queryParameter = null)
    {
        list($route, $segments) = $this->getRoute();

        $routeParamsList = array();
        foreach ($routeParams as $parameter) {
            $routeParamsList[] = '$'.$parameter->getName();
        }
        $routeParamsList = implode(', ', $routeParamsList);

        if ($queryParameter instanceof CodeGenerator\ParameterGenerator) {
            $queryParameterString = ', $'.$queryParameter->getName();
        } else {
            $queryParameterString = '';
        }

        $body = <<<BODY
\$uri = \$this->getUri('{$route}', array({$routeParamsList}));
return \$this->delete(\$uri{$queryParameterString});
BODY;

        return $body;
    }
}
