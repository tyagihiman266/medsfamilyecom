<?php
    @session_start();
  require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
	$p1side = "view_product";
	$side = "view_product";
	 $objT = new User();
	 ?>
   <?php
	 
	 if(isset($_REQUEST['edit']))
     { 
    $id=$_REQUEST['edit'];
    $row1 = $objT->getResultById('tbl_company',$id);
     }
	 
	 if(isset($_POST['submit']))
	 { 
    
     $path = "upload/company/" ;
    $imageName = time().$_FILES['pic']['name'] ;
   
    $colArray = array(
    'product_id' =>$_REQUEST['p_id'],
    'company_name' =>$_POST['company_name'],
    'logo'=> $imageName,
    'status' =>1
    );
   
   move_uploaded_file($_FILES['logo']['tmp_name'],"upload/company/".$imageName);
    $row1 = $objT->insertQuery($colArray,'tbl_company');
    if($row1)
    {  
       $sms="<p style='text-align:center;color:green;'>Company Added Successfully.</p>";
       header("refresh:2;url=manage_company?p_id=".$_POST['p_id']."");   
     
    }
    else
    {
        $sms="Something went wrong";
    }
		 
	 }
elseif(isset($_POST['Update']))
{  

    
      $path = "upload/company/" ;
      if($_FILES['logo']['name']!='') {
      if(file_exists($path.$row1['logo'])) {
            unlink($path.$row1['logo']);
          }
         $filename=time().$_FILES['logo']['name'];
       $colArray = array(
     'product_id' =>$_REQUEST['p_id'],
     'company_name' =>$_POST['company_name'],
     'status' =>1,
      'logo'         => $filename
    );
       move_uploaded_file($_FILES['logo']['tmp_name'],"upload/company/".$filename);
	    } else {

         $colArray = array(
     'product_id' =>$_REQUEST['p_id'],
     'company_name' =>$_POST['company_name'],
     'status' =>1
       );



     }
	 $query1 = $objT->updateQuery($colArray,'tbl_company',$id);

   if($query1)
	{
		$sms = "<p style='text-align:center;color:green;'>Company updated successfully</p>"; 
    header("refresh:2;url=manage_company?p_id=".$_POST['p_id'].""); 
    //header("location:manage_category.php");
		//header("refresh:2;url=manage_category.php");   
	
	}

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Company</title>
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
            Add Company
           
          </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> >> 
            Add Company</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Package</h3>
                  <a href="manage_company.php?p_id=<?php echo $_REQUEST['p_id'] ?>">View Company</a>
				  <?php if(isset($sms)){
					  echo $sms;
				  } ?>
                
                </div><!-- /.box-header -->
                <div class="box-body">
				
                   <form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data" >
                    <input type="hidden" name="p_id" value="<?php echo $_REQUEST['p_id'] ?>">


                  
         
                   <div class="form-group">
                      <label>Company Name</label>
                      <input type="text" name="company_name" value="<?php echo (isset($_REQUEST['edit'])?$row1['company_name']:"");?>" class="form-control" placeholder="Company Name..." />
                    </div>


                     <div class="form-group">
                      <label>Company logo</label>
                      <input type="file" name="logo" class="form-control" />
                      <?php if($row1['logo']!='') { ?>
                      <img src="upload/company/<?php echo $row1['logo']; ?>">
                    <?php } ?>
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
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'manage_category.php'"> 
                                                        <?php  }  else {?>             
                                                        <input type="submit" class="btn btn-success" name="Update" id="Update" value="Update">
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'manage_category.php'"> 
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
<script>
  $(function () {
    CKEDITOR.replace('category_description');
   // CKEDITOR.replace('catshort_description');
  });
</script>
  </body>
</html>