<?php 
    session_start();
    require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';

    $objC = new User();
 

 ?>
<?php 

    if(isset($_POST['save'])){

      
    $colArray = array(
    'name'=>$_POST['title'],
    'status'=>$_POST['status'],
    );
  
    $queryC =  $objC->insertQuery($colArray,"product_customization");
    if($queryC){
      $sms="<p class='success-msg'>Product Customization Successfully.</p>";
        header("refresh:2;url=product_customization.php");   
    }else{
      echo "error";
      die();
    }
    
    }else{
        $sms="<p class='error-msg'>Duplicate Product Customization Code.</p>";
      }
    
    
    if(isset($_POST['update'])){
      
      $id  =  $_REQUEST['edit'] ;

      $colArray = array (
       'name'=>$_POST['title'],
    'status'=>$_POST['status'],
    );
     
    $queryC =  $objC->updateQuery($colArray,"product_customization",$id);
    
    
          if($queryC){
          $sms="<p class='success-msg'>Product Customization Updated Successfully.</p>";
          header("refresh:2;url=product_customization.php");   
                }
            }

    if(isset($_REQUEST['edit'])){
      $id = $_REQUEST['edit'] ;
      $rowL = $objC->getResultById('product_customization',$id);
      
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
            Add Produst Customization
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Produst Customization</li>
          </ol>
    </section>
    <section class="invoice">
      <!-- title row -->
      
    <form action="" method="post" >
        <div class="row">
        
        <div class="form-group col-xs-12">
         <label>Title <span class="required">*</span></label>
         <input type="text" <?php  if(isset($_REQUEST['edit'])) { ?>  value="<?php echo $rowL['name'] ?>" <?php   } ?> required="required" name="title" id="title"  class="form-control" value=""><span class="required" id="error_title"></span>
        
        </div>
       
        </div>
    <div class="row">
        <div class="form-group col-xs-12">
      <label>Status<span class="required">*</span></label>
      <select name="status" id="status" class="form-control">
      <option value="">--Please Select--</option>
      <option <?php if($rowL['status']=='1'){echo 'selected';} ?> value="1">Enabled</option>
      <option <?php if($rowL['status']=='0'){echo 'selected';} ?> value="0">Disabled</option>
      </select><span class="required" id="error_status"></span>
      </div>
         
        </div>
    
    
    
        <div  class="row">
        <div class="form-group col-xs-12">
    <?php  if(isset($_REQUEST['edit'])) { ?> 
    
    <input  class="btn btn-primary" type="submit" name="update" value="Upade">
    <?php   } else{ ?>
      <input  class="btn btn-primary" type="submit" name="save" value="Add">
    <?php }?>
        
           </div>
           <div class="col-xs-6">
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
