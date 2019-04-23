<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";
//print_r($_REQUEST);
$catname=($_GET['cat_id']);
 $rowcatproduct=$objU->getResult('select * from manage_category where category_name like "%'.$catname.'%" order by id desc');
?>
<section class="clearfix bearcrumb-back">
	<div class="container">
		<div class="row">
			<div class="beardcrumb">
			<ul>
					<li><a href="index">HOME</a></li>
					<li><a href="<?php echo $baselink ?>category/<?php echo $_GET['cat_id'] ?>.htm"><?php echo $_GET['cat_id']; ?></a></li>
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
						<?php if(file_exists("upload/category/".$rowcatproduct[0]['category_image'])) { ?>
							<img src="upload/category/<?php echo $rowcatproduct[0]['category_image'] ?>" class="img-responsive">
						<?php } else { ?>
							<img src="images/category-banner.jpg" class="img-responsive">
						<?php } ?>
						
						<p><?php echo $rowcatproduct[0]['category_description'] ?></p>
					</div>
				</div>
				<?php $fulllink = $baselink."cat/".$_REQUEST['cat_id'].".htm"; ?>
				<div class="col-md-12 p-0">
					<?php include "include/shop-by-brand.php" ?>
				</div>
				<div class="col-md-12 category-main p-0">
                <?php 
                $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $searchdt=explode('?search=',$actual_link);
                  $wheresearch='';
                 if(count($searchdt) >0){
                 	$wheresearch.=" and salt_name like '".$searchdt[1]."%'";
                 }
 $pcount=$objU->getResult('select id from tbl_product where cat_id="'.$rowcatproduct[0]['id'].'" '.$wheresearch.' group by salt_name');
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
                $productsinglecat=$objU->getResult('select * from tbl_product where cat_id="'.$rowcatproduct[0]['id'].'" '.$wheresearch.' group by salt_name limit '.$start.', '.$limit.''); 
                if($reccnt > 0) {
                foreach($productsinglecat as $keyproduct => $valproduct)
                     {
                ?>
					<div class="col-md-3 p-0-7">
						<a href="salt/<?php echo $_REQUEST['cat_id']; ?>/<?php  echo buildURL($valproduct['name']); ?>.htm"><div class="feature-wrap">
							<?php 
$productsingleimg=$objU->getResult('select * from tbl_pro_img where p_id="'.$valproduct['id'].'"');

?>
<p style="color:black;font-size:16px;font-weight:38px;margin-top:6px;margin-left:6px"><?php echo $valproduct['name'] ?></p>
<p style="color:green;font-weight:28px;margin-top:6px;margin-left:6px"><?php echo $valproduct['salt_name'] ?></p>
<p style="font-weight:28px;margin-top:6px;margin-left:50%;" id = "hello">78% OFF</p>


							<center><img src="TBXadmin/upload/product/big/<?php echo $productsingleimg[0]['image']; ?>" class="img-responsive"></center>
							<div class="feature-cost text-center">
								
								<?php
								$productsingleprice=$objU->getResult('select min(per_pill_price) as minprice from tbl_product_package where product_id="'.$valproduct['id'].'"');  ?>
								<h3 style="display:none"><?php echo $_SESSION['currencySymbol']; ?><?php echo number_format($_SESSION['currencyConverter']*$productsingleprice[0]['minprice'],2); ?></h3>
								<a href="salt/<?php echo $_REQUEST['cat_id']; ?>/<?php  echo buildURL($valproduct['salt_name']); ?>.htm" class="tab-add-to-cart">View Details</a>
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





<style>
#hello {
    padding:0px 0px 0px 0px;
    background:red;
    border: 0 1px 0 1px solid #000;
	color:white;
}  
</style>




<?php include "include/footer.php" ?>
