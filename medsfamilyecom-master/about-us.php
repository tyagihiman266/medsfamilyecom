<section class="header-top-main">
	<?php 
$pagetitle="Online Medicine Store: Buy Medicines Online from world's Trusted Pharmacy | Medfamily
";
$keyword="world's best online pharmacy, medsfamily, medicine store online";
$description="world's best online pharmacy with a wide range of prescription and OTC medicines. Purchase online medicines and drugs at medfamily's medicine store online, with free home delivery of medicines.
";
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
			<h3>About Us <span></span></h3>	
		<div class="about-containt">
				
		<p>At Medsfamily, we tend to perceive the importance of getting access to convenient, reasonable medications., serving to you get the medications you trust with most convenience. Medsfamily has been the trustworthy on-line supply of medicines to our customers round the world for a decade. Our friendly and knowledgeable employees, primarily based create it their priority to confirm your medications, from eye care product to force per unit area medicine, square measure like an expert delivered to your door. we tend to supply our medications from a worldwide list of fulfillment centers, that allows U.S. to produce a good choice of product at the simplest potential costs. after you order product through our web site, you’ll love the mixture of convenience and quality we provide.Whether you're trying to find a brand or generic, we are able to assist you realize a product to fit your desires. we discover the simplest deals on sure brands from a variety of suppliers, and pass our savings on to you. From generic anit-impotence drug to contraception pills and a lot of, you’ll see that medsfamily is that the right selection for your pocketbook.</p>	
				
				
			</div>	
			</div>
		</div>
	</div>
</section>


	
<?php include "include/footer.php" ?>
