<?php

require_once("connect.php");

class Table {   
		
		 public function getAllTable($table_name)
		 {
			 try
			 {
				 $sql = mysql_query("select * from ".$table_name." order by id desc");
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 
		 
		 public function getTableByID($table_name,$id)
		 {
			 try
			 {
				 $sql = mysql_query("select * from ".$table_name." where id =".$id);
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
				 $sql = mysql_query("select * from ".$table_name." where status =".$id);
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }


		 // fetch data from column name start kp
		public function fetchDatabyCol($table_name,$colname,$id)
		 {
			 try
			 {	
			 	$query = mysql_query("select * from ".$table_name." where ".$colname."=".$id);
			 	$row= mysql_num_rows($query);
				$result=array();
				$a=0;
				while($row>$a){
				   $result[]=mysql_fetch_array($query,MYSQL_ASSOC); 
				   $a=$a+1;
				}				 
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $result ;
		 }
		  // fetch data from column name end

        
		public function ActivateDeactiveRowProgarm($table_name,$field,$value,$id)
	    {
		$url1="update  ".$table_name." set  ".$field."='$value' where id='$id'";
		$url2=mysql_query($url1);
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
				 $sql = mysql_query($query);
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
				 $sql = mysql_query("select * from location_data order by location");
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
				 $sql = mysql_query("select * from location_data where id =".$id);
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
		
		if($query=mysql_query("insert into banner(page_id,heading,image,description,created_date,status)values('$page_id','$heading','$pro_img','$description',now(),'$status')"))
		{
		$_SESSION['SuccessMessage']="Banner  Added Successfully.";
        }
		return $query;
		}
		
		public function getAllBanner($add)
		 {
		 try
			{
			$sql=mysql_query("select * from banner where page_id = '".$add."'"); 
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
			$sql=mysql_query("select * from banner where id = '".$id."'"); 
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
		$url2=mysql_query($url1);
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
			$sql=mysql_query("select * from website_page order by page_short"); 
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
				 $sql = mysql_query("select * from banner_category");
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
				 $sql = mysql_query("select * from website_page where id = '".$id."'");
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ; 
		 }
		
		
   }
   
   
?>