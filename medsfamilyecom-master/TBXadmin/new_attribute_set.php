<?php 
    session_start();
    require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';

    $objT = new User();
 ?>
<?php
    if(isset($_POST['save'])){
      
      $colArray = array(
    'attribute_set_name'  =>  $_POST['attribute_set_name']);
     $queryC =  $objT->insertQuery($colArray,"attribute_set");
    
    if($queryC){
      $sms="<p class='success-msg'>Attribute Listed Successfully.</p>";
        header("refresh:2;url=attribute_set.php");   
    
        }
    
    }
    
      //////Update Record
    if(isset($_POST['update'])){
      
    $id  =  $_REQUEST['edit'] ;
    $colArray = array(
    'attribute_set_name' =>  $_POST['attribute_set_name']);

    $queryC =  $objT->updateQuery($colArray,"attribute_set",$id);
    
          if($queryC){
          $sms="<p class='success-msg'>Attribute Set Updated Successfully.</p>";
          header("refresh:2;url=attribute_set.php");   
                }
            }


      if(isset($_REQUEST['edit'])){
      $id = $_REQUEST['edit'] ;
       $rowL = $objT->getResultById('attribute_set',$id);
      
        }
  
?>


  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include"inc/header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include"inc/side-bar.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Product Attribute
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product Attribute</li>
          </ol>
    </section>
    <section class="invoice">
      <!-- title row -->
      

      <div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      
    <form action="" method="post" >
      <div class="row">
        
        <div class="col-xs-6">
         <label>Attribute Name<span class="required">*</span></label>
         <input required="required" <?php  if(isset($_REQUEST['edit'])){ ?> value="<?php echo $rowL['attribute_set_name'] ?>" <?php   } ?> type="text" name="attribute_set_name" id="title"  class="form-control" value=""><span class="required" id="error_title"></span>
        
        </div>
          <div class="col-xs-6">
          
      <?php  if(isset($_REQUEST['edit'])) { ?> 
      <input  class="btn btn-primary pull-right" type="submit" name="update" value="Upade" style="margin-right:5px;">
    <?php   } else { ?>
      <input  class="btn btn-primary pull-right" type="submit" name="save" value="Add" style="margin-right:5px;">
    <?php } ?>
                  
        
        </div>
        </div>
    </form>
        
        
         
        
            </section>
    
    
        
      </div><!-- /.content-wrapper -->
     <?php 
      include"inc/footer.php";
      ?>
      
  </body>
</html>
