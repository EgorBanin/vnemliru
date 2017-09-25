<?php

class App {

	private $config;

	private $auth;

	private $db;

	public function __construct($config) {
		$this->config = $config;
	}

	public function error($code, $message) {
		$errorHandlerFile = __DIR__.'/errors/'.$code.'.php';
		if (is_readable($errorHandlerFile)) {
			$errorHandler = require $errorHandlerFile;
		} else {
			$errorHandler = false;
		}
		$this->run($errorHandler, $message);
	}

	public function run($handler, $params) {
		$result = $handler($this, $params);

		if (is_string($result)) {
			$resp = [200, [], $result];
		} else {
			$resp = $result;
		}

		return io_send_response(...$result);
	}

	private function getAuth() {
		if ( ! $this->auth) {
			$this->auth = new Auth();
		}

		return $this->auth;
	}

	public function getDb() {
		if ( ! $this->db) {
			$this->db = \Mysql\Client::init(
				$this->config['mysql']['username'],
				$this->config['mysql']['password']
			)
			->defaultDb($this->config['mysql']['db'])
			->charset($this->config['mysql']['charset']);
		}

		return $this->db;
	}

}