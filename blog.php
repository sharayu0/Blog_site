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

   <style>
       .blog_post{
           display:flex;
           flex-wrap: wrap;
        
       }
       .home_container{
           width:100%;
       }
   </style>


    
    <link rel="stylesheet" href="home.css">
    
    <link rel="stylesheet" href="navbar.css" >

    <title>Blog using PHP & MySQL</title>
</head>
<body>

<?php
    include 'navbar.php';
    ?>


    <div class="home_container mt-5">

        <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){ ?>
                
                <?php echo '<div class="post_notify">Post has been added successfully</div>'; ?>

            <?php } else if($_REQUEST['info'] == "updated"){?>

                <?php echo '<div class="post_notify">Post has been updated successfully</div>'; ?>

            <?php } else if($_REQUEST['info'] == "deleted"){?>

                <?php echo '<div class="post_notify">Post has been deleted successfully</div>'; ?>

            <?php } ?>
        <?php } ?>
        


        <div class="text_center">
            <a href="create.php" class="newbtn">+ Create a new post</a>
        </div>


  <?php
    
    
    $sql = "SELECT * FROM `users` where username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['usertype'] == 'admin'){
        $sql = "SELECT * FROM `blog_data`";
        $result = mysqli_query($conn, $sql);

    }elseif($row['usertype'] == 'user'){
        $sql = "SELECT * FROM `blog_data` WHERE user_id ='$uid'";
        $result = mysqli_query($conn, $sql);
   
    }

 
    
   


    if($result){
?>


        <div class="blog_post">
            <?php foreach($result as $q){ ?>
                <div class="blog_div">
                    <div class="blog_img">
                        <img class="main_img" src= <?php echo "image/".$q['image'];?> alt="">
                    </div>
                    <div class="blog_data">
                        <h3  class="head"><?php echo $q['title'];?></h3 >
                        <p class="img_data"><?php echo substr($q['content'], 0, 200);?>...</p>
                            <div class="btn_read">
                                <a href="view.php?id=<?php echo $q['id']?>" class="read_btn">Read More</a>
                            </div>
                    </div>
                </div>
     
        




            <?php }?>
        </div>
    <?php }?>
 
   

</body>
</html>


