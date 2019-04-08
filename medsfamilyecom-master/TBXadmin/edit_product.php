<?php 
@session_start();
require_once ("inc/main.php");
    include_once("include/User.php");
    include_once("include/resize-class.php");
    include 'inc/head.php';
    $objT = new User();

	 
	 	  $pid = $_REQUEST['edit'];
	  


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
  'ingredient'         =>    $_POST['ingredient'],
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
	  

 $query = $objT->updateQuery($colArray,'tbl_product',$pid);

  /*updating product category*/
  $pro_cat=$_POST['pro_cat'];
 /// echo $pid;
   $checkentry=$objT->getProductCatResultById("product_category_detail",$pid);
       // print_r($checkentry);
        if(!empty($checkentry)){
           	$cat_update = $objT->QueryRun("UPDATE product_category_detail SET category_id =$pro_cat  WHERE product_id= '".$pid."'");
        }else{
                 /*inserting product category*/
                  $catArray = array(
                  'id'     => '',
                  'product_id'     => $pid,
                  'category_id'   => $_POST['pro_cat'],
                  ); 
                 $cat_insert_id = $objT->insertQuery($catArray,"product_category_detail");
                     
        }
	   
 /*updating product tag*/
  $tagarray=$_POST['p_tag'];
   $allArray =array();
$jsons = json_decode($tagarray[0]);
//print_r($jsons);
      $checkentrytag=$objT->getProductCatResultById("product_tags",$pid);
           // print_r($checkentry);
            if(!empty($checkentrytag)){
                $tag_delete = $objT->QueryRun("delete from product_tags  WHERE product_id= '".$pid."'");
                   
            }
         /*inserting product category*/
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

                         
            

  /*updating product tag*/
 	
