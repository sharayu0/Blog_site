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


if(isset($_REQUEST['delete'])){
    $obj = new Blogs();
    $id = $_REQUEST['id']; 
    $obj-> delete_blog($id);
   
    header("Location: ../author/mypost.php?info=deleted");
    
}
?>