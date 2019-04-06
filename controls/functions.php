<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebbok https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */

function printErrorMessage($str) {
    echo '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function printSuccessMessage($str) {
    echo '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function redirectURL($url) {
    echo '<script> window.location.href="' . $url . '"</script>"';
}

function login_status(){
	 
	if(isset($_SESSION['user_email'])){
	if($_SESSION['user_type']==2){
		echo 'faculty-my-account.php' ;
	}
	if($_SESSION['user_type']==3){
		echo 'student-body-my-account.php';
	}
	if($_SESSION['user_type']==4){
		echo 'student-my-account.php';
	}
	}else{
		echo 'login.php';
	}
}

?>