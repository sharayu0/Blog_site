<?php

include 'template/classes/autoload.php';
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/home_ano.css">


    <title>Welcome</title>

</head>

<body>

    <div class="main">
        <div class="navbar">
            <div class="logo_div">
                <a href="#" class="logo">BloGEX</a>
            </div>
            <input type="checkbox" id="toggle" class="toggle">
            <label for="toggle">&#9776</label>

            <div class="navitem">
                <a class="nav" href="#">Home</a>
                <a class="nav" href="#">My Post</a>
                <a class="nav" href="#">Contact</a>
                <a class="nav" href="template/login/login.php">Login</a>
                <a class="nav" href="template/login/signup.php">Signup </a>
            </div>
        </div>

        <div class="main_div">
            <div class="main_quote info_size">
                “Blogging is to writing what extreme sports are to athletics: more free-form, more accident-prone, less formal, more alive. It is, in many ways, writing out loud.”

                <p>
                    Sometimes we may tempted to say everything we think but we don't so write here what's in your mind and what you are thinking, Explore here.
                </p>

                <p>If you want to achieve something in your life, Change the way not the intention.
                    Your actions are your identity, Otherwise there are thousands of people with the same name.</p>

            </div>
        </div>
        <div class="overlay">

        </div>
    </div>



    <section class="info_div">
        <div class="head">What is Blogging ??</div>
        <div class="info_size">
            A Blog is a platform for sharing information and communication. You must have seen blogs that are ones personal talking about everything they did or think on a particular field or subject.

            <p>Reading today's thoughts thodays posts, positive energy will be filled in you. Everyone wants that their day is the best and freshest. So go throughout and Read the blogs and enjoy your day.
                Sometimes we may tempted to say everything we think but we don't so write here what's in your mind and what you are thinking, Explore here.</p>
        </div>

    </section>

    <div class="img_div">
        <div class="quote">
            Blog Site
        </div>
    </div>



    <?php

    $obj = new User();
    $result = $obj->all_post();

    ?>


    <div class="blog">
        <div class="content_head">
            Enjoy The Blog Reading Journey !!
        </div>


        <?php if ($result) { ?>


            <div class="blog_post">
                <?php foreach ($result as $q) { ?>
                    <div class="blog_div">
                        <div class="blog_img">
                            <img class="main_img" src=<?php echo "../../image/" . $q['image']; ?> alt="">
                        </div>
                        <div class="blog_data">
                            <h3 class="head"><?php echo $q['title']; ?></h3>
                            <p class="img_data"><?php echo substr($q['content'], 0, 200); ?></p>
                            <div class="author">@
                                <?php echo $q['username']; ?>
                            </div>
                            <div class="btn_read">
                                <a href="template/login/login.php" class="read_btn">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        <?php } ?>

    </div>

    <?php
    include 'template/partial/footer.php';
    ?>



</body>

</html>