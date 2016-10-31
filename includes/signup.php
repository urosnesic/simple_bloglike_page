<?php
require_once 'init.php';

if (isset($_POST['submit'])) {
	
	if (!isset($_POST['name']) || empty($_POST['name'])) {
		Session::put('no_name', 'enter name');
		header("Location: ../public/index.php");
		exit;
	}
	if (!isset($_POST['username']) || empty($_POST['username'])) {
		Session::put('no_username', 'enter username');
		header("Location: ../public/index.php");
		exit;
	}
	if (!isset($_POST['password']) || empty($_POST['password'])) {
		Session::put('no_password', 'enter password');
		header("Location: ../public/index.php");
		exit;
	}

	$name = Sanitizer::db_sanitize(trim($_POST['name']));
	$username = Sanitizer::db_sanitize(trim($_POST['username']));
	$password = Sanitizer::db_sanitize($_POST['password']);

	$query  = "INSERT INTO users (name, username, password, joined) ";
	$query .= "VALUES ('{$name}', '{$username}', '{$password}', NOW())";
	Database::getInstance()->query($query);
	
	if (Database::getInstance()->affected_rows == 1) {
		Session::put('success', 'success');
		Database::getInstance()->close();
		header("Location: ../public/index.php");
		exit;
	} else {
		Session::put('failure', 'something whent wrong, try again');
		Database::getInstance()->close;
		header("Location: ../public/index.php");
		exit;
	}

}

exit;
?>