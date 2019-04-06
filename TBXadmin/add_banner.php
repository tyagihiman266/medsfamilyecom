<?php
	ob_start();
    @session_start();
	//error_reporting(0);
   require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';
	$side = "banner";
   $objT = new User();
?>
<?php
	
	if(isset($_GET['add']))
	{
		$add = $_GET['add'];
	}else 
	{
		$add = "";
	}
	 if(isset($_GET['edit']))
     { 
     $id=$_GET['edit'];
	 $rows=$objT->getResultById('banner',$id);	
	 }	             
 ?><?php 
 
 if(isset($_POST['submit']))
	 { 
    $path = "../upload/banner/" ;
    $imageName = $_POST['heading'].'-'.$_FILES['pic']['name'] ;

    $colArray = array(
	'description'  => $_POST['desc'],
	'page_id'      => $_POST['page_id'],
	'heading'      => preg_replace('#()*!~-=+|\/[^0-9a-z%]+#i', '-', $_POST['heading']),
	'status'       => $_POST['status'],
	'image'         => $imageName,
  'created_date' => date("Y-m-d H:i:s")
  );
   
  move_uploaded_file($_FILES['pic']['tmp_name'], $path.$imageName);
  
    $query = $objT->insertQuery($colArray,'banner');
   
    
    if($query)
    {  
       $sms="<p style='text-align:center;color:green;'>Banner Added Successfully.</p>";
        header("refresh:2;url=manage_banner.php?add=".$add);   
     
    }
    else
    {
        $sms="This Banner is Allready Existing";
    }
		 
	 }
	  elseif(isset($_POST['Update']))
	 {
     if($_FILES['pic']['name']!='') {

       $rowsban=$objT->getResultById('banner',$id);
       if(file_exists('../upload/banner/'.$rowsban['image'])) {
        unlink('../upload/banner/'.$rowsban['image']);
        }

      $filename=time().$_FILES['pic']['name'];

    $colArray = array(
	 'description'  => $_POST['desc'],
  'page_id'      => $_POST['page_id'],
  'heading'      => preg_replace('#()*!~-=+|\/[^0-9a-z%]+#i', '-', $_POST['heading']),
  'status'       => $_POST['status'],
  'image'         => $filename
    );

     } else {

        $colArray = array(
   'description'  => $_POST['desc'],
  'page_id'      => $_POST['page_id'],
  'heading'      => preg_replace('#()*!~-=+|\/[^0-9a-z%]+#i', '-', $_POST['heading']),
  'status'       => $_POST['status']
      );
      }
      if($_FILES['pic']['name']!='') {
	
	move_uploaded_file($_FILES['pic']['tmp_name'],"upload/banner/".$_POST['heading'].'-'.$_FILES['pic']['name']);
         }

   $query1 = $objT->updateQuery($colArray,'banner',$id);
    if($query1)
  {
    $sms = "<p style='text-align:center;color:green;'>Customer details updated successfully</p>"; 
     header("refresh:2;url=manage_banner.php?add=".$add);  
  
  }
	 
	 }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Banner</title>
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
            Add Banner
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Banner</h3><?php if(isset($sms)){
					  echo $sms;
				  } ?>
                
                </div><!-- /.box-header -->
                <div class="box-body">
				
                  <form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data" >
         
					<div class="form-group">
                      <label>Heading</label>
                      <input type="text" name="heading" value="<?php echo (isset($_REQUEST['edit'])?$rows['heading']:"");?>"class="form-control" placeholder="Heading" />
					   <input type="hidden" name="id" value="<?php echo (isset($_REQUEST['edit'])?$rows['id']:"");?>"class="form-control" placeholder="Heading" />
					   <input type="hidden" name="page_id" value="<?php echo (isset($_REQUEST['edit'])?$rows['page_id']:$add);?>"class="form-control" placeholder="Heading" />
					 
                    </div>
					
					
                                           
                    
					<div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input class="form-control" type="file" name="pic" id="exampleInputFile">
					  <?php if(isset($_REQUEST['edit'])){ ?>
					  &nbsp;&nbsp;<img src="../upload/banner/<?php echo $rows['image']; ?>" width="80" height="60" /> 
					  <?php } ?>
                      
                    </div>
					
					<div class="form-group">
                      <label>Description</label>
                     			  <textarea name="desc" class="form-control" rows="3" placeholder="About Me..."><?php echo (isset($_REQUEST['edit'])?$rows['description']:"");?></textarea>
                    </div>
					
					
					<div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control select2">
                      <option selected="selected">Select Status</option>
                      <option <?php echo (isset($_REQUEST['edit']) && $rows['status'] == '1' ? "selected" : "") ?> value="1">Active</option>
                      <option <?php echo (isset($_REQUEST['edit']) && $rows['status'] == '0' ? "selected" : "") ?> value="0">DeActive</option>
                     
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
	<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
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
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
  </body>
</html>
