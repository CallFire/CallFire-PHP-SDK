<?php
namespace CallFire\Api;

use Swagger\Client as SwaggerClient;

class Client extends SwaggerClient
{
    public static $callFireSwaggerUrl = 'https://www.callfire.com/v2/api-docs/swagger.json';

    public static function createClient(
        $appLogin,
        $appPassword
    )
    {
        $client = static::create(static::$callFireSwaggerUrl);

        $client->setDefaultSecurityCredential(
            $client->createBasicCredential(
                $appLogin,
                $appPassword
            )
        );

        return $client;
    }
}
