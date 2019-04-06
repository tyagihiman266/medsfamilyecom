<?php
    @session_start();
	error_reporting(0);
    require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
    $objT = new User();
		 $side = "product";
   $userid=$_SESSION['username'];
     $side = 'catalog' ;
     $p1side = 'attribute-list' ;
	 ?>
<?php 
		$attribute_id  = $_REQUEST['id'];
		if(isset($_POST['save'])){

			$attribute_name   =  $_POST['option_name'];
			$attribute_value  =  $_POST['option_value'];

			$count = count($_POST['option_value']);

       

      $sqlD = $objT->QueryDelete2('manage_attribute',$attribute_id);
			for($x=0; $x < $count; $x++ ){  
       $attribute_name   =  $_POST['option_name'][$x];
      $attribute_value  =  $_POST['option_value'][$x];

       $row1 = $objT->getResult( "Select * from manage_attribute where attribute_id = '".$attribute_set_id."'  ");
       $no1 = count($row1);
      if($no1 == 0){
			$queryC =  $objT->QueryInsert("INSERT INTO `manage_attribute`(`attribute_id`, `attribute_name`, `attribute_value`) VALUES ('$attribute_id','$attribute_name ','$attribute_value')");

    }
   
			}

     
			
		}
		
    $rowS   = $objT->getResultById1('manage_attribute',$attribute_id );
 


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





  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include"inc/header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include"inc/side-bar.php";?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<form action="" method="post" >
    <section class="content-header">
      <h1>
          Product Attribute
       
       <?php echo $sms ;  ?>
	   
	   <input style="float: right;"  class="btn btn-primary" type="submit" name="save" value="Save">
      </h1>
     
		
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      
		
         <?php
			if($noS == 0){ ?>
				<div class="controls">
		<div class="entry  row">
			<div class="form-group col-xs-5">
			 <label>Option Name <span class="required">*</span></label>
			<input class="form-control"  required="required" type="text" name="option_name[]" value=""/>
			
			</div>
            
         <div class="form-group col-xs-5">
         <label>Option Value <span class="required">*</span></label>
         <input type="text" pattern="[a-z0-9]{1,25}"  title="ex. color, size etc" required="required" name="option_value[]" id="title"  class="form-control" value="">
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
			 <label>Option Name <span class="required">*</span></label>
			<input class="form-control" value="<?php echo $rowS[$j]['attribute_name']; ?>" required="required" type="text" name="option_name[]" value=""/>
			
			</div>
            
         <div class="form-group col-xs-5">
         <label>Option Value <span class="required">*</span></label>
         <input type="text" pattern="[a-z0-9]{1,25}" value="<?php echo $rowS[$j]['attribute_value']; ?>" title="ex. color, size etc" required="required" name="option_value[]" id="title"  class="form-control" value="">
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
