<?php
include 'dbconnect.php';
if(isset($_POST['delete_btn'])){
    $uid=$_POST['delete_id'];
    $sql = "DELETE from users WHERE uid=$uid";
    $result = mysqli_query($conn, $sql);

        header("location:admin_index.php?info=deleted");
        exit();
  }


?>


