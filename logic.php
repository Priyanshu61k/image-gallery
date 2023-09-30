<?php
include "dbcon.php";
if(isset($_POST['cars'])){
$img= $_POST['image-name'];
$name=$_POST['cars'];
 $s="UPDATE  `images` SET `img-catgeory`='$name' WHERE `image-name`='$img'";
$r=mysqli_query($con,$s);
echo   '<script>alert("sace photo")</script>';

}
?>
