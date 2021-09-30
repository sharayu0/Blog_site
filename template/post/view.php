<?php 

session_start();
include '../classes/autoload.php'; 

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

    <link rel="stylesheet" href="../../css/view.css">
   

    <title>Blog using PHP & MySQL</title>
</head>
<body>


    <div class="container">

      <?php
        include '../partial/navbar.php';
      ?>

      <div class="content">

        <div class="view">
        
            <?php
            $obj = new Blogs();

            if(isset($_REQUEST['id'])){
            
              $id = $_REQUEST['id'];
              $result = $obj->select_post($id);
            }
          
            foreach($result as $q){?>

              <div class="view_title">
                <?php echo $q['title'];?>  
              </div>

              <div class="img_div">
                <img class="img" src= <?php echo "../../image/".$q['image'];?> alt="">
              </div>

              <div class="content_div">
              
                <div class="view_content">
                    <?php echo $q['content'];?>
                </div>

                <div class="author">
                    @<?php echo $q['username'];?>
                </div>
                
                
                <div class="view_btn">
                      <a href="edit.php?id=<?php echo $q['id']?>" class="button edit_btn" name="edit">Edit</a>

                      <form method="POST" action="delete_post.php">
                        <input type="text" hidden value='<?php echo $q['id']?>' name="id">
                        <button class="button" name="delete">Delete</button>
                      </form>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php
            include '../partial/footer.php';
        ?>

      </div>
    </div>

  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="../../js/script.js"></script>
 
</body>
</html>


