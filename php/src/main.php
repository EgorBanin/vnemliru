<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/all_func.php';

$configFile = getenv('PHP_USER_CONFIG')?: 'config.php';
$config = require __DIR__.'/'.$configFile;

$app = new App($config);
$router = new Router([
	'~^get /$~' => 'articles/get.php',
]);
$request = io_get_request();
list($handler, $params) = $router->route(
	strtolower($request['method']).' '.$request['url'],
	__DIR__.'/handlers'
);

$app->run($handler, $params);