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


