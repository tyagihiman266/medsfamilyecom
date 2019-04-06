<?php
define("base_url", "http://afsanaonline.com/nation/fashiondemo");
define("admin_url", "http://afsanaonline.com/nation/fashiondemo");

if(isset($_SESSION['user_email'])){
define("welcome", "Welcome ".$_SESSION['user_email']);
}else{
define("welcome", "Welcome to Excedo ");
}

 
// define("base_url", "http://nationproducts.in/tbx-php-demo");
// define("admin_url", "http://nationproducts.in/tbx-php-demo");


?>