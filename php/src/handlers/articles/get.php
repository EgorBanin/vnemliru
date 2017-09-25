<?php

return function($app) {

	$rows = $app->getDb()->table('articles')->select();

	return ob_include(__DIR__.'/index.tpl', ['articles' => $rows]);

};