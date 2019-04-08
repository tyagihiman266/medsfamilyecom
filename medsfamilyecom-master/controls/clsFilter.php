<?php

require_once("connect.php");

class Filter {
   
		
		 public function AddCurrency($cur_symbol,$cur_price,$cur_name,$status)
		{       
		 $query=mysql_query("insert into currency(cur_symbol,cur_price,cur_name,status)values('$cur_symbol','$cur_price','$cur_name','$status')");
		
		return $query; 
		}
		
		public function updateCurrency($id,$cur_symbol,$cur_price,$cur_name,$status)
		{
		$query1 = "update currency set cur_symbol = '".$cur_symbol."', cur_price = '".$cur_price."', cur_name = '".$cur_name."',status = '".$status."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		public function AddBrand($brand_name,$brand_url,$brand_logo,$status)
		{       
		 $query=mysql_query("insert into brand_data(brand_name,brand_url,brand_logo,status)values('$brand_name','$brand_url','$brand_logo','$status')");
		
		return $query; 
		}
		
		public function updateBrand($id,$brand_name,$brand_url,$status)
		{
		$query1 = "update brand_data set brand_name = '".$brand_name."', brand_url = '".$brand_url."', status = '".$status."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		public function updateBrandWithImage($id,$brand_name,$brand_url,$img_name,$status)
		{
		 $query1 = "update brand_data set brand_name = '".$brand_name."', brand_url = '".$brand_url."', brand_logo = '".$img_name."',status = '".$status."' where id ='".$id."'";
		//die;
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		
		public function AddColor($color_name,$color_code,$status)
		{       
		 $query=mysql_query("insert into color_data(color_name,color_code,status)values('$color_name','$color_code','$status')");
		
		return $query; 
		}
		
		public function updateColor($id,$color_name,$color_code,$status)
		{
		 $query1 = "update color_data set color_name = '".$color_name."', color_code = '".$color_code."', status = '".$status."' where id ='".$id."'";
		
			$query = mysql_query($query1);
			if($query){
				return $query ; 
			}else{
				return false ;
				
			}
			
		}
		
		public function AddSize($size_name,$status)
		{       
		 $query=mysql_query("insert into size_data(size_name,status)values('$size_name','$status')");
		
		return $query; 
		}
		
		public function updateSize($id,$size_name,$status)
		{
		$query1 = "update size_data set size_name = '".$size_name."', status = '".$status."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		////////Gift Wrapping Charge
		public function AddGiftWrapp($hand_written,$gift_wrapping,$status)
		{       
		 $query=mysql_query("insert into giftwrapp_charge(hand_written,gift_wrapping,status)values('$hand_written','$gift_wrapping','$status')");
		
		return $query; 
		}
		
		public function updateGiftWrapp($id,$hand_written,$gift_wrapping,$status)
		{
		 $query1 = "update giftwrapp_charge set hand_written = '".$hand_written."', gift_wrapping = '".$gift_wrapping."', status = '".$status."' where id ='".$id."'";
		
			$query = mysql_query($query1);
			if($query){
				return $query ; 
			}else{
				return false ;
				
			}
			
		}
		
		
		 
		
		
   }
   
   
?>