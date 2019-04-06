<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";
//print_r($_REQUEST['cat_id']);
$catname=buildReverseURL($_REQUEST['cat_id']);
$rowcatproduct=$objU->getResult('select * from manage_category where category_name like "%'.$catname.'%" order by id desc');
 $saltid=buildReverseURL($_REQUEST['s_name']);
 //echo 'select * from tbl_product_salt where salt_name like "%'.$saltid.'%" order by id desc';
 $rowcatproductsalt=$objU->getResult('select * from tbl_product_salt where salt_name like "%'.$saltid.'%" order by id desc');
?>
<section class="clearfix bearcrumb-back">
	<div class="container">
		<div class="row">
			<div class="beardcrumb">
				<ul>
					<li><a href="index">Home</a></li>
					<li><a href="<?php echo $baselink ?>category/<?php echo $_REQUEST['cat_id'] ?>.htm"><?php echo $_REQUEST['cat_id']; ?></a></li>
            	<li><a href="<?php echo $baselink ?>salt/<?php echo $_REQUEST['cat_id'] ?>/<?php echo $_REQUEST['s_name'] ?>.htm"><?php echo $_REQUEST['s_name']; ?></a></li>

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
						<img src="images/category-banner.jpg" class="img-responsive">
						<!-- <p><//?php echo $rowcatproduct[0]['id']?></p> -->
                        <p>Our Medsfamily carries the largest selection of prescription medications including brand name prescription drugs and their generic label counterparts. Come discover why we are the largest and most trusted online Medsfamily.</p>
					</div>
				</div>
				<?php $fulllink = $baselink."salt/".$_REQUEST['cat_id']."/".$_REQUEST['s_name'].".htm"; ?>
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
  $pcount=$objU->getResult('select id from tbl_product where cat_id="'.$rowcatproduct[0]['id'].'" and name="'.$_REQUEST['s_name'].'" ');
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
                 

                
                $productsinglecat=$objU->getResult('select * from tbl_product where cat_id="'.$rowcatproduct[0]['id'].'" and name="'.$_REQUEST['s_name'].'" ');
                   if($reccnt > 0) { 
                foreach($productsinglecat as $keyproduct => $valproduct)
                     {
                ?>
					<div class="col-md-3 p-0-7">
						<div class="feature-wrap">
							<?php 
$productsingleimg=$objU->getResult('select * from tbl_pro_img where p_id="'.$valproduct['id'].'"');
//   $producttype=$objU->getResult('select product_category.category_name from product_category,product_category_detail where product_id="'.$valproduct['id'].'"  
//   and product_category.category_id=product_category_detail.category_id ');
    
?>
<div class="col-md-8 col-xs-8 col-lg-8 col-sm-8"></div>

<div class="col-md-4 col-xs-4 col-lg-4 col-sm-4">
    <!-- <span class="cardlabel"><//?php//if(!empty($producttype)){
       // echo $producttype[0]['category_name'];}else{echo "NA";}?></span> -->

</div>
<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">

<br>

<!--<img src="images/product.jpg" class="img-responsive">
-->
 <!--product image slider-->
                      <!--pro image slider-->
</div>

							<!--<img src="TBXadmin/upload/product/big/<?php echo $productsingleimg[0]['image']; ?>" class="img-responsive"> -->
						<a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm">
						    	<div class="feature-cost text-center">
				<!--Product name-->	<p><?php echo $valproduct['name']; ?></p>
               <?php $url="images/product.jpg";
 if ($productsingleimg[0]['image']!="") {

        $url="TBXadmin/upload/product/big/".$productsingleimg[0]['image'];

              }?>
              
  <img class="mySlides " src="<?php echo $url;?>" style="width:100%;height:200px"/>
  <a href="salt_product/<?php  echo buildURL($valproduct['id']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm"><?php echo $valproduct['name']; ?></a>
                
								<p style="display:none">
									 <?php  $productalltag=$objU->getResult('select * from product_tags where product_id="'.$valproduct['id'].'"');
                                        $alldata="";
                                        if(!empty($productalltag)){
                                            foreach($productalltag as $displayrecord){
                                            $alldata.=$displayrecord['tag_name'].",";
                                                
                                            }
                                            $tri=rtrim($alldata,",");
                                            $all= wordwrap($tri,15,"<br>\n");
                                            echo "[".$all."]";    
                                           // echo rtrim($alldata,",");
                                            
                                        }else{
                                            echo "[NA]";
                                        }
                                        ?> 	

								</p>
								
								<p><?php 
		  $productvariant=$objU->getResult('select id as v_id,varient,varient_unit from product_varient where product_id="'.$valproduct['id'].'"  ');
                $vary="";
                foreach($productvariant as $keyproductvary => $varyproduct)
                     {
                         $urls="product/".buildURL($rowcatproduct[0]['category_name'])."/".buildURL($valproduct['name']).".htm?v_id=".$varyproduct['v_id'];
                            $vary.="<a href='$urls' class='urls'>".$varyproduct['varient']." ".$varyproduct['varient_unit']."</a> | ";      
                     }
                    // echo $urls;
                       echo rtrim($vary," | ");
            					
								?></p>
							
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
                                   
								$productsingleprice=$objU->getResult('select min(price) as minprice,max(price) as maxprice,discount from tbl_product_package where product_id="'.$valproduct['id'].'"'); 
            					$mindiscount=$objU->getResult('select price,discount from tbl_product_package where product_id="'.$valproduct['id'].'" and price="'.$productsingleprice[0]['minprice'].'"'); 
            				$maxdiscount=$objU->getResult('select price,discount from tbl_product_package where product_id="'.$valproduct['id'].'"   and price="'.$productsingleprice[0]['maxprice'].'"'); 
            
                              //   print_r($mindiscount);
	            if($productsingleprice[0]['minprice']==$productsingleprice[0]['maxprice']){
	                        
	                        $pvary=number_format($productsingleprice[0]['minprice']-$mindiscount[0]['discount'],2);      
                    
	            }else{
	                        $pvary=number_format($productsingleprice[0]['minprice']-$mindiscount[0]['discount'],2)." - ".number_format($productsingleprice[0]['maxprice']-$maxdiscount[0]['discount'],2);      
                    
	            }
                   				
								?>
						
								<h5><?php echo $_SESSION['currencySymbol']; ?><?php echo $pvary; ?></h5>
								<a href="product/<?php  echo buildURL($rowcatproduct[0]['category_name']); ?>/<?php  echo buildURL($valproduct['name']); ?>.htm" class="tab-add-to-cart">View Details</a>
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
    .cardlabel{
        border:2px solid brown;
        text-align:right;
        padding:5px 15px 5px 15px; 
        background:lightgreen;
        color:black;
        font-weight:bold;
        border-radius:50px 10px 50px 10px; 
    }.urls{
        color:grey!important;
    }
    .urls:hover{
        color:blue!important;
    }
</style>







<?php include "include/footer.php" ?>