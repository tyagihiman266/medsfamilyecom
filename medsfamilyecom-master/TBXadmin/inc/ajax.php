<?php
$no_of=$_POST['number'];
$total=$_POST['price'];
$discount=$_POST['discount'];
$g_total=floor($total);
    if(($discount>0) && !empty($discount)){
            $g_total=$g_total-$discount;
    }
    
      $totals=$g_total/$no_of;
    
    echo $totals;
?>