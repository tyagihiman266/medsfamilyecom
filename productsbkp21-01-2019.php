<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";

$catname=buildReverseURL($_REQUEST['cat_id']);
// echo "<br/>";
 $productname=buildReverseURL($_REQUEST['p_name']);

 $rowcatproduct=$objU->getResult('select * from manage_category where category_name like "%'.$catname.'%" order by id desc');
//die;

$productsingle=$objU->getResult('select * from tbl_product where name like "'.$productname.'%" and cat_id="'.$rowcatproduct[0]['id'].'"');

  if($_REQUEST['submitreview']=='yes')
   {

   	    $colArrayitem = array(
           'product_id' => $_REQUEST['p_id'],
           'rating' =>$_REQUEST['star'],
           'review_msg' => $_REQUEST['review_msg'],
           'user_id' =>$_SESSION['user_id'] 
          );
          $objU->insertQuery($colArrayitem,'tbl_review');
   echo "<script>alert('Review Added successfully.');</script>";



    }
//print_r($productsingle);
?>
<section class="clearfix bearcrumb-back">
	<div class="container">
		<div class="row">
			<div class="beardcrumb">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="javascript:void(0);"><?php echo $productsingle[0]['salt_name']; ?></a></li>
				</ul>
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
					<?php //include "include/shop-by-brand.php" ?>
				</div>
				<div class="col-md-12 p-0">
					<div class="col-md-6 product-single">
					<div class="product-img-wrap">
						<?php 
$productsingleimg=$objU->getResult('select * from tbl_pro_img where p_id="'.$productsingle[0]['id'].'"');

