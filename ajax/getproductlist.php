<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

   
if(isset($_POST['search'])){
    $search = $_POST['search'];
                

                $query = "SELECT * FROM tbl_product WHERE name like'%".$search."%' ";
                $result = $objU->getResult($query);
                $num_rows = count($result);

              if($num_rows >0){ 
               
                foreach($result as $key => $val){

                   $response[] = array("value"=>$val['id'],"label"=>$val['name']);
               

                } 


}
  echo json_encode($response);

              }

              

