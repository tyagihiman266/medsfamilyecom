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


              $uid = session_id() ;
              $objU->QueryUpdateorder("update cart set user_temp_id='".$uid."' where user_temp_id='".$uid."' ");

                   $status = $row[0]['status'];
                   $_SESSION['fname'] = $row[0]['fname'];
                    $_SESSION['lname'] = $row[0]['lname'];
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_id'] = $row[0]['id'];






                     echo "<META http-equiv='refresh' content='0;URL=checkout'>";

                   
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
		<div class="row">
			<div class="col-md-12 login-padding">
				<h3 class="login-sec-top">Customer Login</h3>
				<div class="login-warp clearfix">
					<div class="col-md-6 login-sec">
						<h3>Registered Customers</h3>
						<?php echo $_SESSION['sess_msg_login']; ?>
						<p>If you have an account sign in with your email address</p>
						<form action="" method="POST" role="form" class="custom-form">
							 <input type="hidden" name="submitlogin" value="yes">
							<div class="form-group">
								<label for="">Email <span class="color-red">*</span></label>
								<input type="text" name="username" class="form-control" id="" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="">Password <span class="color-red">*</span></label>
								<input type="password" name="password" class="form-control" id="" placeholder="" required>
							</div>
							<button type="submit" class="sign-in">sign in</button>
							<button type="submit" class="forget-password">forget your password?</button>
							<p class="requre-f">*requred fields</p>
						</form>
					</div>
					<div class="col-md-6 create-acc-sec">
						<h3>New Customers</h3>
						<p>Creating an account has many benefits check out faster, keep more than one address,trak address and more. </p>
						<a href="signupcheckout" class="create-account">Create an account</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "include/footer.php" ?>
