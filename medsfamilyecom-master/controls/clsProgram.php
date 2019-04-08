<?php

require_once("connect.php");

class Progarm {
   
		
		 public function getAllProgarm()
		 {
			 try
			 {
				 $sql = mysql_query("select * from program");
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 public function getProgarmByID($id)
		 {
			 try
			 {
				 $sql = mysql_query("select * from program where id = '".$id."'");
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
 public function ActivateDeactiveRowProgarm($field,$value,$id)
	    {
		$url1="update  testimonial set  ".$field."='$value' where id='$id'";
		$url2=mysql_query($url1);
		  if ($url2) {
	           return $url2;
	        } else {
	            return false;
	        }
	     }
		 
 public function getProgarmByUser($user_id,$user_type)
		 {
			 try
			 {
				 $sql = mysql_query("select * from program where user_id = '".$user_id."' and user_type = '".$user_type."'");
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 
		  public function getPeopleByUser($user_id,$user_type)
		 {
			 try
			 {
				 $sql = mysql_query("select * from my_people_data where user_id = '".$user_id."' and user_type = '".$user_type."'");
			 }
			 catch(Expetion $e)
			 {
				 die('Error:'.$e->getMessage());
			 }
			 return $sql ;
		 }
		 
		 public function AddPeople($user_id,$user_type,$faculty_mentor_name,$faculty_mentor_mobile,$coordinator_name,$coordinator_mobile,$deputy_coordinator_name,$deputy_coordinator_mobile,$treasurer_name,$treasurer_mobile,$poc1_name,$poc1_mobile,$poc2_name,$poc2_mobile)
		{       
		 $query=mysql_query("insert into my_people_data(user_id,user_type,faculty_mentor_name,faculty_mentor_mobile,coordinator_name, coordinator_mobile, deputy_coordinator_name,deputy_coordinator_mobile,treasurer_name, treasurer_mobile, poc1_name, poc1_mobile, poc2_name, poc2_mobile)values('$user_id','$user_type','$faculty_mentor_name','$faculty_mentor_mobile','$coordinator_name','$coordinator_mobile','$deputy_coordinator_name','$deputy_coordinator_mobile','$treasurer_name','$treasurer_mobile','$poc1_name','$poc1_mobile','$poc2_name','$poc2_mobile')");
		
		return $query; 
		}
		 
 public function AddProgarm($program_title,$program_fees,$program_date,$program_speaker_name,$program_brocher,$program_instructions,$user_id,$user_type)
		{       
		 $query=mysql_query("insert into program(program_title,program_fees,program_date, program_speaker_name, program_brocher,program_instructions,user_id, user_type, created_date, member_list_status, status)values('$program_title','$program_fees','$program_date','$program_speaker_name','$program_brocher','$program_instructions','$user_id','$user_type',now(),'0','0')");
		
		return $query;
		}
   }
?>