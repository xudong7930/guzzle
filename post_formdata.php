<?

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

$httpClient = new Client([
    'base_uri' => 'http://httpbin.org',
]);

// application/x-www-form-urlencoded
$response = $httpClient->request('POST', '/post', [
    'headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'X-APP-TOKEN' => time()
    ],
    'form_params' => [
        'username' => 'sbjsw',
        'password' => md5('secret'),
        'lists' => [
            'item1', 'item2'
        ]
    ],
    'query' => [
        '_time' => time()
    ],
    // 'json' => ['email'=>'sbjsw@qq.com'] // json和form_params和multipart只能用一个
]);

echo $response->getBody();