<?php 
include "include/header.php";
session_start();
//print_r($_SESSION);
//testing commit;
//finaltest

$user_email=$_SESSION['user_email'];
//echo $user_email;

?>
<section class="clearfix">
	<div class="container-fluid">
		<div class="row">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"> </li>
					<li data-target="#carousel-example-generic" data-slide-to="1"> </li>
					<li data-target="#carousel-example-generic" data-slide-to="2"> </li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img src="images/banner_1.jpg" class="img-responsive" width="100%">
					</div>
					<div class="item">
						<img src="images/banner_2.jpg" class="img-responsive" width="100%">
					</div>
					<div class="item">
						<img src="images/banner_3.jpg" class="img-responsive" width="100%">
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-3 empty-3"></div>
			<div class="col-md-9 full-9">
			<div class="row new-f-tab">
				<div class="col-md-12 f-tab mt-20">
					<div role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation">
								<a href="#homen" aria-controls="homen" role="tab" data-toggle="tab">
									FIND MEDICATION</a>
						</li>
							<li role="presentation">
								<a href="#tabn" aria-controls="tabn" role="tab" data-toggle="tab">PLACE NEW ORDER</a>
							</li>
							<li role="presentation">
								<a href="#tabn1" aria-controls="tab1" role="tab" data-toggle="tab">REFILL MEDICATION</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
				<div role="tabpanel" class="tab-pane" id="homen">
								<div class="row first-tab-h">
									<div class="col-md-12 mp-0">
										
										
										<div class="col-md-5 col-sm-12 mp-0 search-top">
											<form class="example" action="">
												<input type="text" placeholder="Search Product Here.."  name="search2" class="ui-autocomplete-input autocompleteSearch" autocomplete="off">
												<button type="submit"><i class="fa fa-search"></i></button>
											</form>
										</div>
									</div>
									<div class="col-md-12 mp-0 mt-20">
										<!--<h3>Online Prescription Drugs</h3>
										<div class="most-popular">
											<h4>Most Popular Online Prescription Drugs</h4>
											<ul class="small-block-grid-1">
												<li><a href="#">BUY Advair Diskus</a></li>
												<li><a href="#">BUY Celebrex</a></li>
												<li><a href="#">BUY Crestor</a></li>
												<li><a href="#">BUY Lipitor</a></li>
												<li><a href="#">BUY Norvasc</a></li>
												<li><a href="#">BUY Nexium</a></li>
												<li><a href="#">BUY Plavix</a></li>
												<li><a href="#">BUY Premarin</a></li>
												<li><a href="#">BUY Propecia</a></li>
												<li><a href="#">BUY Protonix</a></li>
												<li><a href="#">BUY Singulair</a></li>
												<li><a href="#">BUY Zocor</a></li>
											</ul>
										</div>-->
										<div class="tab-content-h">
											<p><strong>Saving Money Has Never Been Easier</strong><br>
												The Medsfamily has streamlined its ordering process so you can get on with your life. You have the option of ordering online prescription drugs through our website, by phone or by fax, however you are most comfortable. We’ve made the process safe, convenient and cost effective.<br>
												To get started, search for your medications by name and strength as they appear on the prescription from your doctor. In many cases, you have the option of selecting the brand name product or therapeutically equivalent generic version, for even greater cost savings. You can request a 3-month supply of your medication at any one time. Add your medications to your shopping cart with a click and then proceed to checkout to place your order.<br>
												Our licensed pharmacy based in Winnipeg, Manitoba requires a valid prescription for each prescription medication, just like your local pharmacy. Our pharmacy technicians and pharmacists will review your order for accuracy, screen for any drug interactions with your other medications and ensure the product is appropriate for you.<br>
												If your physician has authorized refills on your prescription, these will be kept on your file for future orders. You’ll never have to worry about running out of your medications again. The Medsfamily provides all customers with advance refill reminders by telephone or email well in advance of your next refill date.<br>
												If at any time you have questions about placing an order or about your medications, simply call us toll free or click to start a live chat. We employ licensed pharmacists, and experienced pharmacy technicians to help you with any questions you might have. You may even be connected to the president of The Medsfamily, David Zimmer!<br>
												When your order is placed and your prescription has been verified, we’ll fill your order and ship it without delay so that it quickly and conveniently arrives at your doorstep.<br>
												Are you ready to get started? Search for your prescription medication or give us a call right now and see how easy, convenient, and cost-effective it is to order your medications online through The Medsfamily. </p>
										</div>
									</div>
								</div>
							</div>
				<div role="tabpanel" class="tab-pane" id="tabn">
								<!--<div class="row first-tab-h">
									<div class="col-md-12 mp-0">
										<h3>Search by Drug or Product Name</h3>
										<p>Browse:<a href="#">Medical Conditions</a> <a href="">Alphabetically</a></p>
										<div class="col-md-6 col-sm-12 mp-0 search-top">
											<form class="example" action="">
												<input type="text" placeholder="Search Product Here.." id="autocompleteSearch" name="search2" class="ui-autocomplete-input" autocomplete="off">
												<button type="submit"><i class="fa fa-search"></i></button>
											</form>
										</div>
									</div>
								</div>-->
								<div class="row second-tab-h first-tab-h">
									<div class="col-md-12 mp-0">
										
										<h3 class="mt-20">Find your Medication</h3>
										<div class="col-md-6 col-sm-12 mp-0 search-top">
											<form class="example" action="">
												<input type="text" placeholder="Search Product Here.."  name="search2" class="ui-autocomplete-input autocompleteSearch" autocomplete="off">
												<button type="submit"><i class="fa fa-search"></i></button>
											</form>
										</div>
										<div class="col-md-12 p-0 mp-0">
											<?php include "include/shop-by-brand.php" ?>
										</div>
										<div class="col-md-12 p-0">
											<p>The Medsfamily offers thousands of online prescription and over-the-counter (OTC) products. You can search for products using the form above or anywhere on our site. When you find a product you wish to purchase, just select the product strength, pack size, dosage form and quantity you want from the dropdown box and then click the “Add To Cart” button beside the drug. From here you can keep searching for other products or you can click “Checkout” to continue the ordering process.<br>
												You can view and modify the items in your cart and checkout at any time by clicking on the cart button Cart Button<br>
												found in the top right corner of the website.</p>
										
												
										</div>
									</div>
									<!--<div class="col-md-6 mp-0">
										<div class="col-md-12 p-0 mp-0">
											<p class="text-warning mt-20">REFILL / RENEW</p>
											<h3>Existing Customer</h3>
											<h3>1. Refill or renew your prescription</h3>
											<p>Log into your account. Once you have logged in you can visit your My Profile page to place online prescription refills or renewals.</p>
											<h3>2. Order your Medication</h3>
											<p>You may checkout and purchase your medications and prescription online. Or, you may wish to print the Fax Refill Form or the Prescription Transfer Form and call, FAX, or mail in your order:</p>
											<p>The Medsfamily<br>
												103-1780 Wellington Avenue<br>
												Winnipeg, Manitoba CANADA R3H 1B3<br>
												Phone: 1 (866) 335-8064<br>
												Fax: 1(866) 795-5627</p>
											<h3>3. Receive your Medication</h3>
											<p>After submitting your order and required forms, you’ll receive your prescription(s) within 10 working days.<br>
												You can Track your Package through Canada Post. </p>
										</div>
									</div>-->
								</div>
							</div>
				<div role="tabpanel" class="tab-pane" id="tabn1">
								<div class="row first-tab-h">
									<div class="col-md-12 mp-0">
										
									<div class="col-md-6 col-sm-12 mp-0 search-top">
											<form class="example" action="">
												<input type="text" placeholder="Search Product Here.."  name="search2" class="ui-autocomplete-input autocompleteSearch" autocomplete="off">
												<button type="submit"><i class="fa fa-search"></i></button>
											</form>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 first-tab-h mp-0">
										<h3>Refills</h3>
										<p>Members who have ordered through this website previously can login below to refill a prescription. If you haven’t ordered from us before, please see “Ordering Online” on the How To Order page.<br><br>
											If you have any questions regarding refills you can call 1-800-891-0844 or fill out our contact form here. </p>
									</div>
									<div class="col-md-12 mp-0 first-tab-h">
										<div class="col-md-8 login-sec p-0">
											<h3>Registered Customers</h3>
											<p>If you have an account sign in with your email address</p>
											<form action="" method="POST" role="form" class="custom-form">
												<input type="hidden" name="submitlogin" value="yes">
												<div class="form-group">
													<label for="">Email <span class="color-red">*</span></label>
													<input type="text" name="username" class="form-control" id="" placeholder="" required="">
												</div>
												<div class="form-group">
													<label for="">Password <span class="color-red">*</span></label>
													<input type="password" name="password" class="form-control" id="" placeholder="" required="">
												</div>
												<?php
												echo $user_email;
												if($user_email==true)
												{
													echo "hh";
												}
												else
												{
												?>
												<button type="submit" class="sign-in">sign in</button>
												<?php } ?>
												<button class="forget-password" data-toggle="modal" data-target="#main-model">forget your password?</button>
												<p class="requre-f">*requred fields</p>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
				</div>
					<div class="col-md-12 p-0 h-banner">
						<div class="col-md-6 col-sm-6 col-xs-6 pl-0 pr-7">
							<img src="images/banner1.jpg" class="img-responsive">
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 pr-0 pl-7">
							<img src="images/banner2.jpg" class="img-responsive">
						</div>
					</div>
					
					<div class="col-md-12 p-0 h-content-sec clearfix">
						<div class="col-md-7 pl-0">
							<h3>Welcome to<span class="text-orange"> MedsFamily</span></h3>
							<p>We provide thousands of prescription drugs and over-the-counter products at savings of up to 80 percent or more. You can order brand name medications as well as generic drugs through our secure website 24 hours a day or toll-free over the phone 7 days a week. Medsfamily is committed to providing affordable medications with low, flat-rate shipping and the ease of home delivery. We work with a small network of trusted and reputable international pharmacies and fulfillment centers, which gives you access to authentic medications at low prices every day.</p>
						</div>
						<div class="col-md-5 c-r-banner">
							<img src="images/c-banner.jpg" class="img-responsive c-img-1">
							<img src="images/c-banner1.jpg" class="img-responsive c-img-2">
						</div>
					</div>
					<div class="col-md-12 p-0 feature-product clearfix ">
						<div class="category-name">
							<div class="tab-title">
								<p>Medsfamily</p>
							</div>
						</div>
						<div role="tabpanel" class="f-tab clearfix">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#home1" aria-controls="home1" role="tab" data-toggle="tab">Best Sellers</a>
								</li>
								<!--<li role="presentation">
									<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Featured</a>
								</li>
								<li role="presentation">
									<a href="#tab11" aria-controls="tab11" role="tab" data-toggle="tab">Special</a>
								</li> -->
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home1">
									<div class="col-md-12 p-0">
										<?php 
  
  
										  $productsinglecat=$objU->getResult('select * from tbl_product where  best_seller=1 order by rand() desc limit 0,3'); 
                foreach($productsinglecat as $keyproduct => $valproduct)
                     {
                     	$rowcatproduct=$objU->getResult('select * from manage_category where id="'.$valproduct['cat_id'].'" ');
                ?>
										<div class="col-md-4 col-xs-6 col-sm-6 p-0-7">
											<a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm">
												<div class="feature-wrap">
													<?php 
$productsingleimg=$objU->getResult('select * from tbl_pro_img where p_id="'.$valproduct['id'].'"');
?> <img src="images/product.jpg" class="img-responsive">
													<!--<img src="TBXadmin/upload/product/big/<?php echo $productsingleimg[0]['image']; ?>" class="img-responsive"> -->
													<div class="feature-cost text-center">
														<p>
															<?php echo $valproduct['name'] ?>
														</p>
														<span>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
														</span>
														<?php  
								$productsingleprice=$objU->getResult('select min(per_pill_price) as minprice from tbl_product_package where product_id="'.$valproduct['id'].'"');  ?>
														<h3>
															<?php echo $_SESSION['currencySymbol']; ?>
															<?php echo number_format($_SESSION['currencyConverter']*$productsingleprice[0]['minprice'],2); ?>
														</h3>
														<a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm" class="tab-add-to-cart">View Details</a>
													</div>
												</div>
											</a>
										</div>
										<?php }  ?>
									</div>
								</div>
								<!--<div role="tabpanel" class="tab-pane" id="tab1">
									<div class="col-md-12 p-0">
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f3.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f2.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f1.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
									</div></div>
							   <div role="tabpanel" class="tab-pane" id="tab11">
									<div class="col-md-12 p-0">
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f2.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f3.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f1.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
									</div>
								</div>-->
							</div>
						</div>
					</div>
					<?php /*
					<div class="col-md-12 p-0 feature-product clearfix ">
						<div class="category-name">
							<div class="tab-title">
								<p>Category Name</p>
							</div>
						</div>
						<div role="tabpanel" class="f-tab clearfix">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#home" aria-controls="home" role="tab" data-toggle="tab">New</a>
								</li>
								<li role="presentation">
									<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Featured</a>
								</li>
								<li role="presentation">
									<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Special</a>
								</li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<div class="col-md-12 p-0">
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f1.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f2.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f3.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="tab">
									<div class="col-md-12 p-0">
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f2.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f1.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f3.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="tab1">
									<div class="col-md-12 p-0">
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f3.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f2.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 p-0-7">
											<div class="feature-wrap">
												<img src="images/f1.jpg" class="img-responsive">
												<div class="feature-cost text-center">
													<p>Anti Sunspot</p>
													<span>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</span>
													<h3>$24.00</h3>
													<a href="" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>   */?>
				</div>
			</div>
		</div>
