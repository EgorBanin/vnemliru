<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/all_func.php';

$configFile = getenv('PHP_USER_CONFIG')?: 'config.php';
$config = require __DIR__.'/'.$configFile;

$db = \Mysql\Client::init(
		$config['mysql']['username'],
		$config['mysql']['password']
	)
	->defaultDb($config['mysql']['db'])
	->charset($config['mysql']['charset']);

$router = new Router([
	'~^get /$~' => 'articles/get.php',
]);
$request = io_get_request();
$route = $router->route(
	strtolower($request['method']).' '.$request['url'],
	__DIR__.'/handlers'
);

call_user_func($route[0], $db);