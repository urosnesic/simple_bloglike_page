<?php

class Database {
	private static $_instance = null;
	private $_db;

	private function __construct() {
		$this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ($this->_db->connect_errno) {
			die("could not connect to db: " . $this->_db->connect_error);
		}
	}

	public static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new Database();
		}
			return self::$_instance->_db;
	}
}


?>