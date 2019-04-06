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
			<div class="col-md-12 login-padding">
				<h3 class="login-sec-top">Customer Login</h3>
				<div class="login-warp clearfix">
					<div class="col-md-6 login-sec">
						<h3>Registered Customers</h3>
						<p>If you have an account sign in with your email address</p>
						<form action="" method="POST" role="form" class="custom-form">
							<div class="form-group">
								<label for="">Email <span class="color-red">*</span></label>
								<input type="text" class="form-control" id="" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="">Password <span class="color-red">*</span></label>
								<input type="password" class="form-control" id="" placeholder="" required>
							</div>
							<button type="submit" class="sign-in">sign in</button>
							<button type="submit" class="forget-password">forget your password?</button>
							<p class="requre-f">*requred fields</p>
						</form>
					</div>
					<div class="col-md-6 create-acc-sec">
						<h3>New Customers</h3>
						<p>Creating an account has many benefits check out faster, keep more than one address,trak address and more. </p>
						<a href="register.php" class="create-account">Create an account</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "include/footer.php" ?>
