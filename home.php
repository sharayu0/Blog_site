<?php 
    include 'dbconnect.php';

    session_start();

    spl_autoload_register(function($class){
        require_once($class.'.php');
    });

    if(isset($_SESSION['username'])){
        $uid = $_SESSION['uid'];
        $username = $_SESSION['username'];   
    }else{
        header("location: login.php");
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

    
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="sass/partials/navbar.css">
    
  <title>Welcome</title>

  </head>

  <body>

    <div class="container">
        
    <?php
    include './partial/navbar.php';
    ?>


       
        <div class="content">
            <div class="content_head">
                Enjoy The Blog Reading Journey !!
            </div>

        
                <?php

                    $obj = new User();
                    $result = $obj->all_post();
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
                                <p class="img_data"><?php echo substr($q['content'], 0, 200);?></p>
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


        const toggle = document.getElementById("toggle");
        toggle.onclick = function(){
            toggle.classList.toggle("active");
            document.body.classList.toggle('dark_theme');
        }

    </script>


  </body>
</html>