<?php 
error_reporting(0);
session_start();
 $redirctUrl = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include 'controls/Users.php';
$objU = new User;
include 'medsfamily_function.php' ;
$cuserid = currentUser() ;

  if($_SESSION['currencyConverter']!='') {

  } else { 

    
    $ch = curl_init();
  //  curl_setopt($ch, CURLOPT_URL, "http://free.currencyconverterapi.com/api/v5/convert?q=USD_INR&compact=y");
    curl_setopt($ch, CURLOPT_URL, "http://free.currencyconverterapi.com/api/v5/convert?q=USD_USD&compact=y");
  
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $ip_data_in = curl_exec($ch); // string
    curl_close($ch);

    $ip_data = json_decode($ip_data_in,true);
   
  /*    $_SESSION['current_symbol']= "USD_INR";
   $_SESSION['currencySymbol']= "₹";
*/    
    $_SESSION['current_symbol']= "USD_USD";
   $_SESSION['currencySymbol']= "$";
  
    // $_SESSION['currencyConverter']= $ip_data['USD_USD']['val'];
    
                


}

//echo $ip_data['USD_USD']['val'];die;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo "$description"?>">
	<meta name="keywords" content="<?php echo "$keyword"?>">
	<title><?php echo "$pagetitle"?></title>
	 <base href="<?php echo $baselink ?>">
	<meta name="author" content="Er Grijesh Rai">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" media="screen" href="css/style.css" type="text/css">
	<link rel="stylesheet" media="screen" href="css/accordion-menu.css" type="text/css">
	<link rel="stylesheet" media="screen" href="css/page.css" type="text/css">
	<link rel="stylesheet" media="screen" href="css/owl.carousel.css" type="text/css">
	<link rel="stylesheet" media="screen" href="css/responsive.css" type="text/css">
	<link rel="stylesheet" media="screen" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
</head>
<body>
	<section class="topbar-main bg-gray clearfix">
		<div class="container mp-0">
			
				<div class="col-md-4 col-sm-5 col-xs-7 mp-0 topbar-l">
					
        <select name="shipping_country_price" id="shipping_country_price" class="currency">
                <option value="">Select Currency </option>
            <!--    <option value="USD_EUR" <?php if($_SESSION['current_symbol']=='USD_EUR') { ?>selected <?php } ?>>Euro</option>
                <option value="USD_GBP" <?php if($_SESSION['current_symbol']=='USD_GBP') { ?>selected <?php } ?>>GBP</option>
            -->     <option value="USD_USD" <?php if($_SESSION['current_symbol']=='USD_USD') { ?>selected <?php } ?>>US Dollars</option>
            <!--     <option value="USD_INR" <?php if($_SESSION['current_symbol']=='USD_INR') { ?>selected <?php } ?>>INR</option>
            -->    
                  <?php 
/*
                  $allshippingcountry = $objU->getResult("select * from countries");
                   foreach($allshippingcountry as $shipkey => $shipval){ ?>
                    <option value="<?php echo $shipval['id']; ?>" <?php if($_SESSION['country_id']==$shipval['id']) { ?>selected <?php } ?>><?php echo $shipval['country']; ?></option>
                  <?php
              } */
                  ?>
                 </select> 
                 
					<div id="google_translate_element"></div>
					<!--<ul>
						<li><a href="#">Language</a></li>
						<li><a href="#">English <i class="fa fa-caret-down" aria-hidden="true"></i></a>
							<ul>
								<li><a href="#">English</a></li>
								<li><a href="#">Hindi</a></li>
								<li><a href="#">Nepali</a></li>
								<li><a href="#">Chaniess</a></li>
							</ul>
						</li>
					</ul> -->
				</div>
				<div class="col-md-8 col-sm-7 col-xs-5 mp-0  topbar-r">
					<ul>
					<?php if($_SESSION['user_email']!='') { ?>
					
						<li><a href="my-account">My account </a></li>
						<li><a href="logout">Logout </a></li>
						
					
				<?php } else {?>
                   <li><a href="http://examstube.in/ecom/login.php">Sign In </a></li>
						<li><a href="http://examstube.in/ecom/signup">Sign Up </a></li>
				<?php } ?>
				</ul>
				</div>
			
		</div>
	</section>
	<section class="clearfix">
		<div class="container">
			<div class="row logo-sec">
				<div class="col-md-4 col-sm-4">
				
					<a href="index" class="logo-main"><img src="images/logo.png" class="img-responsive"></a>
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="col-md-12 p-0">
						<div class="col-md-5 col-sm-12 mp-0 search-top">
							<form class="example" action="">
								<input type="text" placeholder="Search Product Here.." class="autocompleteSearch" name="search2">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="col-md-5 col-sm-10 col-xs-9 text-center call-top mp-0">
							<div class="call-sec text-light-green">
								<i class="fa fa-phone" aria-hidden="true"></i> <?php $productsinglecattop=$objU->getResult('select * from phone_number');
								foreach($productsinglecattop as $keyproduct => $valproduct)
								{
									echo $valproduct['number']. "<br/>";	
								}
								
								?>
							</div>
						</div>
						
						<?php if($_SESSION['user_email']!='') {?>
						<div class="col-md-2 col-sm-2 col-xs-3 mp-0">
							<div class="cart text-light-green" id="cartcount">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								<h3>0</h3>
							</div>
						</div>
						<?php } 
						else
						{
							echo "";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="clearfix main-navbar">
		<div class="container-fluid">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#">Home</a></li>
							<li><a href="about-us.php">About Us </a></li>
							<li><a href="prescription-drugs.php">Prescription Drugs </a></li>
							<li role="presentation">
								<a href="#tabn1" aria-controls="tab1" role="tab" data-toggle="tab">REFILL MEDICATION</a>
							</li>
							<li><a href="coupon.php">Coupons </a></li>
							<li><a href="how-to-order.php">How To Order </a></li>
							<li><a href="faqs.php">faqs </a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
	<?php 
  
	include "include/home-sidebar.php" ?>
		</div>
	</section>