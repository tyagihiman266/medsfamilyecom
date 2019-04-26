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
							

                          <?php  
                          $rowcat=$objU->getResult('select * from manage_category order by category_name asc');
                        
                            foreach($rowcat as $keycat =>$valcat)
                            {
                          ?>

							<li>
								<a href="cat/<?php  echo ($valcat['category_name']); ?>.htm"><div><?php echo $valcat['category_name'] ?></div></a>
								
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