<?PHP
$GLOBALS['user'] = new User();

/* *******User Whislist***** */
function userWhishlist(){
	$user_id = $_SESSION['user_id'] ;	
	$row = $GLOBALS['user']->getResult("select product_id from user_wishlist where user_id = '$user_id' ");
	$row = array_column($row, 'product_id') ;
	return $row ;
}

 function productPrice($price){
	$_SESSION['cur_symbol'] = 'Rs. ' ; 
	$_SESSION['cur_price'] = 1 ;
 $fPrice = $_SESSION['cur_symbol']." ".number_format($_SESSION['cur_price']*$price,2) ;
 return $fPrice ; 
}

/* *******Get User Id********* */
function currentUser(){
	if(empty($_SESSION['tmp_id'])){
	$_SESSION['tmp_id'] =session_id();
		}
	if(isset($_SESSION['user_id'])){
		$uid = $_SESSION['user_id'] ;
	}else{
		$uid = $_SESSION['tmp_id'] ;
	}

	return $uid ;
}


function buildURL($url){
	$newurl=str_replace(" - "," ",$url);
	$myurl=str_replace("--","-",str_replace("%","",str_replace(" ","-",str_replace("-"," ",trim($newurl)))));
	return stripslashes($myurl);
}

function buildReverseURL($url){
$newurl=strtolower(str_replace("-"," ",str_replace("_","-",$url)));
$myurl=trim($newurl);
return stripslashes($myurl);
}

function cartUpdate($pid,$qty,$price){
	 $newProduct = 'true' ;
	 $uid = currentUser() ; 
	$pidArray = array() ;
	$priceArray = array() ;
	$qtyArray = array() ;
	$row = $GLOBALS['user']->getResult("select * from cart where user_temp_id = '$uid' ");
	if((count($row) > 0) && !empty($row[0]['product_id'])){
		$pidlist = explode(',', $row[0]['product_id']) ;
		$pricelist = explode(',', $row[0]['price']) ;
		$qtylist = explode(',', $row[0]['quantity']) ;
		//print_r($pidlist) ;
		$cartCount = count($pidlist) ;
		$i = 0 ;
		while ( $i < $cartCount) {
			if($pid == $pidlist[$i]){
			$pidArray[] = $pidlist[$i] ;
			$priceArray[] = $price ;
			$qtyArray[] = $qty ;
			$newProduct = 'false' ;
			}else{
			$pidArray[] = $pidlist[$i] ;
			$priceArray[] = $pricelist[$i] ;
			$qtyArray[] = $qtylist[$i] ;
			
			}
			
		$i++;
		}
		/* *****Add new Product****** */
		if($newProduct == 'true'){
			$pidArray[] = $pid ;
			$priceArray[] = $price ;
			$qtyArray[] = $qty ;
		}

	}else{
			/* *****Add new fist Product****** */
		    $pidArray[] = $pid ;
			$priceArray[] = $price ;
			$qtyArray[] = $qty ;

	}

		
		$new_pid='';
	    $new_price='';	
		$new_qty='';
		/*foreach ( $pidArray as $key => $value) {
	    $new_pid=$new_pid.$pidArray[$key].",";
		 $new_price=$new_price.$priceArray[$key].",";
		 $new_qty=$new_qty.$qtyArray[$key].",";
							 }*/

		$new_pid = implode(',', $pidArray) ;
		$new_price = implode(',', $priceArray) ;
		$new_qty = implode(',', $qtyArray) ;

		$table = 'cart' ;
		if(count($row) > 0){
			$cartArray = array(
			'product_id' => $new_pid,
			'price' => $new_price,
			'quantity' => $new_qty
		);
			$where = 'user_temp_id = '.$uid ;
			$row = $GLOBALS['user']->updateStatementwithAnd($cartArray,$table,$where) ;
		}else{
			$cartArray = array(
			'user_temp_id' => $uid,
			'product_id' => $new_pid,
			'price' => $new_price,
			'quantity' => $new_qty,
		);
			$row = $GLOBALS['user']->insertQuery($cartArray,$table) ;
		}
	

}


function deleteProduct($pid){

	$uid = currentUser() ; 
	$pidArray = array() ;
	$priceArray = array() ;
	$qtyArray = array() ;
	$row = $GLOBALS['user']->getResult("select * from cart where user_temp_id = '$uid' ");
	
		$pidlist = explode(',', $row[0]['product_id']) ;
		$pricelist = explode(',', $row[0]['price']) ;
		$qtylist = explode(',', $row[0]['quantity']) ;
		//print_r($pidlist) ;
		$cartCount = count($pidlist) ;
		$i = 0 ;
		while ( $i < $cartCount) {
			if($pid != $pidlist[$i]){
			$pidArray[] = $pidlist[$i] ;
			$priceArray[] = $pricelist[$i] ;
			$qtyArray[] = $qtylist[$i] ;
			
			}

			$i++ ;
		}

		$new_pid = implode(',', $pidArray) ;
		$new_price = implode(',', $priceArray) ;
		$new_qty = implode(',', $qtyArray) ;

			$table = 'cart' ;		
			$cartArray = array(
			'product_id' => $new_pid,
			'price' => $new_price,
			'quantity' => $new_qty
				);
			$where = 'user_temp_id = '.$uid ;
			$row = $GLOBALS['user']->updateStatementwithAnd($cartArray,$table,$where) ;
		
}


function avgratingProduct($pid){
$uid = currentUser() ; 
	$pidArray = array() ;
	$priceArray = array() ;
	$qtyArray = array() ;
	
	$row = $GLOBALS['user']->getResult("SELECT sum(rating) as totalrating, count(id) as numrecord FROM `tbl_review` where `product_id`='".$pid."'  ");

	
	
	 $rowcount=$row['0']['numrecord']*5;

	  $avg=$rowcount/$row['0']['totalrating']; 
	  return round($avg);

		
   }

?>