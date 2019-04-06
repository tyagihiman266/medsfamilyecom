<?php
    ob_start();
    @session_start();
	error_reporting(0);
   require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';
	$side = "edit_profile"; 
	$objT = new User();
	
	$result=$objT->getResult("select * from admin WHERE admin_id='".$adminid."'");

	if(isset($_POST['submit'])){
		$colArray = array (
			'name'   => $_POST['name'], 
			'email'  => $_POST['email'],
			'mobile' => $_POST['mobile'],
			'updttm' => date("Y-m-d H:i:s"),
			'gender' => $_POST['gender']
			);
		$query1 = $objT->updateQuery1($colArray,'admin',$adminid);
	if($query1){
			
			header("refresh:2;url=dashboard");  
		}
	}
	
	include 'inc/head.php';
?>

  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include"inc/header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include"inc/side-bar.php";?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Profile
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
     
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Profile</h3>
				  <?php if(isset($_SESSION['sms'])){
					  echo $_SESSION['sms'];
					  unset($_SESSION['sms']);
				  } ?>
                
                </div><!-- /.box-header -->
                <div class="box-body">
				
        <form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data" >
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" required id="name" class="form-control" placeholder="Name..." value="<?php echo $result[0]['name']; ?>" />
                    </div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" required id="email" class="form-control" placeholder="Email..." value="<?php echo $result[0]['email']; ?>" />
						
                    </div>
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" name="mobile" required id="mobile" class="form-control" maxlength="10" placeholder="Mobile Number..." value="<?php echo $result[0]['mobile']; ?>" />
						
                    </div>
					<div class="form-group">
						<label>Gender</label><br>
						<input type="radio" id="Male" required name="gender" value="Male" <?php echo ($result[0]['gender']=="Male")?'checked':''; ?>> Male
						<input type="radio" id="Female" required  name="gender" value="Female" <?php echo ($result[0]['gender']=="Female")?'checked':''; ?>> Female
                    </div>
					<!--<div class="form-group">
						<span id="photo" >
						<label>Choose Profile Photo</label><br>
						<input type="file" name="photo" id="photo_file"  onchange="return validateFileExtension1(this)">
						</span>
                    </div>
					<div class="form-group">
						<span id="photo" >
						<label>Choose Website Logo</label><br>
						<input type="file" name="logo" id="logo_file"  onchange="return validateFileExtension1(this)">
						</span>
                    </div>-->
				
				    <div style="margen-left:140px;">
                      <input type="submit" class="btn btn-success" name="submit" id="submit" value="Update"> 
                      <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'dashboard'"> 
                                                         
                    </div>
        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include"inc/footer.php"; ?>
    <!-- page script -->
<style>
	.required{
		color:red;
	}
</style>
	
	<script>
	function validateFileExtension1(fld) {
			if(!/(\.PNG|\.JPG|\.JPEG|\.BMP)$/i.test(fld.value)) {
				alert("Invalid Image file type.");
				$("#photo_file").val("");
				fld.focus();        
				return false;   
			}   
			return true; 
		}
		$(document).ready(function(){
			/* $('#submit').click(function(){
				if($.trim($("#name").val())=="")
					{
						$("#error_name").html("Required This Field");
						$("#name").focus();
						return false;
					}
					$('#error_name').html("");
			}); */
		});
	</script>
  </body>
</html>