if($_POST['url_key']==''){
		$proname = $_POST['title_name'];
	$url_key = preg_replace('#()*!~-=+|\/[^0-9a-z%]+#i', '-', $proname);
$url_key = str_replace(' ', '-', $url_key);
$url_key = strtolower($url_key,'UTF-8');
	}else{
		$url_key=$_POST['url_key'];
	}

	
	if($_POST['imagremov'] && $_POST['imagremov']!=''){
		for($l=0;$l<count($_POST['imagremov']);$l++){
			$remove_img[$l] = $_POST['imagremov'][$l];
			$removeimg =  implode(" , ",$remove_img);

                 $row1 = $objT->getResult("select image from tbl_pro_img where img_id = '".$remove_img[$l]."'");

             $path1 = "upload/product/thumbs/" ;
             $path2= "upload/product/medium/" ;
             $path3 = "upload/product/big" ;
           if(file_exists($path1.$row1[0]['image'])) {
            unlink($path1.$row1[0]['image']);
          }
           if(file_exists($path2.$row1[0]['image'])) {
            unlink($path2.$row1[0]['image']);
          }
           if(file_exists($path3.$row1[0]['image'])) {
            unlink($path3.$row1[0]['image']);
          }

			$delete = $objT->QueryRun("DELETE FROM tbl_pro_img WHERE img_id = '".$remove_img[$l]."'");
		}
	}

	

		if(isset($_POST['imagefront'])){
			$query_img = $objT->QueryRun("UPDATE tbl_pro_img SET front_status = 0 WHERE p_id= '".$pid."'");
			$query_img = $objT->QueryRun("UPDATE tbl_pro_img SET front_status = 1 WHERE img_id= '".$_POST['imagefront']."'");
		}

		
	
		for($i=1;$i<=count($_FILES['file']['name']);$i++) {
		$sepext = explode('.', $_FILES['file']['name'][$i-1]);
		$type = end($sepext);
		
		//$uniqueID = md5(uniqid());
		$newFileName = $sepext[0].$pid.'.'.$type;
		$RnewFileName = $sepext[0].$pid.'.'.$type;
		if(move_uploaded_file($_FILES['file']['tmp_name'][$i-1],"upload/product/big/".$newFileName)) {
		
			$resizeObj = new resize("upload/product/big/".$newFileName);	
			$resizeObj -> resizeImage(300, 300, 'crop');	
			$resizeObj -> saveImage("upload/product/thumbs/".$RnewFileName, 100);		
			
			$resizeObj -> resizeImage(500, 500, 'crop');	
			$resizeObj -> saveImage("upload/product/medium/".$newFileName, 100);		
			
			$objT->QueryRun("INSERT INTO tbl_pro_img SET p_id = '".$pid."' , front_status = 0, image = '".$RnewFileName."'");
			
		} 
	}


	
		
	
	
		if(!empty($_POST['relatedpro'])){
		    //deleting old
		        $rpro_delete = $objT->QueryRun("delete from related_product  WHERE product_id= '".$pid."'");
                
		    //inserting new
                $allrelated = $_POST['relatedpro'];
                foreach($allrelated as $related){ 
                $filterArray = array(
                'product_id' => $pid,
                'related_product_id' => $related
                );
                $query1 = $objT->insertQuery($filterArray,"related_product");
                
                }
	
		}
		

	
	
	$date = date('y:m:d h:m:s');

	
	

   /* $query = $objC->UpdateProduct($pid,$title_name,$tab1_lable,$tab1_details,$tab2_lable,$tab2_details,$tab3_lable,$tab3_details,$tab4_lable,$tab4_details,$sku,$protodate,$profromdate,$status,$ptax,$feature_pro,$url_key,$price,$specialprice,$meta_title,$meta_keywords,$meta_description,$qty,$stock,$shop_by,$brand,$country,$date,$giftwrapp);*/

    if($query)
    {  
       $sms="<p style='text-align:center;color:green;'>Product Update Successfully.</p>";
       header("location:edit_product?edit=".$pid);

        //header("refresh:2;url=edit-product.php?edit=".$pid);   
     
    }
    else
    {
        $sms="Something went wrong please try again";
    }
	 }
	  $row1 = $objT->getResultById('tbl_product',$pid);	
	  $getinfo = $objT->getProductCatResultById('product_category_detail',$pid);	
	  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Update Product</title>
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
            Update Product
           <div style="float: right;"><a href="view_product"><button  class="btn btn-primary">Back</button></a></div>
          </h1>
         <!--- <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product</li>
          </ol>-->
		  <div class="row">
        <div class="col-lg-12 cat_tab">
            <style>
		.breadcrumb > .active {color: #fff;background-color: #367fa9;border: 1px solid #073c5a;border-radius: 5px;}
</style>
		<ol class="breadcrumb">
                <li style="margin-left: 0px;cursor: pointer;" class="general active">General</li>
                     
                <li style="margin-left: 0px;cursor: pointer;" class="meta"> Meta Information</li>        
              
                <li style="margin-left: 0px;cursor: pointer;" class="image">Images</li>        
                   
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
 <input type="hidden" name="proid" value="<?=$pid;?>">
             

              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Product  </h3>
				  <?php if(isset($sms)){
					  echo $sms;
				  } ?>
                <input type="submit" style="float: right;" name="btn_submit" class="btn btn-primary" id="submitform" value="Update">
                </div><!-- /.box-header -->
                <div class="box-body">
				
 
		<div id="general_info">

			   <div class="form-group">
                      <label>Select Salt<span class="required">*</span></label>
                     <?php $rowsalt=$objT->getResult('select * from tbl_product_salt where status=1 order by id desc'); ?>
                      <select name="salt_id" class="form-control">
                         <option value="">Select Salt</option>
                         <?php foreach($rowsalt as $key => $val) 
                                      { ?>
                          <option value="<?php echo $val['id'] ?>#<?php echo $val['salt_name'] ?>" <?php if($row1['salt_id']==$val['id']) { ?> selected <?php } ?>><?php echo $val['salt_name'] ?></option>
                        <?php } ?>
                          </select>

             <span class="required" id="error_title"></span>
                    </div>
    
            <div class="form-group">
            <label>Select Category Type<span class="required">*</span></label>
            <?php $rowsalt=$objT->getResult('select * from product_category where status=1 order by category_id desc'); ?>
            <select name="pro_cat" class="form-control">
            <option value="">Select Category</option>
            <?php foreach($rowsalt as $key => $val) 
            { ?>
            <option value="<?php echo $val['category_id'] ?>"
            <?php if($getinfo[0]['category_id']==$val['category_id']) { echo "selected";}?> 
            ><?php echo $val['category_name'] ?></option>
            <?php } ?>
            </select>
            </div>
            
            
            <div class="form-group">
			<label>Title<span class="required">*</span></label>
			<input type="text" class="form-control" name="title_name" id="title" value="<?=$row1['name']?>"><span class="required" id="error_title"></span>
			</div>

			     <div class="form-group">
                      <label>Ingredient<span class="required">*</span></label>
              <input type="text" name="ingredient" id="ingredient"  class="form-control" value="<?=$row1['ingredient']?>"><span class="required"></span>
                    </div>


			  <div class="form-group">
                      <label>Short Description</label>
                      <textarea name="short_description" id="short_description" class="form-control"><?=$row1['short_description']?></textarea>
                     </div>

                     <div class="form-group">
              <label>Product Description</label>
                      <textarea name="product_description" id="product_description" class="form-control"><?=$row1['short_description']?></textarea>
        </div>
        
       <div class="form-group">
                      <label>Safety information<span class="required">*</span></label>
                        <textarea name="safety_information" id="safety_information" class="form-control"><?=$row1['safety_information']?></textarea>
              </span>
                    </div>
          <div class="form-group">
              <label>Side effects</label>
                      <textarea name="side_effects" id="side_effects" class="form-control"><?=$row1['side_effects']?></textarea>
        </div>

          <div class="form-group">
                      <label>Other name</label>
                      <textarea name="other_name" id="other_name" class="form-control"><?=$row1['other_name']?></textarea>
                     </div>
					
				
				              
				  <div class="form-group">
						  <label>Sku<span class="required">*</span></label>
						<input type="text" class="form-control" name="sku" id="sku" value="<?=$row1['sku_number']?>"><span class="required" id="error_sku"></span>
					</div>
					  <div class="form-group">
					  <label>Status<span class="required">*</span></label>
						<select class="form-control" name="status" id="status">
						<option value="">--Please Select--</option>
						<option <?php if($row1['status']=='1'){echo 'selected';} ?> value="1">Enabled</option>
						<option <?php if($row1['status']=='0'){echo 'selected';} ?> value="0">Disabled</option>
				</select><span class="required" id="error_status"></span>
			</div>

		
					
					  <div class="form-group">
					  <label>Url Key</label>
					<input class="form-control" type="text" name="url_key" value="<?=$row1['url_key']?>">
					</div>
					
			
			   <div class="form-group">
			   <label>Best Seller</label>
					<select class="form-control" name="best_seller">
					<option <?php if($row1['best_seller']=='0'){echo 'selected';} ?> value="0">No</option>
					<option <?php if($row1['best_seller']=='1'){echo 'selected';} ?> value="1">Yes</option>
					</select>
									</div>
						 
				        </div>	

				
				       <div id="meta_info" style="display:none;">
				            <div class="form-group">
				            <label>Meta Title</label>
							<input class="form-control" type="text" name="meta_title" id="meta_title" value="<?=$row1['meta_title']?>">
							</div>

				               <div class="form-group">
				              <label>Meta Keywords</label> 
							  <textarea class="form-control" name="meta_keywords" id="metakey"><?=$row1['meta_keyword']?></textarea>
				            </div>
							
                        <div class="form-group">			
                        <label>Meta Description</label>
                        <textarea class="form-control" name="meta_description" id="meta_desc"><?=$row1['meta_description']?></textarea>
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
                     <?php $protags=$objT->getProductCatResultById("product_tags",$pid);  
                     //print_r($protags);
                     $coll="";
                     foreach($protags as $collecttag){
                         $coll.=$collecttag['tag_name'].",";
                     }
                     $values=rtrim($coll,",");
                     ?>
           
                <input name='p_tag[]' id='tags' class='some_class_name' placeholder='Write Product tags' value='<?php echo $values;?>' autofocus >
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

		

				<div id="images_info" style="display:none;">
				          Images:
				<div id="filediv">
				<table class="table table-bordered table-striped">

				                      <tr>
				                        <th>S.No</th>
				                        <th>Image</th>
				                        <th>Front</th>
										<th>Remove</th>
										
				                      </tr>
				                    </thead>
				                    <tbody>
				<?php 
				
				$proimg =  $objT->getResult("SELECT * FROM tbl_pro_img WHERE p_id = '".$pid."'"); 
				$i=1;
				$pro =0;
				$countpro = count($proimg);
				//print_r($proimg) ;
				while($countpro > 0){
				?>
				<tr>
				<td><?=$i;?></td>
				<td><img src="upload/product/thumbs/<?=$proimg[$pro]['image'];?>" style="width:100px;height:100px;"></td>
				<td><input <?php if($proimg[$pro]['front_status'] ==1){ echo 'checked';} ?> type="radio" name="imagefront" value="<?=$proimg[$pro]['img_id']?>"></td>
				<td><input type="checkbox" name="imagremov[]" value="<?=$proimg[$pro]['img_id']?>"></td>
				</tr>
				<?php $i++; 
				$pro++;
				$countpro--;
				 } ?>
				                    </tbody>

				</table>
				<input name="file[]" type="file" id="file" multiple/></div>
				<input type="button" id="add_more" class="upload" value="Add More Files"/>

				</div>	
				
				<div id="category_info" style="display:none;">
    
                  <div class="form-group">

        <label > Select Category</label>
        <select class="form-group form-control" name="cat_id" >
          <option value="">Select category</option>
          
  <?php 

    $rowpcat= $objT->getResult("SELECT * FROM manage_category where parent_id=0");

     foreach($rowpcat as $key => $Pcat)
     {

?>
 <option value="<?php echo $Pcat['id'] ?>" <?php if($row1['cat_id']==$Pcat['id']) { ?> selected <?php } ?>><?php echo $Pcat['category_name'] ?></option>

<?php } ?>
        </select>
     </div>
  
				</div>

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
								<?php  $i = 1;
                 $t = 0;
				$relatedpro =$objT->getResult("SELECT * FROM tbl_product WHERE id != '".$pid."'");

				$countT = count($relatedpro);
				    while($countT > 0){
						 
						  $sql1 = $objT->getResult("select * FROM related_product WHERE product_id = '".$pid."' AND related_product_id = '".$relatedpro[$t]['id']."'"); 
										  $no = count($sql1);
				 ?>
		                <tr>
						<td> <input <?php if($no == 1){ echo 'checked';} ?> type="checkbox" value="<?php echo $relatedpro[$t]['id']; ?>" name="relatedpro[]" id="data" title="Select All" /></td>
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

						
		        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include"inc/footer.php"; ?>

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
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
	$('#price_info').css('display','none');
	$('#meta_info').css('display','none');
	$('#filter_info').css('display','none');
	$('#images_info').css('display','none');
	$('#inventory_info').css('display','none');
	$('#category_info').css('display','none');
	$('#related_info').css('display','none');
});
$('.price').click(function(){
	$('#general_info').css('display','none');
	$('#price_info').css('display','block');
	$('#meta_info').css('display','none');
	$('#filter_info').css('display','none');
	$('#images_info').css('display','none');
	$('#inventory_info').css('display','none');
	$('#category_info').css('display','none');
	$('#related_info').css('display','none');
});
$('.meta').click(function(){
	$('#general_info').css('display','none');
	$('#price_info').css('display','none');
	$('#meta_info').css('display','block');
	$('#filter_info').css('display','none');
	$('#images_info').css('display','none');
	$('#inventory_info').css('display','none');
	$('#category_info').css('display','none');
	$('#related_info').css('display','none');
});

