<?php

session_start();

include 'dbconnect.php';
include 'logic.php';

if(isset($_SESSION['username'])){
    $uid = $_SESSION['uid'];
    $user = $_SESSION['username'];
  
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

    <?php foreach($query as $q){ ?>
            <form method="GET">
                <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
                <input type="text" name="title" placeholder="Blog Title" class="view_title text_center view_width" value="<?php echo $q['title'];?>">
                <textarea name="content" class="edit_content" cols="30" rows="10"><?php echo $q['content'];?></textarea>
            <div>
            <button class="up_btn" name="update">Update</button>
            </div>
        </form>
        <?php }?>
    </div>
         
    </div>


</body>
</html>


