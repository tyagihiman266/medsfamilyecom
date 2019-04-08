<?php
    @session_start();
require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';

	$side = "customer";
	 $objT = new User();
	 ?>
   <?php
	 
	 if(isset($_REQUEST['edit']))
     { 
    $id=$_REQUEST['edit'];
     $row1 = $objT->getResultById('user_data',$id);
	 $addressbook_id = $row1['addressbook_id'];
	$rowAD = $objT->getResultById('addressbook_data',$addressbook_id); 
     }
	 
	 if(isset($_POST['submit']))
	 {
    $colArray = array(
	'user_name'      =>  $_POST['user_name'],
	'user_password'  =>  $_POST['user_password'],
	'email'          =>  $_POST['email'],
	'name'           =>  $_POST['name'],
	'surname'        =>  $_POST['surname'],
	'gender'         =>  $_POST['gender'],
	'dob'            =>  $_POST['dob'],
	'marital_status' =>  $_POST['marital_status'],
	'about_me'       =>  $_POST['about_me'],
	'company_name'   =>  $_POST['company_name'],
	'address1'       =>  $_POST['address1'],
	'address2'       =>  $_POST['address2'],
	'city'           =>  $_POST['city'],
	'state'          =>  $_POST['state'],
	'country'        =>  $_POST['country'],
	'post_code'      =>  $_POST['post_code'],
	'country_code'   =>  $_POST['country_code'],
	'mobile'         =>  $_POST['mobile'],
	'status'         =>  $_POST['status']);
	
	     
    $query = $objT->insertQuery($colArray,'user_data');
    
    if($query)
    {  			 
       $sms="<p style='text-align:center;color:green;'>Customer Added Successfully.</p>";
      header("refresh:2;url=manage_customer.php");   
     
    }
    else
    {
        $sms="Customer is Allready Existing";
    }
		 
	 }
