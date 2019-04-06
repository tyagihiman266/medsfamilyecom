<?php

require_once("connect.php");

class Customer {
   	
		public function AddCustomer($user_name,$user_password,$email,$name,$surname,$gender,$dob,$marital_status,$about_me,$company_name,$address1,$address2,$city,$state,$country,$post_code,$country_code,$mobile,$status)
		{       
		 $query=mysql_query("insert into user_data(user_name,user_password,email,name,surname, gender,dob,marital_status,about_me, company_name,address1, address2,city,state,country, post_code,country_code, mobile, status)values('$user_name','$user_password','$email','$name','$surname','$gender','$dob','$marital_status','$about_me','$company_name','$address1','$address2','$city','$state','$country','$post_code','$country_code','$mobile','$status')");
		
		return $query; 
		}
		
		public function updateCustomer($id,$user_name,$user_password,$email,$name,$surname,$gender,$dob,$marital_status,$about_me,$company_name,$address1,$address2,$city,$state,$country,$post_code,$country_code,$mobile,$status)
		{
		   $query1 = "update user_data set user_name = '".$user_name."', user_password = '".$user_password."', email = '".$email."', name = '".$name."', surname = '".$surname."', gender = '".$gender."', dob = '".$dob."', marital_status = '".$marital_status."', about_me = '".$about_me."', company_name = '".$company_name."', address1 = '".$address1."', address2 = '".$address2."', city = '".$city."', state = '".$state."', country = '".$country."', post_code = '".$post_code."', country_code = '".$country_code."', mobile = '".$mobile."', status = '".$status."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				}
		}
		
		public function updateCustomerInfo($user_id,$addressbook_id,$title,$fname,$lname,$birth_day,$birth_month,$birth_year,$gender,$husband,$wife,$children,$anniversary,$user_pic,$company,$address1,$address2,$city,$state,$country,$post_code,$country_code,$mobile,$email)
		{
		 $query1 = "update user_data set  user_pic = '".$user_pic."' where id ='".$user_id."'";
			$query = mysql_query($query1);
			
			$query2 = "update addressbook_data set title = '".$title."', fname = '".$fname."', lname = '".$lname."', birth_day = '$birth_day', birth_month = '$birth_month', birth_year = '$birth_year',gender = '$gender', husband = '$husband',wife = '$wife', children = '$children', anniversary = '$anniversary',company = '$company', address1 = '".$address1."',  city = '".$city."', state = '".$state."', country = '".$country."', post_code = '".$post_code."', country_code = '".$country_code."', mobile = '".$mobile."' where id ='".$addressbook_id."'";
			$query2 = mysql_query($query2);
			
			if($query){
				return $query ;
			}else{
				return false ;
				
			}
			
		}
		
		///Add Address book
		 public function AddAddressBook($user_id,$title,$fname,$lname,$birth_day,$birth_month,$birth_year,$gender,$husband,$wife,$children,$anniversary,$company,$email,$address1,$address2,$city,$state,$country,$post_code,$country_code,$mobile)
		{       
		   $query = mysql_query("insert into addressbook_data (user_id, title, fname, lname, birth_day,birth_month,birth_year,gender,husband,wife,children,anniversary,company, email,address1, address2, city, state, country, post_code, country_code, mobile)values('$user_id','$title','$fname','$lname','$birth_day','$birth_month','$birth_year','$gender','$husband','$wife','$children','$anniversary','$company','$email','$address1','$address2','$city','$state','$country','$post_code','$country_code','$mobile')");
		
		return $query; 
		}
		
