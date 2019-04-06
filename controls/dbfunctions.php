<?php

class DB_FUNCTIONS {
  	
	public function getResults($table) 
	{
	    $data = array();
		$query = mysql_query("SELECT * FROM $table") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if($num_rows>0) {
        	while($row=mysql_fetch_assoc($query))
				$data[]=$row;
		}
	    return $data;		
    }
	
	public function allProducts()
	{
		$query = mysql_query("SELECT * FROM tbl_product");	
		while($row=mysql_fetch_assoc($query))
		$data[]=$row;
		
		return $data;
	}
	
	public function getproductPhoto($id)
	{
		$row = mysql_query("SELECT image FROM tbl_pro_img where p_id = $id limit 0,1");	
		$photo = mysql_fetch_assoc($row);	
		return $photo;
	}
	
	public function _getAllProductPhotos($id)
	{
		$photo = mysql_query("SELECT photo FROM tbl_pro_img where id = $id limit 0,5");	
		while($row=mysql_fetch_assoc($photo))
		$data[]=$row;	
		
		return $data;
	}
	
	public function getProductDetails($id)
	{
		$query = mysql_query("SELECT * FROM tbl_product where id = $id");	
		while($row=mysql_fetch_assoc($query))
		$data=$row;
		
		return $data;
	
	}
	
	public function getAvailableSize($id)
	{
		$query = mysql_query("SELECT sizeID from tbl_productsizes where id = $id");
		while($row=mysql_fetch_assoc($query))
		$data[]=$row;
		
		return $data;
	}
	
}
?>
