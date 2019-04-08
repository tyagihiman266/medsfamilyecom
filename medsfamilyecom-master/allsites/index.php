<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php"
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
							<img src="images/banner.jpg" class="img-responsive" width="100%">
						</div>
						<div class="item">
							<img src="images/banner.jpg" class="img-responsive" width="100%">
						</div>
						<div class="item">
							<img src="images/banner.jpg" class="img-responsive" width="100%">
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
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<div class="col-md-12 p-0">
					<?php include "include/shop-by-brand.php" ?>	
					</div>
					<div class="col-md-12 p-0 h-banner">
						<div class="col-md-6 pl-0 pr-7">
							<img src="images/banner1.jpg" class="img-responsive">
						</div>
						<div class="col-md-6 pr-0 pl-7">
							<img src="images/banner2.jpg" class="img-responsive">
						</div>
					</div>
					<div class="col-md-12 p-0 h-content-sec clearfix">
						<div class="col-md-7 pl-0">
							<h3>Excepteur Sint <span class="text-orange">occaecat cupidatat</span></h3>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32</p>
						</div>
						<div class="col-md-5 c-r-banner">
							<img src="images/c-banner.jpg" class="img-responsive c-img-1">
							<img src="images/c-banner1.jpg" class="img-responsive c-img-2">
						</div>
					</div>
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
									<a href="#home1" aria-controls="home1" role="tab" data-toggle="tab">New</a>
								</li>
								<li role="presentation">
									<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Featured</a>
								</li>
								<li role="presentation">
									<a href="#tab11" aria-controls="tab11" role="tab" data-toggle="tab">Special</a>
								</li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home1">
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
								</div>
							</div>
						</div>
					</div>
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
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="clearfix">
		<div class="container-fluid">
			<div class="row textimonial">
				<h3>What People Say About us ?</h3>
				<div class="row">
					<div id="carousel-reviews" class="carousel slide" data-ride="carousel">
						<div class="col-md-8 col-md-offset-2">
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-md-6 col-sm-6">
										<div class="block-text rel zmin clearfix">
											<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
											<p>Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
											<ins class="ab zmin sprite sprite-i-triangle block"></ins>
											<a title="" href="#">Carl Colin</a>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 hidden-xs">
										<div class="block-text rel zmin clearfix">
											<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
											<p>Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
											<ins class="ab zmin sprite sprite-i-triangle block"></ins>
											<a title="" href="#">Anarchy</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="col-md-6 col-sm-6">
										<div class="block-text rel zmin clearfix">
											<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
											<p>Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
											<ins class="ab zmin sprite sprite-i-triangle block"></ins>
											<a title="" href="#">Carl Colin</a>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 hidden-xs">
										<div class="block-text rel zmin clearfix">
											<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
											<p>Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
											<ins class="ab zmin sprite sprite-i-triangle block"></ins>
											<a title="" href="#">Anarchy</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="col-md-6 col-sm-6">
										<div class="block-text rel zmin clearfix">
											<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
											<p>Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
											<ins class="ab zmin sprite sprite-i-triangle block"></ins>
											<a title="" href="#">Carl Colin</a>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 hidden-xs">
										<div class="block-text rel zmin clearfix">
											<div class="mark"><span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span></div>
											<p>Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
											<ins class="ab zmin sprite sprite-i-triangle block"></ins>
											<a title="" href="#">Anarchy</a>
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
		</div>
	</section>
	<section class="clearfix">
		<div class="container">
			<div class="row top-50-m">
				<div class="col-md-12">
					<h2>Top 50 Medicines</h2>
					<table class="table table-bordered">
						<tr>
							<td>Ablity Table</td>
							<td>Ablity Table</td>
							<td>Ablity Table</td>
							<td>Ablity Table</td>
							<td>Ablity Table</td>
						</tr>
						<tr>
							<td>Adviser Discus</td>
							<td>Adviser Discus</td>
							<td>Adviser Discus</td>
							<td>Adviser Discus</td>
							<td>Adviser Discus</td>
						</tr>
						<tr>
							<td>Advair Inhaler</td>
							<td>Advair Inhaler</td>
							<td>Advair Inhaler</td>
							<td>Advair Inhaler</td>
							<td>Advair Inhaler</td>
						</tr>
						<tr>
							<td>Apriso</td>
							<td>Apriso</td>
							<td>Apriso</td>
							<td>Apriso</td>
							<td>Apriso</td>
						</tr>
						<tr>
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
						</tr>
					</table>
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
				</div>
			</div>
		</div>
	</section>
<?php include "include/footer.php" ?>
