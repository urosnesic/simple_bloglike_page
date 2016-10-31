<?php

class Sanitizer {

	public static function db_sanitize($string) {
		return Database::getInstance()->real_escape_string($string);
	}

	public static function html_sanitize($string) {
		return htmlentities($string);
	}
}

?>