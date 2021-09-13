<?php

session_start();

include 'dbconnect.php';
include 'logic.php';

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

    
    <link rel="stylesheet" href="sass/create.css">
    <link rel="stylesheet" href="sass/partials/navbar.css">

    <title>Blog using PHP & MySQL</title>
</head>
<body>


    <div class="container">

        <?php
            include './partial/navbar.php';
        ?>

        <div class="content">
            <div class="content_div">
                <form method="POST" enctype="multipart/form-data">
                    <div>
                        <input type="file" name="image" id="image" class="image_file">

                    </div>
                    <div>
                        <div>
                            <input type="text" name="title" placeholder="Blog Title" class="create_title">
                        </div>     
                        <div>
                            <textarea name="content" class="create_content"></textarea>
                        </div>
                    </div>
                    <div>
                        <button name="new_post" class="btn">Add Post</button>
                    </div>
                </form>
            </div>   
        </div>
    </div>




</body>
</html>


