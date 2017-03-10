<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vladimir.Malinovskiy
 * Date: 2/7/2017
 * Time: 11:11 PM
 */

$docText =
'/**
 * Api client class
 *
 * The class is used to instantiate api client
 *
 * @package    Callfire
 * @subpackage Api
 * @author     Justin Martin <jmart@callfire.com>';

$callFireSwaggerUrl = 'https://www.callfire.com/v2/api-docs/swagger.json';
$spec = file_get_contents($callFireSwaggerUrl);
$decodedSpec = json_decode($spec, true);
$definitions = $decodedSpec['definitions'];
$paths = $decodedSpec['paths'];
foreach ($paths as $apiBunch) {
    foreach ($apiBunch as $reqType => $apiInstance) {
        $docText .= "\n\n".loadDataToFile($reqType, $apiInstance);
    }
}
$docText .= ' */';

//UPDATING Client.php class to include documentation
$file = __DIR__.'/src/CallFire/Api/DocumentedClient.php';
$classCode = file_get_contents($file);
$lastLineForPackagesDefinitions = 'use Swagger\Client as SwaggerClient;';
$packageInfo = substr($classCode, 0, strpos($classCode, $lastLineForPackagesDefinitions) + strlen($lastLineForPackagesDefinitions));
$classDefinition = substr($classCode, strpos($classCode, "class DocumentedClient extends Client"));
$classCode = $packageInfo."\n\n".$docText."\n".$classDefinition;
file_put_contents($file, $classCode);
//file has documentation inside

function loadDataToFile($requestType, $apiInstance)
{
    $apiDoc =
        ' * @method SwaggerClient\\Request '.$apiInstance['operationId'].'()'."\n".
        ' *'."\n".
        ' * '.$apiInstance['operationId'].' example'."\n".
        ' * '.'$client = Client::createClient("login", "password");'."\n".
        ' * '.'$request = $client->'.$apiInstance['operationId'].'();';

    if (($requestType == 'put' || $requestType == 'post') && postingFiles($apiInstance['consumes']) != 1 ) {
        $apiDoc.="\n".' * '.'$request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));';
    }

    $apiDoc.= getParametersPart($apiInstance['parameters'], postingFiles($apiInstance['consumes']));

    if (receivingFiles($apiInstance['produces'])) {
        $apiDoc.= "\n".' * '.'$result = $client->request($request);';
    } else {
        $apiDoc.= "\n".' * '.'$result = $client->execute($request);';
    }

    $apiDoc.= "\n";

    return $apiDoc;
}

function postingFiles($consumesTypeArr) {
    return $consumesTypeArr[0] == 'multipart/form-data';
}

function receivingFiles($consumesTypeArr) {
    return $consumesTypeArr[0] != 'application/json';
}

function getParametersPart($parameters, $postingFile) {
    $parametersDocApiPart = '';

    $pathParametersString = '';
    $queryParametersString = '';
    $bodyString = '';

    foreach ($parameters as $paramObj) {
        if ($paramObj['in'] == 'path') {
            if ($pathParametersString == '') {
                $pathParametersString = ' * $request->getOperationConfig()->setPathParameters(array("'.$paramObj['name'].'" => '.calculateParameterTypeForJson($paramObj['type']);
                continue;
            }
            $pathParametersString.= ','."\n".' *                                                         "'.$paramObj['name'].'" => '.calculateParameterTypeForJson($paramObj['type']);
        }

        if ($paramObj['in'] == 'query') {
            if ($queryParametersString == '') {
                $queryParametersString = ' * $request->getOperationConfig()->setQueryParameters(array("'.$paramObj['name'].'" => '.calculateParameterTypeForJson($paramObj['type']);
                continue;
            }
            $queryParametersString.= ','."\n".' *                                                          "'.$paramObj['name'].'" => '.calculateParameterTypeForJson($paramObj['type']);
        }

        if ($paramObj['in'] == 'body') {
            $bodyString = getBodyString($paramObj['schema']);
        }
    }

    if ($pathParametersString != '') {
        $parametersDocApiPart.= "\n".$pathParametersString.paramsEndingPart();
    }

    if ($queryParametersString != '') {
        $parametersDocApiPart.= "\n".$queryParametersString.paramsEndingPart();
    }

    if ($bodyString != '') {
        $parametersDocApiPart.= "\n".$bodyString;
    }

    if ($postingFile == 1) {
        $parametersDocApiPart.= "\n".getFileUploadString();
    }

    return $parametersDocApiPart;
}

function paramsEndingPart() {
    return '));';
}

