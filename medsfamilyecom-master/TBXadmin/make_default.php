<?php
   @session_start();
  ini_set('display_errors',1);
error_reporting(E_ALL);
    require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
   // include 'inc/head.php';
      $objT = new User();
    
      $objT->QueryRun1("update product_customization_type set default_status=0 where pcl_id = ".$_REQUEST['customizetype']." and type=".$_REQUEST['typeid']."");

          
          $objT->QueryRun("update product_customization_type set default_status=1 where id = ".$_REQUEST['default_id']."");
         