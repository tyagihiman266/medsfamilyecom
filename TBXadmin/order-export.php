<?php
/* 
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebbok https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
 require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';

$filename = "order-list.csv";
        
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

$sql = "SELECT * FROM order_data";

try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
} catch (Exception $ex) {
    printErrorMessage($ex->getMessage());
}

$content = array();
$title = array("Order Id", "Purchased On","Name","Email id","Mobile No.", "Bill to Name", "Ship to Name", "G.T. (Purchased)", "Status");
foreach ($results as $rs) {
	if($rs['status']==1){ 
	$status = "Pending";
	} elseif($rs['status']==2) { 
	$status = "On Hold";
	}elseif($rs['status']==3) { 
	$status = "Canceled"; 
	}elseif($rs['status']==4) { 
	$status = "Complete"; 
	}elseif($rs['status']==5) { 
	$status = "Processing"; 
	}
	
	//user data
	$sqlU = "SELECT * FROM user_data where id = '".$rs['user_id']."'";
	$stmtU = $DB->prepare($sqlU);
    $stmtU->execute();
    $resultsU = $stmtU->fetchAll();
	
    $row = array();

    $row[] = stripslashes($rs["order_no"]);
    $row[] = stripslashes($rs["order_date"]);
    $row[] = stripslashes($resultsU[0]["name"]);
    $row[] = stripslashes($resultsU[0]["email"]);
	$row[] = stripslashes($resultsU[0]["country_code"].'-'.$resultsU[0]["mobile"]);
    $row[] = stripslashes($rs["bname"]);
    $row[] = stripslashes($rs["sname"]);
    $row[] = stripslashes($rs["total_amount"]);
    $row[] = $status;
    
    $content[] = $row;
    
}

$output = fopen('php://output', 'w');
fputcsv($output, $title);
foreach ($content as $con) {
    fputcsv($output, $con); 
}
?>
