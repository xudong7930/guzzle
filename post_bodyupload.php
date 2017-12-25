<?

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://httpbin.org',
]);

// 1
// $response = $client->request('POST', '/post', ['body' => 'raw data']);
// echo $response->getBody();

// 2
// $body = fopen(__DIR__.'/app.png', 'r');
// $response = $client->request('POST', '/post', ['body'=>$body]);
// echo $response->getBody();

// 3
// $body = GuzzleHttp\Psr7\stream_for('hello');
// $response = $client->request('POST', '/post', ['body'=>$body]);
// echo $response->getBody();

// 4. use json 
$response = $client->request('POST', '/post', ['json' => ['email'=>'sbjsw@domain.com']]);
echo $response->getBody();