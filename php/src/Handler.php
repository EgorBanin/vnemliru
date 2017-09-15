<?php

abstarct class Handler {

	protected $nextHandler;

	public function __construct(calable $nextHandler) {
		$this->nextHandler = $nextHandler;
	}

}