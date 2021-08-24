<?php

session_start();

include 'dbconnect.php';
include 'logic.php';

if(isset($_SESSION['loggedin'])){
  
}else{
  header("location:login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="navbar.css" >

    <title>Blog using PHP & MySQL</title>
</head>
<body>

<?php
    include 'navbar.php';
    ?>


    <div class="container mt-5">

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

        <div class="row">
            <?php foreach($query as $q){ ?>
                <div class="col-sm-6 col-md-4 col-lg-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <div class="card_head">
                              <h5 class="card-title"><?php echo $q['title'];?></h5>
                            </div>
                            <div class="card_data">
                              <p class="card-text"><?php echo substr($q['content'], 0, 200);?>...</p>
                            </div>
                            <div class="btn_read">
                            <a href="view.php?id=<?php echo $q['id']?>" class="read_btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>


