<?php
session_start();
include '../classes/autoload.php'; 

$obj = new Blogs();

if(isset($_POST['delete'])){

    $id=$_POST['dlt_id'];
    $res = $obj-> delete_blog($id);

    if(!$res){
        $_SESSION['status'] = "Post has been deleted sussessfully";

        header("location:../admin/admin_index.php");
    }
   
}
