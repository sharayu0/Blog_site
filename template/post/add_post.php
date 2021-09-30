<?php

session_start();

include '../classes/autoload.php';

if (isset($_POST["new_post"])) {

  $obj = new Blogs();
  $imagename = $_FILES['image']['name'];
  $tempimgname = $_FILES['image']['tmp_name'];

  move_uploaded_file($tempimgname, "../../image/$imagename");

  $title = $_POST["title"];

  $content = $_POST["content"];
  $uid = $_SESSION['uid'];

  $res = $obj->insert_blog($imagename, $title, $content, $uid);

  if ($res) {
    $_SESSION['status'] = "Post is added successfuly";
    header("Location: ../author/mypost.php");
  }
}
