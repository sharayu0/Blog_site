<?php

session_start();

include '../classes/autoload.php';

if (isset($_POST["update"])) {

    $obj1 = new Blogs();
    $id = $_POST["id"];
    $imagename = $_FILES['image']['name'];
    $tempimgname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tempimgname, "../../image/$imagename");

    $title = $_POST["title"];
    $content = $_POST["content"];

    $res = $obj1->update_blog($imagename, $title, $content, $id);


    $_SESSION['status'] = "Post has been updated successfuly";
    header("Location: ../author/mypost.php");
}
