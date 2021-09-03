<?php
session_start();

include 'dbconnect.php';

if(isset($_SESSION['username'])){
  $uid = $_SESSION['uid'];
  $username = $_SESSION['username'];

  echo $uid;

}else{
  header("location:login.php");
}




if(isset($_POST['delete_btn'])){

  echo $uid;

    $uid=$_POST['delete_id'];

    
    echo "hello1";
    $sql = "DELETE from users WHERE uid=$uid";
    $result = mysqli_query($conn, $sql);

        header("location:admin_index.php?info=deleted");
        exit();
  }


?>


