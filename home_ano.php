<?php 
    include 'dbconnect.php';
    include 'classes/autoload.php'; 
    session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="sass/home_ano.css" >
    
   
  <title>Welcome</title>

  </head>

  <body>

    <div class="main">
    <?php
        include './partial/nav.php';
    ?>  

        <div class="main_div">
            <div class="box">
                <div class="content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias?
                    adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias?
                </div>
            </div>
            <div class="box">
                <div class="content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias?
                    adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias?
                </div>
            </div>
            <div class="box">
                <div class="content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias?
                    adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias?
                </div>
            </div>
        </div>
    </div>

    <section class="info">
        <h2>Lorem ipsum dolor sit, amet</h2>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo incidunt sint asperiores rerum obcaecati officia eius atque aspernatur aliquid reiciendis debitis a porro nisi pariatur delectus consectetur, doloribus ab molestias?
    </section>

    <div class="img_div">
      <div class="quote">
        Blog Site
      </div>
    </div>



    <?php

        $sql = "SELECT * FROM `blog_data` ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

    ?>


    <div class="blog">
        <div class="content_head">
            Enjoy The Blog Reading Journey !!
        </div>

        
            <?php if($result){?>


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

    <?php
        include './partial/footer.php';
    ?>

    
    <!-- <script>

        // function display(){
        //     var x = document.getElementById("pro_image");
        //     if(x.style.display == "none") {
        //         x.style.display = "block";
        //     } else {
        //         x.style.display = "none";
        //     }
        // }

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

        
    </script> -->

<!-- <div class="initial">
              echo strtoupper(substr($username,0,1));?>          
    </div> -->




  </body>
</html>