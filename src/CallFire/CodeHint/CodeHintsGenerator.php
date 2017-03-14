<?php
namespace CallFire\CodeHint;

/**
 * Created by IntelliJ IDEA.
 * User: Vladimir.Malinovskiy
 * Date: 2/7/2017
 * Time: 11:11 PM
 */

/**
 * You can generate docs using cli command: php src/CallFire/CodeHint/CodeHintsGenerator.php generateCodeHints swaggerJsonUrl
 * (swaggerJsonUrl can be skipped - default path will be used)
 */
class CodeHintsGenerator
{
    private $definitions;

    public function generateCodeHints(
        $callFireSwaggerUrl = null
    )
    {
        if (!isset($callFireSwaggerUrl) || trim($callFireSwaggerUrl) == '')
        {
            $callFireSwaggerUrl = 'https://www.callfire.com/v2/api-docs/swagger.json';
        }

        $spec = file_get_contents($callFireSwaggerUrl);
        $decodedSpec = json_decode($spec, true);
        $this->definitions = $decodedSpec['definitions'];
        $paths = $decodedSpec['paths'];

        if ($paths == null)
        {
            throw new \Exception('$callFireSwaggerUrl parameter includes incorrect url value.');
        }

        $docText =
            '/**'.
            "\n".' * Api client class'.
            "\n".' *'.
            "\n".' * The class is used to instantiate api client'.
            "\n".' *'.
            "\n".' * @package    Callfire'.
            "\n".' * @subpackage Api'.
            "\n".' * @author     Justin Martin <jmart@callfire.com>';

        foreach ($paths as $apiBunch) {
            foreach ($apiBunch as $reqType => $apiInstance) {
                $docText .= "\n\n".$this->loadDataToFile($reqType, $apiInstance);
            }
        }
        $docText.= ' */';

        //UPDATING DocumentedClient.php class to include documentation
        $file = 'src\CallFire\Api\DocumentedClient.php';
        $classCode = file_get_contents($file);
        $lastLineForPackagesDefinitions = 'use Swagger\Client as SwaggerClient;';
        $packageInfo = substr($classCode, 0, strpos($classCode, $lastLineForPackagesDefinitions) + strlen($lastLineForPackagesDefinitions));
        $classDefinition = substr($classCode, strpos($classCode, "class DocumentedClient extends Client"));
        $classCode = $packageInfo."\n\n".$docText."\n".$classDefinition;
        file_put_contents($file, $classCode);
        //DocumentedClient.php has documentation inside at this moment
    }

    private function loadDataToFile($requestType, $apiInstance)
    {
        $apiDoc =
            ' * @method SwaggerClient\\Request '.$apiInstance['operationId'].'()'."\n".
            ' *'."\n".
            ' * '.$apiInstance['operationId'].' example'."\n".
            ' * '.'$client = Client::createClient("login", "password");'."\n".
            ' * '.'$request = $client->'.$apiInstance['operationId'].'();';

        if (($requestType == 'put' || $requestType == 'post') && $this->postingFiles($apiInstance['consumes']) != 1 ) {
            $apiDoc.="\n".' * '.'$request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));';
        }

        $apiDoc.=$this->getParametersPart($apiInstance['parameters'], $this->postingFiles($apiInstance['consumes']));

        if ($this->receivingFiles($apiInstance['produces'])) {
            $apiDoc.= "\n".' * '.'$result = $client->request($request);';
        } else {
            //TO DO: uncomment this to change to $client->execute($request) after all issues with responses parsing would be fixed
            //$apiDoc.= "\n".' * '.'$result = $client->execute($request);';

            $apiDoc.= "\n".' * '.'$result = $client->request($request);';
            $apiDoc.= "\n".' * '.'$json = json_decode($result->getBody());';
            $apiDoc.= "\n".' * '.'// You are now able to access json response object data like: $json->param1->param2[0]->param3 (check swagger scheme for available parameters)';
        }

        $apiDoc.= "\n";

        return $apiDoc;
    }

    private function postingFiles($consumesTypeArr) {
        return $consumesTypeArr[0] == 'multipart/form-data';
    }

    private function receivingFiles($consumesTypeArr) {
        return $consumesTypeArr[0] != 'application/json';
    }

