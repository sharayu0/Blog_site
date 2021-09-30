<?php

session_start();
include '../classes/autoload.php';

if (isset($_SESSION['username'])) {
    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];
} else {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    

    <link rel="stylesheet" href="../../css/create.css">

    <title>Blog using PHP & MySQL</title>
</head>

<body>

    <div class="container">

        <?php
        include '../partial/navbar.php';
        ?>

        <div class="content">
            <div class="content_div">

                <?php
                $obj = new Blogs();

                if (isset($_REQUEST['id'])) {

                    $id = $_REQUEST['id'];
                    $result = $obj->select_post($id);
                }

                foreach ($result as $q) { ?>

                    <div class="in_data">
                        <form method="POST" action="update_post.php" enctype="multipart/form-data">

                            <div class="head">
                                Edit Post
                            </div>


                            <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">

                            <div class="form-group">
                                <label for="title" class="label">Blog Title</label>
                                <input type="text" name="title" placeholder="Blog Title" class="form-control" value="<?php echo $q['title']; ?>">
                            </div>

                            <div class="form-content">
                                <label for="content" class="label">Content</label>
                                <textarea name="content" class="form-control" cols="30" rows="10"><?php echo $q['content']; ?></textarea>
                            </div>

                            <div class="image_file">
                                <input type="file" name="image" id="image" class="upload_file"><br>
                            </div>

                            <div class="form-btn">
                                <button class="button" name="update">Update</button>
                            </div>

                        </form>
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