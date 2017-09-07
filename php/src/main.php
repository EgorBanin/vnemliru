<?php

$appDir = __DIR__;

require_once $appDir.'/vendor/autoload.php';
require_once $appDir.'/all_func.php';

$configFile = getenv('PHP_USER_CONFIG')?: 'config.php';
$config = require $appDir.'/'.$configFile;

$db = \Mysql\Client::init(
		$config['mysql']['username'],
		$config['mysql']['password']
	)
	->defaultDb($config['mysql']['db'])
	->charset($config['mysql']['charset']);

$rows = $db->table('articles')->select();
echo ob_include($appDir.'/main.tpl', ['articles' => $rows]);