$('.filter').click(function(){
	$('#general_info').css('display','none');
	$('#price_info').css('display','none');
	$('#meta_info').css('display','none');
	$('#filter_info').css('display','block');
	$('#images_info').css('display','none');
	$('#inventory_info').css('display','none');
	$('#category_info').css('display','none');
	$('#related_info').css('display','none');
});
$('.image').click(function(){
	$('#general_info').css('display','none');
	$('#price_info').css('display','none');
	$('#meta_info').css('display','none');
	$('#images_info').css('display','block');
	$('#filter_info').css('display','none');
	$('#inventory_info').css('display','none');
	$('#category_info').css('display','none');
	$('#related_info').css('display','none');
});
$('.inventry').click(function(){
	$('#general_info').css('display','none');
	$('#price_info').css('display','none');
	$('#meta_info').css('display','none');
	$('#images_info').css('display','none');
	$('#filter_info').css('display','none');
	$('#inventory_info').css('display','block');
	$('#category_info').css('display','none');
	$('#related_info').css('display','none');
});

$('.category').click(function(){
	$('#general_info').css('display','none');
	$('#price_info').css('display','none');
	$('#meta_info').css('display','none');
	$('#images_info').css('display','none');
	$('#filter_info').css('display','none');
	$('#inventory_info').css('display','none');
	$('#category_info').css('display','block');
	$('#related_info').css('display','none');
});

