<div style="float:left;" class="accordian-left">
				<div class="float-panel" style="width:267px;font-size:13px;background:#ffffff;">
					<div id="accordion">
						<div class="accordian-heading">
							<h3>Category</h3>
						</div>
						
						<ul>
                        <li>
								<div><a href="best-seller">Best Seller</a></div>
								
							</li>
							<?php /*<li>
								<div><a href="category.php">Special offer</a></div>
								<ul>
									<li><a href="category.php">Lorem ipsum</a></li>
									<li><a href="category.php">Dolor sit</a></li>
								</ul>
							</li>
							<li>
								<div><a href="category.php">Best Seller</a></div>
								<ul>
									<li><a href="category.php">Finibus Bonorum</a></li>
									<li><a href="category.php">Sed ut</a></li>
									<li><a href="category.php">Neque porro</a></li>
									<!--<li>
										<div>Commodo Rhoncus</div>
										<ul>
											<li><a href="demo.html">Current</a></li>
											<li><a href="?132">Consectetur</a></li>
										</ul>
									</li>-->
								</ul>
							</li> */?>

                          <?php  
                          $rowcat=$objU->getResult('select * from manage_category order by category_name asc');
                        
                            foreach($rowcat as $keycat =>$valcat)
                            {
                          ?>

							<li>
								<div><a href="cat/<?php  echo buildURL($valcat['category_name']); ?>.htm"><?php echo $valcat['category_name'] ?></a></div>
								<ul>

									<?php   $rowproduct=$objU->getResult('select * from tbl_product where cat_id="'.$valcat['id'].'"');
                        
                            foreach($rowproduct as $keyproduct =>$valproduct)
                            {

                           
                             ?>

                                  <?php /*
									<li><a href="products.php?id=<?php echo $valproduct['id']; ?>"><?php echo $valproduct['name']; ?></a></li> */?>
							
								<li><a href="salt/<?php  echo buildURL($valcat['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm"><?php echo $valproduct['name']; ?></a></li> 
								 
								<?php } ?>
									
								</ul>
							</li> 
						<?php } ?>
							
							
						</ul>
					</div>
				</div>
				<div class="sm-respsive">
				<div class="left-banner">
					<img src="images/lf-banner.jpg" class="img-responsive">
					<img src="images/lf-banner1.jpg" class="img-responsive">
				</div>
				<!--
				<div class="recent-view clearfix">
					<h4>Recent View</h4>
					<ul class="clearfix">
						<li>
							<img src="images/lrv1.jpg" class="img-responsive">
						</li>
						<li>
							<div class="feature-cost">
								<p>Anti Sunspot</p>
								<span>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
								</span>
								<h3>$24.00</h3>
							</div>
						</li>
					</ul>
					<ul class="clearfix">
						<li>
							<img src="images/lrv.jpg" class="img-responsive">
						</li>
						<li>
							<div class="feature-cost">
								<p>Anti Sunspot</p>
								<span>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
								</span>
								<h3>$24.00</h3>
							</div>
						</li>
					</ul>
					<ul class="clearfix">
						<li>
							<img src="images/lrv1.jpg" class="img-responsive">
						</li>
						<li>
							<div class="feature-cost">
								<p>Anti Sunspot</p>
								<span>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
								</span>
								<h3>$24.00</h3>
							</div>
						</li>
					</ul>
					<ul class="clearfix">
						<li>
							<img src="images/lrv.jpg" class="img-responsive">
						</li>
						<li>
							<div class="feature-cost">
								<p>Anti Sunspot</p>
								<span>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
								</span>
								<h3>$24.00</h3>
							</div>
						</li>
					</ul>
					<ul class="clearfix">
						<li>
							<img src="images/lrv1.jpg" class="img-responsive">
						</li>
						<li>
							<div class="feature-cost">
								<p>Anti Sunspot</p>
								<span>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
								</span>
								<h3>$24.00</h3>
							</div>
						</li>
					</ul>
				</div> -->
			</div>
			</div>