<?
require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Psr7\Response;

$status = 200;
$headers = ['X-Foo' => 'Bar'];
$body = 'hello!';
$protocol = '1.1';
$response = new Response($status, $headers, $body, $protocal);


$status = $response->getStatusCode();
$body = $response->getBody();
$phrase = $response->getReasonPhrase();
$protocalVersion = $response->getProtocolVersion();
$cnotents = $response->getBody()->getContents();