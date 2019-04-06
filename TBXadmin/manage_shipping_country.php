<?php
    ob_start();
    @session_start();
  //error_reporting(0);
   require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';
	 $p1side = "color";
	$side = "filter";
   $objT = new User();
	
?>

<?php

if(isset($_GET['ids'])){
	  $deleteid = $_GET['ids'];

	  
	$sql = $objT->QueryDelete('countries',$deleteid);
	if($sql){
		$sms = "<p style='text-align:center;color:green;'>Color deleted successfully</p>"; 
		header("refresh:2;url=manage_shipping_country.php");
	
	}

}


if(isset($_POST['delete'])) {
    $id_array = $_POST['data']; 
    $id_count = count($_POST['data']);
 
    for($i=0; $i < $id_count; $i++) {
        $id = $id_array[$i];
		
	  $rowD = $objT->QueryDelete('color_data',$id);
     
	
    }
   header("refresh:2;url=manage_shipping_country.php");
}

?>
<?php 

if($_GET['tag']=='ProgarmActivateDeactivate')
{
  
 $query= $objT->updateStatus('countries',"status",$_GET['active'],$_GET['id']);
}	
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Manage Color</title>
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
        <section class="content-header">
          <h1>
            Manage Shipping Price
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li> >> 
           Manage Shipping Price</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
			  <form id="tab" name="form1" method="post" action="">
                <div class="box-header">
                  <h3 class="box-title"></h3><div style="float:right;"><a href="add_shipping_price.php"><span class="btn btn-success btn-small">Add</span></a>
				  <input type="submit" name="delete" id="submit" onClick="return confirmdelete()" value="Delete Selected" class="btn btn-danger btn-small"></div>
                </div><!-- /.box-header -->
                <div class="box-body">
				
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					  <th><input type="checkbox" id="check_all" value=""></th> 
                        <th>S.No</th>
                        <th>Country Name </th>
                        <th>Shipping Price</th>
						            <th>Action</th>
						
                      </tr>
                    </thead>
                    <tbody>
					<?php

                $row=$objT->getResult('select * from countries order by id desc');
               

                $count = count($row);
                     $i=1;
                      $j=0;

                     while($count > 0){	
		             ?>
                      <tr>
				      <td> <input type="checkbox" value="<?php echo $row[$j]['id']; ?>" name="data[]" id="data" title="Select All" /></td>
 
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row[$j]['country'] ; ?></td>
                        <td><?php echo $row[$j]['shipping_price'] ; ?></td>
					<td>
                        <a href="manage_shipping_country.php?ids=<?php echo $row[$j]['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete')">Delete</a>
					<a href="add_shipping_price.php?edit=<?php echo $row[$j]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
					
                      </tr>
                     <?php $i++;
                     $j++;
                     $count--;
                      } ?>
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div></form><!-- /.box -->
			  
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
   
	<script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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
  </body>
</html>
