<?php

require_once("connect.php");

class Order {
   
		//product order....
		 public function AddOrder($user_name,$user_password,$email,$name,$surname,$gender,$dob,$marital_status,$about_me,$company_name,$address1,$address2,$city,$state,$country,$post_code,$country_code,$mobile,$status)
		{       
		 $query=mysql_query("insert into user_data(user_name,user_password,email,name,surname, gender,dob,marital_status,about_me, company_name,address1, address2,city,state,country, post_code,country_code, mobile, status)values('$user_name','$user_password','$email','$name','$surname','$gender','$dob','$marital_status','$about_me','$company_name','$address1','$address2','$city','$state','$country','$post_code','$country_code','$mobile','$status')");
		
		return $query; 
		}
		
		public function updateOrder($id,$user_name,$user_password,$email,$name,$surname,$gender,$dob,$marital_status,$about_me,$company_name,$address1,$address2,$city,$state,$country,$post_code,$country_code,$mobile,$status)
		{
		 $query1 = "update user_data set user_name = '".$user_name."', user_password = '".$user_password."', email = '".$email."', name = '".$name."', surname = '".$surname."', gender = '".$gender."', dob = '".$dob."', marital_status = '".$marital_status."', about_me = '".$about_me."', company_name = '".$company_name."', address1 = '".$address1."', address2 = '".$address2."', city = '".$city."', state = '".$state."', country = '".$country."', post_code = '".$post_code."', country_code = '".$country_code."', mobile = '".$mobile."', status = '".$status."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		//Shipping Method....
		 public function AddShipping($name,$price,$cod,$status)
		{       
		 $query=mysql_query("insert into shipping_method(name,price,cod,status)values('$name','$price','$cod','$status')");
		
		return $query; 
		}
		 
		public function updateShipping($id,$name,$price,$cod,$status)
		{
		 $query1 = "update shipping_method set name = '".$name."', price = '".$price."', cod = '".$cod."', status = '".$status."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		// Product Tax....
		 public function AddProductTax($tax_label,$tax_per,$status)
		{       
		 $query=mysql_query("insert into product_tax(tax_label,tax_per,status)values('$tax_label','$tax_per','$status')");
		
		return $query; 
		}
		 
		public function updateProductTax($id,$tax_label,$tax_per,$status)
		{
		 $query1 = "update product_tax set tax_label = '".$tax_label."', tax_per = '".$tax_per."', status = '".$status."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		// GT Tax....
		public function AddGTTax($tax_label,$tax_per,$status)
		{       
		 $query=mysql_query("insert into gt_tax(tax_label,tax_per,status)values('$tax_label','$tax_per','$status')");
		
		return $query; 
		}
		 
		public function updateGTTax($id,$tax,$stand_delivery,$express_delivery,$status)
		{
		 $query1 = "update gt_tax set tax = '".$tax."', stand_delivery = '".$stand_delivery."', express_delivery = '".$express_delivery."', status = '".$status."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		///// Update Tax
		public function updateTax($id,$vat,$gst,$luxury_tax,$service_tax,$delivery,$optional,$status)
		{
		 $query1 = "update tax_data set vat = '".$vat."', gst = '".$gst."', luxury_tax = '".$luxury_tax."', service_tax = '".$service_tax."', delivery = '".$delivery."', optional = '".$optional."', status = '".$status."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
		}
		
		///// Upadte Delivery Charge
		public function updateDelivery($id,$stand_delivery,$express_delivery,$vip_delivery,$hand_delivery,$cart_delivery,$accompanied_delivery,$optional_delivery)
		{
		  $query1 = "update delivery_charge set stand_delivery = '".$stand_delivery."', express_delivery = '".$express_delivery."', vip_delivery = '".$vip_delivery."', hand_delivery = '".$hand_delivery."', cart_delivery = '".$cart_delivery."', accompanied_delivery = '".$accompanied_delivery."', optional_delivery = '".$optional_delivery."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ; 
			}else{
				return false ;
				
			}
		}
		
		
		///Add coupon 
		 public function AddCoupon($coupon_code,$discount_type,$discount_amount,$free_shipping,$coupon_limit,$user_limit,$min_amount,$max_amount,$expiry_date,$coupon_caping,$status)
		{       
		 $query=mysql_query("insert into coupon_data (coupon_code, discount_type,discount_amount, free_shipping, coupon_limit, user_limit,min_amount,max_amount,expiry_date, coupon_caping,status)values('$coupon_code','$discount_type','$discount_amount','$free_shipping','$coupon_limit','$user_limit','$min_amount','$max_amount','$expiry_date','$coupon_caping','$status')");
		
		return $query; 
		}
		
		///Update coupon	 
		public function updateCoupon($id,$coupon_code,$discount_type,$discount_amount,$free_shipping,$coupon_limit,$user_limit,$min_amount,$max_amount,$expiry_date,$coupon_caping,$status)
		{
		  $query1 = "update coupon_data set coupon_code = '$coupon_code', discount_type = '".$discount_type."', discount_amount = '".$discount_amount."', free_shipping = '".$free_shipping."', coupon_limit = '".$coupon_limit."', user_limit = '".$user_limit."', min_amount = '".$min_amount."', max_amount = '".$max_amount."', expiry_date = '".$expiry_date."', coupon_caping = '".$coupon_caping."', status = '".$status."' where id ='".$id."'";
		
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		
   }
   
   
?>