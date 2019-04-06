<section class="header-top-main">
	<?php 
$pagetitle="How to order medicine from online | medsfamily";
$keyword="All medicin available, guide for online medicine order, guide for medicine online via phone";
$description="Read step by step information for ordering medicine online and phone ";
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
			<h3>How to Order  <span></span></h3>	
		<div class="about-containt">
				
			
			<h4>How to Order Online:-</h4>
		<p>1.Browse our prescription, non-prescription or pet products and add items to your shopping cart</p>
			<p>2.When you checkout you will be asked to create an account or sign into your existing account.</p>
			<p>3.Finalize your shopping by selecting shipping options and entering a coupon code if you have any.</p>
			
			<p>4.Please mail your original prescription(s) to us:

prescription@medsfamily.com
</p>
			
<p>5.Delivery A customer service rep will call you in the following days to collect payment
			</p>
			<br/>
		
			
			
			
			<h4>How to Order By Phone:-</h4>
			<p>1.Browse our prescription, non-prescription or pet products to find the product you are looking for.
</p>
			<p>2.Call our Patient Care Service Center by phone between 8:00am – Midnight, 7 days a week at 1-800-891-0844 (toll free)
</p>
			<p>3.Our customer service rep will take your order and collect payment
</p>	
			
			<p>5.Please mail your original prescription(s) to us:

prescription@medsfamily.com

</p>
			<p>6.Delivery


</p>
			
				
			</div>	
			</div>
		</div>
	</div>
</section>


	
<?php include "include/footer.php" ?>
