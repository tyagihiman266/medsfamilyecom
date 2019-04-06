<?php
include ("include/DBclass.php");
$id=$_POST['id'];
$varient=$_POST['varient'];
$varientunit=$_POST['varientunit'];
$target_dir = "upload/product/varient/big/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$image_name = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

mysqli_query($connect,"INSERT INTO product_varient_image (product_id,varient_img,varient,varientunit)
         VALUES ('$id','$image_name','$varient','$varientunit')");
 
  if(mysqli_affected_rows($connect) > 0){
 echo "<p>Query Submitted</p>";header("refresh:2;url=manage_number"); ; 

} else {
 echo "Something Went Wrong<br />";
 echo mysqli_error ($connect);
}



// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>