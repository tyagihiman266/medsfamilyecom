<?php
include '../controls/Users.php';
include '../medsfamily_function.php';
$objU = new User();

if (! empty($_POST['country_id'])) {
  $query = "SELECT * FROM state WHERE country_id = '" . $_POST['country_id'] . "'";
  $results = $objU->getResult($query);
  ?>
<option value="" disabled selected>Select State</option>
<?php
  foreach ($results as $state) {
    //$stname=$state['state'];
      ?>
<option value="<?php echo $state['state_id']; ?>"><?php echo $state['state']; ?></option>
<?php
  }
}