<?php

class CheckAuth {

	private $roles;

	public function __construct($roles) {
		$this->roles = $roles;
	}

	public function __invoke(Process $process, App $app, $params) {
		$userId = $app->getAuth()->auth();
		if ( ! $userId) {
			return $app->error(403, 'Доступ запрещён');
		}

		$userMapper = new UserMapper($app->getDb());
		$user = $userMapper->get($userId);
		if ( ! $user) {
			return $app->error(403, 'Доступ запрещён');
		} elseif ( ! $user->active) {
			return $app->error(403, 'Доступ запрещён');
		}

		$diff = array_diff($this->roles, $user->roles);
		if ( ! empty($diff)) {
			return $app->error(403, 'Доступ запрещён');
		}

		$process->next($app, $user, $params);
	}

}