<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

   
if($_REQUEST['state_id'])
                {
                

                $query = "SELECT * FROM city where state_id ='".$_REQUEST['state_id']."' ";
                $result = $objU->getResult($query);
                $num_rows = count($result);

              if($num_rows >0){ 
                echo "<option value=''>Select City</option>";
                foreach($result as $key => $val){
                echo "<option value='".$val['city_id']."'>".$val['city']."</option>";

                }  }else {
                     echo "<option value=''>Select City</option>";
                }




              }

              

