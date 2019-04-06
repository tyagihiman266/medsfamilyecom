<?php
  @session_start();
  require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';;
	$objT = new  User();


if(!empty($_POST["username"])) {
  $row = $objT->getResult("SELECT count(*) as nurecord FROM tbl_product WHERE sku_number='" . $_POST["username"] . "'");
 
  $user_count = $row[0]['nurecord'];
  if($user_count>0) {
      echo "<span class='status-not-available'> Product SKU is not Available.</span>";
  }else{
      echo "<span class='status-available'> Product SKU is Available.</span>";
	  
  }
}
?>
<style>
.status-available {
    color: green;
}</style>