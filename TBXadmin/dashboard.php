<?php 

    require_once ("inc/main.php");
    	 
	$side='dashboard';

	include 'inc/head.php';
	
	$addTown = '';
	if($_REQUEST['town']!=''){
		$addTown = " and town='".$_REQUEST['town']."'";
	}
	$buildingTodayCount = count($user->getResult("select id from user_data"));

	$lightTodayCount = count($user->getResult("select id from order_data where order_date='".date('Y-m-d')."'"));
	
	$lightTodayCounts = count($user->getResult("select id from order_data"));
	
	
	
	
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
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
		</section>
		<section class="content">
			<div class="row">
				
				<br />
				<br />
				<div class="col-md-3 col-sm-6 col-xs-12">
					<a href="#">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-area-chart"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Total Users</span>
								<span class="info-box-number"><?=$buildingTodayCount;?></span>
							</div>
						<!-- /.info-box-content -->
						</div>
					</a>
				  <!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
					<a href="#">
						<div class="info-box">
							<span class="info-box-icon bg-green"><i class="fa fa-area-chart"></i></span>

							<div class="info-box-content">
							  <span class="info-box-text">Today's Order</span>
							  <span class="info-box-number"><?=$lightTodayCount;?></span>
							</div>
							</div>
					</a>
				  <!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
					<a href="#">
						<div class="info-box">
							<span class="info-box-icon bg-orange"><i class="fa fa-area-chart"></i></span>

							<div class="info-box-content">
							  <span class="info-box-text">Total Order</span>
							  <span class="info-box-number"><?=$lightTodayCounts;?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
					</a>
				  <!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix visible-sm-block"></div>

			<!-- /.col -->
			</div>
			
		
        </section>
		
        <!-- Main content -->
      </div><!-- /.content-wrapper -->
     <?php 
			include"inc/footer.php";
			if(isset($_POST['survey_sub']) && isset($_POST['survey']) && $_POST['survey']!=""){
				$map_arr = $user->getResult("select * from ".$_POST['survey']." where status=1 and lat!='' and lon!='' $addTown ");
				$comma = "";
				switch($_POST['survey']){
					case 'build_survey':
					$name = 'building_id';
					$color = 'blue';
					break;
					case 'light_survey':
					$name = 'sl_id';
					$color = 'red';
					break;
					case 'hoarding_survey':
					$name = 'hoarding_id';
					$color = 'green';
					break;
					case 'traffic_survey':
					$name = 'location';
					$color = 'yellow';
					break;
					default:
					$name="";
					$color = 'yellow';
				}
				foreach($map_arr as $data_array){
					$desc .= $comma."['".$data_array[$name]."',". $data_array['lat'].",".  $data_array['lon'].",".$data_array[$_POST['survey'].'_id'].",'".$color."']";
					$comma = ",";
				}
			}else{
				$build_arr = $user->getResult("select lat,lon,build_survey_id as id,building_id as name from build_survey where status=1 and lat!='' and lon!='' $addTown");
				$light_arr = $user->getResult("select lat,lon,light_survey_id as id,sl_id as name from light_survey where status=1 and lat!='' and lon!='' $addTown");
				$hoarding_arr = $user->getResult("select lat,lon,hoarding_survey_id as id,hoarding_id as name from hoarding_survey where status=1 and lat!='' and lon!='' $addTown");
				$traffic_arr = $user->getResult("select lat,lon,traffic_survey_id as id,location as name from traffic_survey where status=1 and lat!='' and lon!='' $addTown");
				foreach($build_arr as $key => $value){
					$build_arr[$key]['color'] = 'blue';
				}
				foreach($light_arr as $key => $value){
					$light_arr[$key]['color'] = 'red';
				}
				foreach($hoarding_arr as $key => $value){
					$hoarding_arr[$key]['color'] = 'green';
				}
				foreach($traffic_arr as $key => $value){
					$traffic_arr[$key]['color'] = 'yellow';
				}
				$final = array_merge($build_arr,$light_arr,$hoarding_arr,$traffic_arr);
				$comma = '';
				foreach($final as $data_array){
					$desc .= $comma."['".$data_array['name']."',". $data_array['lat'].",".  $data_array['lon'].",".$data_array['id'].",'".$data_array['color']."']";
					$comma = ",";
					$color ="red";
					
				}
			}
	
		?>
	 <script type="text/javascript"> 
			function initialize() {
				var locations = [
					<?php echo $desc;?> 
				];

				window.map = new google.maps.Map(document.getElementById('map'), {
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});

				var infowindow = new google.maps.InfoWindow();

				var bounds = new google.maps.LatLngBounds();

				for (i = 0; i < locations.length; i++) {
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(locations[i][1], locations[i][2]),
						map: map,
						icon: 'http://maps.google.com/mapfiles/ms/icons/'+locations[i][4]+'-dot.png'
					});

					bounds.extend(marker.position);

					google.maps.event.addListener(marker, 'click', (function (marker, i) {
						return function () {
							infowindow.setContent(locations[i][0]);
							infowindow.open(map, marker);
						}
					})(marker, i));
				}

				map.fitBounds(bounds);

				var listener = google.maps.event.addListener(map, "idle", function () {
					map.setZoom(12);
					google.maps.event.removeListener(listener);
				});
			}

			function loadScript() {
				var script = document.createElement('script');
				script.type = 'text/javascript';
				script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAraN2XELcuOSoSl9-MKwzSiVMSyOE0kDI&callback=initialize';
				document.body.appendChild(script);
			}

			window.onload = loadScript;
	 </script>
  </body>
</html>
