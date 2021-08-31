<?php
session_start();
ob_start();
    include '../dbconnect.php';

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="index.css" >
    


    <title>Login</title>
  </head>

  <body>
    <div class="navbar">
        <div class="navitem">
            <a class="nav text_deco_none" href="#">Home</a>
            <a class="nav text_deco_none" href="#">Login</a>
        </div>
        <div>
            <a href="#" class="logo text_deco_none">BloGEX</a>
        </div>
    </div> 

    <div class="container">
        <div class="left">
            <div class="left_cont">It's Not About The Destination It's About The Journey...</div>
            <a href="" class="reg_link text_deco_none">Not Registered ??</a>
            <a href="" class="btn btn-success text_deco_none">Create Account</a>
            
        </div>

        <div class="right">
  

          <div class="log_container">

            <form action="/Blog_site/remake/index.php" method="post"> 
                
                <div class="form-group">
                    <div class="label">
                        <label for="username">Username  </label>
                    </div>

                    <div class="input">
                        <input type="text" class="form-control" id="username" name="username"  required value="<?php if(isset($_COOKIE['usercookie'])){ echo $_COOKIE['usercookie']; } ?>">
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