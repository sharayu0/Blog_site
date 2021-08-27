<?php
session_start();
ob_start();
    include 'dbconnect.php';

    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){


        $username = $_POST["username"];
        $password = $_POST["password"];
         
        $sql = "select * from users where username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        
        if($num < 1){
            $showError = "<div class='alert'>Invalid Credentials !!!</div>";
        }
        else{
            $login = true;
            $row = mysqli_fetch_assoc($result);

            $_SESSION['username'] = $row['username'];
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['usertype'] = $row['usertype'];

            if($row['usertype']=='admin'){
                if(isset($_SESSION['username'])){

                    if(isset($_POST['rememberme'])){

                        setcookie('usercookie', $username, time()+86400);
                        setcookie('passwordcookie', base64_encode($password), time()+86400);
                        header("location: admin_index.php");

                    }else{
                        header("location: admin_index.php");
                    }

                    header("location: admin_index.php");
                }
            }
            elseif($row['usertype']=='user'){
                if(isset($_SESSION['username'])){

                    header("location: welcome.php");
                }
            }
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
                        <input type="text" class="form-control" id="username" name="username" required value="<?php if(isset($_COOKIE['usercookie'])){ echo $_COOKIE['usercookie']; } ?>">
                    </div>   
                </div>

                <div class="form-group">
                    <div class="label">
                        <label for="password">Password  </label>
                    </div>

                    <div class="input">
                        <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_COOKIE['passwordcookie'])){ echo base64_encode($_COOKIE['passwordcookie']); } ?>">
                    </div>   
                </div>

                <div>
                    <input type="checkbox" class="form-control" name="rememberme"> Remember Me    
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