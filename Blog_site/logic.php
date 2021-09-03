<?php 

include 'dbconnect.php';




    $sql = "SELECT * from blog_data";
    $result = mysqli_query($conn, $sql);

    if(isset($_POST["new_post"])){
        include 'dbconnect.php';
        $imagename = $_FILES['image']['name']; 
    
        $tempimgname = $_FILES['image']['tmp_name'];
       
        move_uploaded_file($tempimgname, "image/$imagename");

        $title = $_POST["title"];
        
        $content = $_POST["content"];
        $uid = $_SESSION['uid'];
    
        $sql = "INSERT INTO `blog_data` (`image`, `title`, `content`,`user_id`) VALUES('$imagename', '$title', '$content','$uid')";

        mysqli_query($conn, $sql);

    
         header("Location: blog.php?info=added");
    
    } 

   
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];

        $sql = "SELECT * from blog_data where id=$id";
        $result = mysqli_query($conn, $sql);
    }



    if(isset($_POST['update'])){

        $id = $_POST["id"];
        $imagename = $_FILES['image']['name']; 
    
        
        move_uploaded_file($tempimgname, "image/$imagename");
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];

        $sql= "update blog_data set image ='$imagename', title = '$title', content = '$content' where id=$id";
        $result=mysqli_query($conn, $sql); 

        header("Location: blog.php?info=updated");
        exit(); 
    }

    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id']; 

        $sql = "delete from blog_data where id = $id";
        $result = mysqli_query($conn, $sql);

        header("Location: blog.php?info=deleted");
        exit();
    }
?>