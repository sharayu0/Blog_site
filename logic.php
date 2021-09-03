<?php 

include 'dbconnect.php';
include 'Database.php';

$obj = new Database();


    $sql = "SELECT * from blog_data";
    $result = mysqli_query($conn, $sql);


    if(isset($_POST["new_post"])){
       
        $imagename = $_FILES['image']['name']; 
        $tempimgname = $_FILES['image']['tmp_name'];
       
        move_uploaded_file($tempimgname, "image/$imagename");

        $title = $_POST["title"];
        
        $content = $_POST["content"];
        $uid = $_SESSION['uid'];
    

        $obj->insert('blog_data',['image'=>$imagename,'title'=>$title,'content'=>$content,'user_id'=>$uid]);

         header("Location: blog.php?info=added");
    } 


    if(isset($_REQUEST['id'])){

        $id = $_REQUEST['id'];
        $sql = "SELECT * from blog_data where id=$id";
        $result = mysqli_query($conn, $sql);
    }


    if(isset($_POST['update'])){

        include 'dbconnect.php';

        $id = $_POST["id"];
        $imagename = $_FILES['image']['name']; 
        $tempimgname = $_FILES['image']['tmp_name'];

        move_uploaded_file($tempimgname, "image/$imagename");
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];

        $obj-> update('blog_data',['image'=>$imagename,'title'=>$title,'content'=>$content],'id ="'.$id.'"');        

        header("Location: blog.php?info=updated");
        exit(); 
    }


    if(isset($_REQUEST['delete'])){

        $id = $_REQUEST['id']; 
        $obj-> delete('blog_data','id ="'.$id.'"');
      
        header("Location: blog.php?info=deleted");
        exit();
    }

?>