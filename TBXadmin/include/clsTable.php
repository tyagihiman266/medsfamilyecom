<?php

require_once("DBclass.php");

class Table {
   
		
		 public function getAllTable($table_name)

		 {
			 try
			 {
				 $sql = mysqli_query("select * from ".$table_name." order by id desc");

			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql;
		 }
		 
		 
		 public function getTableByID($table_name,$id)
		 {
			 try
			 {
				 $sql = mysqli_query("select * from ".$table_name." where id =".$id);
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 
		  public function getTableByStatus($table_name,$id)
		 {
			 try
			 {	
				 $sql = mysqli_query("select * from ".$table_name." where status =".$id);
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
        
		public function ActivateDeactiveRowProgarm($table_name,$field,$value,$id)
	    {
		$url1="update  ".$table_name." set  ".$field."='$value' where id='$id'";
		$url2=mysqli_query($url1);
		  if ($url2) {
	           return $url2;
	        } else {
	            return false;
	        }
	     }
		 
		  public function deleteTableByID($table_name,$id)
		 {
			 try
			 {
				  $query = "DELETE FROM ".$table_name." where id ='".$id."'"; 
				 $sql = mysqli_query($query);
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 
		 public function getAllLocation()
		 {
			 try
			 {
				 $sql = mysqli_query("select * from location_data order by location");
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 
		 public function getLocationById($id)
		 {
			 try
			 {
				 $sql = mysqli_query("select * from location_data where id =".$id);
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 
		//Website banner..
		
		 //Category Function And Queries
    public function AddBanner($page_id,$heading,$pro_img,$description,$status)
		{       
		
		if($query=mysqli_query("insert into banner(page_id,heading,image,description,created_date,status)values('$page_id','$heading','$pro_img','$description',now(),'$status')"))
		{
		$_SESSION['SuccessMessage']="Banner  Added Successfully.";
        }
		return $query;
		}
		
		public function getAllBanner($add)
		 {
		 try
			{
			$sql=mysqli_query("select * from banner where page_id = '".$add."'"); 
			}
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql;
		 }
		 
		 public function getEditBanner($id)
		 {
		 try
			{
			$sql=mysqli_query("select * from banner where id = '".$id."'"); 
			}
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql;
		 }
		 
		   public function ActivateDeactiveRowBanner($field,$value,$id)
	    {
		$url1="update banner set  ".$field."='$value' where id='$id'";
		$url2=mysqli_query($url1);
		  if ($url2) {
	           return $url2;
	        } else {
	            return false;
	        }
	     }
		 public function getAllfrontpage()
		 {
		 try
			{
			$sql=mysqli_query("select * from website_page order by page_short"); 
			}
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql;
		 }
		 
		 public function getAllBannerCategory()
		 {
			 try
			 {
				 $sql = mysqli_query("select * from banner_category");
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 
		 //get page 
		  public function getPage($id)
		 {
			 try
			 {
				 $sql = mysqli_query("select * from website_page where id = '".$id."'");
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ; 
		 }
		
		
   }
   
   
?>