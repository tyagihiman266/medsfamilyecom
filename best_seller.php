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
						<a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm">
						<div class="feature-wrap" style="border-right:1px solid grey;border-bottom:2px solid grey;height:350px">
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

							
								<a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm" class="tab-add-to-cart"><img src="images/shopping-cart.png"> View Details</a>
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






<?php include "include/footer.php" ?>
