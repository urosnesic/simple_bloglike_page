<?php
require_once '../includes/init.php';

if (!Session::exists('loged_in') || !Session::exists('username')) {
	header("Location: index.php");
	exit;
}

header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>blog</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>

	<div id="userBox">
		<?php echo "hello " . Sanitizer::html_sanitize(Session::get('username')) . "<br />"; ?>
		<form action="../includes/blog_engine.php" method="POST" name="blogText">
			<p>Title:<br />
				<input type="text" name="blogTitle" autofocus />
				<?php
			       if (Session::exists('no_title')) {
			       		echo "<br />" . Session::get('no_title');
			       		Session::delete('no_title');
			       }
			   ?>
			</p>
			<textarea rows="10" cols="40" name="textarea"></textarea>
			<?php
		         if (Session::exists('no_textarea')) {
		       		  echo "<br />" . Session::get('no_textarea');
		       		  Session::delete('no_textarea');
		         }
			?>
			<br /><br />
			<input type="submit" name="submit" value="Post" />
		</form>
		<br />
		<?php echo "<a href=\"../includes/logout.php\">Logout</a>"; ?>
	</div>
		
	<div id="blogDisplay">
	<!-- This script takes information from database and displays it on screen.
		 $user is between <span> tags so that javascript can access it and make
		 an ajax call for data about user -->

		<?php
			$query  = "SELECT blogs.title, blogs.message, blogs.created, users.username ";
			$query .= "FROM blogs, users WHERE users.id = blogs.user_id ORDER BY blogs.id DESC LIMIT 20";
			$results = Database::getInstance()->query($query);
			if ($results) {
				foreach ($results as $result) {
					$title = Sanitizer::html_sanitize($result['title']);
					$user = Sanitizer::html_sanitize($result['username']);
					$message = Sanitizer::html_sanitize($result['message']);
					$created = $result['created'];
					echo "<b>{$title}</b><br />  by <b><span>{$user}</span></b> at {$created} <br />";
					echo "<br />" . $message . "<br />";
					echo "<hr />";
				}
			} else {
				echo "error";
			}	
		?>
	</div>

	<!-- This div has visibility set to hidden, and is used
		 by javascript to display informations about user when we scroll mouse over user name -->
	<div id="displayInformation"></div>

<script src="scripts/script.js"></script>
</body>
</html>