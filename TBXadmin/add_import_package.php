<?php
    @session_start();
  require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
	$p1side = "manage_product";
	$side = "manage_product";
	 $objT = new User();
	 ?>
   <?php
	 
	
	 
	 if(isset($_POST['submit']))
	 { 
     

  $list_name=$_FILES['import_file_name']['name'];
  $arr=explode(".",$list_name);
  if($arr[1]=="csv" || $arr[1]=="CSV" ){
  $fd = fopen ($_FILES['import_file_name']['tmp_name'], "r");
  $x=1;
   
  while (!feof ($fd)) 
  { 
  if($x==110000)
  {
   exit;
  }
  
  $buffer = fgetcsv($fd, 5096); 
  $no_time=count($buffer);
  
   for($m=0;$m<$no_time;$m++)
     {
   
  
      $nbuffer[$m] = str_replace("'","&#39;",$buffer[$m]);
  

  //-------------------------- Code For list Id Genration-------------------------------
  
}
if($x==1){
  foreach( $nbuffer as $key=>$val){
$headingArr[$key] = $val; 
  }
}
   

  if($x!=1){
/*   echo "<pre>";
print_r( $headingArr);
echo "<pre>";

echo $x;
die;*/
    if(!empty($nbuffer[0]) ){
 $sql = "insert into tbl_product_package set  ";
                  $i=0;
                  
                  $sql.=" id='".$nbuffer[$i]."'";
          $i=$i+1;
          
          $sql.=" ,company_id='".$nbuffer[$i]."'";
          $i=$i+1;
          
         
          $sql.=" ,company_name='".$nbuffer[$i]."'";
          $i=$i+1;
         
                 
          $sql.=" ,product_id='".$nbuffer[$i]."'";
          $i=$i+1;
            $sql.=" ,varient_id='".$nbuffer[$i]."'";
          $i=$i+1;
            $sql.=" ,no_pills='".$nbuffer[$i]."'";
          $i=$i+1;
           $sql.=" ,per_pill_price='".$nbuffer[$i]."'";
          $i=$i+1;
           $sql.=" ,price='".$nbuffer[$i]."'";
          $i=$i+1;
            $sql.=" ,discount='".$nbuffer[$i]."'";
          $i=$i+1;
           $sql.=" ,bonus='".$nbuffer[$i]."'";
          $i=$i+1;
            $sql.=" ,status='".$nbuffer[$i]."'";
          $i=$i+1;
          $sql.=" ,qty='".$nbuffer[$i]."'";
          $i=$i+1;
          $sql.=" ,sku='".$nbuffer[$i]."'";
          $i=$i+1;
          $sql.=" ,priority='".$nbuffer[$i]."'";
          $i=$i+1;


        
$query_update_user=$objT->QueryInsert($sql) or die("Query Error..!");
 header("refresh:2;url=view_product");   
}

   
  }
   $x++; 
  
   }  
  
   
  
  fclose ($fd);
  
  }else{
 $sms="Only .csv file allowed.";
 
  }
}
  


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Import Product Package</title>
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
            Import Package 
           
          </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> >> 
           Import Package</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Import Package</h3>
				  <?php if(isset($sms)){
					  echo $sms;
				  } ?>
                
                </div><!-- /.box-header -->
                <div class="box-body">
				
                   <form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data" >
                
					        <div class="form-group">
                      <label>Import</label>
                      <input type="file"  name="import_file_name" class="form-control"  />
                            <br/>
                      <a href="tbl_product_package.csv"><b>Download Sample</b> </a>
                     
                    </div>
                     
                  
      
         
                      
                   
					
				
				   <div style="margen-left:140px;">
                         <?php if(!isset($_REQUEST['edit'])) {?>
                                                        <input type="submit" class="btn btn-success" name="submit" id="submit" value="Save">
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'manage_product'"> 
                                                        <?php  }  else {?>             
                                                        <input type="submit" class="btn btn-success" name="Update" id="Update" value="Update">
                                                        <input type="button" class="btn btn-info" value=" Cancel" onClick="window.location.href = 'manage_product'"> 
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
 

  </body>
</html>