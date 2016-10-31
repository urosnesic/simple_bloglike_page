<?php
require_once 'init.php';

if (isset($_POST['submit'])) {

	if (!isset($_POST['username']) || empty($_POST['username'])) {
		Session::put('no_login_username', 'enter username');
		header("Location: ../public/index.php");
		exit;
	}
	if (!isset($_POST['password']) || empty($_POST['password'])) {
		Session::put('no_login_password', 'enter password');
		header("Location: ../public/index.php");
		exit;
	}

	$username = Sanitizer::db_sanitize(trim($_POST['username']));
	$password = Sanitizer::db_sanitize($_POST['password']);

	$query  = "SELECT id, username FROM users WHERE username = '{$username}' AND password = '{$password}' ";
	$query .= "LIMIT 1";
	$result = Database::getInstance()->query($query);
	if ($result->num_rows == 1) {
		while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
			$username = $row['username'];
		}
		Session::put('loged_in', $id);
		Session::put('username', $username);
		$result->free();
		Database::getInstance()->close();
		header("Location: ../public/private_page.php");
		exit;
	} else {
		Database::getInstance()->close();
		Session::put('login_failure', 'username/password does not match');
		header("Location: ../public/index.php");
		exit;
	}

}

exit;
?>