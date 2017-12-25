<?

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Promise;

$client = new Client([
    'base_uri'=>'http://httpbin.org',
    'timeout'=>3.14
]);

$promise = $client->requestAsync('GET', '/ip');
$promise->then(function ($response) use ($client) {
    $ip = json_decode($response->getBody(), true)['origin'];
    return (new Client())->requestAsync('GET', 'http://ip-api.com/#'.$ip);
});

$responses = Promise\unwrap([$promise]); // 此处必须是个数组
echo "status:".$promise->getState().PHP_EOL;

$talks = json_decode($responses[0]->getBody(), true);
var_dump($talks);
