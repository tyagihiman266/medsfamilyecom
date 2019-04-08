<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

   
if($_REQUEST['country_id'])
                {
                

                $query = "SELECT * FROM state where country_id ='".$_REQUEST['country_id']."' ";
                $result = $objU->getResult($query);
                $num_rows = count($result);
                $select_state=$_REQUEST['select_state'];
              if($num_rows >0){ 
                 echo "<option value=''>Select State</option>";
                foreach($result as $key => $val){
                if($select_state!="NA"){
                 if($select_state==$val['state_id']){$var='selected';}else{$var='';}    
                }else{
                    $var='';
                }
                
                echo "<option value='".$val['state_id']."'   $var  >".$val['state']."</option>";

                }  }else {
                     echo "<option value=''>Select State</option>";
                }




              }

              

