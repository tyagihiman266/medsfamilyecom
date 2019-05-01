<?php

@session_start();
require_once ("inc/main.php");

  $objU = new User();



 $query = "select * from tbl_product order by id desc";
 $row = $objU->getResult($query);
  $count=count($row);
   if($count > 0)
   {
    $columnHeader='';
$columnHeader = '<table id="example1" class="table table-bordered table-striped">
<thead>
  <tr>
  <th>S.No</th>
                        <th>Name</th>
            <th>Sku Number</th>
            <th>Salt Name</th></tr></thead><tbody>'; 
            
$setData = '';  

        $rowData = '';
        foreach ($row as $value) { 
              $id1= $value['id'];
              $name1= $value['name'];
          $sku1= $value['sku_number'];
             $salt1= $value['salt_name'];
             $value1="<td>".$id1."</td><td>".$name1."</td><td>".$sku1."</td><td>".$salt1."</td>";
$i++;
                     $j++;
                     $count--;
            $rowData .= $value1;  
        }?>
        </tbody></table>
        <?php  
        $setData .= trim($rowData) . "\n"; 
     
    
    //header("Content-type: application/octet-stream");
    //header('Content-Disposition: attachment; filename=download.xls');
    //header("Pragma: no-cache");  
    //header("Expires: 0");
      

    echo ucwords($columnHeader) . "\n" . $setData . "\n";
    
   }
   else
   {
       echo "Not found";
   }
  
  ?>