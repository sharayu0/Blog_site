<?php
 
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'partials/_dbconnect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];



    if($password == $cpassword){
        $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";

        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
            $showAlert = "<div class='alert'>Your Account is Successfully created !!!</div>";
        }
    }
    else{
        $showError = "<div class='alert'>Password do not match !!!</div>";
    }
    



}


?>



<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" >

    <title>Sign Up</title>
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

    <form action="/loginsystem/signup.php" method="post">

        <h2>Get on board today</h2>

        <div class="form-group">
            <div class="label">
                <label for="username">Username  </label>
            </div>

            <div class="input">
                <input type="text" class="form-control" id="username" name="username" placeholder="Generate User Name">
            </div>   
        </div>

        <div class="form-group">
            <div class="label">
                <label for="password">Password  </label>
            </div>

            <div class="input">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div>   
        </div>

        <div class="form-group">
            <div class="label">
                <label for="cpassword"> Confirm</label>
            </div>
            <div class="input">
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
            </div>
        </div>
        
        <button type="submit" class="signup">Create Account</button>
        <div class="login_ref">
            <span class="login_text">already have an account?</span>
            <a href="/loginsystem/login.php" class="login"> Log In</a>
        </div>

        </form>
    </div>


    <?php 
    if($showAlert){
        echo $showAlert;
    }
    if($showError){
        echo  $showError;
        }
    ?>
    
    </div>

</div>








   
    

    








    
  </body>
</html>