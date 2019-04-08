<?php 
@session_start();
require_once ("inc/main.php");
    //require_once ("include/DBclass.php");
    include_once("include/User.php");
    include_once("include/resize-class.php");
    include 'inc/head.php';
    $objT = new User();
$p1side = "view_product";
  $side = "view_product";
 ?>

 <?php  
       

    if(isset($_POST['btn_submit'])){
 
  $salt=explode('#',$_POST['salt_id']);
   if(count($salt) >0) {

    $salt_id=$salt[0];
    $salt_name=$salt[1];
     } else {

    $salt_id='';
    $salt_name='';
     }
  $colArray = array(
  'name'                  => $_POST['title_name'],
  'short_description'     => $_POST['short_description'],
  'product_description'   => $_POST['product_description'],
  'sku_number'            => $_POST['sku'],
  'status'                => $_POST['status'],
  // 'ingredient'            =>  $_POST['ingredient'],
  'best_seller'           => $_POST['best_seller'],
  'meta_title'            => $_POST['meta_title'],
  'meta_keyword'          => $_POST['meta_keywords'],
  'meta_description'      => $_POST['meta_description'],
   'cat_id'                => $_POST['cat_id'],
  'safety_information'    => $_POST['safety_information'],
  'side_effects'          => $_POST['side_effects'],
  'other_name'            =>$_POST['other_name'],
  'salt_id'            =>$salt_id,
  'salt_name'            =>$salt_name,
  'created_On'            => date('Y:m:d H:m:s')
  );
 
   $query = $objT->insertQuery($colArray,"tbl_product");
   $pid = $query ;

  /*inserting product category*/
/*  $catArrays = array(
  'id'     => '',
  'product_id'     => $pid,
  'category_id'   => $_POST['pro_cate'],
  ); 
 // print_r($catArray);die;
 $cat_insert_id = $objT->insertQuery($catArrays,"product_category_detail");*/
 
  /*inserting product category*/
  
  /*inserting product tag*/
  $tagarray=$_POST['p_tag'];
   $allArray =array();
$jsons = json_decode($tagarray[0]);
//print_r($jsons);

  for($i=0;$i<count($jsons);$i++){
//print_r($jsons[$i]->value);
    $new_val=$jsons[$i]->value;
    $allArray = array(
                      'id'     => '',
                      'product_id'     => $pid,
                      'tag_name'   => $new_val,
                      ); 
 $tag_insert_id = $objT->insertQuery($allArray,"product_tags");
      
  }
  /*inserting product tag*/
   
   for($i=1;$i<=count($_FILES['file']['name']);$i++) {
    if($i == 1){
        $front = 1;
      }else{
        $front = 0;
      }
    $sepext = explode('.', $_FILES['file']['name'][$i-1]);
    $type = end($sepext);
    $newFileName = $sepext[0].$pid.'.'.$type;
    $RnewFileName = $sepext[0].$pid.'.'.$type;
    if(move_uploaded_file($_FILES['file']['tmp_name'][$i-1],"upload/product/big/".$newFileName)) {
    
      $resizeObj = new resize("upload/product/big/".$newFileName); 
      $resizeObj -> resizeImage(300, 300, 'crop');  
      $resizeObj -> saveImage("upload/product/thumbs/".$RnewFileName, 100);    
      
      $resizeObj -> resizeImage(500, 500, 'crop');  
      $resizeObj -> saveImage("upload/product/medium/".$newFileName, 100);   
     
      $qry = $objT->QueryInsert("INSERT INTO tbl_pro_img SET p_id = '".$pid."', front_status = '".$front."', image = '".$RnewFileName."'");
    } 
  }
  
 
  
  if(!empty($_POST['varient'])){
    $allvarient = $_POST['varient'];

foreach($_POST['varient'] as $key=>$val){
    $varient_formulation=$_REQUEST['varient_formulation'][$key];
   $varient=$_REQUEST['varient'][$key];
   $varient_unit=$_REQUEST['varient_unit'][$key];
    $sepext = explode('.', $_FILES['varient_img']['name'][$key]);
    $type = end($sepext);
    $newFileName = $sepext[0].$varient.'.'.$type;
    $RnewFileName = $sepext[0].$varient.'.'.$type;
    if(move_uploaded_file($_FILES['varient_img']['tmp_name'][$key],"upload/product/varient/big/".$newFileName)) {
    
      $resizeObj = new resize("upload/product/varient/big/".$newFileName); 
      $resizeObj -> resizeImage(300, 300, 'crop');  
      $resizeObj -> saveImage("upload/product/varient/thumbs/".$RnewFileName, 100);    
      
      $resizeObj -> resizeImage(500, 500, 'crop');  
      $resizeObj -> saveImage("upload/product/varient/medium/".$newFileName, 100);   
     
    
    } 
   
      $filterArray = array(
        'product_id' => $pid,
        'varient_formulation' => $varient_formulation,
        'varient' => $varient,
        'varient_unit'=>$varient_unit,
        'varient_img'=>$RnewFileName,
        'status' =>1
      );
      if($varient!=0) {
       $query1 = $objT->insertQuery($filterArray,"product_varient");    
      }
    }
    }



    if(!empty($_POST['company_name'])){
    foreach($_POST['company_name'] as $key1=>$val1){
   $company_name=$_REQUEST['company_name'][$key1];
  

   
      $filterArray = array(
        'product_id' => $pid,
        'company_name' => $company_name,
        'status' =>1
      );
      if($company_name!='') {
       $query1 = $objT->insertQuery($filterArray,"tbl_company");    
      }
    }
    }
  
    if(!empty($_POST['relatedpro'])){
      $allrelated = $_POST['relatedpro'];
    foreach($allrelated as $related){ 
      $filterArray = array(
        'product_id' => $pid,
        'related_product_id' => $related
      );
       $query1 = $objT->insertQuery($filterArray,"related_product");
   
      }
    }
    
  if(!empty($_POST['analogpro'])){
      $allanalogpro = $_POST['analogpro'] ;
    foreach($allanalogpro as $analogpro){ 
      $filterArray = array(
        'product_id' => $pid,
        'analog_product_id' => $analogpro
      );
       $query1 = $objT->insertQuery($filterArray,"analog_product");
      }
    }
  

  
    
    if($query1)
    {  
       $sms="<p style='text-align:center;color:green;'>Product Added Successfully.</p>";
        header("refresh:2;url=view_product.php");  
     
    }
    else
    {
        $sms="Something went wrong please try again";
    }
   } 

