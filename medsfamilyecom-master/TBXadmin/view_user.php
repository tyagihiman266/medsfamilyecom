<?php
    require_once ("inc/main.php"); 
	$side = "building"; 
	
	$result=$user->getResult("select * from users WHERE users_id='".$_GET['id']."'");
	
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
            View User
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">View User</h3>
				  
                
                </div><!-- /.box-header -->
                <div class="box-body">
            <div class="box-header">
              <h3 class="box-title">User Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <td>Name</td>
                  <td><?php echo $result[0]['name']; ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><?php echo $result[0]['email']; ?></td>
                </tr>
                <tr>
                  <td>Mobile</td>
                  <td><?php echo $result[0]['mobile']; ?></td>
                </tr>
				<tr>
                  <td>Join Date</td>
                  <td><?php echo explode(" ",$result[0]['joining_date'])[0]; ?></td>
                </tr>
				<tr>
                  <td>Status</td>
                  <td><?php echo $user->getStatus($result[0]['status']); ?></td>
                </tr>
              </tbody></table>
            
            <!-- /.box-body -->
          </div>

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

		});
	</script>
  </body>
</html>
