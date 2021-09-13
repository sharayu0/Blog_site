<?php

session_start();

include 'dbconnect.php';
spl_autoload_register(function($class){
  require_once($class.'.php');
});


if(isset($_SESSION['username'])){
    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];
  
  }else{
    header("location:login.php");
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <link rel="stylesheet" href="navbar.css" >
    <link rel="stylesheet" href="admin_index.css" >
    
  <title>Welcome</title>

  </head>

  <body>
    <?php
    include 'navbar.php';
    ?>

 
  <div class="view_container">
    <div class="head">
      Edit User Profile
    </div>
    <div class="view">


<?php

      if(isset($_POST['edit_btn'])){
        $uid=$_POST['edit_id'];
        
        $obj = new User();
        $result = $obj->selectUser($uid);

        foreach($result as $row)
        { ?>

          <form action="admin_code.php" method="POST">
            
            <input type="text" name="uid" value="<?php echo $row['uid'] ?>">
            <div class="form-group">
                <div class="label">
                    <label for="username">Username  </label>
                </div>

                <div class="input">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'] ?>">
                </div>   
            </div>

            <div class="form-group">
                <div class="label">
                    <label for="password">Password  </label>
                </div>

                <div class="input">
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['username'] ?>">
                </div>   
            </div>

            <div class="form-group">
                <div class="label">
                    <label for="usertype">Usertype</label>
                </div>
                <div class="input">
                  <select name="update_usertype">
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                  </select>
                    <!-- <input type="text" class="form-control" id="usertype" name="usertype" value="<?php echo $row['usertype'] ?>"> -->
                </div>
            </div>

            <div>
              <a href="admin_index.php" class="btn-danger">Cancel</a>
              <button type="submit" name="update_btn">Update</button>
            </div>

          </form>

        <?php
        }
      }
  ?>
      
  
    </div>
  </div>


  <script>

        $(document).ready(function(){
        $(".navbar").click(function(){
            var x = $(window).width();
            if (x<850){
            $(".minimize").toggle();
            }
        });
        });

        $(document).resize(function(){
        $(".navbar").click(function(){
            var x = $(window).width();
            if (x<850){
            $(".minimize").toggle();
            }
        });
        });


        const toggle = document.getElementById("toggle");
        toggle.onclick = function(){
            toggle.classList.toggle("active");
            document.body.classList.toggle('dark_theme');
        }

    </script>
    
  </body>
</html>







































