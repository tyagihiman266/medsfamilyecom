<?php
    require_once ("inc/main.php"); 
	$side = "traffic"; 

//Singel Delete
if(isset($_GET['ids'])){
	 $deleteid = $_GET['ids'];
	 
	$sql = $user->QueryDelete('traffic_survey',$deleteid);
	
	if($sql){
		$sms = "<p style='text-align:center;color:green;'>Survey deleted successfully</p>"; 
		header("refresh:5;url=traffic_survey.php");
	
	}
}


 //Status active/deactive

if($_GET['tag']=='ProgarmActivateDeactivate')
{
   $query= $user->updateStatus('traffic_survey',"status",$_GET['active'],$_GET['id']);
}	
	$query = "SELECT * FROM traffic_survey where status='1' ";
	if($_REQUEST['date']!=''){
		$query .= " and date_cr='".$_REQUEST['date']."' ";
	}
	$query .= " order by traffic_survey_id desc";
	$results = $user->getResult($query);
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
            Manage Traffic Survey
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> >> 
            Manage Traffic Survey</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
            <div class="col-xs-12">
              

              <div class="box">
			  <form id="tab" name="form1" method="get" action="">
                <div class="box-header">
					<h3 class="box-title">Manage Traffic Survey</h3>
					<!--<div class="col-md-12">
						<div class="col-md-4 col-md-offset-4">
							<input type="text" name="date" id="datepicker" class="form-control col-md-4 datepicker" onchange="this.form.submit();" placeholder="Select Date" value="<?php echo $_REQUEST['date'];?>" />
						</div>
					</div>-->

                </div><!-- /.box-header -->
                <div class="box-body">
				<?php if(isset($_SESSION['sms'])){
					  echo $_SESSION['sms'];
					  unset($_SESSION['sms']);
				  } ?>
				  <div class="table-responsive col-md-12"  style="height:390px;">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					 
                        <th>S.No</th>
                        <th>Survey BY</th>
                        <th>Town</th>
						<th>Lat,Lon</th>
						<th>Traffic Volume</th>
                        <!--<th>District</th>
                        <th>State</th>-->
                        <th>Width of Road</th>
                        <th>Location</th>
                        <th>Station No</th>
                        <th>Direction From</th>
                        <th>Direction</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Remarks</th>
                        <th>Source</th>
                       <!-- <th>Name</th>
                        <th>Address</th>
                        <th>Position</th>
                        <th>Mobile No</th>-->
						
						<th>Time </th>
						<th>City Bus </th>
						<th>Intercity Bus </th>
						<th>Mini Bus </th>
						<th>Car </th>
						<th>MTW </th>
						<th>Auto </th>
						<th>Van </th>
						<th>Jeep </th>
						<th>Taxi </th>
						<th>Shared Auto </th>
						<th>Cycle </th>
						<th>Cycle/Rickshaw </th>
						<th>Pedestrian </th>
						<th>Others </th>
						
						<th>Truck </th>
						<th>Trailer </th>
						<th>LCV </th>
						<th>Light Other </th>
						<th>Cycle Rickshaw Goods </th>
						<th>Slow Other </th>
            
						<th>Photo 1</th>
						<th>Photo 2</th>
						<th>Photo 3</th>
						<th>Date</th>
						<th>Action</th>
						
                      </tr>
                    </thead>
                    <tbody>
	
					<?php while($x < $arr){
							$query1 = "SELECT * FROM passenger_vehicle where traffic_survey_id='". $results[$x]['traffic_survey_id']."'";
							$results1 = $user->getResult($query1);
							$query2 = "SELECT * FROM goods_vehicle where traffic_survey_id='". $results[$x]['traffic_survey_id']."'";
							$results2 = $user->getResult($query2);
						?>
				<tr>
				
                        <td><?php echo $i; ?></td>
                        <td><a href="view_user.php?id=<?php echo $results[$x]['users_id']; ?>" target="_blank"><?php echo $user->getName($results[$x]['users_id'],'users'); ?></a></td>
                        <td><?php echo $results[$x]['town']; ?></td>
						<td><?php if($results[$x]['lat']!='' && $results[$x]['lon']!=''){?><a href="http://www.google.com/maps/place/<?php echo $results[$x]['lat'].','.$results[$x]['lon']; ?>" target="_blank">http://www.google.com/maps/place/<?php echo $results[$x]['lat'].','.$results[$x]['lon']; ?></a><?php }?> &nbsp;</td>
						<td><?php echo $results[$x]['traffic_vol']; ?></td>
						<!--<td><?php echo $results[$x]['distt']; ?></td>
						<td><?php echo $results[$x]['state']; ?></td>-->
                        <td><?php echo $results[$x]['road_width']; ?></td>
                        <td><?php echo $results[$x]['location']; ?></td>
                        <td><?php echo $results[$x]['station_no']; ?></td>
                        <td><?php echo $results[$x]['direction_from']; ?></td>
                        <td><?php echo $results[$x]['direction']; ?></td>
                        <td><?php echo $results[$x]['date']; ?></td>
                        <td><?php echo $results[$x]['day']; ?></td>
                        <td><?php echo $results[$x]['remarks']; ?></td>
                        <td><?php echo $results[$x]['source']; ?></td>
                        <!--<td><?php echo $results[$x]['name']; ?></td>
                        <td><?php echo $results[$x]['address']; ?></td>
                        <td><?php echo $results[$x]['position']; ?></td>
                        <td><?php echo $results[$x]['mobile_no']; ?></td>-->
						
						<td><?php echo $results1[0]['times']; ?></td>
						<td><?php echo $results1[0]['city_bus']; ?></td>
						<td><?php echo $results1[0]['intercity_bus']; ?></td>
						<td><?php echo $results1[0]['mini_bus']; ?></td>
						<td><?php echo $results1[0]['car']; ?></td>
						<td><?php echo $results1[0]['mtw']; ?></td>
						<td><?php echo $results1[0]['auto']; ?></td>
						<td><?php echo $results1[0]['van']; ?></td>
						<td><?php echo $results1[0]['jeep']; ?></td>
						<td><?php echo $results1[0]['taxi']; ?></td>
						<td><?php echo $results1[0]['shared_auto']; ?></td>
						<td><?php echo $results1[0]['cycle']; ?></td>
						<td><?php echo $results1[0]['cycle_rickshaw']; ?></td>
						<td><?php echo $results1[0]['pedestrian']; ?></td>
						<td><?php echo $results1[0]['others']; ?></td>
						
						<td><?php echo $results2[0]['truck']; ?></td>
						<td><?php echo $results2[0]['trailer']; ?></td>
						<td><?php echo $results2[0]['lcv']; ?></td>
						<td><?php echo $results2[0]['light_other']; ?></td>
						<td><?php echo $results2[0]['cycle_rickshaw_goods']; ?></td>
						<td><?php echo $results2[0]['slow_other']; ?></td>
						
						<td><img src="<?php echo $link.$results[$x]['photo_first']; ?>" height="80px" alt="" />
						<?php echo ($results[$x]['photo_first']!="")?'<a href="'.$link.$results[$x]['photo_first'].'" target="_blank">'.$link.$results[$x]['photo_first'].'</a>':''; ?></td>
                        <td><img src="<?php echo $link.$results[$x]['photo_second']; ?>" height="80px" alt="" />
						<?php echo ($results[$x]['photo_second']!="")?'<a href="'.$link.$results[$x]['photo_second'].'" target="_blank">'.$link.$results[$x]['photo_second'].'</a>':''; ?></td>
                        <td><img src="<?php echo $link.$results[$x]['photo_third']; ?>" height="80px" alt="" />
						<?php echo ($results[$x]['photo_third']!="")?'<a href="'.$link.$results[$x]['photo_third'].'" target="_blank">'.$link.$results[$x]['photo_third'].'</a>':''; ?></td>
						<td><?php echo date("d-m-Y", strtotime(explode(' ',$results[$x]['created_date'])[0])); ?></td>
						<td><a href="traffic_survey.php?ids=<?php echo $results[$x]['traffic_survey_id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete')">Delete</a></td>
                      </tr>
             <?php $x++;$i++;}?>
                      
                     
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                  </table>
                </div>
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
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT 
    <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
	<script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- page script -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" media="all" />
	<script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
	<script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).on('focus',".datepicker", function(){ //bind to all instances of class "date". 
		   $(this).datepicker({
			autoclose: true,
			format:'yyyy-mm-dd'
		});
		});
	</script> 
       <script type="text/javascript">
      /* $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      }); */
	$(document).ready(function(){
		$('#example1').DataTable({
			lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
			dom: 'Blfrtip',
			buttons: [
				/* 'copy', 'csv', 'excel', 'pdf', 'print' */
				'csv', 'excel'
			],
			iDisplayLength: -1 
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
