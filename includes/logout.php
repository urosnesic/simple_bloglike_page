<?php
require_once 'init.php';

Session::delete('loged_in');
Session::delete('username');

header("Location: ../public/index.php");
exit;

?>