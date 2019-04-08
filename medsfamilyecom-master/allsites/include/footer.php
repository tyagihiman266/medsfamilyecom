	<section class="clearfix">
		<div class="container-fluid">
			<div class="row footer-top-sec">
				<div class="col-md-4">
					<div class="fast-d text-white">
						<img src="images/free-d.png">
						<h4>Fast & Free Delivery</h4>
						<p>We Provide You with fast and free delivery of the product values</p>
					</div>
				</div>
				<div class="col-md-4 p-relative">
					<div class="">
						<div class="fast-d for-design text-white">
							<img src="images/safe-s.png">
							<h4>Safe & Secure Payment</h4>
							<p>We are commited to increase the safty and security of your &nbsp; payments</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fast-d text-white">
						<img src="images/money-b.png">
						<h4>100% Money Back Guarentee</h4>
						<p>We offer 100% money-back guarantee within 60days of payment</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="clearfix">
		<footer>
			<div class="container-fluid p-0">
				<div class="row footer-back">
					<div class="container mt10">
						<div class="col-md-12 padding0">
							<div class="col-md-3 f-location">
								<div class="footer-sec">
									<h3>CONNECT US</h3>
									<hr class="link-btm">
									<p><img src="images/location.png"> xxxxxxxxxx xxxxxxxx</p>
									<p><img src="images/call.png"> 1234567890</p>
									<p><img src="images/email.png"> text@gmail.com</p>
									<div class="toll-fax">
										<h3>Toll: 1-800-891-0844</h3>
										<h3>Fax: 9822314343</h3>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="footer-sec">
									<h3>Top Category</h3>
									<hr class="link-btm">
									<ul>
										<li><a href="#"> Category Name</a></li>
										<li><a href="#"> Category Name</a></li>
										<li><a href="#"> Category Name</a></li>
										<li><a href="#"> Category Name</a></li>
										<li><a href="#"> Category Name</a></li>
										<li><a href="#">Category Name</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="footer-sec">
									<h3>Information</h3>
									<hr class="link-btm">
									<ul>
										<li><a href="#"> About Us </a></li>
										<li><a href="#"> Blog</a></li>
										<li><a href="#"> Terms of Use</a></li>
										<li><a href="#"> Privacy Policy</a></li>
										<li><a href="#"> Sitemap</a></li>
										<li><a href="#"> Contact Us</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3 social-btm">
								<div class="footer-sec">
									<ul class="clearfix">
										<li>
											<a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
										</li>
									</ul>
									<img src="images/bbb.png" class="img-responsive">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center botm p-0"> <a href="#" target="_blank">Crafted with <span style="color:#ea1b25;"><i class="fa fa-heart-o" aria-hidden="true"></i></span> by <font>TechnoBrix</font></a> </div>
			</div>
		</footer>
	</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/float-panel.js" type="text/javascript"></script>
	<script src="js/accordion-menu.js" type="text/javascript"></script>
	<script src="js/owl.carousel.min.js" type="text/javascript"></script>
	<script>
		$('.owl-carousel').owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 2
				}
			}
		})
	</script>
	<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
</body>
</html>