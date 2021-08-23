<?php

$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'dbconnect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
         
    $sql = "select * from users where username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
        $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location:welcome.php");
        }
    else{
        $showError = "<div class='alert'>Invalid Credentials !!!</div>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="log.css" >
    <title>Login</title>
  </head>
<body>
 
<div class="main">
    <div class="signup_para">
        <div class="signup_para1">
            Travellerspoint helps you discover new destinations, organise your trips and share your travel experiences.
        </div>
        <div class="signup_div2">
            <span class="logo">
                <i class="fa fa-map-marker" aria-hidden="true"> Create a map of your travels</i>
            </span>

            <span class="logo">
                <i class="fa fa-comments" aria-hidden="true">Get advice from the community
                </i>
            </span>

            <span class="logo">
                <i class="fa fa-pencil" aria-hidden="true">Blog about your adventures</i>
            </span>
        </div>
    
    </div>

    <div class="main_container">

        <div class="image"><img src="travellerspoint.png" alt=""></div>

        <div class="container">

            <form action="/Blog_site/login.php" method="post">        
                <h2>Create an Account</h2>
                
                <div class="form-group">
                    <div class="label">
                        <label for="username">Username  </label>
                    </div>

                    <div class="input">
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>   
                </div>

                <div class="form-group">
                    <div class="label">
                        <label for="password">Password  </label>
                    </div>

                    <div class="input">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>   
                </div>

                
                <button type="submit" class="signup">Log In</button>
                <div class="login_ref">
            <span class="login_text">Not Registered?</span>
            <a href="/Blog_site/signup.php" class="login"> Sign Up</a>
        </div>
            </form>             
    
        </div>

 
        <?php 
        if($login){
        echo ' You are logged in... ';
        }
        if($showError){
        echo $showError;
        }
        ?>

    
    </div>

</div>

    
  </body>
</html>