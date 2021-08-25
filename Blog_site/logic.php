<?php 

include 'dbconnect.php';




    $sql = "SELECT * from blog_data";
    $query = mysqli_query($conn, $sql);

    if(isset($_REQUEST["new_post"])){
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];
        $uid = $_SESSION['uid'];
    
        $sql = "INSERT INTO blog_data(`title`, `content`,`user_id`) VALUES('$title', '$content','$uid')";
        mysqli_query($conn, $sql);
    
        header("Location: home.php?info=added");
    
    } 

    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];

        $sql = "SELECT * from blog_data where id=$id";
        $query = mysqli_query($conn, $sql);
    }



    if(isset($_REQUEST['update'])){
        $id = $_REQUEST["id"];
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];

        $sql= "update blog_data set title = '$title', content = '$content' where id=$id";
        mysqli_query($conn, $sql); 

        header("Location: home.php?info=updated");
        exit();
    }

    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];

        $sql = "delete from blog_data where id = $id";
        $query = mysqli_query($conn, $sql);

        header("Location: home.php?info=deleted");
        exit();
    }
?>