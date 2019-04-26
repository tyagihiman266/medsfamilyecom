<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

   
if($_POST['packageid1'])
                {

        $productsingle=$objU->getResult('select * from tbl_product_package where id="'.$_POST['packageid1'].'"');
         if(isset($_SESSION['user_id'])){
		  $uid = $_SESSION['user_id'] ;
		   }
		   else
		   {
		  $uid = session_id() ;
	      }


		  $pkg_id=$_POST['packageid1'];
		  $price=$productsingle[0]['price'];
		  $qty=$_POST['qty1'];
			$row = $objU->QueryInsert("insert into cart(user_temp_id,package_id,price,quantity,userTempStatus) values('$uid','$pkg_id','$price','$qty',0)");
            
			  }
			

?>