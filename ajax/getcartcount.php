<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();
global $numcartpackage;
if(isset($_SESSION['user_id'])){
          $userid = $_SESSION['user_id'] ;
          $uid = session_id() ;
          $cartcountpackage=$objU->getResult('select * from cart where user_temp_id="'.$uid.'"  ');
          $numcartpackage=count($cartcountpackage);
          

        
        ?>
        
    <a href="cart">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    <h3> <?php echo $numcartpackage; ?></h3> </a>
<?php

}
?>