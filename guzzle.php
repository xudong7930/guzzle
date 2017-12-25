<?
require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client(['base_uri'=>'http://httpbin.org', 'timeout'=>3.14]);

// 1
$response = $client->request('GET', '/ip', [
    'query' => [
        '_time' => time()
    ]
]);
echo $response->getBody();

// 2
$request = new Request('GET', '/ip');
$response2 = $client->send($request, [
    'query' => [
        '_time' => time()
    ]
]);
echo $response2->getBody();