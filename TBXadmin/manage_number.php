<?php
     @session_start();
  error_reporting(0);
     require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';

	$side = "customer"; 
    $objT = new User();

if(isset($_GET['ids'])){

	 $deleteid = $_GET['ids'];
	 
	$sql =$objT->QueryDelete('user_data',$deleteid);
	
	if($sql){
		$sms = "<p style='text-align:center;color:green;'>User deleted successfully</p>"; 
    header("refresh:1;url=user_list");
	
	}
}


if($_GET['tag']=='ProgarmActivateDeactivate')

{ 
   $query= $objT->updateStatus('user_data',"status",$_GET['active'],$_GET['id']);
   header("refresh:2;url=user_list");
}	
	$query = "SELECT * FROM phone_number order by id asc";
	$results = $objT->getResult($query);
	$arr = count($results);
	$x = 0;
	$i = 1;
	
	include 'inc/head.php';
?>

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
            Manage Number
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> >> 
            Manage Number</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
            <div class="col-xs-12">
              

              <div class="box">
			  <form id="tab" name="form1" method="post" action="">
                <div class="box-header">
                  <h3 class="box-title">Manage Number</h3>
				  <div style="float:right;"><a href="add_number"><span class="btn btn-success btn-small">Add Number</span></a>
				  	
				  </div>

                </div><!-- /.box-header -->
                <div class="box-body">
					<?php if(isset($_SESSION['sms'])){
					  echo $_SESSION['sms'];
					  unset($_SESSION['sms']);
				  } ?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>					 
                        <th>S.No</th>
                        <th>Name</th>
                        
                        <th>Number</th>
                        
						            <th>Action</th>						
                      </tr>
                    </thead>
                    <tbody>	
					          <?php while( $arr > 0){?>
				              <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $results[$x]['Country']; ?></td>
                        
                        <td><?php echo $results[$x]['number']; ?></td>


            						<td><a href="add_number?edit=<?php echo $results[$x]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
                         <a href="user_list?ids=<?php echo $results[$x]['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete')">Delete</a>
            				    <?php if($results[$x]['status']==2){ ?>
						                <a href="user_list?tag=ProgarmActivateDeactivate&active=1&id=<?php echo $results[$x]['id'];?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-success">Active</span></a>
                            <?php } 
                          else { ?>						
                          <a href="user_list?tag=ProgarmActivateDeactivate&active=2&id=<?php echo $results[$x]['id'];?>"  onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service">
                         <span class="label label-danger">DeActive</span></a></td><?php 
                        } 
                        ?>
                      </tr>
                    <?php 
                    $x++;
                    $i++;
                    $arr--;}?>                                           
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