</section>
<section class="clearfix">
	<div class="container-fluid">
		<div class="row textimonial">
			<h3>What People Say About us ?</h3>
			<div id="carousel-reviews" class="carousel slide" data-ride="carousel">
				<div class="col-md-8 col-md-offset-2">
					<div class="carousel-inner">
						<div class="item active">
							<div class="col-md-6 col-sm-6">
								<div class="block-text rel zmin clearfix">
									<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
									<p>There are a lot of things I like about Medsfamily. I've ordered from them for months. The website is easy to navigate, if there's a problem you get a personal phone call, the orders are delivered within the timeframe they promise and the order is always right. I plan to continue working with them for my prescription needs."</p>
									<ins class="ab zmin sprite sprite-i-triangle block"></ins>
									<a title="" href="#">Margaret J.</a>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 hidden-xs">
								<div class="block-text rel zmin clearfix">
									<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
									<p>I have been using this pharmacy for 2 months and they are great! I pay for medicine to help me live a more comfortable life. Other pharmacy's prices are so high I was unable to take these meds which lead to me being unable to leave my house at times or scared to eat. Thank you medsfamily for giving me my life back!</p>
									<ins class="ab zmin sprite sprite-i-triangle block"></ins>
									<a title="" href="#">Danielle C.</a>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="col-md-6 col-sm-6">
								<div class="block-text rel zmin clearfix">
									<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
									<p>It is so easy to order my medications through medsfamily The re-fill process is even easier. I love that I can circumvent the high prices charged here. To get the mess I need. Thank you medsfamily to for providing this much needed service.</p>
									<ins class="ab zmin sprite sprite-i-triangle block"></ins>
									<a title="" href="#">Lori W.</a>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 hidden-xs">
								<div class="block-text rel zmin clearfix">
									<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
									<p>I always order from medsfamily, so easy to use the website, and so reasonable priced. I highly recommend this pharmacy for all your medications. Thank you for the service you provide. </p>
									<ins class="ab zmin sprite sprite-i-triangle block"></ins>
									<a title="" href="#">	
