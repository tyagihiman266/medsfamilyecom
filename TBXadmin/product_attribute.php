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
    'attribute_code'=>$_POST['attribute_code'],
    'attribute_lable'=>$_POST['attribute_lable'],
    'attribute_type'=> $_POST['attribute_type'],
    'show_in_filter'=>$_POST['show_in_filter'],
    'attribute_required'=>$_POST['attribute_required'],
    'show_in_front'=>$_POST['show_in_front'],
    'attribute_postion'=>$_POST['attribute_postion']
    );
  
    $queryC =  $objC->insertQuery($colArray,"attribute_list");
    if($queryC){
      $sms="<p class='success-msg'>Attribute Listed Successfully.</p>";
        header("refresh:2;url=attribute_list.php");   
    }else{
      echo "error";
      die();
    }
    
    }else{
        $sms="<p class='error-msg'>Duplicate Attribute Code.</p>";
      }
    
    
    if(isset($_POST['update'])){
      
      $id  =  $_REQUEST['edit'] ;

      $colArray = array (
      'attribute_lable'    =>  $_POST['attribute_lable'],
      'attribute_type'     =>  $_POST['attribute_type'],
      'show_in_filter'     =>  $_POST['show_in_filter'],
      'attribute_required' =>  $_POST['attribute_required'],
      'show_in_front'      =>  $_POST['show_in_front'],
      'attribute_postion'  =>  $_POST['attribute_postion']
    );
     
    $queryC =  $objC->updateQuery($colArray,"attribute_list",$id);
    
    
          if($queryC){
          $sms="<p class='success-msg'>Product Attribute Updated Successfully.</p>";
          header("refresh:2;url=attribute_list.php");   
                }
            }

    if(isset($_REQUEST['edit'])){
      $id = $_REQUEST['edit'] ;
      $rowL = $objC->getResultById('attribute_list',$id);
      
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
      
    <form action="" method="post" >
      <div class="row">
        
        <div class="form-group col-xs-6">
         <label>Attribute Code <span class="required">*</span></label>
         <input <?php  if(isset($_REQUEST['edit'])){ ?> readonly value="<?php echo $rowL['attribute_code'] ?>" <?php   } ?> type="text" pattern="[a-z0-9]{1,25}" title="ex. color, size etc" required="required" name="attribute_code" id="title"  class="form-control" value=""><span class="required" id="error_title"></span>
        
        </div>
          <div class="form-group col-xs-6">
           <label>Input Type <span class="required">*</span></label>
           <select required="required" name="attribute_type" id="status" class="form-control">
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['attribute_type'] == 'text'){ echo 'selected' ; } ?>  value="text">Text</option>
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['attribute_type'] == 'textarea'){ echo 'selected' ;} ?>  value="textarea">Textarea</option>
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['attribute_type'] == 'select'){ echo 'selected' ; } ?> value="select">Select</option>
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['attribute_type'] == 'radio'){ echo 'selected' ; } ?>  value="radio">radio</option>
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['attribute_type'] == 'multipleselect'){ echo 'selected' ; } ?>   value="multipleselect">Multiple Select</option>
      </select>
      <span class="required" id="error_status"></span>
        
        </div>
        </div>
        <div class="row">
        
        <div class="form-group col-xs-6">
         <label>Attribute Lable <span class="required">*</span></label>
         <input type="text" <?php  if(isset($_REQUEST['edit'])) { ?>  value="<?php echo $rowL['attribute_lable'] ?>" <?php   } ?> required="required" name="attribute_lable" id="title"  class="form-control" value=""><span class="required" id="error_title"></span>
        
        </div>
          <div class="form-group col-xs-6">
           <label>Required <span class="required">*</span></label>
          <select required="requiored" name="attribute_required" id="status" class="form-control">
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['attribute_required'] == 'yes'){ echo 'selected' ; } ?> value="yes">Yes</option>
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['attribute_required'] == 'no'){ echo 'selected' ;  } ?> value="no">No</option>
      </select><span class="required" id="error_status"></span>
        
        
        </div>
        </div>
        
         <div class="row">
        <div class="form-group col-xs-6">
         <label>Show in Sidebar <span class="required">*</span></label>
        <select required="required" name="show_in_filter" id="status" class="form-control">
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['show_in_filter'] == 'yes'){ echo 'selected' ;  } ?> value="yes">Yes</option>
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['show_in_filter'] == 'no'){ echo 'selected' ;  } ?> value="no">No</option>
      </select>
      <span class="required" id="error_status"></span>
        
        </div>
         
            
        <div class="form-group col-xs-6">
         <label>Show in Front End <span class="required">*</span></label>
        <select required="required" name="show_in_front" id="status" class="form-control">
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['show_in_front'] == 'yes'){ echo 'selected' ;  } ?> value="yes">Yes</option>
      <option <?php  if(isset($_REQUEST['edit']) && $rowL['show_in_front'] == 'no'){ echo 'selected'  ; } ?> value="no">No</option>
      </select><span class="required" id="error_status"></span>
        
        </div>
        </div>
    
    
    <div class="row">
        <div class="form-group col-xs-6">
         <label>Position </label>
       <input type="number" class="form-control"  name="attribute_postion" <?php  if(isset($_REQUEST['edit'])) { ?>  value="<?php echo $rowL['attribute_postion'] ?>" <?php   } ?> >
        
        </div>
         
            
        <div class="form-group col-xs-6">
        
        
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
