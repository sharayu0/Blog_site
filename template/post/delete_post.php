<?php

session_start();


include '../classes/autoload.php';

if (isset($_POST['delete'])) {
  $obj = new Blogs();
  $id = $_POST['id'];
  $res = $obj->delete_blog($id);

  if (!$res) {
    $_SESSION['status'] = "Post has been deleted sussessfully";

    header("Location: ../author/mypost.php");
  }
}
