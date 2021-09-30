<?php

session_start();

include '../classes/autoload.php';


if (isset($_POST['update_btn'])) {
  $uid = $_POST['uid'];
  $username = $_POST['username'];
  
  $usertype = $_POST['update_usertype'];

  $obj = new User();
  $result = $obj->updateUser($username, $usertype, $uid);

  if($result){
    $_SESSION['status']="User is Updated";
    header("location:admin_index.php");
  }
  
}
