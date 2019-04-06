<section class="header-top-main">
	<?php 
$pagetitle="FAQ- Medsfamily";
$keyword="All medicin available, information about medicine online";
$description="read faq information about medicine order | medsfamily";
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
			<h3>Faqs  <span></span></h3>	
		<div class="about-containt">
				
	 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      WHAT ARE YOUR HOURS OF OPERATION?
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                 <p>
                      For your convenience, patient care specialists are available to serve you 7 days a week, 8:00am - Midnight (EST) via telephone or you can place your entire order online.</p>
                  
                </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      IS A PRESCRIPTION REQUIRED?
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                   <p>Yes, just like your local pharmacy, we require a valid prescription for your medications; it is required for all prescription medications. For your valid prescription to be accepted, it must be from a physician licensed to practice in your area of residence. Please email it to us at prescriptions@medsfamily.com. We also require you to mail us your original prescription.</p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      IS THERE A LIMIT ON HOW MUCH I CAN PURCHASE?
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <p>Yes. You can only purchase a maximum of a 3 month supply of each of your medications, provided that you have a valid prescription for the supply of that medication. If your physician writes a prescription for more than a 3 month supply, we can refill your medication as they come due.</p>
                  </div>
                </div>
              </div>
                <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingfive">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                      HOW LONG WILL IT TAKE FOR MY ORDER TO ARRIVE?
                    </a>
                  </h4>
                </div>
                <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                  <div class="panel-body">
					  <p>Prescription orders will be shipped within 5 business days of receiving your valid prescription. Once shipped, it will take approximately 10-20 business days for delivery. We do not ship using couriers and we recommend that you order your medications well in advance. OTC drug orders are shipped within 2 business days.</p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingsix">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                    WHAT IF I FIND A LOWER PRICE WITH ANOTHER PHARMACY?
                    </a>
                  </h4>
                </div>
                <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
                  <div class="panel-body">
					  <p>We guarantee the lowest price on all of our prescription products. If you find your medications cheaper at any other recognized licensed mail order pharmacy, we will price match their price. Please see our Customer Care Policy for details.</p>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading7">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                      WHAT IF I NEED TO RETURN MY ORDER?
                    </a>
                  </h4>
                </div>
                <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                  <div class="panel-body">
					  <p>We stand behind our products and service and will ensure that our customers are fully satisfied with their purchase. If you have a concern about your product, simply call us within 30 days of receiving your package and tell us why you are not fully satisfied with your purchase. If we are unable to make it right, we will explain our refund procedure to you.</p>
                  </div>
                </div>
              </div>
  
              
              
              
              
              
            </div>
			</div>	
			</div>
		</div>
	</div>
</section>


	
<?php include "include/footer.php" ?>
