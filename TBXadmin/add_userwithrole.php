<?php
    @session_start();
  require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
	$p1side = "manage_user";
	$side = "manage_user";
	 $objT = new User();
	 ?>
   <?php
	 
	 if(isset($_REQUEST['edit']))
     { 
    $id=$_REQUEST['edit'];
    $row1 = $objT->getResultById('manage_user',$id);   
     }
	 
	 if(isset($_POST['submit']))
	 { 
    
     $name       = $_POST['name'];
     $role       = $_POST['role'];
     $password     = $_POST['password'];
     $status        = $_POST['status'];
     $username = $_POST['username'];
    $row1 = $objT-> QueryInsert("INSERT INTO manage_user (name,role,status,username,password)
    VALUES ('$name','$role','$status'	,'$username','$password')");
    if($row1)
    {  
       $sms="<p style='text-align:center;color:green;'>User Added Successfully.</p>";
       header("refresh:2;url=manage_user.php");   
     
    }
    else
    {
        $sms="Something went wrong";
    }
		 
	 }
elseif(isset($_POST['Update']))
{  
   
           $colArray = array(
            'name'       => $_POST['name'],
            'role'       => $_POST['role'],
            'password'     => $_POST['password'],
            'status'        => $_POST['status'],
            'username' => $_POST['username']

           );
	 $query1 = $objT->updateQuery($colArray,'manage_user',$id);
          }
   if($query1)
	{
		$sms = "<p style='text-align:center;color:green;'>User updated successfully</p>"; 
    echo "<script>window.location.href='manage_user.php';</script>";
    //header("location:manage_user.php");
		//header("refresh:2;url=manage_user.php");   
	
	}

	
	

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add User</title>
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
            Add User
           
          </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> >> 
            Add User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Add User</h3>
				  <?php if(isset($sms)){
					  echo $sms;
				  } ?>
                
                </div><!-- /.box-header -->
                <div class="box-body">
				
                   <form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data" >
                <?php $allcat = $objT->getResult("SELECT * FROM manage_user"); 

                ?>
                   
         
          <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" value="<?php echo (isset($_REQUEST['edit'])?$row1['name']:"");?>" class="form-control" placeholder="Name..." />
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" value="<?php echo (isset($_REQUEST['edit'])?$row1['username']:"");?>" class="form-control" placeholder="Username..." />
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" value="<?php echo (isset($_REQUEST['edit'])?$row1['password']:"");?>" class="form-control" placeholder="Pasword..." />
                    </div>
<!--                     
					<div class="form-group">
                      <label>Image</label>
                       <input type="file"  name="image" class="form-control"  />
                      <//?php if(isset($_REQUEST['edit'])) { ?>
                        <img src="../upload/category/<//?php echo  $row1['category_image']?> " height="100" width="100"/>
                      <//?php } ?>
                    </div> -->
                     
                     <!--<div class="form-group">
                      <label>Short Description<span class="required">*</span></label>
             
                <textarea name="catshort_description" id="catshort_description" class="form-control"><//?php echo (isset($_REQUEST['edit'])?$row1['catshort_description']:"");?></textarea>
                    </div> -->
          <!-- <div class="form-group">
              <label>Description</label>
                      <textarea name="category_description" id="category_description" class="form-control"><//?php echo (isset($_REQUEST['edit'])?$row1['category_description']:"");?></textarea>
        </div>
          <div class="form-group">
                      <label>Seo Title</label>
                      <input type="text" value="<//?php echo (isset($_REQUEST['edit'])?$row1['seo_title']:"");?>" name="seo_title" class="form-control" placeholder="SEO Title..." />
                    </div>
                       <div class="form-group">
                      <label>Seo Keyword</label>
                      <input type="text" value="<//?php echo (isset($_REQUEST['edit'])?$row1['seo_keyword']:"");?>" name="seo_keyword" class="form-control" placeholder="SEO Keyword..." />
                    </div>
                       <div class="form-group">
                      <label>Seo Content</label>
                      <input type="text" value="<//?php echo (isset($_REQUEST['edit'])?$row1['seo_content']:"");?>" name="seo_content" class="form-control" placeholder="SEO Content..." />
                    </div> -->

                    <div class="form-group">
                    <label>Select Role</label>
                    <select name="role" class="form-control select2">
                      <option>Select Role</option>
                      <option  value="Super Admin" <?php echo (isset($_REQUEST['edit']) && $row1['role'] == 'Super Admin' ? "selected" : "") ?>>Super Admin</option>
                      <option value="Admin" <?php echo (isset($_REQUEST['edit']) && $row1['role'] == 'Admin' ? "selected" : "") ?> >Admin</option>
                      <option  value="User" <?php echo (isset($_REQUEST['edit']) && $row1['role'] == 'User' ? "selected" : "") ?>>User</option>
                      <option value="Manager" <?php echo (isset($_REQUEST['edit']) && $row1['role'] == 'Manager' ? "selected" : "") ?> >Manager</option>
                     
                    </select>
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
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'manage_user'"> 
                                                        <?php  }  else {?>             
                                                        <input type="submit" class="btn btn-success" name="Update" id="Update" value="Update">
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'manage_user'"> 
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