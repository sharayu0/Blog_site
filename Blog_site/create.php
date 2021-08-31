<?php

session_start();

include 'dbconnect.php';

include 'logic.php';

if(isset($_SESSION['username'])){
    $uid = $_SESSION['uid'];
  
  }else{
    header("location:login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
   

    <link rel="stylesheet" href="create.css">
    <link rel="stylesheet" href="post.css">
    <link rel="stylesheet" href="navbar.css" >

    <title>Blog using PHP & MySQL</title>
</head>
<body>


    <?php
    include 'navbar.php';
    ?>

    <div class="create_cont">
        <form method="POST" enctype="multipart/form-data">
            <div>
                <input type="file" name="image" id="image"><br>
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
                <button name="new_post" class="up_btn">Add Post</button>
            </div>
        </form>   
    </div>

 





    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>