    private function getParametersPart($parameters, $postingFile) {
        $parametersDocApiPart = '';

        $pathParametersString = '';
        $queryParametersString = '';
        $bodyString = '';

        foreach ($parameters as $paramObj) {
            if ($paramObj['in'] == 'path') {
                if ($pathParametersString == '') {
                    $pathParametersString = ' * $request->getOperationConfig()->setPathParameters(array("'.$paramObj['name'].'" => '.$this->calculateParameterTypeForJson($paramObj['type']);
                    continue;
                }
                $pathParametersString.= ','."\n".' *                                                         "'.$paramObj['name'].'" => '.$this->calculateParameterTypeForJson($paramObj['type']);
            }

            if ($paramObj['in'] == 'query') {
                if ($queryParametersString == '') {
                    $queryParametersString = ' * $request->getOperationConfig()->setQueryParameters(array("'.$paramObj['name'].'" => '.$this->calculateParameterTypeForJson($paramObj['type']);
                    continue;
                }
                $queryParametersString.= ','."\n".' *                                                          "'.$paramObj['name'].'" => '.$this->calculateParameterTypeForJson($paramObj['type']);
            }

            if ($paramObj['in'] == 'body') {
                $bodyString = $this->getBodyString($paramObj['schema']);
            }
        }

        if ($pathParametersString != '') {
            $parametersDocApiPart.= "\n".$pathParametersString.$this->paramsEndingPart();
        }

        if ($queryParametersString != '') {
            $parametersDocApiPart.= "\n".$queryParametersString.$this->paramsEndingPart();
        }

        if ($bodyString != '') {
            $parametersDocApiPart.= "\n".$bodyString;
        }

        if ($postingFile == 1) {
            $parametersDocApiPart.= "\n".$this->getFileUploadString();
        }

        return $parametersDocApiPart;
    }

    private function paramsEndingPart() {
        return '));';
    }

    private function getBodyString($apiBodySchema) {
        $bodyString = '';

        if ($this->isPropertySet($apiBodySchema, "type") && $apiBodySchema['type'] == 'array') {
            $apiBodyDefinition = $this->getObjectDefinition($apiBodySchema['items']['$ref']);

            $bodyString = ' * $request->getOperationConfig()->setBodyParameter("[';
            $openingObjectString = ' *                                                     {';
            $bodyString.= "\n".$openingObjectString;

            $parametersArrayToPrint = $this->constructBodyObject($apiBodyDefinition['properties']);
            $bodyString.=$this->createBodyArrayString($parametersArrayToPrint, 1, strlen($openingObjectString));

            $bodyString.= "\n".' *                                                     }';
            $bodyString.= "\n".' *                                                   ]");';

        } else if ($this->isPropertySet($apiBodySchema, '$ref')) {
            $apiBodyDefinition = $this->getObjectDefinition($apiBodySchema['$ref']);

            $bodyString = ' * $request->getOperationConfig()->setBodyParameter("{';

            $parametersArrayToPrint = $this->constructBodyObject($apiBodyDefinition['properties']);
            $bodyString.=$this->createBodyArrayString($parametersArrayToPrint, 1, strlen($bodyString));

            $bodyString.= "\n".' *                                                   }");';
        } else {
            $bodyString = ' * $request->getOperationConfig()->setBodyParameter( ..json body..);';
        }

        return $bodyString;
    }

    private function getFileUploadString() {
        return ' * $request->getOperationConfig()->setFileUpload("fullFilePath", "fileName");';
    }

    private function isPropertySet($properties, $propertyName) {

        foreach ($properties as $k => $property) {
            if ($k == $propertyName) {
                return true;
            }
        }

        return false;
    }

    private function getValue($properties, $propertyName) {

        foreach ($properties as $k => $property) {
            if ($k == $propertyName) {
                return $property;
            }
        }

        return null;
    }

