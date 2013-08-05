CallFire PHP SDK
================

This library provides a set of PHP classes to interface with the
[CallFire API](http://www.callfire.com/api-documentation). Please refer to the
[API documentation](http://www.callfire.com/api-documentation) for information on getting started with the API.

REST API Basic Usage
--------------------

```php
<?php
use CallFire\Api\Rest\Request;
require 'vendor/autoload.php';

$client = CallFire\Api\Client::Rest("<api-login>", "<api-password>", "Broadcast");

$request = new Request\QueryBroadcasts;
$response = $client->QueryBroadcasts($request);

$broadcasts = $client::response($response);

foreach($broadcasts as $broadcast) {
    var_dump($broadcast);
}
```
