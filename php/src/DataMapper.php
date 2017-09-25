<?php

abstract class DataMapper {
	
	protected $db;

	protected $mainTableName;

	public function __construct(\Mysql\Client $db, $mainTableName) {
		$this->db = $db;
		$this->mainTableName = $mainTableName;
	}

	public function get($id, $map = null) {
		$map = $map?: [$this, 'map'];
		$this->db->table($this->mainTableName)->get($id);

		return call_user_func($map, $row);
	}

	abstract public function map($row);

}