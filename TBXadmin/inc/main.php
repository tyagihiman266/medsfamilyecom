<?php 
error_reporting(0);
	session_start();
	require 'include/User.php';
	$user = new User();
	/*if( isset($_COOKIE[$cookie_name]) && !isset($_SESSION['SUPER_admin_id']) ){
			include_once 'autologin.php';
		} */
	if(!$user->get_session() || !isset($_SESSION['admin_id'])){

		header("location:index.php");
	}
	
	if(isset($_SESSION['admin_id'])){
		$adminid = $_SESSION['admin_id'];
	}
	$admininfo = new AdminUser();
	$admin = $admininfo->getAdminInfo($adminid);
?>