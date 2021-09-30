<?php
session_start();


include '../classes/autoload.php';


if (isset($_POST['delete_btn'])) {

  $uid = $_POST['delete_id'];

  $obj = new User();
  $result = $obj->deleteUser($uid);


  if (!$result) {
    $_SESSION['status'] = "User has been deleted sussessfully";

    header("location:admin_index.php");
  }
}
