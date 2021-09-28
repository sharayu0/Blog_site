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


if (isset($_POST["update"])) {

    $obj1 = new Blogs();
    $id = $_POST["id"];
    $imagename = $_FILES['image']['name'];
    $tempimgname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tempimgname, "../../image/$imagename");

    $title = $_POST["title"];
    $content = $_POST["content"];

    $obj1->update_blog($imagename, $title, $content, $id);

    if ($obj1) {
        header("Location: ../author/mypost.php?info=updated");
        exit();
    }
}
