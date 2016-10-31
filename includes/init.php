<?php
session_start();

define("DB_HOST", "localhost");
define("DB_USER", "admin1");
define("DB_PASS", "");
define("DB_NAME", "blog");

spl_autoload_register(function($class) {
	require_once "classes/{$class}.php";
})

?>