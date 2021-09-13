<?php
 include 'dbconnect.php';
 spl_autoload_register(function($class){
    require_once($class.'.php');
});

session_start();
 
 

 $showAlert = false;
 $showError = false;
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
     

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    

        if($password == $cpassword){

            $obj = new Register();
            $result = $obj->user_check($username);

            if(empty($result)){
                
                    $obj->signup($username, $password);

                    $showAlert = true;
                    $showAlert = "<div class='alert'>Your Account is Successfully created !!!</div>";
            }
            else{
                echo"<div class='alert'>Username <span class='dup_entry'>$username</span> already exist.. Try another one!!!!!</div>";
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

    <link rel="stylesheet" href="sass/partials/animation.css" >
    <link rel="stylesheet" href="sass/login.css" >

    <title>Sign Up</title>
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
                <a class="nav" href="/Blog_site/login.php">Login</a>
                <a class="nav" href="#">Signup </a>
            </div>
        </div> 


     
        

        
        <div class="log_container">

            <form action="/Blog_site/signup.php" method="post">        
            
                <div class="head">Sign up </div>

                <div class="form-group">
                    
                    <div class="input">
                        <span class="fa fa-user">
                        </span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div> 

                </div>
                

                <div class="form-group">
        
                    <div class="input">
                        <span class="fas fa-lock">
                        </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>   
                </div>


                <div class="form-group">
        
                    <div class="input">
                        <span class="fas fa-lock">
                        </span>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                    </div>   
                </div>

                
                <button type="submit" class="signup">Sign Up</button>

                <div class="login_ref">
                    <span class="login_text">Already Registered ??</span>
                    <a href="/Blog_site/login.php" class="login">Log In</a>
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
            if($showAlert){
                echo $showAlert;
            }
            if($showError){
                echo  $showError;
            }
        ?>
    
    </div>


    
    
   







   
    

    








    
  </body>
</html>