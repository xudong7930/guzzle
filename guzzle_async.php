<?

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

$client = new Client([
    'base_uri'=>'http://httpbin.org',
    'timeout'=>3.14
]);

// 1
$promise = $client->requestAsync('GET', '/ip');

// 2
// $request = new Request('GET', '/ip');
// $promise = $client->sendAsync($request, ['query' => ['_time'=>time()]]);

echo "status:".$promise->getState().PHP_EOL;

$promise->then(
// onFullFilled
function (ResponseInterface $response) {
    echo $response->getBody();

    // do more 
},

// onRejected
function (RequestException $exception) {
    echo $exception->getMessage();exit; 
});

Promise\settle($promise)->wait();

echo "status:".$promise->getState().PHP_EOL;