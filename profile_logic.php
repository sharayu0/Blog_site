<?php 

include 'dbconnect.php';

if(isset($_POST["profile_submit"])){
    $imagename = $_FILES['profile_image']['name'];
    $tempimgname = $_FILES['tempimgname']['tmp_name'];
    move_uploaded_file($tempimgname, "image/$imagename");

    $sql = "INSERT INTO `profile` (`profile_image`) VALUES('$imagename')";
    mysqli_query($conn, $sql);
    exit();
}

?>