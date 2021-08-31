<?php 
    include '../dbconnect.php';


    session_start();

    if(isset($_SESSION['username'])){
        $uid = $_SESSION['uid'];
        $username = $_SESSION['username'];
   
    }else{
        
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <link rel="stylesheet" href="home.css" >
  <title>Welcome</title>

  </head>

  <body>

    <div class="container">
        
        <div class="navbar">
            <div class="name">
                Sharayu
            </div>
            <div class="minimize">
                <div class="profile">
                    <div class="profle_pic">
                        <div class="initial">S</div>
                    </div>
                    <div class="profile_info">
                        Hi, my name is <span></span>. Welcome to my Blog and enjoy Reading!
                    </div>
                </div>

                <div class="hr"></div>

                <div class="nav">
                
                    <div class="nav_block">
                    <i class="fas fa-home">
                            <a class="navitem text_deco_none" href="/Blog_site/remake/home.php">Home</a>
                        </i>
                    </div>


                    <div class="nav_block">
                        <i class="fas fa-blog">
                            <a class="navitem text_deco_none" href="../Blog_site/blog.php">Blog</a>
                        </i>
                    </div>


                    <div class="nav_block">
                        <i class="fas fa-envelope-open-text">
                            <a class="navitem text_deco_none" href="#">Contact</a> 
                        </i>
                    </div>


                    <div class="nav_block">
                        <i class="fas fa-sign-in-alt">
                            <a class="navitem text_deco_none" href="../Blog_site/remake/login.php">Log In</a> 
                        </i>
                    </div>

                    <div class="nav_block">
                    <i class="fas fa-sign-out-alt">
                            <a class="navitem text_deco_none" href="../Blog_site/logou.php">Log Out</a> 
                        </i>
                    </div>

                    
                </div>

                <div class="hr"></div>

                <div class="mode_btn">
                    
                </div>

            </div>



        </div>


        <?php

        $sql = "SELECT * FROM `blog_data` ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        ?>


        <div class="content">
            <div class="content_head">
                Enjoy The Blog Reading Journey !!
            </div>

        
                <?php if($result){?>


                <div class="blog_post">
                    <?php foreach($result as $q){ ?>
                        <div class="blog_div">
                            <div class="blog_img">
                                <img class="main_img" src= <?php echo "../image/".$q['image'];?> alt="">
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
            
    </div>



    
    <script>
        $(document).ready(function(){
          $(".navbar").click(function(){
            var x = $(window).width();
            if (x<850){
            $(".minimize").toggle();
            }
          });
        });

        $(document).resize(function(){
          $(".navbar").click(function(){
            var x = $(window).width();
            if (x<850){
            $(".minimize").toggle();
            }
          });
        });
        
    </script>






  </body>
</html>