		public function updateAddressBook($id,$title,$fname,$lname,$birth_day,$birth_month,$birth_year,$gender,$husband,$wife,$children,$anniversary,$company,$email,$address1,$city,$state,$country,$post_code,$country_code,$mobile)
		{
		     $query1 = "update addressbook_data set title = '".$title."', fname = '".$fname."', lname = '".$lname."', birth_day = '$birth_day', birth_month = '$birth_month', birth_year = '$birth_year',gender = '$gender', husband = '$husband',wife = '$wife', children = '$children', anniversary = '$anniversary',company = '$company', email = '".$email."', address1 = '".$address1."', city = '".$city."', state = '".$state."', country = '".$country."', post_code = '".$post_code."', country_code = '".$country_code."', mobile = '".$mobile."' where id ='".$id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				}
		}
		

		///////add measurement
		public function AddMeasurement($user_id,$title,$feet,$inch,$weight,$age,$neck,$shoulder,$biceps,$arms,$wrists,$tor_length,$chest_inch,$stomach_inch,$waist,$hips,$legs,$crotch,$thigh,$knee,$shoulder_slope,$chest,$stomach,$stance)
		{       
		 $query=mysql_query("insert into user_measurement(user_id,title,feet,inch,weight, age,neck,shoulder,biceps, arms,wrists,tor_length,chest_inch,stomach_inch,waist,hips,legs,crotch,thigh,knee,shoulder_slope,chest,stomach,stance)values('$user_id','$title','$feet','$inch','$weight','$age','$neck','$shoulder','$biceps','$arms','$wrists','$tor_length','$chest_inch','$stomach_inch','$waist','$hips','$legs','$crotch','$thigh','$knee','$shoulder_slope','$chest','$stomach','$stance')");
		
		return $query; 
		}
		
		
		/////Gift Planner
		public function AddGiftPlanner($reminder_name,$reminder_occation,$reminder_date,$reminder_country,$reminder,$re_occurs,$sms,$reminder_msg,$reminder_type,$user_id)
		{       
		 $query=mysql_query("insert into reminder_data(reminder_name, reminder_occation,reminder_date, reminder_country, reminder, re_occurs,sms,reminder_msg,reminder_type,user_id)values('$reminder_name','$reminder_occation','$reminder_date','$reminder_country','$reminder','$re_occurs','$sms','$reminder_msg','$reminder_type','$user_id')");
		
		return $query; 
		}
		
		public function updateGiftPlanner($reminder_name,$reminder_occation,$reminder_date,$reminder_country,$reminder,$re_occurs,$sms,$reminder_msg,$reminder_type,$reminder_id)
		{
		 $query1 = "update reminder_data set reminder_name = '".$reminder_name."', reminder_occation = '".$reminder_occation."', reminder_date = '".$reminder_date."', reminder_country = '".$reminder_country."', reminder = '".$reminder."', re_occurs = '".$re_occurs."', sms = '".$sms."', reminder_msg = '".$reminder_msg."', reminder_type = '".$reminder_type."' where id ='".$reminder_id."'";
			$query = mysql_query($query1);
			if($query){
				return $query ;
			}else{
				return false ;
				}
		}
		
		
		///Add Gift Idea
		 public function AddGiftIdea($user_id,$name,$subject,$image_pic,$message,$user_status,$admin_status,$created_date,$status)
		{       
		   $query = mysql_query("insert into giftidea_data (user_id,name,subject,image,message,user_status,admin_status,created_date,status)values('$user_id', '$name', '$subject', '$image_pic', '$message','$user_status','$admin_status','$created_date','$status')");
		
		return $query; 
		}
		
		public function GiftIdeaReply($message_id,$message,$send_by,$user_status,$admin_status,$created_date)
		{       
		   $query = mysql_query("insert into giftidea_reply_data (message_id,message,send_by,user_status,admin_status,created_date)values('$message_id', '$message', '$send_by','$user_status','$admin_status','$created_date')"); 
		
		return $query; 
		}
		
		
		///Add Message
		 public function AddMessage($user_id,$subject,$message,$send_by,$created_date,$status)
		{       
		   $query = mysql_query("insert into message_data (user_id,subject,message,send_by,created_date,status)values('$user_id', '$subject', '$message','$send_by','$created_date','$status')");
		
		return $query; 
		}
		
		public function MessageReply($message_id,$message,$send_by,$user_status,$admin_status,$created_date)
		{       
		   $query = mysql_query("insert into message_reply_data (message_id,message,send_by, user_status, admin_status,created_date)values('$message_id', '$message', '$send_by','$user_status','$admin_status','$created_date')"); 
		
		return $query; 
		}
		 
		
		
   }
   
   
?>