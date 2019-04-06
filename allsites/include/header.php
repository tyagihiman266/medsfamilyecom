<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo "$description"?>">
	<meta name="keywords" content="<?php echo "$keyword"?>">
	<title><?php echo "$pagetitle"?></title>
	<meta name="author" content="Er Grijesh Rai">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" media="screen" href="css/style.css" type="text/css">
	<link rel="stylesheet" media="screen" href="css/accordion-menu.css" type="text/css">
	<link rel="stylesheet" media="screen" href="css/page.css" type="text/css">
	<link rel="stylesheet" media="screen" href="css/owl.carousel.css" type="text/css">
	<link rel="stylesheet" media="screen" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
</head>
<body>
	<section class="topbar-main bg-gray clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-3 topbar-l">
					<ul>
						<li><a href="#">Language</a></li>
						<li><a href="#">English <i class="fa fa-caret-down" aria-hidden="true"></i></a>
							<ul>
								<li><a href="#">English</a></li>
								<li><a href="#">Hindi</a></li>
								<li><a href="#">Nepali</a></li>
								<li><a href="#">Chaniess</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="col-md-9 topbar-r">
					<ul>
						<li><a href="#">Sign In </a></li>
						<li><a href="#">Create an account </a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="clearfix">
		<div class="container">
			<div class="row logo-sec">
				<div class="col-md-4">
					<a href="index.php"><img src="images/logo.png" class="img-responsive"></a>
				</div>
				<div class="col-md-8">
					<div class="col-md-12 p-0">
						<div class="col-md-5 search-top">
							<form class="example" action="">
								<input type="text" placeholder="Search Entire Store Here.." name="search2">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="col-md-5 text-center call-top">
							<div class="call-sec text-light-green">
								<i class="fa fa-phone" aria-hidden="true"></i> 1-800-891-0844
							</div>
						</div>
						<div class="col-md-2">
							<div class="cart text-light-green">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								<h3>0</h3>
							</div>
						</div>
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
							<li><a href="#">About Us </a></li>
							<li><a href="#">Prescription Drugs </a></li>
							<li><a href="#">How To Order </a></li>
							<li><a href="#">faqs </a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
	<?php include "include/home-sidebar.php" ?>
		</div>
	</section>