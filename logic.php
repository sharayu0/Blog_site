<?php 
include 'classes/autoload.php';
include 'dbconnect.php';

$obj = new Blogs();

    $sql = "SELECT * from blog_data";
    $result = mysqli_query($conn, $sql);

    if(isset($_POST["new_post"])){
       
        $imagename = $_FILES['image']['name']; 
        $tempimgname = $_FILES['image']['tmp_name'];
       
        move_uploaded_file($tempimgname, "image/$imagename");

        $title = $_POST["title"];
        
        $content = $_POST["content"];
        $uid = $_SESSION['uid'];

        $obj->insert_blog($imagename,$title, $content, $uid);

        header("Location: blog.php?info=added");
    } 

    if(isset($_REQUEST['id'])){

        $id = $_REQUEST['id'];
        $sql = "SELECT * from blog_data where id=$id";
        $result = mysqli_query($conn, $sql);
    }

    if(isset($_POST["update"])){

        $obj1 = new Blogs();
        $id = $_POST["id"];
        $imagename = $_FILES['image']['name']; 
        $tempimgname = $_FILES['image']['tmp_name'];

        move_uploaded_file($tempimgname, "image/$imagename");

        $title = $_POST["title"];
        $content = $_POST["content"];

        $obj1->update_blog($imagename,$title, $content, $id);       

        if($obj1){
            header("Location: blog.php?info=updated");
         exit(); 
        }
    }
 

    if(isset($_REQUEST['delete'])){
       
        $id = $_REQUEST['id']; 
        $obj-> delete_blog($id);
      
        header("Location: blog.php?info=deleted");
        exit();
    }

?>