?>

 <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Product</title>
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
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include"inc/header.php";  ?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include"inc/side-bar.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Product
          </h1>
          <div style="float: right;"><a href="view_product.php"><button  class="btn btn-primary">Back</button></a></div>
          <div class="row">
            <div class="col-lg-12 cat_tab">
              <style>
              .breadcrumb > .active {color: #fff;background-color: #367fa9;border: 1px solid #073c5a;border-radius: 5px;}
              </style>
                <ol class="breadcrumb">
                      <li style="margin-left: 0px;cursor: pointer;" class="general active">General</li>
                      <li style="margin-left: 0px;cursor: pointer;" class="price "> Varient</li>        
                      <li style="margin-left: 0px;cursor: pointer;" class="meta"> Meta Information</li>        
                    <li style="margin-left: 0px;cursor: pointer;" class="filter"> Company name</li>    
                      <!-- <li style="margin-left: 0px;cursor: pointer;" class="image">Images</li>         -->
                      <!--<li style="margin-left: 0px;cursor: pointer;" class="inventry">Inventory</li>  -->       
                      <li style="margin-left: 0px;cursor: pointer;" class="category">Categories</li>        
                      <li style="margin-left: 0px;cursor: pointer;" class="relatedpro">Related Products</li>        
                </ol>
            </div>
          </div>
          <style>
          .required{
          color:red;
          }
          </style>
        </section>
                <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
  <form method="post" action="" enctype="multipart/form-data">
  
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Product</h3>
          <?php if(isset($sms)){
            echo $sms;

          }  ?>
                 <input type="submit" style="float: right;" name="btn_submit" class="btn btn-primary" id="submitform" value="Save"> 
                </div><!-- /.box-header -->
                <div class="box-body">

    <div id="general_info">

                 <div class="form-group">
                      <label>Select Salt<span class="required">*</span></label>
 <?php $rowsalt=$objT->getResult('select * from tbl_product_salt where status=1 order by id desc'); ?>
                      <select name="salt_id" class="form-control myselect" >
                         <option value="">Select Salt</option>
                         <?php foreach($rowsalt as $key => $val) 
                                      { ?>
                          <option value="<?php echo $val['id'] ?>#<?php echo $val['salt_name'] ?>"><?php echo $val['salt_name'] ?></option>
                        <?php } ?>



                      </select>
             <span class="required" id="error_title"></span>
                    </div>
           
            <div class="form-group">
            <label>Select Category Type<span class="required">*</span></label>
            <?php $rowsalt=$objT->getResult('select * from product_category where status=1 order by category_id desc'); ?>
            <select name="pro_cate" class="form-control">
            <option value="">Select Category</option>
            <?php foreach($rowsalt as $key => $val) 
            { ?>
            <option value="<?php echo $val['category_id'] ?>"><?php echo $val['category_name'] ?></option>
            <?php } ?>
            </select>
            </div>

       <div class="form-group">
                      <label>Title<span class="required">*</span></label>
              <input type="text" name="title_name" id="title"  class="form-control" value=""><span class="required" id="error_title"></span>
                    </div>
      <!-- <div class="form-group">
                      <label>Ingredient<span class="required">*</span></label>
              <input type="text" name="ingredient" id="ingredient"  class="form-control" value=""><span class="required"></span>
                    </div> -->

                      <div class="form-group">
                      <label>Short Description</label>
                      <textarea name="short_description" id="short_description" class="form-control"></textarea>
                     </div>
          <div class="form-group">
              <label>Product Description</label>
                      <textarea name="product_description" id="product_description" class="form-control"></textarea>
        </div>
        
       <div class="form-group">
                      <label>Packaging<span class="required">*</span></label>
                      <textarea name="safety_information" id="safety_information" class="form-control"></textarea>
             <span class="required"></span>
                    </div>
          <div class="form-group">
              <label>Disclaimer</label>
                      <textarea name="side_effects" id="side_effects" class="form-control"></textarea>
        </div>

        <div class="form-group">
                      <label>Other name</label>
                      <textarea name="other_name" id="other_name" class="form-control"></textarea>
                     </div>
        
        <!-- <div class="form-group">
                      <label>Tab Lable<span class="required">*</span></label>
              <input type="text" name="tab3_lable" id="title"  class="form-control" value=""><span class="required" id="error_title"></span>
                    </div>
          <div class="form-group">
              <label>Tab Details</label>
                      <textarea name="tab3_details" id="tab3_details" class="form-control"></textarea>
        </div> -->
        
        
      <!--   <div class="form-group">
                      <label>Tab Lable<span class="required">*</span></label>
              <input type="text" name="tab4_lable" id="title"  class="form-control" value=""><span class="required" id="error_title"></span>
                    </div>
          <div class="form-group">
              <label>Tab Details</label>
                      <textarea name="tab4_details" id="tab4_details" class="form-control"></textarea>
        </div> -->
    
                      
           <!--   <div class="form-group">
        <label>Product To Date</label>
        <input type="date" id="producttodate" name="product-to-date" value=""class="form-control" placeholder="Product To Date" />
      </div> -->
      
      <!-- <div class="form-group">
        <label>Product From Date</label>
        <input type="date" id="productfromdate" name="product-from-date" value=""class="form-control" placeholder="Product From Date" />
      </div> -->
      
        <div class="form-group">
        <label>Sku<span class="required">*</span></label>
        <input type="text" id="sku" name="sku" onBlur="checkAvailability()" value=""class="form-control" placeholder="Product Sku" /><span class="required" id="error_sku"></span>
                    <span id="user-availability-status" style="color:red;"></span>
          <p><img src="images/loaderIcon.gif" width="70" id="loaderIcon" style="display:none" /></p>
      </div>

              <script>
          function checkAvailability() {
              $("#user-availability-status").html('');
              $("#loaderIcon").show();
                jQuery.ajax({
                  url: "check_availability.php",
                  data:'username='+$("#sku").val(),
                  type: "POST",
                    success:function(data){
                      $("#user-availability-status").html(data);
                      $("#loaderIcon").hide();
                    },
                  error:function (){}
                });
          }
        </script>
         
      <div class="form-group">
        <label>Status<span class="required">*</span></label>
          <select name="status" id="status" class="form-control">
            <option value="">--Please Select--</option>
            <option value="1">Enabled</option>
            <option value="0">Disabled</option>
          </select><span class="required" id="error_status"></span>
      </div>
     
    

     

     
      
      <div class="form-group">
      <label>Url Key</label>
      <input type="text" class="form-control" name="url_key" value="">
      </div>
    

        <div class="form-group">
       <label>Best Seller</label>
      <select class="form-control" name="best_seller">
      <option value="0">No</option>
      <option value="1">Yes</option>
      </select>
      </div>
 
        </div>  
<script type="text/javascript">
      $(".myselect").select2();
</script>   

    <div id="varient_info" style="display:none;">
       <div class="bussinessforminner">






                    <div class="formflax">
                    <span></span>
                        
                        <div class="col-md-12 inputarea form-group">
                          <div class="col-md-4">
                          <input type="text" class="form-control" name="varient_formulation[]" placeholder="Formulation" value="">
                        </div>
                          <div class="col-md-4">
                          <input type="text" class="form-control" name="varient[]" placeholder="Varient" value="">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="varient_unit[]" placeholder="Varient Unit" value="">
                          </div>
                            <div class="col-md-4">
                            <input type="file" class="form-control" name="varient_img[]">
                          </div>
                       
  </div>
          

                        
                       
  </div>
                        <div class="clr"></div>
                          <div id="inputs">
                    </div><div  style="padding-left:10px;" >  <a
href="javascript:void(0)" class="add"><img src="../images/add.png"
alt="add" width="20" height="20" border="0" title="add input"></a>
                        <a href="javascript:void(0)"
class="remove"><img src="../images/remove.jpeg" alt="remove"
width="20" height="20" border="0"></a></div>
                        </div>



                    <div class="formflax">
                    <span>&nbsp;</span>
                        <div class="inputarea">
                       
                        </div>
                        <div class="clr"></div>
                    </div>

                </div>
        <!-- <div class="form-group">

       <label>Varient in (MG)<span class="required">*</span></label>
      <input class="form-control" type="text" name="price" id="price" value=""><span class="required" id="error_price"></span>
      </div> -->

         
</div>
<div id="meta_info" style="display:none;">
           <div class="form-group">
          <label>Meta Title</label>
      <input class="form-control" type="text" name="meta_title" id="meta_title" value="">
      </div>

              <div class="form-group">
              <label>Meta Keywords</label>
        <textarea  class="form-control" name="meta_keywords" id="metakey"></textarea>
            </div>
      
       <div class="form-group">
       <label>Meta Description</label>
      <textarea class="form-control" name="meta_description" id="meta_desc"></textarea>
      </div>
    <!--tag box-->
                <!DOCTYPE html>
                <html lang="en">
                <head>
                <link rel="stylesheet" href="dist/tagify.css">
                <script src="dist/tagify.js"></script>
                </head>
                  
                  
       <div class="form-group">
               <label>Product Tags   <button class='tags--removeAllBtn' type='button'>&times;</button>
             </label>
                <aside class='leftSide'>
                <input name='p_tag[]' id='tags' class='some_class_name' placeholder='Write Product tags' value='Product' autofocus >
              </aside><br>
         </div>
         
         
                <script data-name="basic">
                (function(){
                var input = document.querySelector('input[id=tags]'),
                tagify = new Tagify(input, {
                });
                // "remove all tags" button event listener
                document.querySelector('.tags--removeAllBtn')
                .addEventListener('click', tagify.removeAllTags.bind(tagify))
                // Chainable event listeners
                tagify.on('remove', onRemoveTag)
                
                // tag remvoed callback
                function onRemoveTag(e){
                console.log(e.detail);
                console.log("tagify instance value:", tagify.value)
                }
                })()
                </script>
                
                
                </html>

  <!--tag box-->
      

</div>  
 
   <div id="filter_info" style="display:none;">
        <div class="bussinessforminner">






                    <div class="formflax">
                    <span></span>

                        <div class="inputarea12 form-group">
                          <div class="col-md-12">
                          <input type="text" class="form-control" name="company_name[]" placeholder="Company Name" value="">
                        </div>
                    
                       
  </div>
          

                        
                       
  </div>
                        <div class="clr"></div>
                          <div id="inputs12">
                    </div><div  style="padding-left:10px;" >  <a
href="javascript:void(0)" class="addcompany"><img src="../images/add.png"
alt="add" width="20" height="20" border="0" title="add input"></a>
                        <a href="javascript:void(0)"
class="removecompany"><img src="../images/remove.jpeg" alt="remove"
width="20" height="20" border="0"></a></div>
                        </div>

          
        
</div>  

<div id="images_info" style="display:none;">
          Images:
<div id="filediv">
<input name="file[]" type="file" id="file" multiple/></div>
<input type="button" id="add_more" class="upload" value="Add More Files"/>
</div>  


<?php /*<div id="inventory_info" style="display:none;">

  <!--
<div class="form-group">
           <label>Qty<span class="required">*</span></label>
      <input type="text" name="qty" id="qty"  class="form-control" value=""><span class="required" id="error_qty"></span>
      </div>
    -->

              <div class="form-group">
        <label>Stock Availability <span class="required">*</span></label>
<select class="form-control" name="stock" id="stock">
<option value="">--Select--</option>
<option value="0">Out of Stock</option>
<option value="1">In Stock</option>
</select>    <span class="required" id="error_stock"></span>      
 </div>     
      
      
</div> */?>

<div class=" container" id="category_info" style="display:none;">


<div class="form-group row">

        <label class="col-md-12 col-xs-12"> Select Category</label>
        <div class="col-md-12 col-xs-12">
            <select class="form-control  myselect" name="cat_id" style="width:90%!important">
          <option value="">Select category</option>
          
  <?php 

    $rowpcat= $objT->getResult("SELECT * FROM manage_category where parent_id=0");

     foreach($rowpcat as $key => $Pcat)
     {

?>
 <option value="<?php echo $Pcat['id'] ?>"><?php echo $Pcat['category_name'] ?></option>

<?php } ?>
        </select>
            
        </div>
        
     </div>

</div>

<script type="text/javascript">
      $(".myselect").select2();
</script>
<div id="related_info" style="display:none;">

<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
          <th>&nbsp;</th>
                  <th>S.N</th>
                  <th>Product Name</th>
                  <th>Product SKU</th>
                  <th>Product Price</th>
                 
                </tr>
                </thead>
                <tbody>
        <?php 
        
      $relatedpro = $objT->getResult("SELECT * FROM tbl_product WHERE id != '".$pid."'");
      $i = 1;
      $t = 0;
      $countT = count($relatedpro);
     while($countT > 0){
     
    
 ?>

                <tr>
        <td> <input type="checkbox" value="<?php echo $relatedpro[$t]['id']; ?>" name="relatedpro[]" id="data" title="Select All" /></td>
                  <td><?=$i;?></td>
                  <td><?=$relatedpro[$t]['name'];?></td>
                  <td><?=$relatedpro[$t]['sku_number'];?></td>
                  <td><?=$relatedpro[$t]['price'];?></td>
                  
                </tr>
                <?php $i++;
                $t++;
                $countT--;
                 } ?>

               
                </tfoot>
              </table>


</div>

<!-----related product end----->

        
        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
       
      </div><!-- /.content-wrapper -->
     <?php 
      include"inc/footer.php";
      ?>
      <div class="control-sidebar-bg"></div>
    </div>
    
    
    
    


  

<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"> </script>
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
      
  <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script>
  $( function() {
    $( "#accordion" ).accordion({
    	collapsible: true,
      active: false
  })
  } );
  </script>

   
<script>
  $(document).ready(function(){
  $('.general').click(function(){
  $('#general_info').css('display','block');
  $('#varient_info').css('display','none');
  $('#meta_info').css('display','none');
  $('#filter_info').css('display','none');
  $('#images_info').css('display','none');
  $('#inventory_info').css('display','none');
  $('#category_info').css('display','none');
  $('#related_info').css('display','none');
});
  $('.price').click(function(){
  $('#general_info').css('display','none');
  $('#varient_info').css('display','block');
  $('#meta_info').css('display','none');
  $('#filter_info').css('display','none');
  $('#images_info').css('display','none');
  $('#inventory_info').css('display','none');
  $('#category_info').css('display','none');
  $('#related_info').css('display','none');
});
$('.meta').click(function(){
  $('#general_info').css('display','none');
  $('#varient_info').css('display','none');
  $('#meta_info').css('display','block');
  $('#filter_info').css('display','none');
  $('#images_info').css('display','none');
  $('#inventory_info').css('display','none');
  $('#category_info').css('display','none');
  $('#related_info').css('display','none');
});

$('.filter').click(function(){
  $('#general_info').css('display','none');
  $('#varient_info').css('display','none');
  $('#meta_info').css('display','none');
  $('#filter_info').css('display','block');
  $('#images_info').css('display','none');
  $('#inventory_info').css('display','none');
  $('#category_info').css('display','none');
  $('#related_info').css('display','none');
});
$('.image').click(function(){
  $('#general_info').css('display','none');
  $('#varient_info').css('display','none');
  $('#meta_info').css('display','none');
  $('#images_info').css('display','block');
  $('#filter_info').css('display','none');
  $('#inventory_info').css('display','none');
  $('#category_info').css('display','none');
  $('#related_info').css('display','none');
});
$('.inventry').click(function(){
  $('#general_info').css('display','none');
  $('#varient_info').css('display','none');
  $('#meta_info').css('display','none');
  $('#images_info').css('display','none');
  $('#filter_info').css('display','none');
  $('#inventory_info').css('display','block');
  $('#category_info').css('display','none');
  $('#related_info').css('display','none');
});

$('.category').click(function(){
  $('#general_info').css('display','none');
  $('#varient_info').css('display','none');
  $('#meta_info').css('display','none');
  $('#images_info').css('display','none');
  $('#filter_info').css('display','none');
  $('#inventory_info').css('display','none');
  $('#category_info').css('display','block');
  $('#related_info').css('display','none');
});

$('.relatedpro').click(function(){
  $('#general_info').css('display','none');
  $('#varient_info').css('display','none');
  $('#meta_info').css('display','none');
  $('#filter_info').css('display','none');
  $('#images_info').css('display','none');
  $('#inventory_info').css('display','none');
  $('#category_info').css('display','none');
  $('#related_info').css('display','block');
});

});
</script>
   
   <script language="JavaScript">



  function selectAll(source) {
    checkboxes = document.getElementsByName('relatedid[]');
    for(var i in checkboxes)
      checkboxes[i].checked = source.checked;
  }
</script> 

<script>
  $(function () {
    CKEDITOR.replace('product_description');
    CKEDITOR.replace('safety_information');
    CKEDITOR.replace('side_effects');
   // CKEDITOR.replace('tab4_details');
  });
</script>
<script>
    $(".cat_tab li").click(function(){
   $(".active").removeClass("active");
   $(this).addClass("active");
    });

</script>




<script>
$(document).ready(function(){

      $('#submitform').click(function(){

     
      
      
   
    
     
      
      });
});
</script>

<script>
var abc = 0;      // Declaring and defining global increment variable.
$(document).ready(function() {
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
$('#add_more').click(function() {
$(this).before($("<div/>", {
id: 'filediv'
}).fadeIn('slow').append($("<input/>", {
name: 'file[]',
type: 'file',
id: 'file'
}), $("<br/><br/>")));
});
// Following function will executes on change event of file input to select different file.
$('body').on('change', '#file', function() {
if (this.files && this.files[0]) {
abc += 1; // Incrementing global variable by 1.
var z = abc - 1;
var x = $(this).parent().find('#previewimg' + z).remove();
$(this).before("<table id='abcd" + abc + "' class='abcd table table-hover tablesorter'><tr><td>"+ abc +"</td><td><img id='previewimg" + abc + "' src='' width='250'/></td></tr></table>");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
$("#abcd" + abc).append($("<img/>", {
id: 'img',
src: 'images/delete.png',
alt: 'delete'
}).click(function() {
$(this).parent().parent().remove();
}));
}
});
// To Preview Image
function imageIsLoaded(e) {
$('#previewimg' + abc).attr('src', e.target.result);
};
$('#upload').click(function(e) {
var name = $(":file").val();
if (!name) {
alert("First Image Must Be Selected");
e.preventDefault();
}
});
});
</script>
<!---related product---->

    
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
                                                            function checkAll()
                                                            {

                                                                len = document.getElementsByClassName('check').length;
                                                                //alert("Please Select Ok to Send All");
                                                                if (document.getElementById('check_all').checked == true)
                                                                {
                                                                    for (i = 1; i <= len; i++)
                                                                    {
                                                                        //alert("I : "+i)
                                                                        document.getElementById('check' + i).checked = true;
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    for (i = 1; i <= len; i++)
                                                                    {
                                                                        document.getElementById('check' + i).checked = false;
                                                                    }
                                                                }
                                                            }
        </script>
        <script type="text/javascript">
          $(document).ready(function(){

var i = $('input').size() + 1;

$('a.add').click(function() {

$('<div class="newpp"><div class="col-md-12 inputarea form-group"> <div class="col-md-4"><input type="text" class="form-control" name="varient_formulation[]" placeholder="Formulation" value=""></div><div class="col-md-4"><input type="text" class="form-control" name="varient[]" value="" placeholder="Varient"></div><div class="col-md-4"><input type="text" class="form-control" name="varient_unit[]" placeholder="Varient Unit" value=""></div><div class="col-md-4"><input type="file" class="form-control" name="varient_img[]"></div></div></div>').animate({ opacity: "show" },
"slow").appendTo('#inputs');
i++;
});
$('a.remove').click(function() {
if(i > 2) {
$('div.newpp:last').animate({opacity:"hide"}, "slow").remove();
i--;
}
});
})


          $(document).ready(function(){

var i = $('input').size() + 1;

$('a.addcompany').click(function() {

$('<div class="newpp2"><div class="inputarea12 form-group"><div class="col-md-12"><input type="text" class="form-control" name="company_name[]" value="" placeholder="Company Name"></div></div></div>').animate({ opacity: "show" },
"slow").appendTo('#inputs12');
i++;
});
$('a.removecompany').click(function() {
if(i > 2) {
$('div.newpp2:last').animate({opacity:"hide"}, "slow").remove();
i--;
}
});
})

        </script>


    <style>
    .pagination{width: 100%;}
    .ui-accordion-content {height: 180px;}
    </style>
         
  </body>
</html>

