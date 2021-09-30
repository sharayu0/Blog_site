<?php

session_start();

include '../classes/autoload.php';

if (isset($_POST['update'])) {
    $obj = new Blogs();

    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    $imagename = $_FILES['image']['name'];
    $tempimgname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tempimgname, "image/$imagename");

    $res = $obj->update_blog($imagename, $title, $content, $id);

    $_SESSION['status'] = "Post has been updated successfuly";
    header("Location: ../admin/admin_index.php");
}
