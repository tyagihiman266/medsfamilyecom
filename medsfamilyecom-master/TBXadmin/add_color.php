<?php
 ob_start();
    @session_start();
  //error_reporting(0);
   require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';
	$side = "filter";
	 $objT = new User();
	 ?><?php
	 
	 if(isset($_REQUEST['edit']))
     { 
    $id=$_REQUEST['edit'];
    $row1 = $objT->getResultById('color_data',$id);
     }
	 
	 if(isset($_POST['submit']))
	 {
    $colArray = array(
	'color_name' => $_POST['color_name'],
	'color_code' => $_POST['color_code'],
	'status'     => $_POST['status'],
  'created_date' => date("Y-m-d H:i:s")
  );

	
       
     
    $query = $objT->insertQuery($colArray,'color_data');
  
    
    if($query)
    {  
		 
       $sms="<p style='text-align:center;color:green;'>Color Added Successfully.</p>";
       header("refresh:2;url=manage_color.php");   
     
    }
    else
    {
        $sms="Brand is Allready Existing";
    }
		 
	 }
elseif(isset($_POST['Update']))
{   
       $colArray = array(
  'color_name' => $_POST['color_name'],
  'color_code' => $_POST['color_code'],
  'status'     => $_POST['status']);
	
	
	
	
    $query1 = $objT->updateQuery($colArray,'color_data',$id);
	
	
	 if($query1)
	{
		$sms = "<p style='text-align:center;color:green;'>Color updated successfully</p>"; 
		header("refresh:2;url=manage_color.php");   
	
	}

	
	
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Manage Color</title>
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
            Add Color
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Color</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Color</h3>
				  <?php if(isset($sms)){
					  echo $sms;
				  } ?>
                
                </div><!-- /.box-header -->
                <div class="box-body">
				
                   <form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data" >
         <script src="js/jscolor.js"></script>
					<div class="form-group">
                      <label>Color Name</label>
					  <input type="text" class="form-control" name='color_name'  value="<?php echo (isset($_REQUEST['edit'])?$row1['color_name']:"");?>">
                      
					  <input type="hidden" name="id" value="<?php echo (isset($_REQUEST['edit'])?$row1['id']:"");?>" class="form-control"  />
                    </div>
					
					
					<div class="form-group">
                      <label>Color Code</label>
					  <input type="text" class="jscolor form-control" name='color_code'  value="<?php echo (isset($_REQUEST['edit'])?$row1['color_code']:"");?>">
                      
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
