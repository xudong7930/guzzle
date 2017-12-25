<?
require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Psr7\Request;

$headers = [
    'X-APP-TOKEN' => time()
];

$body = "some body dance with me";
$requst = new Request('PUT', 'http://httpbin.org/put', $headers, $body);

$method = $requst->getMethod();
$uri = $request->getUri();
$protocal = $request->getUri()->getScheme();
$host = $request->getUri()->getHost();
$header = $request->getHeader('X-APP-TOKEN');
$headers = $request->getHeaders();
$port = $request->getUri()->getPort();
$path = $request->getUri()->getPath();
$query = $request->getUri()->getQuery();







