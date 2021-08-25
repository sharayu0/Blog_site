<?php

session_start();

include 'dbconnect.php';

if(isset($_SESSION['username'])){
    $uid = $_SESSION['uid'];
    $user = $_SESSION['username'];
  
  }else{
    header("location:login.php");
  }


  if($_POST['edit_btn']){
      $id=$_POST['edit_id'];
      echo $id;

  }

?>



