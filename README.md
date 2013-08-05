CallFire PHP SDK
================

This library provides a set of PHP classes to interface with the
[CallFire API](http://www.callfire.com/api-documentation). Please refer to the
[API documentation](http://www.callfire.com/api-documentation) for information on getting started with the API.

REST API Basic Usage
--------------------

```php
<?php
use CallFire\Api\Request;
require 'vendor/autoload.php';

$client = CallFire\Api\Client::Soap("<api-login>", "<api-password>");

$request = new Request\QueryBroadcasts;
$broadcasts = $client->QueryBroadcasts($request);

var_dump($broadcasts);
```
