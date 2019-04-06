<?php
	session_start();
    require 'include/User.php';
    $user = new User();
	if(empty($_GET['id']) || empty($_GET['code']))
	{
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | Reset Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
<script src="//code.jquery.com/jquery-1.9.1.js"></script>

  


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><a href="http://technobrix.com/ "  target="_blank"  class="logo"><img src="../<?php echo $user->getLogo(); ?>" style="100px;width:100px;" /></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
	  <?php 
		if(isset($_GET['id']) && isset($_GET['code']))
		{
			$id = base64_decode($_GET['id']);
			$table = "admin";
			$code = $_GET['code'];
			$miscfunc = new miscfunc();
			$auth = $miscfunc->auth_key($id,$table,$code);
			if($auth){
				if(isset($_POST['reset_pass']))
				{
					$pass = $_POST['password'];
					$cpass = $_POST['c_password'];
					if($cpass!=""){
						if($cpass!==$pass)
						{
							$msg = "<div class='alert alert-danger'>
								<button class='close' data-dismiss='alert'>&times;</button>
								<strong>Sorry!</strong>  Password Doesn't match. 
								</div>";
						}
						else
					{
						$_POST['c_password'] = $user->escapeString($_POST['c_password']);
						$hash =  $user->hashSSHA($_POST['c_password']);
						$colArray['password']= $hash["encrypted"];
						$colArray['salt'] = $hash["salt"];
						$colArray['token_code']="";
						$user->updateQuery($colArray,$table,$id);
						$msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Password Reset Successfully.
						</div>";
						header("refresh:5;reset.php");
					}
				}else{
					$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  Password can't be Blank. 
					</div>";
					}
				}
		?>
        <p class="login-box-msg">Reset Your Password Here</p>
        <form id="frm123" class="form-signin" method="post" action=""><div  class="input-group"> 
			<?php
					if(isset($msg))
						{
							echo $msg;
						}
				?>
		</div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
			<span id="error_password" class="text-danger"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Confirm Password" />
			<span id="error_c_password" class="text-danger"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            
            <div class="col-xs-6">
              <input type="submit" id="submit_login" name="reset_pass" value="Reset Password" class="btn btn-primary btn-block btn-flat"/>
            </div><!-- /.col -->
			<div class="col-xs-6">
              <a href="index.php" >Login</a>
            </div>
          </div>
		  
        </form>

        <!-- /.social-auth-links -->

      <!---  <a href="#">I forgot my password</a><br> --->
       
<?php }else{?>

					<h2 class="text-danger"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a> !Auth Key Expired</h2>

				<?php	}}?>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->


    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $('#submit_login').click(function() {
		
			var formdata = $('#frm123').serialize();
			var password = $('#password').val();
			var c_password = $('#c_password').val();

			var error = 0;

			
			if (password.length < 5) {
				error = 1;
				$('#error_password').html('Please Enter min 5 char Password');
			}
			else {
				$('#error_password').html('');
			}
			if (c_password.length < 5) {
				error = 1;
				$('#error_c_password').html('Please Enter min 5 char Password');
			}
			else {
				$('#error_c_password').html('');
			}
			
			if (password!=c_password) {
				error = 1;
				$('#error_c_password').html('Password and Confirm Password Not Match');
			}
			else {
				$('#error_c_password').html('');
			}
			
			if (error == 0) {
				return true;
			}
			else 
			{
				return false;
			}
		});
	 
    </script>

  </body>
</html>
