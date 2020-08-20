<?php

define('LARAVEL_START', microtime(true));
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$http = new Swoole\Http\Server('192.168.1.89', 9502);

$http->on('request', function ($request, $response_swoole) use ($kernel) {
    $response_laravel = $kernel->handle(
        $laravel_request = Illuminate\Http\Request::capture()
    );
    $response_swoole->end($response_laravel->send());
    $kernel->terminate($laravel_request, $response_laravel);
});

$http->start();