elseif(isset($_POST['Update']))
{   
  $colArray = array(

'user_name'        =>  $_POST['user_name'],
  'user_password'  =>  $_POST['user_password'],
  'email'          =>  $_POST['email'],
  'name'           =>  $_POST['name'],
  'surname'        =>  $_POST['surname'],
  'gender'         =>  $_POST['gender'],
  'dob'            =>  $_POST['dob'],
  'marital_status' =>  $_POST['marital_status'],
  'about_me'       =>  $_POST['about_me'],
  'company_name'   =>  $_POST['company_name'],
  'address1'       =>  $_POST['address1'],
  'address2'       =>  $_POST['address2'],
  'city'           =>  $_POST['city'],
  'state'          =>  $_POST['state'],
  'country'        =>  $_POST['country'],
  'post_code'      =>  $_POST['post_code'],
  'country_code'   =>  $_POST['country_code'],
  'mobile'         =>  $_POST['mobile'],
  'status'         =>  $_POST['status']);
	
		
     $query1 = $objT->updateQuery($colArray,'user_data',$id);
		
	 if($query1)
	{
		$sms = "<p style='text-align:center;color:green;'>Customer details updated successfully</p>"; 
		header("refresh:2;url=manage_customer.php");   
	
	}

	
	
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Manage Customer</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	 <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	
	<script language="javascript" type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
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
            Add Customer
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Customer Details</h3>
				  <?php if(isset($sms)){
					  echo $sms;
				  } ?>
                
                </div><!-- /.box-header -->
                <div class="box-body">
				
                   <form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data" >
					 <input type="hidden" name="id" value="<?php echo (isset($_REQUEST['edit'])?$row1['id']:"");?>" class="form-control"  />
					<div class="col-xs-6">
					<div class="form-group">
                      <label>User Name</label>
                      <input type="text" name="user_name" value="<?php echo (isset($_REQUEST['edit'])?$row1['user_name']:"");?>" class="form-control" placeholder="User Name..." />
					  <input type="hidden" name="id" value="<?php echo (isset($_REQUEST['edit'])?$row1['id']:"");?>" class="form-control"  />
					
                    </div>
					</div>
					
					<div class="col-xs-6">
					<div class="form-group">
                      <label>User Password</label>
                      <input type="text" name="user_password" value="<?php echo (isset($_REQUEST['edit'])?$row1['user_password']:"");?>" class="form-control" placeholder="User Password..." />
					
                    </div>
					</div> 
					
					<div class="col-xs-6">
					<div class="form-group">
                      <label>Customer Name</label>
                      <input type="text" readonly value="<?php echo (isset($_REQUEST['edit'])?$rowAD['title']." ".$rowAD['fname']." ".$rowAD['lname']:"");?>" name="name" class="form-control" placeholder="customer Name..." />
                    </div>
					</div>	
					
					
						
					<div class="col-xs-6">
					<div class="form-group">
                      <label>Customer Email id</label>
                      <input type="text" readonly name="email" value="<?php echo (isset($_REQUEST['edit'])?$row1['email']:"");?>" class="form-control" placeholder="Customer Email id..." />
					 
                    </div>
					</div>
					
					
					
					<div class="col-xs-6">
					<div class="form-group">
					 <label>Gender</label>
					 <select readonly name="gender" id="gender" class="form-control"  >
        		<option <?php if($rowAD['gender'] == 'male' ){ echo "selected" ;}  ?> value="male">Male</option>
        		<option <?php if($rowAD['gender'] == 'female' ){ echo "selected" ;}  ?> value="female">Female	</option>
        		<option <?php if($rowAD['gender'] == 'Androgyne' ){ echo "selected" ;}  ?> value="Androgyne">Androgyne	</option>
        		<option <?php if($rowAD['gender'] == 'Transgender' ){ echo "selected" ;}  ?> value="Transgender">Transgender	</option>
        		</select>
								  
                      
                    </div>
					</div>	
					
					
					
					
						<div class="col-xs-6">
					<div class="form-group">
                      <label>Company Name</label>
                   <input type="text" readonly name="company_name" value="<?php echo (isset($_REQUEST['edit'])?$rowAD['company']:"");?>" class="form-control" placeholder="Company Name..." />
                    </div>
                    </div>
					
						
					<div class="col-xs-6">
					<div class="form-group">
                      <label>User Password</label>
                      <input type="password" readonly name="user_password" value="<?php echo (isset($_REQUEST['edit'])?$row1['password']:"");?>" class="form-control" placeholder="User Password..." />
					
                    </div>
					</div>
					
					<div class="col-xs-6">
					<div class="form-group">
                      <label>Mobile No</label>
				<div class="input-group1">
               <div class="col-xs-3">
				<input type="text" readonly name="country_code" value="<?php echo (isset($_REQUEST['edit'])?$rowAD['country_code']:"");?>" class="form-control" placeholder="Country Code..." />
				</div>
				<div class="col-xs-9">
                <input type="text" readonly name="mobile" value="<?php echo (isset($_REQUEST['edit'])?$rowAD['mobile']:"");?>" class="form-control" placeholder="Mobile No..." />
              
                      </div> 
					 </div>
                    </div>
					</div>
					
				</div>
					
					<div class="box box-info">
				<div class="box-header with-border">
              <h3 class="box-title">Address Info</h3>
            </div>
				
					<div class="col-xs-6">
					<div class="form-group">
                      <label>Address</label>
                      <input readonly type="text" value="<?php echo (isset($_REQUEST['edit'])?$rowAD['address1']:"");?>" name="address1" class="form-control" placeholder="Address1..." />
                    </div>
					</div>	
					
						
					<div class="col-xs-6">
					<div class="form-group">
                      <label>Address2</label>
                      <input type="text" name="address2" value="<?php echo (isset($_REQUEST['edit'])?$rowAD['address2']:"");?>" class="form-control" placeholder="Address1..." />
					 
                    </div>
					</div> 
					
					<div class="col-xs-6">
					<div class="form-group">
                      <label>City</label>
                      <input  readonly type="text" value="<?php echo (isset($_REQUEST['edit'])?$rowAD['city']:"");?>" name="city" class="form-control" placeholder="City URL..." />
                    </div>
					</div>	
					
						
					<div class="col-xs-6">
					<div class="form-group">
                      <label>State</label>
                      <input  readonly type="text" name="state" value="<?php echo (isset($_REQUEST['edit'])?$rowAD['state']:"");?>" class="form-control" placeholder="State Name..." />
					
                    </div>
					</div>
					
					<div class="col-xs-6">
					<div class="form-group">
                      <label>Country</label>
                      <input readonly type="text" value="<?php echo (isset($_REQUEST['edit'])?$rowAD['country']:"");?>" name="country" class="form-control" placeholder="Country..." />
                    </div>
					</div>

					<div class="col-xs-6">
					<div class="form-group">
                      <label>Post Code</label>
                      <input readonly type="tel" value="<?php echo (isset($_REQUEST['edit'])?$rowAD['post_code']:"");?>" name="post_code" class="form-control" placeholder="Post Code..." />
                    </div>
					</div>
					
						
					
					
					<div class="form-group">
                    <label></label>
                    <select name="status" class="form-control select2">
                      <option>Select Status</option>
                      <option  value="1" <?php echo (isset($_REQUEST['edit']) && $row1['status'] == '1' ? "selected" : "") ?>>Active</option>
                      <option value="0" <?php echo (isset($_REQUEST['edit']) && $row1['status'] == '0' ? "selected" : "") ?> >DeActive</option>
                      <option value="2" <?php echo (isset($_REQUEST['edit']) && $row1['status'] == '2' ? "selected" : "") ?> >Blacklist</option>
                     
                    </select>
                  </div>
				   <div style="margen-left:140px;">
                         <?php if(!isset($_REQUEST['edit'])) {?>
                                                        <input type="submit" class="btn btn-success" name="submit" id="submit" value="Save">
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'partcategory.php'"> 
                                                        <?php  }  else {?>             
                                                        <input type="submit" class="btn btn-success" name="Update" id="Update" value="Update">
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'partcategory.php'"> 
                                                        <?php  } ?>   
                      </div>
        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include"inc/footer.php"; ?>

      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
	<script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- page script -->

	<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>

    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
	 <script type="text/javascript">
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                  },
                  startDate: moment().subtract(29, 'days'),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	<script type="text/javascript">

var editor = CKEDITOR.replace( 'articles', {

    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

});
CKFinder.setupCKEditor( editor, '../' );
</script>
  </body>
</html>
