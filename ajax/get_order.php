<?php

@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');






//$baseurl="http://www.tailormeup.com/demo/";

if(!isset($_SESSION['user_id'])){
   //echo "<META http-equiv='refresh' content='0;URL=login.php'>";
   $tmp_id = $_SESSION['tmp_id'];
   $user_id = $tmp_id;
}else{
   $user_id = $_SESSION['user_id'];
}
  
                     if($_REQUEST['orderid'] >0) { 
                     
        $queryorder = "SELECT * FROM order_data where id='".$_REQUEST['orderid']."'";
		$resultorder = $objU->getResult($queryorder); 

		 $country= "SELECT country FROM countries where id='".$resultorder[0]['billing_country'] ."'";
		$resulcountry = $objU->getResult($country); 
		 $state = "SELECT state FROM state where state_id='".$resultorder[0]['billing_state']."'";
		$resultstate = $objU->getResult($state); 
		 $city = "SELECT city FROM city where city_id='".$resultorder[0]['billing_city']."'";
		$resultcity = $objU->getResult($city); 
	

		?>
											<address>
												<?php echo $resultorder[0]['billing_fname'] ?> <?php echo $resultorder[0]['billing_lname'] ?><br>
												<?php echo $resultorder[0]['billing_address'] ?><br>
												<?php echo $resultcity[0]['city'] ?>,<?php echo $resultstate[0]['state'] ?><br>
												,<?php echo $resulcountry[0]['country'] ?><br>
												<?php echo $resultorder[0]['billing_zip'] ?>
											</address>
												<?php } ?>
               


			

		

		




