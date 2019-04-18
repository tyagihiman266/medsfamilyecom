<?php
@session_start();
unset($_SESSION['user_email']);
session_destroy();
header('Location:http://examstube.in/ecom/login.php');
 ?>