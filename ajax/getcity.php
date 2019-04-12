<?php
include '../controls/Users.php';
include '../medsfamily_function.php';
$objU = new User();

if (! empty($_POST['state_ids'])) {
  $query = "SELECT * FROM city WHERE state_id = '" . $_POST['state_ids'] . "' order by city asc";
  $results = $objU->getResult($query);
  ?>
<option value="" disabled selected>Select City</option>
<?php
  foreach ($results as $city) {
      ?>
<option value="<?php echo $city['city_id']; ?>"><?php echo $city['city']; ?></option>
<?php
  }
}