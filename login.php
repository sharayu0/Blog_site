<?php
session_start();
ob_start();
    include 'dbconnect.php';
    spl_autoload_register(function($class){
        require_once($class.'.php');
    });
    
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){


        $username = $_POST["username"];
        $password = $_POST["password"];
         
        $obj= new Login_check(); 
        $result = $obj->login($username,$password); 

        
            

        // $result = mysqli_query($conn, $sql);
        // $num = mysqli_num_rows($result);
        // $result= $this->mysqli->query($sql);
        // $num = $result->num_rows;
        
        if($result < 1){
            $showError = "<div class='alert'>Invalid Credentials !!!</div>";
        }
        else{
            $login = true;
            foreach ($result as $row) {

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

                    header("location: home.php");
                }
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

    <link rel="stylesheet" href="sass/partials/animation.css" >
    <link rel="stylesheet" href="sass/login.css" >
    <title>Login</title>
  </head>
<body>
 
<div class="wrapper">

    <div class="navbar">
        <div>
            <a href="#" class="logo">BloGEX</a>
        </div>
        <div class="navitem">
            <a class="nav" href="/Blog_site/home_ano.php">Home</a>
            <a class="nav" href="#">Blog</a>
            <a class="nav" href="#">Contact</a>
        <a class="nav" href="#">Login</a>
            <a class="nav" href="/Blog_site/signup.php">Signup </a>
        </div>
    </div>       


    <div class="log_container">

        <form action="/Blog_site/login.php" method="post">        
        
            <div class="head">Log In</div>

            <div class="form-group">
                
                <div class="input">
                    <span class="fa fa-user">
                    </span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required value="<?php if(isset($_COOKIE['usercookie'])){ echo $_COOKIE['usercookie']; } ?>">
                </div> 

            </div>
            

            <div class="form-group">

                <div class="input">
                    <span class="fas fa-lock">
                    </span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['passwordcookie'])){ echo base64_encode($_COOKIE['passwordcookie']); } ?>">
                </div>   
            </div>

            
                <input type="checkbox" class="form-control" name="rememberme"> <span class="remember_me">Remember Me</span>
            
            
            <button type="submit" class="signup">Log In</button>

            <div class="login_ref">
                <span class="login_text">Don't have account ??</span>
                <a href="/Blog_site/signup.php" class="login">Sign Up</a>
            </div>
        
        </form>             

    </div>


    <div class="box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
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

    
  </body>
</html>