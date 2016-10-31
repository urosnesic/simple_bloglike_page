<?php
class Session {

	public static function put($name, $value) {
		return $_SESSION[$name] = $value;
	}

	public static function get($name) {
		return $_SESSION[$name];
	}

	public static function exists($name) {
		return isset($_SESSION[$name]) ? true : false;
	}

	public static function delete($name) {
		if (self::exists($name)) {
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
	}

}

?>