    private function constructBodyObject($apiBodyProperties) {
        $resultParameterArray = [];

        foreach ($apiBodyProperties as $paramName => $paramData) {
            if ($this->isPropertySet($paramData, 'type')) {

                if ($paramData['type'] == 'array') {
                    $items = $paramData['items'];

                    if ($this->isPropertySet($items, 'type')) {
                        $inlineObjectArray = $items['type'];
                    } else if ($this->isPropertySet($items, 'additional')) {
                        $inlineObjectArray = $items['type'];
                    } else {
                        $inlineArrayDefinitionString = $this->getValue($items, '$ref');
                        $inlineObjectDefinition = $this->getObjectDefinition($inlineArrayDefinitionString);
                        $inlineObjectArray = $this->constructBodyObject($inlineObjectDefinition['properties']);
                    }

                    $resultParameterArray[$paramName] = array($inlineObjectArray);
                } else {
                    if ($this->isPropertySet($paramData, 'additionalProperties')) {
                        $inlineObjectArray = $this->getValue($this->getValue($paramData, 'additionalProperties'), 'type');
                        $resultParameterArray[$paramName] = array($inlineObjectArray);
                    } else {
                        $resultParameterArray[$paramName] = $paramData['type'];
                    }
                }
            } else if ($this->isPropertySet($paramData, '$ref')) {
                $inlineObjectDefinition = $this->getObjectDefinition($paramData['$ref']);
                $inlineObjectArray = $this->constructBodyObject($inlineObjectDefinition['properties']);
                $resultParameterArray[$paramName] = $inlineObjectArray;
            }
        }

        return $resultParameterArray;
    }

    private function getObjectDefinition($bodyDefinitionLinkString) {
        $delimeter = '#/definitions/';

        $apiDefinitionName = substr($bodyDefinitionLinkString, strpos($bodyDefinitionLinkString, $delimeter) + strlen($delimeter));
        return $this->definitions[$apiDefinitionName];
    }

    private function createBodyArrayString($parametersArrayToPrint, $objectLevel, $tabSpacesCount, $isArray = false){
        $parametersString = '';
        $tab = '  ';
        $tabSpaces = str_repeat(' ', $tabSpacesCount - 2);

        if ($objectLevel > 1) {
            if ($isArray) {
                $parametersString.= '[{';
            } else {
                $parametersString.= '{';
            }
        }

        foreach ($parametersArrayToPrint as $paramName => $paramData){
            if (is_array($paramData)) {
                if ($this->isPropertySet($paramData, '0')) {
                    if (!is_array($paramData['0'])) {
                        if ($this->commaNotRequired($parametersString)) {
                            $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : [ '.$this->calculateParameterTypeForJson($paramData['0']).' ]';
                            continue;
                        }
                        $parametersString.=','."\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : [ '.$this->calculateParameterTypeForJson($paramData['0']).' ]';
                    } else {
                        if ($this->commaNotRequired($parametersString)) {
                            $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.$this->createBodyArrayString($paramData['0'], $objectLevel + 1, $tabSpacesCount, true);
                        } else {
                            $parametersString.=','."\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.$this->createBodyArrayString($paramData['0'], $objectLevel + 1, $tabSpacesCount, true);
                        }
                        $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'}]';
                    }
                } else {
                    if ($this->commaNotRequired($parametersString)) {
                        $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.$this->createBodyArrayString($paramData, $objectLevel + 1, $tabSpacesCount);
                    } else {
                        $parametersString.=','."\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.$this->createBodyArrayString($paramData, $objectLevel + 1, $tabSpacesCount);
                    }
                    $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'}';
                }
            } else {
                if ($this->commaNotRequired($parametersString)) {
                    $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.$this->calculateParameterTypeForJson($paramData);
                    continue;
                }
                $parametersString.=','."\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.$this->calculateParameterTypeForJson($paramData);
            }
        }

        return $parametersString;
    }

    private function calculateParameterTypeForJson($paramData)
    {
        if ($paramData == 'array') {
            return '[]';
        } else if ($paramData == 'string') {
            return '"' . $paramData . '"';
        } else if ($paramData == 'object') {
            return '{}';
        }

        return $paramData;
    }

    private function commaNotRequired($parametersString) {
        return $parametersString == '{' || $parametersString == '[' || $parametersString == '[{' || $parametersString == '';
    }
}

// position [0] is the script's file name
array_shift($argv);
$funcName = array_shift($argv);
$parameter = array_shift($argv);
$generator = new CodeHintsGenerator();
call_user_func(array($generator, $funcName), $parameter);


