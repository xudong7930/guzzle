<?

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;

// step1: prepare client and requsets
$client = new Client;

$requests = [
    'ip' => new Request('GET', 'http://httpbin.org/ip'),
    'uuid' => new Request('GET', 'http://httpbin.org/uuid'),
];


//step2: create a pool
$handles = [];
$pool = new Pool($client, $requests, [
    'concurrency' => 3,
    'fulfilled' => function ($response, $index) use (&$handles) {
        $data = json_decode($response->getBody(), true);
        $handles[] = $data;
    },
    'rejected' => function ($reason, $index) {
        // handle error.
    }
]);

// step3: execute
$promise = $pool->promise(); // make a promise for the pool
$promise->wait(); // compleet all the requests in the pool.

var_dump($handles);