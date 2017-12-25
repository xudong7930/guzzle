<?

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

$request = new Request('POST', 'http://httpbin.org/post');
$client = new Client;
$response = $client->send($request, [
    'multipart' => [
        [ // 文件
            'name' => 'avatar',
            'contents' => fopen(__DIR__.'/app.png', 'r')
        ], 
        [ // 表单
            'name' => 'avatar2',
            'contents' => 'some avatar2'
        ],
        [
            'name'     => 'avatar3',
            'contents' => 'hello',
            'filename' => 'filename.txt',
            'headers'  => [
                'X-Foo' => 'this is an extra header to include'
            ]
        ]
    ]
]);

echo $response->getBody();