<?php
require_once 'init.php';
/*
 * Processing ajax call and returns information about user
 * as simple xml
 * It will display when the user joined to site and how many messsages
 * did user post
 */
$username = $_POST['uname'];
$query = "SELECT id, joined FROM users WHERE username = '{$username}' LIMIT 1";
$first_result = Database::getInstance()->query($query);
if ($first_result->num_rows == 1) {
	foreach ($first_result as $first) {
		$id = $first['id'];
		$joined = $first['joined'];
	}
}
$first_result->free();

$query = "SELECT COUNT(message) AS count FROM blogs WHERE user_id = '{$id}'";
$results = Database::getInstance()->query($query);
if ($results) {
	foreach ($results as $result) {
		$number = $result['count'];
	}
}
$results->free();


header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
	echo '<response>';
		echo "joined: {$joined} number of posts: {$number}";
	echo '</response>';

?>