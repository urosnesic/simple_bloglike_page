<?php
require_once '../includes/init.php';

if (isset($_POST['submit'])) {

	if (isset($_POST['blogTitle']) && !empty($_POST['blogTitle'])) {
		$title = Sanitizer::db_sanitize(trim($_POST['blogTitle']));
	} else {
		Session::put('no_title', 'need to have title');
		header("Location: ../public/private_page.php");
		exit;
	}

	if (isset($_POST['textarea']) && !empty($_POST['textarea'])) {
		$textarea = Sanitizer::db_sanitize($_POST['textarea']);
	} else {
		Session::put('no_textarea', 'write at least something');
		header("Location: ../public/private_page.php");
		exit;
	}

	$user_id = Session::get('loged_in');

	// Inserting users messages to database
	// blog.user_id and users.id link 2 tables in blog database
	// Session::get('loged_in') will give us user.id
	$query  = "INSERT INTO blogs (user_id, title, message, created) ";
	$query .= "VALUES ('{$user_id}', '{$title}', '{$textarea}', NOW())";
	Database::getInstance()->query($query);
	Database::getInstance()->close();
	header("Location: ../public/private_page.php");
}

exit;

?>