<?php

require_once("connect.php");

class Catalog {
   
   		public function getCategoryByID($id)
		 {
			 try
			 {
				 $sql = mysql_query("select * from manage_category where id =".$id);
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 public function AddCategory($parentid,$categoryname,$url_key,$pro_img,$description,$shortdescription,$seotitle,$seokey,$seo_content,$status,$date)
		{       
		 $query=mysql_query("insert into manage_category(parent_id,category_name,caturl_key,category_image,category_description,catshort_description,seo_title,seo_keyword,seo_content,status,created_on)values('$parentid','$categoryname','$url_key','$pro_img','$description','$shortdescription','$seotitle','$seokey','$seo_content','$status','$date')");
		
		return $query; 
		}
		
		 public function updateCategory($id,$parentid,$categoryname,$url_key,$pro_img,$description,$shortdescription,$seotitle,$seokey,$seo_content,$status,$date)
		{       
		$query = mysql_query("UPDATE manage_category SET parent_id = '".$parentid."', category_name = '".$categoryname."', caturl_key = '".$url_key."', category_image = '".$pro_img."', category_description = '".$description."', catshort_description = '".$shortdescription."', seo_title = '".$seotitle."', seo_keyword = '".$seokey."', seo_content = '".$seo_content."', status = '".$status."', created_on = '".$date."' WHERE id='".$id."'");
		return $query; 
		}
		
		public function AddProduct($proname,$tab1_lable,$tab1_details,$tab2_lable,$tab2_details,$tab3_lable,$tab3_details,$tab4_lable,$tab4_details,$sku,$protodate,$profromdate,$status,$ptax,$feature_pro,$url_key,$price,$specialprice,$meta_title,$meta_keywords,$meta_description,$qty,$stock,$shop_by,$brand,$country,$date,$giftwrapp)
		{       
		  $query=mysql_query("insert into tbl_product(`name`, `tab1_lable`, `tab1_details`, `tab2_lable`, `tab2_details`, `tab3_lable`, `tab3_details`, `tab4_lable`, `tab4_details`, `sku_number`,`product_from_date`,`product_to_date`,`status`, `product_tax`, `url_key`, `feature_product`, `price`, `special_price`, `meta_title`, `meta_keyword`, `meta_description`, `qty`, `stock_availablity`, `shop_by`, `brand`, `country`, `created_On`, `giftwrapp`)values('$proname','$tab1_lable','$tab1_details','$tab2_lable','$tab2_details','$tab3_lable','$tab3_details','$tab4_lable','$tab4_details','$sku','$profromdate','$protodate','$status','$ptax','$url_key','$feature_pro','$price','$specialprice','$meta_title','$meta_keywords','$meta_description','$qty','$stock','$shop_by','$brand', '$country','$date','$giftwrapp')");
			
		return $query; 
		} 
		
		public function UpdateProduct($pid,$proname,$tab1_lable,$tab1_details,$tab2_lable,$tab2_details,$tab3_lable,$tab3_details,$tab4_lable,$tab4_details,$sku,$protodate,$profromdate,$status, $ptax, $feature_pro,$url_key,$price,$specialprice,$meta_title,$meta_keywords,$meta_description,$qty,$stock,$shop_by,$brand,$country,$date,$giftwrapp)
		{       
		  $query=mysql_query("UPDATE tbl_product SET `name` = '".$proname."', `tab1_lable` = '".$tab1_lable."', `tab1_details` = '".$tab1_details."', `tab2_lable` = '".$tab2_lable."', `tab2_details` = '".$tab2_details."', `tab3_lable` = '".$tab3_lable."', `tab3_details` = '".$tab3_details."', `tab4_lable` = '".$tab4_lable."', `tab4_details` = '".$tab4_details."',`sku_number` = '".$sku."',`product_from_date` = '".$profromdate."',`product_to_date` = '".$protodate."',`status` = '".$status."', `product_tax` = '".$ptax."', `url_key` = '".$url_key."', `feature_product` = '".$feature_pro."', `price` = '".$price."', `special_price` = '".$specialprice."', `meta_title` = '".$meta_title."', `meta_keyword` = '".$meta_keywords."', `meta_description` = '".$meta_description."', `qty` = '".$qty."', `stock_availablity` = '".$stock."', `shop_by` = '".$shop_by."', `brand` = '".$brand."', `country` = '".$country."', `updated_On` = '".$date."', `giftwrapp` = '".$giftwrapp."' WHERE id= '".$pid."'");
		return $query; 
		}
		
		 public function ActivateDeactiveRowProgarm($field,$value,$id)
	    {
		$url1="update tbl_product set  ".$field."='$value' where id='$id'";
		$url2=mysql_query($url1);
		  if ($url2) {
	           return $url2;
	        } else {
	            return false;
	        }
	     }
		 public function DeleteProductFilter($tbl_name, $pid){
			 $sql = mysql_query("DELETE FROM $tbl_name WHERE product_id = '".$pid."'");
			 
		 }
		 
		 public function AddProductFilter($table_name, $product_id, $filter_name, $filter_value){
			
			 $sql = "Insert into $table_name (product_id, $filter_name) values('$product_id','$filter_value')"; 
			 $query = mysql_query($sql);
			 
		 }
		
   }
   
   
?>