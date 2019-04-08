<section class="header-top-main">
	<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";
//test

if($_REQUEST['submitlogin']=='yes') 
                   {

				   $email = $_POST['username'] ;  
				   $password=($_POST['password']); 
                   $password = base64_encode($password); 


                   $query = "SELECT * FROM user_data where password ='".$password."' and  email ='".$email."' ";
				   $row = $objU->getResult($query);
				   $num_rows = count($row);
					if($num_rows==1)
					{	
						//echo "yes";
						echo "<script>
						//alert('Logged In!');
						window.location.href='http://localhost:27/ecom/index';
						</script>";
						//header('Location:http://localhost:27/ecom/index');
					}
					else
					{
						// echo "No";
						echo "<script>
						alert('Your session is about to expire!');
						window.location.href('http://localhost:27/ecom/signin');
						</script>"; 
					}


                  /* $status = $row[0]['status'];
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
                   
					} */
					
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
						<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" role="form" class="custom-form">
							 <input type="hidden" name="submitlogin" value="yes">
							<div class="form-group">
								<label for="">Email <span class="color-red">*</span></label>
								<input type="text" name="username" class="form-control" id="" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="">Password <span class="color-red">*</span></label>
								<input type="password" name="password" class="form-control" id="" placeholder="" required>
							</div>
							<input type="submit" class="sign-in" value="Sign In">
							<button class="forget-password" data-toggle="modal" data-target="#main-model">forget your password?</button>
							<p class="requre-f">*required fields</p>
						</form>
					</div>
					<div class="col-md-6 create-acc-sec">
						<h3>New Customers</h3>
						<p>Creating an account has many benefits check out faster, keep more than one address,trak address and more. </p>
						<a href="signup" class="create-account">Create an account</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


	<div class="modal fade" id="main-model">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Enter email id to change the password</h4>
			</div>
			<div class="modal-body clearfix">
				
				<form id="" name="" action="" class="custom-form">
					<div class="form-group">
						<label>Email Id</label>
						<input type="email" name="email" class="form-control" required placeholder="Enter your email id">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="sign-in pull-right" id="" value="Get password">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include "include/footer.php" ?>
