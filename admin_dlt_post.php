<?php
include 'dbconnect.php';
if(isset($_POST['delete'])){
    $id=$_POST['dlt_id'];
    $sql = "DELETE from blog_data WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        header("location:admin_index.php?info=deleted");
    }
  
}
?> 