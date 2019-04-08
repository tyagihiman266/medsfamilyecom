<section class="header-top-main">
	<?php 
$pagetitle="Drug prescription| Medfamily
";
$keyword="Drug prescription, prescription drugs";
$description="Get the facts about how prescription drugs affects the brain and body.";
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
			</div>
			<div class="col-md-9 about-top">
			<h3>Prescription Drugs  <span></span></h3>	
		<div class="about-containt">
				
		<p>Buying pharmaceuticals on-line is straightforward with medsfamily. All you wish to try and do is look for the whole or generic medication victimisation the boxes on top of and choose your medication and checkout. lay aside to eightieth compared native U.S. pharmacies and additionally profit of our worth match guarantee. Purchasing Canadian pharmaceuticals couldn't be any easier and you'll be able to rest assured your order are safe with our 128-Bit SSL encrypted association. this implies each dealing is 100 percent secure. Medsfamily is additionally a commissioned Pharmacy that's commissioned by the Canadian International Pharmacy Association. In addition to the already massive savings offered by medsfamily from time to time we provide discount codes that may be used at checkout to save lots of even additional.</p>	
				
				
			</div>	
			</div>
		</div>
	</div>
</section>


	
<?php include "include/footer.php" ?>
