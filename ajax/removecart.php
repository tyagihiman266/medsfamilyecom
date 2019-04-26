<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

   
if($_REQUEST['packageid'])
                {
 if(isset($_SESSION['user_id'])){
		  $uid = $_SESSION['user_id'] ;
	       }else{
		  $uid = session_id();
	      }
         $cartcountpackage=$objU->getResult('select * from cart where user_temp_id="'.$uid.'" and package_id="'.$_REQUEST['packageid'].'" ');
          $numcartpackage=count($cartcountpackage);

           
			$row = $objU->QueryDelete('cart',$cartcountpackage[0]['id']) ;
             
              }

?>