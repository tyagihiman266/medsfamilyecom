<?php

    @session_start();
  ini_set('display_errors',1);
error_reporting(E_ALL);
    require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
    $objT = new User();
		 $side = "product";
     $side = 'catalog' ;
     $p1side = 'attribute-list' ;
	 ?>
<?php 

		$pcl_id  = $_REQUEST['id'];
    $type    = $_REQUEST['type'];


		if(isset($_POST['save'])){

      $pcl_id1 =  $pcl_id;
      $type1   =  $type;
			$name    =  $_POST['name'];
			$font    =  $_POST['font'];
      $color   =  $_POST['color'];
      $status  =  '1';  
      $image   =  $_FILES['file']['name'];
 
			$count = count($name);
      $sqlD = $objT->QueryDelete4('product_customization_type',$pcl_id1,$type1);



		
        for($x=0; $x < $count; $x++ ){   
        
              $name    =  $_POST['name'][$x];
              $ctype    =$_POST['ctype'][$x];
              $font    =  $_POST['font'][$x];
              $color   =  $_POST['color'][$x];
              $image   =  $_FILES['file']['name'][$x];
          
              $target_dir = "upload/";
              $target_file = $target_dir . basename(time().$image);
              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

               $image= time().$image;

               $queryC =  $objT->QueryInsert("INSERT INTO  product_customization_type set pcl_id='".$pcl_id."',type='".$type."',childtype='".$ctype."',name='".$name."',font='".$font."',color='".$color."',image='".$image."',status=1");
            /*
               $queryC =  $objT->QueryInsert("INSERT INTO  product_customization_type (pcl_id,type,childtype,name,font,color,image,status) VALUES ('$pcl_id','$type1','$ctype','$name','$font','$color','$image','1')"); */
               move_uploaded_file($_FILES["file"]["tmp_name"][$x],$target_file);
           
      

       }
  
            if($queryC) {  
          
               $sms="<p style='text-align:center;color:green;'>Product Added Successfully.</p>";
     
             }
       } 
  	
    $rowS   = $objT->getResultById2('product_customization_type',$pcl_id);
       
		$count1 = count($rowS);
    $noS    = count($rowS);
		$noM    = $noS - 1;

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Product Attribute</title>
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
	<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
            function confirmdelete()
            {
                var Conf = confirm("Are you sure you want to delete Selected records?");
                if (Conf == true)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>



<script src="js/jscolor.js"></script>

  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include"inc/header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include"inc/side-bar.php";?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<form action="" method="post"  enctype="multipart/form-data">
    <section class="content-header">
      <h1>
          Product Customization type
       
       
	   
	   <input style="float: right;"  class="btn btn-primary" type="submit" name="save" value="Save">
      </h1>
     <?php echo $sms ;  ?>
		
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      

      <?php if($type == 1) {  ?>
         <?php


			if($noS == 0){ ?>
				<div class="controls">
		<div class="entry  row">
			<div class="form-group col-xs-5">
			 <label>Name <span class="required">*</span></label>
			<input class="form-control"  required="required" type="text" name="name[]" value=""/>
			
			</div>
            
         <div class="form-group col-xs-5">
         <label>Image <span class="required">*</span></label>
         <input type="file"  title="ex. color, size etc" required="required" name="file[]" id="title"  class="form-control" value=""/>
		</div>
		
		 <div class="form-group col-xs-2">
		  <label>&nbsp;</label>
				
				<?php if( $noS == $no ){ ?>
				<button class="btn btn-success btn-add" type="button">
					<span class="glyphicon glyphicon-plus"></span>
					</button>
				<?php }else{ ?>
				<button class="btn btn-danger btn-remove"  type="button"  ?>">
					<span class="glyphicon glyphicon-minus"></span>
					</button>
				<?php } ?>
                  
                
		</div>
		
		
			
			</div>
        </div>
			<?php }else {
		 $no = 1 ;
     $j = 0;
  
		 while($count1 > 0){ ?>   
        <div class="controls">
		<div class="entry  row">
			<div class="form-group col-xs-5">
			 <label>Name <span class="required">*</span></label>
			<input class="form-control" value="<?php echo $rowS[$j]['name']; ?>" required="required" type="text" name="name[]" value=""/>
			
			</div>
            
         <div class="form-group col-xs-5">
         <label>Image <span class="required">*</span></label>
         <input type="file"  value="<?php echo $rowS[$j]['image']; ?>" title="ex. color, size etc" required="required" name="file[]" id="title"  class="form-control" value=""/>
		</div>

     <div class="form-group col-xs-5">
         <label>Default <span class="required">*</span></label>
        <input type="radio"  required="required" name="default_type" class="default_status" value="<?php echo $rowS[$j]['id']; ?>" <?php if($rowS[$j]['default_status']==1) { ?>checked <?php } ?>/>
    </div>
		
		 <div class="form-group col-xs-2">
		  <label>&nbsp;</label>
				
				<?php if( $noS == $no ){ ?>
				<button class="btn btn-success btn-add" type="button">
					<span class="glyphicon glyphicon-plus"></span>
					</button>
				<?php }else{ ?>
				<button class="btn btn-danger btn-remove" type="button">
					<span class="glyphicon glyphicon-minus"></span>
					</button>
				<?php } ?>
                  
                
		</div>
		
		
			
			</div>
        </div>
	
		 <?php  
     $no++;
     $count1--;
     $j++; 
			} } ?>


		<?php } elseif($type == 2) { ?>


     <?php
      if($noS == 0){ ?>
        <div class="controls">
    <div class="entry  row">
      <div class="form-group col-xs-5">
       <label>Font Name <span class="required">*</span></label>
      <input class="form-control"  required="required" type="text" name="name[]" value=""/>
      
      </div>
            
         <div class="form-group col-xs-5">
         <label>Font <span class="required">*</span></label>
         <input type="text" pattern="[a-z0-9]{1,25}"  title="ex. color, size etc" required="required" name="font[]" id="title"  class="form-control" value="">
    </div>
    
     <div class="form-group col-xs-2">
      <label>&nbsp;</label>
        
        <?php if( $noS == $no ){ ?>
        <button class="btn btn-success btn-add" type="button">
          <span class="glyphicon glyphicon-plus"></span>
          </button>
        <?php }else{ ?>
        <button class="btn btn-danger btn-remove"  type="button"  ?>">
          <span class="glyphicon glyphicon-minus"></span>
          </button>
        <?php } ?>
                  
                
    </div>
    
    
      
      </div>
        </div>
      <?php }else {
     $no = 1 ;
     $j = 0;
  
     while($count1 > 0){ ?>   
        <div class="controls">
    <div class="entry  row">
      <div class="form-group col-xs-5">
       <label>Font Name <span class="required">*</span></label>
      <input class="form-control" value="<?php echo $rowS[$j]['name']; ?>" required="required" type="text" name="name[]" value=""/>
      
      </div>
            
         <div class="form-group col-xs-5">
         <label>Font <span class="required">*</span></label>
         <input type="text" pattern="[a-z0-9]{1,25}" value="<?php echo $rowS[$j]['font']; ?>" title="ex. color, size etc" required="required" name="font[]" id="title"  class="form-control" value="">
    </div>

       <div class="form-group col-xs-5">
         <label>Default <span class="required">*</span></label>
         <input type="radio" required="required" name="default_type"   class="default_status" value="<?php echo $rowS[$j]['id']; ?>" <?php if($rowS[$j]['default_status']==1) { ?>checked <?php } ?>/>
    </div>
    
     <div class="form-group col-xs-2">
      <label>&nbsp;</label>
        
        <?php if( $noS == $no ){ ?>
        <button class="btn btn-success btn-add" type="button">
          <span class="glyphicon glyphicon-plus"></span>
          </button>
        <?php }else{ ?>
        <button class="btn btn-danger btn-remove" type="button">
          <span class="glyphicon glyphicon-minus"></span>
          </button>
        <?php } ?>
                  
                
    </div>
    
    
      
      </div>
        </div>
    
     <?php  
     $no++;
     $count1--;
     $j++; 
      } } ?>



    <?php }elseif($type == 3) {?> 


     <?php
      if($noS == 0){ ?>
        <div class="controls">
    <div class="entry  row">
      <div class="form-group col-xs-5">
       <label>Color Name <span class="required">*</span></label>
      <input class="form-control"  required="required" type="text" name="name[]" value=""/>
      
      </div>
            
         <div class="form-group col-xs-5">
         <label>Color Code<span class="required">*</span></label>
         <script src="js/jscolor.js"></script> 
         <input type="text"    required="required" name="color[]" id="title"  class="jscolor form-control" value="">
    </div>
    
     <div class="form-group col-xs-2">
      <label>&nbsp;</label>
        
        <?php if( $noS == $no ){ ?>
        <button class="btn btn-success btn-add" type="button">
          <span class="glyphicon glyphicon-plus"></span>
          </button>
        <?php }else{ ?>
        <button class="btn btn-danger btn-remove"  type="button"  ?>">
          <span class="glyphicon glyphicon-minus"></span>
          </button>
        <?php } ?>
                  
                
    </div>
    
    
      
      </div>
        </div>
      <?php }else {
     $no = 1 ;
     $j = 0;
  
     while($count1 > 0){ ?>   
        <div class="controls">
    <div class="entry  row">
      <div class="form-group col-xs-5">
       <label>Color Name <span class="required">*</span></label>
      <input class="form-control" value="<?php echo $rowS[$j]['name']; ?>" required="required" type="text" name="name[]" value=""/>
      
      </div>
           
         <div class="form-group col-xs-5">
         <label>Color Code <span class="required">*</span></label>
          
         <input type="text"  value="<?php echo $rowS[$j]['color']; ?>" title="ex. color, size etc" required="required" name="color[]" id="title"  class="jscolor form-control" value="">
    </div>

       <div class="form-group col-xs-5">
         <label>Default <span class="required">*</span></label>
         <input type="radio"  required="required" name="default_type" class="default_status" value="<?php echo $rowS[$j]['id']; ?>" <?php if($rowS[$j]['default_status']==1) { ?>checked <?php } ?>/>
    </div>
    
     <div class="form-group col-xs-2">
      <label>&nbsp;</label>
        
        <?php if( $noS == $no ){ ?>
        <button class="btn btn-success btn-add" type="button">
          <span class="glyphicon glyphicon-plus"></span>
          </button>
        <?php }else{ ?>
        <button class="btn btn-danger btn-remove" type="button">
          <span class="glyphicon glyphicon-minus"></span>
          </button>
        <?php } ?>
                  
                
    </div>
    
    
      
      </div>
        </div>
    
     <?php  
     $no++;
     $count1--;
     $j++; 
      } } ?>

    <?php }else if($type==4) { ?>
  <div class="controls">
    <div class="entry  row">
      <div class="form-group col-xs-5">
       <label>Name <span class="required">*</span></label>
      <input class="form-control"  required="required" type="text" name="name[]" value=""/>
      
      </div>
            
         <div class="form-group col-xs-5">
         <label>Type <span class="required">*</span></label>
         <select name="ctype[]" id="ctype" class="form-control">
      <option value="">--Please Select--</option>
      <option <?php if($rowL['ctype']=='1'){echo 'selected';} ?> value="1">Image</option>
      <option <?php if($rowL['ctype']=='2'){echo 'selected';} ?> value="2">Text</option>
      <option <?php if($rowL['ctype']=='3'){echo 'selected';} ?> value="3">Color</option>
       <option <?php if($rowL['ctype']=='5'){echo 'selected';} ?> value="5">Radio</option>
       <option <?php if($rowL['ctype']=='4'){echo 'selected';} ?> value="4">Multiple</option>
      </select>
    </div>
    
     <div class="form-group col-xs-2">
      <label>&nbsp;</label>
        
      
        <button class="btn btn-success btn-add" type="button">
          <span class="glyphicon glyphicon-plus"></span>
          </button>
       
        <button class="btn btn-danger btn-remove"  type="button"  ">
          <span class="glyphicon glyphicon-minus"></span>
          </button>
        
                  
                
    </div>
    
    
      
      </div>


         <div>
          <ul style="list-style: none;">
             <?php

             $customchild = $objT->getResult("select * from product_customization_type where pcl_id = ".$_REQUEST['id']." and type=4"); 
               foreach($customchild as $key => $val)
               { ?>
                
                  
                 <li><?php echo $val['name']; ?> <a href="add_cutom_child.php?type=<?php echo $val['childtype'] ?>&pctype_id=<?php echo $val['id'] ?>">Add Options</a> </li>

              


             <?php
              }
             ?>
               </ul>
          </div>
        </div>

          


     <?php
      } else {

       echo "no type found";
    }
      ?>
		
		
		   
		  
            </section>
			</form> 
    <!-- /.content -->
    
    
    
    
    
    
    
    <div class="clearfix"></div>
  </div>
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
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- page script -->
   
   <script type="text/javascript">
   
$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});

$(document).on('click','.default_status',function(){
  var defaultid=$(this).val();
    $.ajax({
                type: "post",
                url: "make_default.php",
                data: {'default_id':defaultid,'customizetype':<?php echo $_REQUEST['id'] ?>,'typeid':<?php echo $_REQUEST['type'] ?>},
                 success: function(result){
                   alert('default set Successfully');
                 }
                    
            })


  });

</script>
<style>
.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}

.btn-add, .btn-remove {
    margin-top: 28px;
}
</style>
  </body>
</html>
