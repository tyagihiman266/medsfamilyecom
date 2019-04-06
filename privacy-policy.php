<section class="header-top-main">
	<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";

if($_REQUEST['submitlogin']=='yes') 
                   {

                   $email = $_POST['username'] ;   
                   $password = base64_encode($_POST['password']); 


                   $query = "SELECT * FROM user_data where password ='".$password."' and  email ='".$email."' ";
                   $row = $objU->getResult($query);
                   $num_rows = count($row);

                   $status = $row[0]['status'];
                   $_SESSION['fname'] = $row[0]['fname'];
                    $_SESSION['lname'] = $row[0]['lname'];
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_id'] = $row[0]['id'];
                     echo "<META http-equiv='refresh' content='0;URL=my-account'>";

                   
                    if($num_rows == 0){
                         $_SESSION['sess_msg_login']='Invalid email ID or password';  
                   
                    }elseif($status == 0){
                         $_SESSION['sess_msg_login']='Your account is not activated yet please cehck your mail.';  
                
                    }elseif($status == 3){
                         $_SESSION['sess_msg_login']='Your account is block. Please connect to service provider.';  
                   
                    }
                    }
                   
?>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row main-abt">
			<div class="col-md-3 main-abt-lft">
			<img src="images/lf-banner.jpg" class="img-fluid">	
			<img src="images/lf-banner1.jpg" class="img-fluid">	
			<img src="images/lf-banner.jpg" class="img-fluid">	
			</div>
			<div class="col-md-9 about-top">
			<h3>Privacy Policy <span></span></h3>	
		<div class="about-containt">
				
		<p>

Medsfamily.com handles all personal information in accordance with the terms set out in the Personal Information Protection and Electronic Documents Act of Canada.


The principles governing the manner in which medsfamily.com collects, uses, stores and discloses your personal information are as follows:



medsfamily.com is responsible for all personal information under its control. medsfamily.com has appointed a Privacy Officer to oversee its compliance with its privacy obligations and to answer questions or concerns with respect to medsfamily.com's privacy practices. 

All medsfamily.com staff have been trained with respect to our privacy obligations.



We collect the following personal information from you:
Contact Information such as name, email address, mailing address, phone number
Unique Identifiers such as user name, password
medsfamily.com collects, uses and discloses your personal information solely for the following purposes, namely:

to administer your request for health care services or products and to provide such products or services;
to communicate with you concerning the health care services or products that you have requested;
to communicate your personal information to associated health care professionals, including your Canadian physician, pharmacists and other health care professionals, in order to facilitate your request for health care services or products as more specifically set out in your Customer Agreement;
to follow-up with you and provide you with information from time to time concerning medsfamily.com products and services.
Please note that medsfamily.com will on occasion contract with certain third party suppliers or service providers, including licensed pharmacies in other countries for prescription fulfillment services as well as other specialized services. medsfamily.com may release your personal information to such third party contractors solely in order to fulfill your request for services or products. medsfamily.com will use contractual means to bind such third party contractors to its privacy obligations.

 


</p>	
				
				
			</div>	
			</div>
		</div>
	</div>
</section>


	
<?php include "include/footer.php" ?>