?>
						
						<!--<img src="TBXadmin/upload/product/big/<?php echo $productsingleimg[0]['image']; ?>" class="img-responsive" > -->
						<img src="images/product.jpg" class="img-responsive">
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-descp">
							<h3><?php echo $productsingle[0]['salt_name']; ?></h3>
							<p><?php echo $productsingle[0]['short_description'] ?> </p>
							<?php if(isset($_SESSION['user_id'])){ ?>
							<span class="r-m-p mt-20 pull-right" data-toggle="modal" data-target="#review-m">Write Review</span>
						<?php } else { ?>
								<span class="r-m-p mt-20 pull-right"><a href="signin">Write Review</a></span>
						<?php } ?>
							
							
						</div>
						<!--
						<div class="select-medication">
							<div class="form-group">
								<label>*Select Medication</label>
								<select class="form-control">
									<option>--plese select--</option>
									<option>option1</option>
									<option>option2</option>
									<option>option3</option>
									<option>option4</option>
								</select>
							</div>
						</div> -->
					</div>
				</div>
                         <div class="col-md-12 p-0 compnay-list clearfix ">
                         	<div class="sharethis-inline-share-buttons"></div>
                         
                             <h3>Select brand to purchase medicine</h3>
                         	<ul style="list-style: none;" id="logo-list">
                             <?php

                              $productsinglecompany=$objU->getResult('select * from tbl_company where product_id="'.$productsingle[0]['id'].'"');

                              foreach($productsinglecompany as $keycompany => $valcompany) 
                              {
                               ?>
                               <li class="brand-logo"><a href="javascript:void(0)">
                         			

                         			<img src="TBXadmin/upload/company/<?php echo $valcompany['logo'] ?>"  height="100" width="100" onclick="callvarient(<?php echo $productsingle[0]['id'] ?>,<?php echo $valcompany['id'] ?>)"></a>
                         			<div class="companyname"><?php echo $valcompany['company_name']; ?></div>
                         		</li>
                         	<?php } ?>
                         	</ul>

                         </div>

				<div class="col-md-12 p-0 feature-product products-tab clearfix " id="resultpackage" style="display: none;">
					<div role="tabpanel" class="f-tab clearfix">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">

							  <?php 
							   $productsinglevarient=$objU->getResult('select * from product_varient where product_id="'.$productsingle[0]['id'].'"');

							   foreach($productsinglevarient as $varientkey => $varientval) {

							  ?>
							<li role="presentation" class="active">
								<a href="#varient<?php echo $varientval['id']; ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $productsingle[0]['name'] ?> <?php echo $varientval['varient']; ?> <?php echo $varientval['varient_unit']; ?> </a>
							</li>
						<?php } ?>
							
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">

                         <?php  foreach($productsinglevarient as $varientkey => $varientval) { ?>

							<div role="tabpanel" class="tab-pane active" id="varient<?php echo $varientval['id']; ?>">
								<div class="col-md-12 p-0 mp-0">
									<div class="table-responsive">
										<table class="table"> 
											<tr>
												<th>Package</th>
												<th>Per Pills</th>
												<th>Price</th>
												<th>Savings</th>
												<th>Bonus</th>
												<th>order</th>
											</tr>


											<?php 
											$productsinglepackage=$objU->getResult('select * from tbl_product_package where product_id="'.$varientval['product_id'].'" and varient_id="'.$varientval['id'].'" and company_id=11');

											foreach($productsinglepackage as $keypackage => $valpackage)
											{
											?>
											<tr>
												<td><?php echo $varientval['varient']; ?> <?php echo $varientval['varient_unit']; ?> x <?php echo $valpackage['no_pills']; ?> pills</td>
												<td>$<?php echo $valpackage['per_pill_price']; ?> </td>
												<td>$<?php echo $valpackage['price']; ?></td>
												<td><?php echo $discountmout=number_format(($valpackage['price']*$valpackage['discount'])/100,2); ?></td>
												<td>+<?php echo $valpackage['bonus']; ?></td>
												<td><a href="javascript:void(0)" onclick="addcart(<?php echo $valpackage['id']; ?>)" class="tab-add-to-cart"><img src="images/shopping-cart.png"><span> Add to Cart</span></a></td>
											</tr>

										<?php } ?>
										
											
										</table>
									</div>
								</div>
							</div>
                             <?php } ?>

							<div role="tabpanel" class="tab-pane" id="tab">
								cacacacac
							</div>
							<div role="tabpanel" class="tab-pane" id="tab1">
								bdbdbdb
							</div>
							<div role="tabpanel" class="tab-pane" id="tab2">
								sdgsdfgdfsg
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 p-0 clearfix">
					<div class="p-accord-wrap">
						<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											<i class="more-less glyphicon glyphicon-plus"></i>
											Product Description
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<?php echo $productsingle[0]['product_description']; ?>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											<i class="more-less glyphicon glyphicon-plus"></i>
											Sefty Information
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body">
										<?php echo $productsingle[0]['safety_information']; ?>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											<i class="more-less glyphicon glyphicon-plus"></i>
											Side Effects
										</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body">
											<?php echo $productsingle[0]['side_effects']; ?>
									</div>
								</div>
							</div>
						</div><!-- panel-group -->
					</div><!-- container -->
				</div>
				<div class="col-md-12 p-0 clearfix">
					<div class="sbb text-light-green">
						<h3>Related Products</h3>
					</div>
					<div class="col-md-12 p-0">
                         <?php 
						  $productsinglecat=$objU->getResult('select * from tbl_product join related_product  on related_product.related_product_id=tbl_product.id'); 
                foreach($productsinglecat as $keyproduct => $valproduct)
                     {
                     	$rowcatproduct=$objU->getResult('select * from manage_category where id="'.$valproduct['cat_id'].'" ');
                ?>
						<div class="col-md-3 col-sm-4 p-0-7">
							<a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm">		<div class="feature-wrap">
								<?php 
$productsingleimg=$objU->getResult('select * from tbl_pro_img where p_id="'.$valproduct['id'].'"');

?>
								<img src="images/product.jpg" class="img-responsive">
								<div class="feature-cost text-center">
									<p><?php echo $valproduct['name'] ?></p>
								<?php

								 if(avgratingProduct($valproduct['id'])==0) { ?>
								 
								<span>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
							<?php } else if(avgratingProduct($valproduct['id'])==1) {  ?>
								<span>
									<i class="fa fa-star ratingon" class="ratingon" aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
							<?php } else if(avgratingProduct($valproduct['id'])==2) {  ?>
	                            <span>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
							<?php } else if(avgratingProduct($valproduct['id'])==3) {  ?>
	                            <span>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
							<?php } else if(avgratingProduct($valproduct['id'])==4) {  ?>
	                            <span>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
								<?php } else if(avgratingProduct($valproduct['id'])==5) {  ?>
	                            <span>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
								</span>
							<?php } ?>
<?php  
                                   
								$productsingleprice=$objU->getResult('select min(per_pill_price) as minprice from tbl_product_package where product_id="'.$valproduct['id'].'"'); 
                                 
								 ?>
									<h3><?php echo $_SESSION['currencySymbol']; ?><?php echo number_format($_SESSION['currencyConverter']*$productsingleprice[0]['minprice'],2); ?></h3>
									
								</div>
								</div></a>
						</div>

					<?php } ?>
					
					
					
					</div>
				</div>
				<div class="col-md-12 p-0 clearfix">
				<div class="sbb text-light-green">
						<h3>Customer Review</h3>
					</div>	
					<?php if(isset($_SESSION['user_id'])){ ?>
							<span class="r-m-p mt-20 pull-right" data-toggle="modal" data-target="#review-m">Write Review</span>
						<?php } else { ?>
								<span class="r-m-p mt-20 pull-right"><a href="signin">Write Review</a></span>
						<?php } ?>
