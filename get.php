<?

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

$httpClient = new Client([
    'base_uri' => 'http://httpbin.org',
    'timeout' => 3.14
]);

try {
    $response = $httpClient->request('GET', '/get', [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-APP-TOKEN' => time()
        ],
        'query' => [
            'username' => 'xudong7930',
            'email' => 'xudong7930@gmail.com'
        ]
    ]);

} catch (Exception $e) {
    echo json_encode([
        'code' => 500,
        'message' => $e->getMessage()
    ]);exit;
}

if ($response->getStatusCode() !== 200) {
    throw new Exception('request error');    
}

var_dump(get_class_methods($response));

$data = $response->getBody();
$contents = $response->getBody()->getContents();
echo $data.PHP_EOL;
echo $contents.PHP_EOL;