function getBodyString($apiBodySchema) {
    $bodyString = '';

    if (isPropertySet($apiBodySchema, "type") && $apiBodySchema['type'] == 'array') {
        $apiBodyDefinition = getObjectDefinition($apiBodySchema['items']['$ref']);

        $bodyString = ' * $request->getOperationConfig()->setBodyParameter("[';
        $openingObjectString = ' *                                                     {';
        $bodyString.= "\n".$openingObjectString;

        $parametersArrayToPrint = constructBodyObject($apiBodyDefinition['properties']);
        $bodyString.=createBodyArrayString($parametersArrayToPrint, 1, strlen($openingObjectString));

        $bodyString.= "\n".' *                                                     }';
        $bodyString.= "\n".' *                                                   ]");';

    } else if (isPropertySet($apiBodySchema, '$ref')) {
        $apiBodyDefinition = getObjectDefinition($apiBodySchema['$ref']);

        $bodyString = ' * $request->getOperationConfig()->setBodyParameter("{';

        $parametersArrayToPrint = constructBodyObject($apiBodyDefinition['properties']);
        $bodyString.=createBodyArrayString($parametersArrayToPrint, 1, strlen($bodyString));

        $bodyString.= "\n".' *                                                   }");';
    } else {
        $bodyString = ' * $request->getOperationConfig()->setBodyParameter( ..json body..);';
    }

    return $bodyString;
}

function getFileUploadString() {
    return ' * $request->getOperationConfig()->setFileUpload("fullFilePath", "fileName");';
}

function isPropertySet($properties, $propertyName) {

    foreach ($properties as $k => $property) {
        if ($k == $propertyName) {
            return true;
        }
    }

    return false;
}

function getValue($properties, $propertyName) {

    foreach ($properties as $k => $property) {
        if ($k == $propertyName) {
            return $property;
        }
    }

    return null;
}

function constructBodyObject($apiBodyProperties) {
    $resultParameterArray = [];

    foreach ($apiBodyProperties as $paramName => $paramData) {
        if (isPropertySet($paramData, 'type')) {

            if ($paramData['type'] == 'array') {
                $items = $paramData['items'];

                if (isPropertySet($items, 'type')) {
                    $inlineObjectArray = $items['type'];
                } else if (isPropertySet($items, 'additional')) {
                    $inlineObjectArray = $items['type'];
                } else {
                    $inlineArrayDefinitionString = getValue($items, '$ref');
                    $inlineObjectDefinition = getObjectDefinition($inlineArrayDefinitionString);
                    $inlineObjectArray = constructBodyObject($inlineObjectDefinition['properties']);
                }

                $resultParameterArray[$paramName] = array($inlineObjectArray);
            } else {
                if (isPropertySet($paramData, 'additionalProperties')) {
                    $inlineObjectArray = getValue(getValue($paramData, 'additionalProperties'), 'type');
                    $resultParameterArray[$paramName] = array($inlineObjectArray);
                } else {
                    $resultParameterArray[$paramName] = $paramData['type'];
                }
            }
        } else if (isPropertySet($paramData, '$ref')) {
            $inlineObjectDefinition = getObjectDefinition($paramData['$ref']);
            $inlineObjectArray = constructBodyObject($inlineObjectDefinition['properties']);
            $resultParameterArray[$paramName] = $inlineObjectArray;
        }
    }

    return $resultParameterArray;
}

function getObjectDefinition($bodyDefinitionLinkString) {
    global $definitions;
    $delimeter = '#/definitions/';

    $apiDefinitionName = substr($bodyDefinitionLinkString, strpos($bodyDefinitionLinkString, $delimeter) + strlen($delimeter));
    return $definitions[$apiDefinitionName];
}

function createBodyArrayString($parametersArrayToPrint, $objectLevel, $tabSpacesCount, $isArray = false){
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
            if (isPropertySet($paramData, '0')) {
                if (!is_array($paramData['0'])) {
                    if (commaNotRequired($parametersString)) {
                        $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : [ '.calculateParameterTypeForJson($paramData['0']).' ]';
                        continue;
                    }
                    $parametersString.=','."\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : [ '.calculateParameterTypeForJson($paramData['0']).' ]';
                } else {
                    if (commaNotRequired($parametersString)) {
                        $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.createBodyArrayString($paramData['0'], $objectLevel + 1, $tabSpacesCount, true);
                    } else {
                        $parametersString.=','."\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.createBodyArrayString($paramData['0'], $objectLevel + 1, $tabSpacesCount, true);
                    }
                    $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'}]';
                }
            } else {
                if (commaNotRequired($parametersString)) {
                    $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.createBodyArrayString($paramData, $objectLevel + 1, $tabSpacesCount);
                } else {
                    $parametersString.=','."\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.createBodyArrayString($paramData, $objectLevel + 1, $tabSpacesCount);
                }
                $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'}';
            }
        } else {
            if (commaNotRequired($parametersString)) {
                $parametersString.="\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.calculateParameterTypeForJson($paramData);
                continue;
            }
            $parametersString.=','."\n".' *'.$tabSpaces.str_repeat($tab, $objectLevel).'"'.$paramName.'" : '.calculateParameterTypeForJson($paramData);
        }
    }

    return $parametersString;
}

function calculateParameterTypeForJson($paramData)
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

function commaNotRequired($parametersString) {
    return $parametersString == '{' || $parametersString == '[' || $parametersString == '[{' || $parametersString == '';
}