Sandra S.</a>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="col-md-6 col-sm-6">
								<div class="block-text rel zmin clearfix">
									<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
									<p>I'm really glad I decided to use meds family for some of my prescription needs. Orders have been correct and quality has been as it should be, Spot On! Thanks for the service you provide.</p>
									<ins class="ab zmin sprite sprite-i-triangle block"></ins>
									<a title="" href="#">David H. </a>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 hidden-xs">
								<div class="block-text rel zmin clearfix">
									<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
									<p>I have been buying products from medsfamily for almost years. I have always gotten high quality prescriptions and service. I have recommended this RX site to other people who need to fill their prescriptions but are unable to due to exorbitant US drug prices."</p>
									<ins class="ab zmin sprite sprite-i-triangle block"></ins>
									<a title="" href="#">Catherine S.</a>
								</div>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row top-50-m">
			<div class="col-md-12">
				<h2>Top 50 Medicines</h2>
				<div class="table-responsive">
					<ul>
						<?php 
  
  
										  $productsinglecattop=$objU->getResult('select * from tbl_product  order by rand() desc limit 0,50'); 
                foreach($productsinglecattop as $keyproduct => $valproduct)
                     {
                     	$rowcatproduct=$objU->getResult('select * from manage_category where id="'.$valproduct['cat_id'].'" ');
                ?>
							<li><a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm"><?php echo $valproduct['name']; ?></a></li>
						<?php } ?>
							
						
						<!-- 
							<td>Januvia</td>
							<td>Ventolin</td>
							<td>Prilosec</td>
							<td>AJanumet</td>
							<td>Starlix</td>
						
							<td>Farxiga</td>
							<td>Glucotrol XL</td>
							<td>Aggrenox</td>
							<td>Gleevec</td>
							<td>Boniva</td> -->
						
						<!--<tr>
							<td>Bystolic</td>
							<td>Bystolic</td>
							<td>Bystolic</td>
							<td>Bystolic</td>
							<td>Bystolic</td>
						</tr>
						<tr>
							<td>Celebrex</td>
							<td>Celebrex</td>
							<td>Celebrex</td>
							<td>Celebrex</td>
							<td>Celebrex</td>
						</tr>
						<tr>
							<td>Chantix</td>
							<td>Chantix</td>
							<td>Chantix</td>
							<td>Chantix</td>
							<td>Chantix</td>
						</tr>
						<tr>
							<td>Colcrys</td>
							<td>Colcrys</td>
							<td>Colcrys</td>
							<td>Colcrys</td>
							<td>Colcrys</td>
						</tr>
						<tr>
							<td>comforties chewables</td>
							<td>comforties chewables</td>
							<td>comforties chewables</td>
							<td>comforties chewables</td>
							<td>comforties chewables</td>
						</tr>
						<tr>
							<td>Crestor</td>
							<td>Crestor</td>
							<td>Crestor</td>
							<td>Crestor</td>
							<td>Crestor</td>
						</tr>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row latest-news">
			<div class="r-cent-blog">
				<h3>Recent Blog</h3>
			</div>
			<div class="owl-carousel owl-theme">
	
							<div class="item">
					<div class="news-wrap">
						<img src="images/lnews2.jpg" class="img-responsive">
						<div class="n-content">
							<span><img src="images/calender.png"> August 18, 2018</span>
							<h3>3 Key Mental Health Benefits of Ridesharing</h3>
							<p>Are you still on the fence about ridesharing? Not sure if it’s for you? You might think twice when you learn about some of the key mental health benefits that befall those who opt to take a Lyft or Uber over driving themselves—or using another mode of transportation.</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="news-wrap">
						<img src="images/lnews1.jpg" class="img-responsive">
						<div class="n-content">
							<span><img src="images/calender.png"> August 28, 2018</span>
							<h3>15 Health Symptoms Women Shouldn’t Ignore</h3>
							<p>Women are notorious for pushing through pain and discomfort, even when all the signs point to something more serious. Unfortunately, this type of behavior can often cause more problems and even be fatal if left unchecked.</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="news-wrap">
						<img src="images/lnews.jpg" class="img-responsive">
						<div class="n-content">
							<span><img src="images/calender.png"> August 8, 2018</span>
							<h3>Just Perfect ... Rainy Day Reading by Stephen King and More
