<?php

// Цепочка обязанностей
class Process {
	
	private $handlers = [];

	public static function first(callable $handler) {
		$self = new self();
		$self->addHandler($handler);

		return $self;
	}

	public function then(callable $handler) {
		$this->addHandler($handler);

		return $this;
	}

	public function addHandler(callable $handler) {
		$this->handlers[] = $handler;
	}

	public function next(...$params) {
		list(,$handler) = each($this->handlers);
		if ($handler) {
			return $handler($this, ...$params);
		}
	}
	
	public function __invoke(...$params) {
		reset($this->handlers);
		return $this->next(...$params);
	}
	
}