<?php

session_start();

include 'dbconnect.php';
include '../classes/autoload.php';

if (isset($_SESSION['username'])) {
  $uid = $_SESSION['uid'];
  $username = $_SESSION['username'];
} else {
  header("location:login.php");
}


if (isset($_POST["new_post"])) {

    $obj = new Blogs();
    $imagename = $_FILES['image']['name'];
    $tempimgname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tempimgname, "../../image/$imagename");

    $title = $_POST["title"];

    $content = $_POST["content"];
    $uid = $_SESSION['uid'];

    $obj->insert_blog($imagename, $title, $content, $uid);

    header("Location: ../author/mypost.php?info=added");
}
?>