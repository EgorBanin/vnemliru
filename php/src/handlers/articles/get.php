<?php

return function($db) {

	$rows = $db->table('articles')->select();
	echo ob_include(__DIR__.'/index.tpl', ['articles' => $rows]);

};