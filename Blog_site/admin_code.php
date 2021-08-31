<?php

session_start();

include 'dbconnect.php';

if(isset($_SESSION['username'])){
    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];
  

  }else{
    header("location:login.php");
  }



  if(isset($_POST['update_btn'])){
      $uid = $_POST['uid'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $usertype = $_POST['update_usertype'];

      $sql = "UPDATE users SET username='$username', password='$password', usertype='$usertype' WHERE uid='$uid'";

      $result = mysqli_query($conn, $sql);
      if($result){
          header("location:admin_index.php?info=added");
          exit();
      }
  }


?>
