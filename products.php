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
						<li><a href="category/<?php echo $_REQUEST['cat_id']; ?>.htm"><?php echo $rowcatproduct[0]['category_name']; ?></a></li>
					<li><a href="salt/<?php echo $_REQUEST['cat_id']; ?>/<?php echo buildReverseURL($productsingle[0]['salt_name']); ?>.htm"><?php echo $productsingle[0]['salt_name']; ?></a></li>
						<li><a href="javascript:void(0)"><?php echo $productsingle[0]['name']; ?></a>
				
						</li>
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
				
						<div class="product-descp">
					<h3><?php echo ucfirst($productsingle[0]['name']); ?></h3>
					 <?php  $productalltag=$objU->getResult('select * from related_product,tbl_product,manage_category
					where tbl_product.id=related_product.related_product_id and  tbl_product.cat_id=manage_category.id
					and related_product.product_id="'.$productsingle[0]['id'].'"');
                                        $alldata="";
                                        if(!empty($productalltag)){
                                            foreach($productalltag as $displayrecord){
                                            $path="product/".buildURL($displayrecord["category_name"])."/".buildURL($displayrecord["name"]).".htm";
                                            $alldata.="<a href='".$path."' >".$displayrecord['name']."</a> <b>|</b> ";
                                                
                                            }
                                            echo  rtrim($alldata," <b>|</b> ");
                                            
                                        }else{
                                            echo "NA";
                                        }
                                        ?> 	
					<hr class="hr-prod-name">
				</div>
                         <div class="col-md-12 p-0 compnay-list clearfix " style="">
                         	
                         
                             <h3>Available Company/Brands</h3><?php echo $_REQUEST['v_id'] ?>
                         	<ul style="list-style: none;" id="logo-list">
                             <?php

                              $productsinglecompany=$objU->getResult('select * from tbl_company where product_id="'.$productsingle[0]['id'].'"');

                              foreach($productsinglecompany as $keycompany => $valcompany) 
                              {
                               ?>
                               <li class="brand-logo" onclick="callvarient(<?php echo $productsingle[0]['id'] ?>,<?php echo $valcompany['id'] ?>)">
                         		<script>
                         		    window.onload = function() {
                                          callvarient(<?php echo $productsingle[0]['id'] ?>,<?php echo $productsinglecompany[0]['id'] ?>);
                                        };
                         		    
                         		</script>	
                         			<img src="TBXadmin/upload/company/<?php if(!empty($valcompany['logo'])){echo $valcompany['logo'];}else{echo "companydefault.png";} ?>"  height="100" width="100" >
                         			<div class="companyname"><?php echo $valcompany['company_name']; ?></div>
                         		</li>
                         	<?php } ?>
                         	</ul>

					</div></div>
	<div class="col-md-12">
	    <br><br>
			</div>
				<div class="col-md-12 p-0 feature-product products-tab clearfix " id="resultpackage" style="display: block;">
					<div role="tabpanel" class="f-tab clearfix">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">

							  <?php 
							   $productsinglevarient=$objU->getResult('select * from product_varient where product_id="'.$productsingle[0]['id'].'"');

							   foreach($productsinglevarient as $varientkey => $varientval) {

							  ?>
							<li role="presentation" class="active">
								<a href="#varient<?php echo $varientval['id']; ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $productsingle[0]['name'] ?> 
								<?php echo $varientval['varient']; ?> <?php echo $varientval['varient_unit']; ?> </a>
						 
							</li>
						<?php } ?>
							
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
						
<!--                         <?php  foreach($productsinglevarient as $varientkey => $varientval) { ?>

							<div role="tabpanel" class="tab-pane active" id="varient<?php echo $varientval['id']; ?>">
								<div class="col-md-12 p-0 mp-0">
									<div class="table-responsive">
										<table class="table"> 
											<tr>
												<th>Package</th>
												<th>Per Pills</th>
												<th>Price</th>
												<th>Savings</th>
												<th>OTC/RX</th>
												<th>order</th>
											</tr>


											<?php 
											$productsinglepackage=$objU->getResult('select * from tbl_product_package where product_id="'.$varientval['product_id'].'" and 
											varient_id="'.$varientval['id'].'"');

											foreach($productsinglepackage as $keypackage => $valpackage)
											{
											?>
											<tr>
												<td><?php echo $varientval['varient']; ?> <?php echo $varientval['varient_unit']; ?> x <?php echo $valpackage['no_pills']; ?> pills</td>
												<td>$<?php echo $valpackage['per_pill_price']; ?> </td>
												<td>$<?php echo $valpackage['price']; ?></td>
												<td><?php echo $discountmout=number_format(($valpackage['price']*$valpackage['discount'])/100,2); ?></td>
												<td><?php echo $valpackage['OTC/RX']; ?></td>
												<td><a href="javascript:void(0)" onclick="addcart(<?php echo $valpackage['id']; ?>)" class="tab-add-to-cart"><img src="images/shopping-cart.png"><span> Add to Cart</span></a></td>
											</tr>

										<?php } ?>
										
											
										</table>
									</div>
								</div>
							</div>
                             <?php } ?>-->

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
				<div class="col-md-12 clearfix">
					<div class="product-descp desc-margin">
							
							<p><?php echo $productsingle[0]['short_description'] ?> 
							</p>
							<div class="sharethis-inline-share-buttons"></div>
							
							<?php if(isset($_SESSION['user_id'])){ ?>
							<span class="r-m-p mt-20 pull-right" data-toggle="modal" data-target="#review-m">Write Review</span>
						<?php } else { ?>
								<span class="r-m-p mt-20 pull-right"><a href="signin">Write Review</a></span>
						<?php } ?>
							
							
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
											Packaging
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body">
										
										<?php

$productimages=$objU->getResult('select packaging_image from add_product_packaging_image where product_id="'.$varientval['product_id'].'"');

foreach($productimages as $varientkey => $varientimg) { 

  $url="images/product.jpg";
 if ($varientimg['packaging_image']!="") {

        $url="TBXadmin/upload/product/varient/big/".$varientimg['packaging_image'];

              }
             
             ?>
	 <center><div style = "text-align:center;display:inline-block;margin-top:30px;float:left;" class = "product-img-wrap" >
  <img class="mySlides " src="<?php echo $url;?>" style="width:100%;height:250px;text-align:center"/></div></center>

  <?php

} 
   ?>
	 <div class="clearfix"></div>
<?php echo $productsingle[0]['safety_information']; ?>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											<i class="more-less glyphicon glyphicon-plus"></i>
											Disclaimer
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

				<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Testimonial</a></li>
  <li><a data-toggle="tab" href="#menu1">Related Products</a></li>
  <!-- <li><a data-toggle="tab" href="#menu2">Menu 2</a></li> -->
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
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
  <div id="menu1" class="tab-pane fade">
	<div class="col-md-12 p-0 clearfix">
					<div class="sbb text-light-green">
						<h3>Related Products</h3>
					</div>
					<div class="col-md-12 p-0">
                         <?php 
							$productsinglecat=$objU->getResult('select y.related_product_id,prod.name,prod.id,prod.salt_name,mcat.category_name from (select name,related_product_id from tbl_product join related_product on related_product.product_id=tbl_product.id join manage_category on manage_category.id = tbl_product.cat_id where tbl_product.id = "'.$productsingle[0]['id'].'") as y join tbl_product prod on y.related_product_id = prod.id join manage_category mcat on mcat.id = prod.cat_id'); 
                foreach($productsinglecat as $keyproduct => $valproduct)
                     {
                  //   	
                ?>
						<div class="col-md-3 col-sm-4 p-0-7">
							<a href="product/<?php  echo buildURL($valproduct['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm">
							<div class="feature-wrap"  style="border-right:1px solid grey;border-bottom:2px solid grey;height:350px">
							<?php 
$productsingleimg=$objU->getResult('select * from tbl_pro_img where p_id="'.$valproduct['id'].'"');

?><!-- product name -->
<?php
								$productsingleprice=$objU->getResult('select *  from tbl_product_package where product_id="'.$valproduct['id'].'"');  ?>
<strong><a style="color:black;font-size:13px;font-weight:38px;margin-top:6px;margin-left:6px" href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm"><?php echo $valproduct['name'] ?></a></strong><br>
<!-- salt name -->

<a style="color:green;font-weight:28px;margin-top:6px;margin-left:6px" href="salt_product/<?php  echo buildURL($valproduct['id']); ?>/<?php  echo ($valproduct['salt_name']); ?>.htm"><?php echo $valproduct['salt_name']; ?></a>
<!-- discount -->
<p style="font-weight:28px;margin-top:6px;margin-left:50%;" id = "hello"><?php echo $productsingleprice[0]['discount']; ?> OFF</p>


							<center><img src="TBXadmin/upload/product/big/<?php echo $productsingleimg[0]['image']; ?>" class="img-responsive"></center>
							<div class="feature-cost text-center">
							
							<p><?php 
		  $productvariant=$objU->getResult('select id as v_id,varient,varient_unit from product_varient where product_id="'.$valproduct['id'].'"  ');
                $vary="";
                foreach($productvariant as $keyproductvary => $varyproduct)
                     {
                         $urls="product/".buildURL($rowcatproduct[0]['category_name'])."/".buildURL($valproduct['name']).".htm?v_id=".$varyproduct['v_id'];
                            $vary.="<a href='$urls' class='urls' style="."font-size:12px".">  ".$varyproduct['varient']." ".$varyproduct['varient_unit']."</a> | ";      
                     }
                    // echo $urls;
                       echo rtrim($vary," | ");
            					
								?></p>
										 
										 </div>
										 <?php 
										 $a = $productsingleprice[0]['price'];
										 $b = $productsingleprice[0]['discount'];
										 
										 $c = ($a*$b)/100;
										 
										 $d = $a-$c;
										 
										 ?>
										 <div style="margin-top:20px"></div>
										 <p style="font-size:17px;color:black;margin-left:6px;background:	#FADA5E;width:35%;float:left" id = "rate">$<?php echo number_format((float)$d, 2, '.', '');?> </p>
										 <i class="fas fa-shopping-cart fa-2x" style="margin-left:30px"></i><br>
										 <div style="margin-top:22px"></div>
							<p style="font-size:12px;color:orange;margin-left:6px">Manufacturer`s Suggested Retail Price $<?php echo $productsingleprice[0]['price'];?></p>
								<div class="feature-cost text-center">
								<?php
								$productsingleprice=$objU->getResult('select min(per_pill_price) as minprice from tbl_product_package where product_id="'.$valproduct['id'].'"');  ?>
								<h3 style="display:none"><?php echo $_SESSION['currencySymbol']; ?><?php echo number_format($_SESSION['currencyConverter']*$productsingleprice[0]['minprice'],2); ?></h3>
								<a style="color:black;font-size:13px;font-weight:38px;margin-top:6px;margin-left:6px" href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm" class="tab-add-to-cart">View Details</a>
							</div>
						</div></a>
					</div>
				<?php } ?>
					
					
					</div>
				</div>
				
  </div>
  <!-- <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div> -->
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
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<style>
#hello {
    padding:5px 5px 5px 17px;
    background:red;
    border: 0 1px 0 1px solid #000;
	color:white;
} 
#rate {
    padding:7px 5px 7px 6px;
    
    border: 0 1px 0 1px solid #000;
	color:white;
} 
</style>