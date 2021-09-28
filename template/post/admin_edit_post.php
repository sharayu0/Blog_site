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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



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
                if (isset($_POST['edit_btn'])) {
                    $id = $_POST['edit_id'];

                    $obj = new Blogs();
                    $result = $obj->select_post($id);


                    foreach ($result as $row) { ?>

                        <div class="in_data">
                            <form method="POST" enctype="multipart/form-data">

                                <div class="head">
                                    Create Post
                                </div>

                                <div>

                                    <input type="text" hidden name="id" value="<?php echo $row['id']; ?>">

                                    <div class="form-group">
                                        <label for="title" class="label">Blog Title</label>

                                        <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>">
                                    </div>

                                    <div class="form-content">

                                        <label for="content" class="label">Content</label>

                                        <textarea name="content" class="form-control" cols="30" rows="10"><?php echo $row['content']; ?></textarea>
                                    </div>

                                    <div class="image_file">
                                        <input type="file" name="image" id="image" class="upload_file"><br>
                                    </div>

                                    <div class="form-btn">
                                        <button class="button" name="update">Update</button>
                                    </div>
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
<?php } ?>

<?php

if (isset($_POST['update'])) {
    $obj = new Blogs();

    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    $imagename = $_FILES['image']['name'];
    $tempimgname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tempimgname, "image/$imagename");

    $obj->update_blog($imagename, $title, $content, $id);

    header("Location: ../admin/admin_index.php?info=updated");
}

?>


<script>
    $(document).ready(function() {
        $(".navbar").click(function() {
            var x = $(window).width();
            if (x < 850) {
                $(".minimize").toggle();
            }
        });
    });

    $(document).resize(function() {
        $(".navbar").click(function() {
            var x = $(window).width();
            if (x < 850) {
                $(".minimize").toggle();
            }
        });
    });


    const toggle = document.getElementById("toggle");
    toggle.onclick = function() {
        toggle.classList.toggle("active");
        document.body.classList.toggle('dark_theme');
    }
</script>

</body>

</html>