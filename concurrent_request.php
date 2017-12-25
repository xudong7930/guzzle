<?
require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

$client = new Client([
    'base_uri' => 'http://httpbin.org'
]);

$promises = [
    'ip' => $client->requestAsync('GET', '/ip'),
    'uuid' => $client->requestAsync('GET', '/uuid')
];

// Wait on all of the requests to complete. Throws a ConnectException if any of the requests fail
$responses = GuzzleHttp\Promise\unwrap($promises);

// Wait for the requests to complete, even if some of them fail
// $responses = GuzzleHttp\Promise\settle($promises)->wait();

$ip = json_decode($responses['ip']->getBody(), true);
$uuid = json_decode($responses['uuid']->getBody(), true);
var_dump($ip, $uuid);