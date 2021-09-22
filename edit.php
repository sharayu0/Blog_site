<?php

session_start();
include 'classes/autoload.php'; 

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <link rel="stylesheet" href="sass/create.css">

    <title>Blog using PHP & MySQL</title>
</head>
<body>

    <div class="container">

        <?php
            include './partial/navbar.php';
        ?>

        <div class="content">
            <div class="content_div">

            <?php
            $obj = new Blogs();

            if(isset($_REQUEST['id'])){
            
              $id = $_REQUEST['id'];
              $result = $obj->select_post($id);
            }
            
                 foreach($result as $q){ ?>

                    <form method="POST" enctype="multipart/form-data">

                        <div>
                            <input type="file" name="image" id="image" class="image_file"><br>
                        </div>
                        
                            <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">

                        <div> 
                            <input type="text" name="title" placeholder="Blog Title" class="create_title" value="<?php echo $q['title'];?>"> 
                        </div> 
                            <div>
                            <textarea name="content" class="create_content" cols="30" rows="10"><?php echo $q['content'];?></textarea>
                        </div>

                        <div>
                        <button class="btn" name="update">Update</button>
                        </div>

                    </form>
                <?php }?>
            </div>

            <?php
                include './partial/footer.php';
            ?>

        </div>
         
    </div>

    <?php
    if(isset($_POST["update"])){

        $obj1 = new Blogs();
        $id = $_POST["id"];
        $imagename = $_FILES['image']['name']; 
        $tempimgname = $_FILES['image']['tmp_name'];

        move_uploaded_file($tempimgname, "image/$imagename");

        $title = $_POST["title"];
        $content = $_POST["content"];

        $obj1->update_blog($imagename,$title, $content, $id);       

        if($obj1){
            header("Location: mypost.php?info=updated");
        exit(); 
        }
    }
?>

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


