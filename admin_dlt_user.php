<?php
session_start();

include 'dbconnect.php';
spl_autoload_register(function($class){
  require_once($class.'.php');
});


if(isset($_SESSION['username'])){
  $uid = $_SESSION['uid'];
  $username = $_SESSION['username'];

 

}else{
  header("location:login.php");
}


if(isset($_POST['delete_btn'])){

    $uid=$_POST['delete_id'];

    $obj = new User();
    $result = $obj->deleteUser($uid);

        header("location:admin_index.php?info=deleted");
        exit();
  }


?>


