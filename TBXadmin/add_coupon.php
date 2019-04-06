<?php
    @session_start();
  require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';

	$side = "coupon";
	$p1side ='sales';
	 $objT = new User();
	 ?>
   <?php
	 
	 if(isset($_REQUEST['edit']))
     { 
    $id=$_REQUEST['edit'];

    $row1 = $objT->getResultById('coupon_data',$id);

     }
	 
	 if(isset($_POST['submit']))
	 {
   
    $colArray = array(
	'coupon_code'     =>  $_POST['coupon_code'],
	'discount_type'   =>  $_POST['discount_type'],
	'discount_amount' =>  $_POST['discount_amount'],
	'free_shipping'   =>  $_POST['free_shipping'],
	'coupon_limit'    =>  $_POST['coupon_limit'],
	'user_limit'      =>  $_POST['user_limit'],
	'min_amount'      =>  $_POST['min_amount'],
	'max_amount'      =>  $_POST['max_amount'],
	'expiry_date'     =>  $_POST['expiry_date'],
	'coupon_caping'   =>  $_POST['coupon_caping'],
	'status'          =>  $_POST['status'] );
	


    $query = $objT->insertQuery($colArray,'coupon_data');

    
    if($query)
    {  
       $sms="<p style='text-align:center;color:green;'>Coupon Added Successfully.</p>";
       header("refresh:2;url=manage_coupon");   
     
    }
    else
    {
        $sms="Product Tax Allready Existing";
    }
		 
	 }
elseif(isset($_POST['Update']))
{ 
    $colArray = array( 
  'coupon_code'     =>  $_POST['coupon_code'],
  'discount_type'   =>  $_POST['discount_type'],
  'discount_amount' =>  $_POST['discount_amount'],
  'free_shipping'   =>  $_POST['free_shipping'],
  'coupon_limit'    =>  $_POST['coupon_limit'],
  'user_limit'      =>  $_POST['user_limit'],
  'min_amount'      =>  $_POST['min_amount'],
  'max_amount'      =>  $_POST['max_amount'],
  'expiry_date'     =>  $_POST['expiry_date'],
  'coupon_caping'   =>  $_POST['coupon_caping'],
  'status'          =>  $_POST['status'] );
	
	
	 $query1 = $objT->updateQuery($colArray,'coupon_data',$id);

   if($query1)
	{
		$sms = "<p style='text-align:center;color:green;'>Coupon updated successfully</p>"; 
		header("refresh:2;url=manage_coupon");   
	
	}

	 
	
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Coupon</title>
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
            Add Coupon
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Coupon</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Coupon</h3>
				  <?php if(isset($sms)){
					  echo $sms;
				  } ?>
                
                </div><!-- /.box-header -->
                <div class="box-body">
				<form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data" >
				
					<div class="form-group">
                      <label>Coupon Code</label>
                      <input  type="text"  value="<?php echo (isset($_REQUEST['edit'])?$row1['coupon_code']:"");?>" name="coupon_code" class="form-control" placeholder="Coupon Code ..." />
                    </div>
					
          <div class="form-group">
                      <label>Discount Type</label>
					  <select name="discount_type" class="form-control">
					  <option <?php echo (isset($_REQUEST['edit']) && $row1['discount_type'] == 'fixed_cart' ? "selected" : "") ?> value="fixed_cart">Cart Discount</option>
					  <option <?php echo (isset($_REQUEST['edit']) && $row1['discount_type'] == 'percent_cart' ? "selected" : "") ?> value="percent_cart">Cart % Discount</option>
					  <option <?php echo (isset($_REQUEST['edit']) && $row1['discount_type'] == 'fixed_product' ? "selected" : "") ?> value="fixed_product">Product Discount</option>
					  <option <?php echo (isset($_REQUEST['edit']) && $row1['discount_type'] == 'percent_product' ? "selected" : "") ?> value="percent_product">Product % Discount</option>
					  </select>
					 
                    </div>
					
					
					<div class="form-group">
                      <label>Coupon Amount</label>
                      <input  type="number" step="any"  value="<?php echo (isset($_REQUEST['edit'])?$row1['discount_amount']:"");?>" name="discount_amount" class="form-control" placeholder="Coupon amount ..." />
                    </div>
					
					<div class=" col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input <?php echo (isset($_REQUEST['edit']) && $row1['free_shipping'] == 'yes' ? "checked" : "") ?> name="free_shipping" value="yes" type="checkbox"> Allow free shipping
                      </label>
                    </div>
                  </div>
									
					
							
					<div class="form-group">
                      <label>Usage limit per coupon</label>
                      <input  type="number" step="any"  value="<?php echo (isset($_REQUEST['edit'])?$row1['coupon_limit']:"");?>" name="coupon_limit" min="1" class="form-control" placeholder="Usage limit per coupon..." />
                    </div>
						
						<div class="form-group">
                      <label>Usage limit per user</label>
                      <input  type="number" step="any"  value="<?php echo (isset($_REQUEST['edit'])?$row1['user_limit']:"");?>" name="user_limit" min="1" class="form-control" placeholder="Usage limit per user..." />
                    </div>
				
			
					
					<div class="form-group">
                      <label>Minimum amount</label>
                      <input  type="number" step="any"  value="<?php echo (isset($_REQUEST['edit'])?$row1['min_amount']:"");?>" name="min_amount" min="1" class="form-control" placeholder="Minimum amount..." />
                    </div>
					
					<div class="form-group">
                      <label>Maximum amount</label>
                      <input  type="number" step="any"  value="<?php echo (isset($_REQUEST['edit'])?$row1['max_amount']:"");?>" name="max_amount" min="1" class="form-control" placeholder="Maximum amount..." />
                    </div>
					
					<div class="form-group">
                      <label>Expiry Date </label>
                      <input  type="date" id="expiry_date"  value="<?php echo (isset($_REQUEST['edit'])?$row1['expiry_date']:"");?>" name="expiry_date" class="form-control" placeholder="Expiry Date..." />
                    </div>
					
					
					
					<div class="form-group">
                      <label>Coupon Capping</label>

                      <input  type="number" step="any"  value="<?php echo (isset($_REQUEST['edit'])?$row1['coupon_caping']:"");?>" name="coupon_caping" class="form-control" placeholder="Coupon Capping..." />
                    </div> 
				
					
					<div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control select2">
                      <option>Select Status</option>
                      <option  value="1" <?php echo (isset($_REQUEST['edit']) && $row1['status'] == '1' ? "selected" : "") ?>>Active</option>
                      <option value="0" <?php echo (isset($_REQUEST['edit']) && $row1['status'] == '0' ? "selected" : "") ?> >DeActive</option>
                     
                    </select>
                  </div>
				  
				   <div style="margen-left:140px;">
                         <?php if(!isset($_REQUEST['edit'])) {?>
                                                        <input type="submit" class="btn btn-success" name="submit" id="submit" value="Save">
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'manage_coupon'"> 
                                                        <?php  }  else {?>             
                                                        <input type="submit" class="btn btn-success" name="Update" id="Update" value="Update">
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'manage_coupon'"> 
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
