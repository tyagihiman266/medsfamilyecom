<?php

    @session_start();
	error_reporting(0);
   require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';

	$side = "website-page";
   $objT = new User();

?>
<?php

	 if(isset($_GET['edit']))
     { 
      $id=$_GET['edit'];
	
   $rows=$objT->getResultById('website_page',$id);

	 //$rows_extra = $objT->getResultById('website_page_extra',$id);
	 
     }
if(isset($_POST['Update']))
{   
  $colArray =  array(
    'id'           => $_POST['id'],
	'title'          => $_POST['title'],
	'keyword'        => $_POST['keyword'],
	'description'    => $_POST['desc'],
	'heading'        => $_POST['heading'],
	'page_url'       => $_POST['page_url'],
	'page_shortdesc' => $_POST['page_shortdesc'],
	'page_desc'      => $_POST['page_desc']);
	 $query = $objT->updateQuery($colArray,'website_page',$id);
   header("location: page.php");
	 
	 }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Website Page</title>
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
           Update Website Front Detail
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Website Page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Website Front Detail</h3><?php if(isset($sms)){
					  echo $sms;
				  } ?>
                
                </div><!-- /.box-header -->
                <div class="box-body">
				
                  <form action="" method="post" enctype="multipart/form-data">
					
					
					<div class="form-group">
                      <label>Heading</label>
                      <input type="text" name="heading" value="<?php echo (isset($_REQUEST['edit'])?$rows['heading']:"");?>"class="form-control" placeholder="Heading" />
                    </div>
					
					<div class="form-group">
                      <label>Page URL</label>
                      <input type="text" name="page_url" value="<?php echo (isset($_REQUEST['edit'])?$rows['page_url']:"");?>"class="form-control" placeholder="Page URL ..." />
                    </div>
		
	
					

					
				
					
					<div class="form-group">
                      <label>Short Description</label>
                       <textarea placeholder="Short Description..." class="form-control"  name="page_shortdesc" rows="3">
                          <?php echo (isset($_REQUEST['edit'])?$rows['page_shortdesc']:"");?>                 
                    </textarea>
                    </div>
					
					<div class="form-group">
                      <label>Description</label>
                       <textarea  id="editor1" name="page_desc" rows="10" cols="80">
                          <?php echo (isset($_REQUEST['edit'])?$rows['page_desc']:"");?>                 
                    </textarea>
                    </div>
					
		
					
					<div class="form-group">
                      <label><h3>SEO Details</h3></label>
                    </div>
					<div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" value="<?php echo (isset($_REQUEST['edit'])?$rows['title']:"");?>" class="form-control" placeholder="Title" />
					  <input type="hidden" name="id" value="<?php echo (isset($_REQUEST['edit'])?$rows['id']:"");?>" class="form-control" placeholder="Heading" />
                    </div>
					
					<div class="form-group">
                      <label>Keyword</label>
                      <input type="text" name="keyword" value="<?php echo (isset($_REQUEST['edit'])?$rows['keyword']:"");?>" class="form-control" placeholder="SEO Keyword.." />
                    </div>
					<div class="form-group">
                      <label>Description</label>
					  <textarea class="form-control" placeholder="SEO Description..." id="v" name="desc" rows="3" ><?php echo (isset($_REQUEST['edit'])?$rows['description']:"");?> </textarea>
                       
                    </div>
					
				   <div style="margen-left:140px;">
                        <input type="submit" class="btn btn-success" name="Update" id="Update" value="Update">
                        
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
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
		
      });
    </script>
	

	 
  </body>
</html>
