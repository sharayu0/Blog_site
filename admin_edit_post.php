<?php

session_start();

include 'dbconnect.php';

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

            <?php
            if(isset($_POST['edit_btn'])){
                $id=$_POST['edit_id'];
                $sql = "SELECT * FROM blog_data WHERE id='$id'";
                $result = mysqli_query($conn, $sql);


            foreach($result as $row){ ?>
                <form method="POST">
                    <div>
                        <input type="text" hidden name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="title" class="view_title text_center view_width" value="<?php echo $row['title'];?>">
                        <textarea name="content" class="edit_content" cols="30" rows="10"><?php echo $row['content'];?></textarea>
                        <div>
                            <button class="up_btn" name="update">Update</button>
                        </div>
                    </div>  
                </form>
            <?php }?>
        </div>
            
    </div>
<?php }?>

    <?php

    if(isset($_REQUEST['update'])){
        $id = $_REQUEST["id"];
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];

        $sql= "update blog_data set title = '$title', content = '$content' where id=$id";
        mysqli_query($conn, $sql); 

        header("Location: admin_index.php");
        exit();
    }



    ?>


</body>
</html>


