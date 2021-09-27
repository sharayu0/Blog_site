<?php

session_start();
include '../classes/autoload.php';



if(isset($_SESSION['username'])){
    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];
  
  }else{
    header("location:login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    
    <link rel="stylesheet" href="../../css/create.css">

    <title>Blog using PHP & MySQL</title>
</head>
<body>


    <div class="container">

        <?php
            include '../partial/navbar.php';
        ?>

        <div class="content">
            <div class="content_div">
                <div class="in_data">
                    <form method="POST" enctype="multipart/form-data">

                        <div class="head">
                            Create Blog
                        </div>

                        <div>
                            <div class="form-group">
                                <label for="title" class="label">Blog Title</label>
                                <input type="text" id="title" name="title" placeholder="Blog Title" class="form-control">
                            </div>

                            <div class="form-content">
                                <label for="content" class="label">Content</label>
                                <textarea name="content" id="content" class="form-control"></textarea>
                            </div>

                            <div class="image_file">
                            <input type="file" name="image" id="image" class="upload_file">

                        </div>
                        </div>

                        <div class="form-btn">
                            <button name="new_post" class="button">Add Post</button>
                        </div>
                    </form>
                </div>
            </div>  
            
            <?php
                include '../partial/footer.php';
            ?>
            
        </div>
    </div>
    <?php 
       if(isset($_POST["new_post"])){

        $obj = new Blogs();
       $imagename = $_FILES['image']['name']; 
       $tempimgname = $_FILES['image']['tmp_name'];
      
       move_uploaded_file($tempimgname, "../../image/$imagename");

       $title = $_POST["title"];
       
       $content = $_POST["content"];
       $uid = $_SESSION['uid'];

       $obj->insert_blog($imagename,$title, $content, $uid);

    //    header("Location: mypost.php?info=added");
        } 
    ?>


</body>
</html>


