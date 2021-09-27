<?php

session_start();

include 'dbconnect.php';
include '../classes/autoload.php';

  if(isset($_SESSION['username'])){
    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];

  }
  else{
    header("location:login.php");
  }



  if(isset($_POST['update_btn'])){
      $uid = $_POST['uid'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $usertype = $_POST['update_usertype'];

      $obj = new User();
      $result = $obj->updateUser($username,$password,$usertype,$uid);

      if($result){
          header("location:admin_index.php?info=added");
          exit();
      }else{
        header("location:admin_index.php");
      }
  }


?>
