<?php
error_reporting(0);
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');






//$baseurl="http://www.tailormeup.com/demo/";

if(!isset($_SESSION['user_id'])){
  // echo "<META http-equiv='refresh' content='0;URL=login.php'>";
   $tmp_id = $_SESSION['tmp_id'];
   $user_id = $tmp_id;
}else{
   $user_id = $_SESSION['user_id'];
}
$queryuser = "SELECT * FROM user_data where id='". $_SESSION['user_id']."' ";
                        $rowuser = $objU->getResult($queryuser);


		$query = "SELECT order_no FROM order_data ORDER BY id DESC LIMIT 1";
		$result = $objU->getResult($query);
		if(count($result) >0) {
		$orderno = $result[0]['order_no'];
		$order_no = $orderno+1;
	}else {

		$order_no =1;
	}

		
				$colArray = array(
					'order_no' => $order_no,
					'user_id' => $user_id,
					'shipping_email' => $_POST['billing_email'],
					'shipping_fname' => $_POST['billing_fname'],
					'shipping_lname' =>  $_POST['billing_lname'],
					'shipping_address' => $_POST['billing_address1'],
					// 'address2' => $_POST['address2'],
					'shipping_city' => $_POST['billing_city'],
					'shipping_country' => $_POST['billing_country'],
					'shipping_state' => $_POST['billing_state'],
					'shipping_zip' => $_POST['billing_zip'],
					

					'billing_email' => $_POST['billing_email'],
					'billing_fname' => $_POST['billing_fname'],
					'billing_lname' =>  $_POST['billing_lname'],
					'billing_address' => $_POST['billing_address1'],
					'billing_address2' => $_POST['billing_address2'],
					// 'address2' => $_POST['address2'],
					'billing_city' => $_POST['billing_city'],
					'billing_mobile' => $_POST['billing_mobile'],
					'billing_country' => $_POST['billing_country'],
					'billing_state' => $_POST['billing_state'],
					'billing_zip' => $_POST['billing_zip'],
					'order_date' => $today,
					'status'=>1,
					'system_ip'=>$_SERVER['REMOTE_ADDR'],
					'payment_method'=>1
					);

  		if(isset($_SESSION['user_id'])){
		  $sessid = $_SESSION['user_id'] ;
	       }else{
		  $sessid = session_id() ;
	      }

	 
                  if(!isset($_SESSION['order_id'])) {
				$lastid = $objU->insertQuery($colArray,'order_data');
			           }
				 //echo $lastid;
				 echo $lastid;
        		
               


			

		

		

?>


