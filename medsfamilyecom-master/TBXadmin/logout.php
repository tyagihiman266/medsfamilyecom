<?php
@session_start();
require 'include/User.php';
$user = new User();
$user->user_logout();
header("location:index");
exit();
?>