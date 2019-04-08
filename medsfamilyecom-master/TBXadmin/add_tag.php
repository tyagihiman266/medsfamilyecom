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
    'tag'=>$_POST['tag'],
    'status'=>$_POST['status'],
    );
  
    $queryC =  $objC->insertQuery($colArray,"manage_tag");
    if($queryC){
      $sms="<p class='success-msg'>Add Tag Successfully.</p>";
        header("refresh:2;url=manage_tag.php");   
    }else{
      echo "error";
      die();
    }
    
    }else{
        $sms="<p class='error-msg'>Duplicate Tag.</p>";
      }
    
    
    if(isset($_POST['update'])){
      
      $id  =  $_REQUEST['edit'] ;

      $colArray = array (
       'tag'=>$_POST['tag'],
    'status'=>$_POST['status'],
    );
     
    $queryC =  $objC->updateQuery($colArray,"manage_tag",$id);
    
    
          if($queryC){
          $sms="<p class='success-msg'>Tag Updated Successfully.</p>";
          header("refresh:2;url=manage_tag.php");   
                }
            }

    if(isset($_REQUEST['edit'])){
      $id = $_REQUEST['edit'] ;
      $rowL = $objC->getResultById('manage_tag',$id);
      
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
            Add Tag
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Tag</li>
          </ol>
    </section>
    <section class="invoice">
      <!-- title row -->
      
    <form action="" method="post" >
        <div class="row">
        
        <div class="form-group col-xs-12">
         <label>Tag Name <span class="required">*</span></label>
         <input type="text" <?php  if(isset($_REQUEST['edit'])) { ?>  value="<?php echo $rowL['tag'] ?>" <?php   } ?> required="required" name="tag" id="title"  class="form-control" value=""><span class="required" id="error_title"></span>
        
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
    
    <input  class="btn btn-primary" type="submit" name="update" value="Update">
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