</h3>
							<p>The weather outside may not be frightful (just yet), but that doesn’t mean it’s super fun to be out in. The transition from fall to winter can leave people in limbo—as they may not be able to continue their summer recreational fun—nor start their typical outdoor winter excursions.</p>
						</div>
					</div>
				</div>
				<!--<div class="item">
					<div class="news-wrap">
						<img src="images/lnews1.jpg" class="img-responsive">
						<div class="n-content">
							<span><img src="images/calender.png"> August 18, 2018</span>
							<h3>Leading You To Bettter Health</h3>
							<p>survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="news-wrap">
						<img src="images/lnews.jpg" class="img-responsive">
						<div class="n-content">
							<span><img src="images/calender.png"> August 18, 2018</span>
							<h3>Leading You To Bettter Health</h3>
							<p>survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="news-wrap">
						<img src="images/lnews1.jpg" class="img-responsive">
						<div class="n-content">
							<span><img src="images/calender.png"> August 18, 2018</span>
							<h3>Leading You To Bettter Health</h3>
							<p>survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="news-wrap">
						<img src="images/lnews.jpg" class="img-responsive">
						<div class="n-content">
							<span><img src="images/calender.png"> August 18, 2018</span>
							<h3>Leading You To Bettter Health</h3>
							<p>survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						</div>
					</div>
				</div>-->
				<!--<div class="item">
					<div class="news-wrap">
						<img src="images/lnews1.jpg" class="img-responsive">
						<div class="n-content">
							<span><img src="images/calender.png"> August 18, 2018</span>
							<h3>Leading You To Bettter Health</h3>
							<p>survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						</div>
					</div>
				</div>-->
			</div>
		</div>
	</div>
</section>
<?php include "include/footer.php" ?>