<?php

return function(App $app, $message) {
	
	return [500, [], ob_include(__DIR__.'/error.tpl', [
		'message' => $message,
	])];

}