<table class="table mt-20 feature-cost">
	<?php
 $productsinglreview=$objU->getResult('select * from tbl_review join user_data  on tbl_review.user_id=user_data.id where tbl_review.product_id="'.$productsingle[0]['id'].'"'); 
   if(count($productsinglreview) >0) {
 foreach ($productsinglreview as $key => $value) {
 
 ?>
  
	<tr>
		<td>
			<div class="stars">
				<p>Rating</p>
				<?php

								 if($value['rating']==0) { ?>
								 
								<span>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
							<?php } else if($value['rating']==1) {  ?>
								<span>
									<i class="fa fa-star ratingon" class="ratingon" aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
							<?php } else if($value['rating']==2) {  ?>
	                            <span>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
							<?php } else if($value['rating']==3) {  ?>
	                            <span>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
							<?php } else if($value['rating']==4) {  ?>
	                            <span>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingoff"  aria-hidden="true"></i>
								</span>
								<?php } else if($value['rating']==5) {  ?>
	                            <span>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
									<i class="fa fa-star ratingon"  aria-hidden="true"></i>
								</span>
							<?php } ?>
			</div>
		</td>
		<td>
			<div class="product-review">
				<p><?php echo $value['review_msg'] ?></p>
				<p class="r-txt">Rewiew By:<span class="text-success"><?php echo $value['name'] ?></span></p>
				<p class="r-txt">Posted On:<span class="text-success"><?php echo $value['posated_date'] ?></span></p>
			</div>
		</td>
	</tr>
   <?php } } else { ?>
   	<tr><td colspan="2">No Review Yet</td></tr>

	 <?php } ?>
	
</table>

					
					
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "include/footer.php" ?>
<div class="modal fade" id="review-m">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Write Your Review</h4>
			</div>
			<div class="modal-body clearfix">
				<form action="" class="" id="" method="post">
					<input type="hidden" name="submitreview" value="yes">
					<input type="hidden" name="p_id" value="<?php echo $productsingle[0]['id'] ?>" >
				<div class="main-star">
				<div class="stars">
				<p>Rating</p>
				
					<input class="star star-5" id="star-5n" type="radio" name="star" value="5" />
					<label class="star star-5" for="star-5n"></label>
					<input class="star star-4" id="star-4n" type="radio" name="star" value="4"  />
					<label class="star star-4" for="star-4n"></label>
					<input class="star star-3" id="star-3n" type="radio" name="star" value="3" />
					<label class="star star-3" for="star-3n"></label>
					<input class="star star-2" id="star-2n" type="radio" name="star" value="2" />
					<label class="star star-2" for="star-2n"></label>
					<input class="star star-1" id="star-1n" type="radio" name="star" value="1" />
					<label class="star star-1" for="star-1n"></label>
				
			</div>
				</div>
				
				
				
				<div class="form-group">
				<textarea class="form-control" cols="5" name="review_msg" rows="6" placeholder="Write your review here"></textarea>	
				</div>	
					
				<button type="submit" class="sign-in pull-right">Submit</button>	
					
					
				</form>
			</div>
			<div class="modal-footer">
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<script type="text/javascript">


	function callvarient(pid,companyid)
       {
            
            $('#resultpackage').show();
            $('#resultpackage').html('<img src="images/loader.gif"');
			$.ajax({
				type: "post",
				url: "ajax/getpackages.php",
				data: {'companyid':companyid, 'pid': pid},
				 success: function(result){
				 	$('#resultpackage').html(result);
				 	//console.log(result);
				 	 // $('.cart-sb').css("right", "0px"); 
				 	//alert(result);
				 	//alert("Product added successfully in your cart");
		        // $("#div1").html(result);
		    }});
	}

	function addcart(packageid,qty){
      $('.addcart_'+packageid).hide();
      $('.cartloader_'+packageid).show();
       $.ajax({
				type: "post",
				url: "ajax/addtocart.php",
				data: {'packageid':packageid,'qty':qty},
				 success: function(result){
				 	getcartcount();
				 	$('.addcart_'+packageid).hide();
      $('.cartloader_'+packageid).hide();
      $('.removecart_'+packageid).show();
				 	//$('#resultpackage').html(result);
				 	//console.log(result);
				 	 // $('.cart-sb').css("right", "0px"); 
				 	//alert(result);
				 	//alert("Product added successfully in your cart");
		        // $("#div1").html(result);
		    }});

	}

	function removecart(packageid,pid,companyid){

              $.ajax({
				type: "post",
				url: "ajax/removecart.php",
				data: {'packageid':packageid},
				 success: function(result){
				 	callvarient(pid,companyid);
				 	getcartcount();
				 	
				 	//$('#resultpackage').html(result);
				 	//console.log(result);
				 	 // $('.cart-sb').css("right", "0px"); 
				 	//alert(result);
				 	//alert("Product added successfully in your cart");
		        // $("#div1").html(result);
		    }});

	        }


 
</script>
	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c38242baea594001162d33c&product=inline-share-buttons' async='async'></script>
      <script>
      	$(document).on('click', '#logo-list li', function(){
      	$("#logo-list").find('li').removeClass('activ-list');
		  $(this).addClass('activ-list');
      }) ;  	
   </script>                  