<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

  $filename=time().$_FILES['file']['name'];
$sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = "../upload/prescription/".$filename; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;


$objU->QueryUpdateorder("update order_data set prescription_file='".$filename."' where id='".$_REQUEST['orderid']."'");

              

