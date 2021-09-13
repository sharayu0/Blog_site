<?php
include 'dbconnect.php';
spl_autoload_register(function($class){
    require_once($class.'.php');
});

$obj = new Blogs();

if(isset($_POST['delete'])){

    $id=$_POST['dlt_id'];
    $obj-> delete_blog($id);
    
    header("location:admin_index.php?info=deleted");
   
}
?> 