$('.relatedpro').click(function(){
	$('#general_info').css('display','none');
	$('#price_info').css('display','none');
	$('#meta_info').css('display','none');
	$('#filter_info').css('display','none');
	$('#images_info').css('display','none');
	$('#inventory_info').css('display','none');
	$('#category_info').css('display','none');
	$('#related_info').css('display','block');
});

});
</script>
	<script>
  $(function () {
 CKEDITOR.replace('product_description');
    CKEDITOR.replace('safety_information');
    CKEDITOR.replace('side_effects');
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
				if($.trim($("#title").val())=="")
			   {
				$("#error_title").html("Required This Field");
				$("#title").focus();
				return false;
			   }
			$('#error_title').html("");
			
			
			
			if($.trim($("#status").val())=="")
			{
				$("#error_status").html("Required This Field");
				$("#status").focus();
				return false;
			}
			$('#error_status').html("");
			
			
			
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
$(this).before("<table id='abcd" + abc + "' class='abcd table table-hover tablesorter'><tr><td></td><td><img id='previewimg" + abc + "' src='' width='250'/></td></tr></table>");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
<!---
//$("#abcd" + abc).append($("<img/>", {
//id: 'img',
//src: '<?php echo HTTP_JS_PATH; ?>x.png',
//alt: 'delete'
//}).click(function() {
//$(this).parent().parent().remove();
//}));
-->
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

		<style>
		.pagination{width: 100%;}
		.ui-accordion-content {height: 180px;}
		</style>
	

  </body>
</html>
