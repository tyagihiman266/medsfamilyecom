<?php
include "controls/DBclass.php";
$db_handle = new DBController();
if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM city WHERE state_id = '" . $_POST["state_id"] . "' order by city asc";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select City</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["city_id"]; ?>"><?php echo $city["city"]; ?></option>
<?php
    }
}
?>