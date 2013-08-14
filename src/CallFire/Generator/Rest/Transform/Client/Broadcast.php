<?php
namespace CallFire\Generator\Rest\Transform\Client;

use Zend\Code\Generator as CodeGenerator;

class Broadcast extends AbstractTransform
{
    public function transform()
    {
        $classGenerator = $this->getService()->getClassGenerator();

        if ($createContactBatch = $classGenerator->getMethod('CreateContactBatch')) {
            $newMethod = new CodeGenerator\MethodGenerator;
            $newMethod->setName($createContactBatch->getName());

            $docblock = $createContactBatch->getDocBlock();
            $docblock->setTag(
                (new CodeGenerator\DocBlock\Tag\ParamTag)->setParamName('id')
                    ->setDataType('int')
            );
            $newMethod->setDocBlock($docblock);

            $parameters = $createContactBatch->getParameters();

            $idParameter = new CodeGenerator\ParameterGenerator;
            $idParameter->setName('id');
            $createContactBatch->setParameter($idParameter);

            $newMethod->setParameters(array(
                "id" => $idParameter,
                "CreateContactBatch" => $parameters['CreateContactBatch']
            ));

            $body = $createContactBatch->getBody();
            $body = str_replace('array()', 'array($id)', $body);
            $newMethod->setBody($body);

            $classGenerator->removeMethod('CreateContactBatch');
            $classGenerator->addMethodFromGenerator($newMethod);
        }
    }
}
