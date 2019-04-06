<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

   
if($_REQUEST['packageid'])
                {



        $productsingle=$objU->getResult('select * from tbl_product_package where id="'.$_REQUEST['packageid'].'"');
        //print_r($productsingle);
         if(isset($_SESSION['user_id'])){
		  $uid = $_SESSION['user_id'] ;
	       }else{
		  $uid = session_id() ;
	      }


           
			$row = $objU->QueryInsert("insert into  cart set  user_temp_id='".$uid."',package_id='".$_REQUEST['packageid']."',price='".$productsingle[0]['price']."',quantity='".$_REQUEST['qty']."'") ;
             
              }

?>