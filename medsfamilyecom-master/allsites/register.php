<section class="header-top-main">
<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php"
?>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12 login-padding regis-sec">
				<h3 class="login-sec-top">Create New Customer Account</h3>
				<div class="login-warp clearfix">
					<div class="col-md-6 login-sec">
						<h3>Personal Information</h3>
						<form action="" method="POST" role="form" class="custom-form">
							<div class="form-group">
								<label for="">First Name <span class="color-red">*</span></label>
								<input type="text" class="form-control" id="" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="">Last Name <span class="color-red">*</span></label>
								<input type="text" class="form-control" id="" placeholder="" required>
							</div>
						
						</form>
					</div>
					<div class="col-md-6 create-acc-sec">
						<h3>Sign- in Information</h3>
					<form action="" method="POST" role="form" class="custom-form">
							<div class="form-group">
								<label for="">Email <span class="color-red">*</span></label>
								<input type="text" class="form-control" id="" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="">Password <span class="color-red">*</span></label>
								<input type="password" class="form-control" id="" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="">Confirm Password <span class="color-red">*</span></label>
								<input type="password" class="form-control" id="" placeholder="" required>
							</div>
						
						</form>
						
					</div>
					<div class="col-md-12 create-m-b">
					<a href="#" class="create-account">Create an account</a>	
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>













































<?php include "include/footer.php" ?>