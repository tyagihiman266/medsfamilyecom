<?php 
$pagetitle="Best Seller: buy best selling medicine online | Medsfamily
";
$keyword="best selling medicine";
$description="All the Top Products in the Pharmaceutical and Biotechnology Industry with detailed performance and future trends";
include "include/header.php";
//print_r($_REQUEST);
$catname=buildReverseURL($_REQUEST['cat_id']);

?>
<section class="clearfix bearcrumb-back">
	<div class="container">
		<div class="row">
			<div class="beardcrumb">
				<ul>
					<li><a href="index">Home</a></li>
					<li><a href="#">Best Seller</a></li>

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
					<div class="category-banner">
						<img src="images/bestseller.jpg" class="img-responsive">
						<p>Discover the best Medicine in Best Sellers. Find the top 100 most popular in Medsfamily Best Sellers.</p>
					</div>
				</div>
				<?php $fulllink = $baselink."best-seller"; ?>
				<div class="col-md-12 p-0">
				<?php include 'include/shop-by-brand.php'; ?>
					
				</div>
				<div class="col-md-12 category-main p-0">

                <?php 
                $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $searchdt=explode('?search=',$actual_link);
                //print_r($searchdt);
              
                $wheresearch='';
                 if(count($searchdt) >0){


                 	$wheresearch.=" and name like '".$searchdt[1]."%'";
                 }
  $pcount=$objU->getResult('select id from tbl_product where best_seller=1 '.$wheresearch.'');
  $reccnt=count($pcount);
                $total_pages=$reccnt;
                 $start=0;
     if(isset($_GET['start'])) $start=$_GET['start'];
       $limit=12;
     if(isset($_GET['limit'])) $limit=$_GET['limit'];
if($_REQUEST['cat_id']){
include("pagination_listing.php");
}else{
include("pagination.php");
}
                 

                
                $productsinglecat=$objU->getResult('select * from tbl_product where best_seller=1 '.$wheresearch.' limit '.$start.', '.$limit.' ');
                   if($reccnt > 0) { 
                foreach($productsinglecat as $keyproduct => $valproduct)
                     {
						 $rowcatproduct=$objU->getResult('select * from manage_category where id="'.$valproduct['cat_id'].'"');
                ?>
					<div class="col-md-3 p-0-7">
						<a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm"><div class="feature-wrap">
							<?php 
$productsingleimg=$objU->getResult('select * from tbl_pro_img where p_id="'.$valproduct['id'].'"');

?>
<img src="images/product.jpg" class="img-responsive">
							<!--<img src="TBXadmin/upload/product/big/<?php echo $productsingleimg[0]['image']; ?>" class="img-responsive"> -->
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
								<a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm" class="tab-add-to-cart"><img src="images/shopping-cart.png"> Add to Cart</a>
							</div>
						</div></a>
					</div>
				<?php } ?>

       <!-- Pagination -->
        <div class="pagination">
          
        <div align="center" style="width:100%; padding-top:20px;"><?php echo $pagination; ?></div>
          <?php/*
          <div class="results">Showing <?php echo $start+1; ?> to <?php if($limit+$start>$total_pages){echo $total_pages; }else{ echo $limit+$start;} ?> of <?php echo $reccnt; ?> (<?php echo ceil($total_pages/$limit); ?> Pages)</div>

          */?>
        </div>    
        <?php }else{ ?>

            <div align="center" style="width:100%; color:#999;">No record Found</div>

            <?php } ?>

				</div>
			</div>
		</div>
	</div>
</section>










<?php include "include/footer.php" ?>
