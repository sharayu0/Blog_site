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

    
   
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="navbar.css" >

    <title>Blog using PHP & MySQL</title>
</head>
<body>


<?php
    include 'navbar.php';
    ?>


    <div class="view_container">
     <div class="view">
      <?php foreach($result as $q){?>
        <div class="view_title text_center">
            <?php echo $q['title'];?>
            
        </div>
        <div class="view_content">
            <?php echo $q['content'];?>
        </div>
        
        
        <div class="view_btn">
                <a href="edit.php?id=<?php echo $q['id']?>" class="button" name="edit">Edit</a>

                <form method="POST">
                    <input type="text" hidden value='<?php echo $q['id']?>' name="id">
                    <button class="dlt_button" name="delete">Delete</button>
                </form>
            </div>
      <?php } ?>
      </div>
    </div>




</body>
</html>


