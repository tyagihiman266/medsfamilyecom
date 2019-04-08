	<section class="clearfix">
		<div class="container-fluid">
			<div class="row footer-top-sec">
				<div class="col-md-4">
					<div class="fast-d text-white">
						<img src="images/free-d.png">
						<h4>Fast &amp; Free Delivery</h4>
						<p>We Provide You with fast and free delivery of the product values</p>
					</div>
				</div>
				<div class="col-md-4 p-relative">
					<div class="">
						<div class="fast-d for-design text-white">
							<img src="images/safe-s.png">
							<h4>Safe &amp; Secure Payment</h4>
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
			<div class="container mt10">
				<div class="row footer-back">
					
						<div class="col-md-12 padding0">
						<div class="sm-res">
							<div class="col-md-3 col-sm-6 col-xs-6 f-location">
								<div class="footer-sec">
									<h3>CONNECT US</h3>
									<hr class="link-btm">
									<p><img src="images/location.png"> xxxxxxxxxx xxxxxxxx</p>
									<p><img src="images/call.png"> 1-800-891-0844</p>
									<p><img src="images/email.png"> info@medsfamily.com</p>
									<div class="toll-fax">
										<h3>Toll: 1-800-891-0844</h3>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="footer-sec">
									<h3>Top Category</h3>
									<hr class="link-btm">
									<ul>
										<li><a href="http://medsfamily.com/category/Allergies.htm"> Allergies</a></li>
										<li><a href="http://medsfamily.com/category/Weight-Loss.htm">Weight Loss</a></li>
										<li><a href="http://medsfamily.com/category/Blood-Pressure.htm"> Blood Pressure</a></li>
										<li><a href="sfamily.com/category/Birth-Control.htm">Birth control</a></li>
										<li><a href="http://medsfamily.com/category/Hair-Loss.htm">Hair Loss</a></li>
										<li><a href="http://medsfamily.com/category/Skincare.htm">Skincare</a></li>
									</ul>
								</div>
							</div>
							</div>
							<div class="sm-res">
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="footer-sec">
									<h3>Information</h3>
									<hr class="link-btm">
									<ul>
										<li><a href="about-us.php"> About Us </a></li>
										<li><a href="faqs.php">FaQ</a></li>
										<li><a href="#"> Terms of Use</a></li>
										<li><a href="privacy-policy.php"> Privacy Policy</a></li>
										<li><a href="how-to-order.php">How To Order</a></li>
										<li><a href="#"> Contact Us</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6 social-btm">
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
								</div></div>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center botm p-0"> <a href="technobrix.com" target="_blank">Crafted with <span style="color:#ea1b25;"><i class="fa fa-heart-o" aria-hidden="true"></i></span> by <font>TechnoBrix</font></a> </div>
			<?php //echo $baselink; ?>
		</footer>
	</section>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/float-panel.js" type="text/javascript"></script>
	<script src="js/accordion-menu.js" type="text/javascript"></script>
	<script src="js/owl.carousel.min.js" type="text/javascript"></script>

    <link href='css/jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='js/jquery-ui.min.js' type='text/javascript'></script>
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


function getcartcount()
       {
            
         $.ajax({
				type: "post",
				url: "ajax/getcartcount.php",
				data: {},
				 success: function(result){
				 	$('#cartcount').html(result);
				 	//console.log(result);
				 	 // $('.cart-sb').css("right", "0px"); 
				 	//alert(result);
				 	//alert("Product added successfully in your cart");
		        // $("#div1").html(result);
		    }});
	}
	$(document).ready(function() {
	getcartcount();
});

	

$(document).ready(function(){



        $( ".autocompleteSearch" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "ajax/getproductlistsalt.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {

            	$('#allergies').attr('disabled',true);
                $('#autocompleteSearch').val(ui.item.full_name); 
               // alert(ui.item.check);
                if(ui.item.check==="product"){
                 location.href="<?php echo $baselink; ?>product/"+ui.item.cat_name+"/"+ui.item.label+".htm";
                }else if(ui.item.check==="tags"){
                 location.href="<?php echo $baselink; ?>salt/"+ui.item.cat_name+"/"+ui.item.labelname+".htm";
                }else{
                 location.href="<?php echo $baselink; ?>salt/"+ui.item.cat_name+"/"+ui.item.label+".htm";
                }
                // display the selected text
              /*  $('.totalallergen').append('<span id="pall_'+ui.item.value+'">'+ ui.item.label+'&nbsp;<a onclick="removeitemall('+ui.item.value+')" id="'+ui.item.value+ '">DEL</a><br/></span>'); */ // save selected id to input
                // $('#autocompleteSearch').val(ui.item.label);

                return false;
            },
             minLength: 1
        });




	});
</script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
 
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	
$(document).on('change','#shipping_country_price',function(){
	var country=$(this).val();
    $.ajax({
                type: "post",
                url: "ajax/getshippingprice.php",
                data: {"country_id":country},
                 success: function(result){
               location.reload();
                 }
        });

});
</script>
<!--Begin Comm100 Live Chat Code-->
<div id="comm100-button-362"></div>
<script type="text/javascript">
  var Comm100API=Comm100API||{};(function(t){function e(e){var a=document.createElement("script"),c=document.getElementsByTagName("script")[0];a.type="text/javascript",a.async=!0,a.src=e+t.site_id,c.parentNode.insertBefore(a,c)}t.chat_buttons=t.chat_buttons||[],t.chat_buttons.push({code_plan:362,div_id:"comm100-button-362"}),t.site_id=231861,t.main_code_plan=362,e("https://chatserver.comm100.com/livechat.ashx?siteId="),setTimeout(function(){t.loaded||e("https://hostedmax.comm100.com/chatserver/livechat.ashx?siteId=")},5e3)})(Comm100API||{})
</script>
<!--End Comm100 Live Chat Code-->
</body>
</html>