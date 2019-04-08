<!DOCTYPE html>
<html>
<body>

<?php
//echo(sha1(rand()). "<br>" );
//echo(rand() . "<br>");
//echo(rand(10,100). "<br>");
$salt = sha1(rand());

$salt = substr($salt, 0, 10);

$encrypted = base64_encode(sha1("himanshu@123" . $salt, true) . $salt);

$hash = array("salt" => $salt, "encrypted" => $encrypted);
// echo ($hash[1]);
echo implode(" ",$hash);

?>

</body>
</html>