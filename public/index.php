<?php
require_once '../includes/init.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Index</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>

	<div id="loginBox">
		<p>Login here:</p>
		<form action="../includes/login.php" method="POST" name="loginForm">
			<p>Username:<br />
			   <input type="text" name="username" autofocus />
			   <?php
			       if (Session::exists('no_login_username')) {
			       		echo "<br />" . Session::get('no_login_username');
			       		Session::delete('no_login_username');
			       }
			   ?>
			</p>
			<p>Password:<br />
			   <input type="password" name="password" />
			   <?php
			       if (Session::exists('no_login_password')) {
			       		echo "<br />" . Session::get('no_login_password');
			       		Session::delete('no_login_password');
			       }
			   ?>
			</p>
			<input type="submit" name="submit" value="Login" />
			<?php
		       if (Session::exists('login_failure')) {
		       		echo "<br />" . Session::get('login_failure');
		       		Session::delete('login_failure');
		       }
			?>
		</form>
	</div>

	<br />

	<div id="signupBox">
		<p>If you don't have an account, signup here:</p>
		<form action="../includes/signup.php" method="POST" name="signupForm">
			<p>Name:<br />
			   <input type="text" name="name" />
			   <?php
			       if (Session::exists('no_name')) {
			       		echo "<br />" . Session::get('no_name');
			       		Session::delete('no_name');
			       }
			   ?>
			</p>
			<p>Username:<br />
			   <input type="text" name="username" />
			   <?php
			       if (Session::exists('no_username')) {
			       		echo "<br />" . Session::get('no_username');
			       		Session::delete('no_username');
			       }
			   ?>
			</p>
			<p>Password:<br />
			   <input type="password" name="password" />
			   <?php
			       if (Session::exists('no_password')) {
			       		echo "<br />" . Session::get('no_password');
			       		Session::delete('no_password');
			       }
			   ?>
			</p>
			<input type="submit" name="submit" value="Signup" />
			<?php
			    if (Session::exists('success')) {
			       	echo "<br />" . Session::get('success');
			   		Session::delete('success');
			    }
			    if (Session::exists('failure')) {
			       	echo "<br />" . Session::get('failure');
			   		Session::delete('failure');
			    }
			?>
		</form>
	</div>

</body>
</html>