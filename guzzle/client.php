<?
require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://httpbin.org',
    'allow_redirects' => true, //是否允许跳转
    'auth' => [
        ['username', 'password'],
        ['username', 'password', 'digest'],
        ['username', 'password', 'ntlm'],
    ],
    'body' => [
        'some string',  // 字符串
        fopen('http://httpbin.org', 'r'), // 资源
        GuzzleHttp\Psr7\stream_for('contents...'), //stream资源
        // 不能和form_params, multipart, or json同时使用
    ],
    'cert' => ['/data/ssl/cert.pem', 'password'],
    'cookie' => [
        true, false, (new \GuzzleHttp\Cookie\CookieJar())
    ],
    'connect_timeout' => 3.14,
    'debug' => true,
    'decode_content' => [true, false, 'gzip'],
    'delay' => 1048576, //毫秒
    'force_ip_resolve' => ['v4', 'v6', null],

    'form_params' => ['age'=>23], //application/x-www-form-urlencoded POST request
    'headers' => [
        'Accept' => 'application/json'
    ],
    'http_errors' => [true, false],
    'json' => ['age'=>23],
    'multipart' => [
        [
            'name' => 'field1',
            'contents' => 'field1 content'
        ],
        [
            'name'     => 'baz',
            'contents' => fopen('/path/to/file', 'r'),
            'filename' => 'custom_filename.txt'
        ],
    ],
    'proxy' => [
        'tcp://localhost:8125', 
        [
            'http'  => 'tcp://localhost:8125', // Use this proxy with "http"
            'https' => 'tcp://localhost:9124', // Use this proxy with "https",
            'no' => ['.mit.edu', 'foo.com']    // Don't use a proxy with these
        ]
    ],
    'query' => ['a'=>'1123'],
    'sink' => '接收到的东西保存为文件',
    'stream'=> [true, false],
    'timeout'=>3.14,
]);