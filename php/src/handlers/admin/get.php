<?php

return Process::first(new CheckAuth(['admin']))
	->then(function(Process $process, $app, $user, $params) {

		return 'ADMIN';

	});