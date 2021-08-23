<?php

include 'dbconnect.php';
include 'logic.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
   
    <link rel="stylesheet" href="home.css">

    <title>Blog using PHP & MySQL</title>
</head>
<body>


<div class="navbarr">
    <div href="#"><img class="navbrand" src="./image/travellerspoint.jpg" alt=""></div>
      <div class="nav_item">
      <a class="nav_menu" href="/Blog_site/welcome.php">Home</a>
        <a class="nav_menu" href="/Blog_site/home.php">Blog</a>
        <a class="nav_menu" href="/Blog_site/login.php">Login</a>
        <a class="nav_menu" href="/Blog_site/logout.php">Logout</a>
        
      </div>
      
</div>


    <div class="view_container">
     <div class="view">
      <?php foreach($query as $q){?>
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
                    <button class="dlt_button" name="delete" name="delete">Delete</button>
                </form>
            </div>
      <?php } ?>
      </div>
    </div>




</body>
</html>


