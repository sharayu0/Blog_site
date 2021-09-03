<?php
 include 'dbconnect.php';
 include 'Database.php';

 $obj = new Database();

 $showAlert = false;
 $showError = false;
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
     

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    



        if($password == $cpassword){

            $sql = "select * from users where username= '$username'";

            $result = mysqli_query($conn, $sql);

            if(!$result->num_rows > 0){
                if($result){
                    $obj->insert('users',['username'=>$username,'password'=>$password]);

                    $showAlert = true;
                    $showAlert = "<div class='alert'>Your Account is Successfully created !!!</div>";

                   
                }
                else{
                    echo "<div class='alert'>Something went wrong !!!</div>";
                   
                }  
            }else{
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

    <link rel="stylesheet" href="log1.css" >

    <title>Sign Up</title>
  </head>
  <body>
     


  <div class="navbar">
            <div class="navitem">
              <a class="nav text_deco_none" href="../Blog_site/remake/home.php">Home</a>
              <a class="nav text_deco_none" href="#">Login</a>
            </div>
            <div>
              <a href="#" class="logo text_deco_none">BloGEX</a>
            </div>
    </div> 


  

    <div class="container">
        <div class="left">
            <div class="left_cont">It's Not About The Destination It's About The Journey...</div>
            <a href="" class="reg_link text_deco_none">Already Registered ??</a>
            <a href="/Blog_site/login.php" class="btn btn-success text_deco_none">Login</a>
            
        </div>

        <div class="right">

           



        <div class="log_container">

            <form action="/Blog_site/signup.php" method="post">


                <div class="form-group">
                    <div class="label">
                        <label for="username">Username  </label>
                    </div>

                    <div class="input">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Generate User Name" required>
                    </div>   
                </div>

        
                <div class="form-group">
                    <div class="label">
                        <label for="password">Password  </label>
                    </div>

                    <div class="input">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                    </div>   
                </div>

                <div class="form-group">
                    <div class="label">
                        <label for="cpassword"> Confirm</label>
                    </div>
                    <div class="input">
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                    </div>
                </div>
        
                <button type="submit" class="signup">Create Account</button>
                <div class="login_ref">
                    <span class="login_text">already have an account?</span>
                    <a href="/Blog_site/login.php" class="login"> Log In</a>
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