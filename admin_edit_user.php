<?php

session_start();

include 'dbconnect.php';
include 'classes/autoload.php';


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

    <link rel="stylesheet" href="sass/admin_edit_user.css" >
    
  <title>Welcome</title>

  </head>

  <body>
  <div class="container">

    <?php
    include './partial/navbar.php';
    ?>


    <div class="content">
      <div class="content_div">


        <?php

            if(isset($_POST['edit_btn'])){
              $uid=$_POST['edit_id'];
              
              $obj = new User();
              $result = $obj->selectUser($uid);

              foreach($result as $row)
              { ?>

              <div class="in_data">
                <form action="admin_code.php" method="POST">
                
                  <div class="head">
                    Edit User Profile
                  </div>

                  <input type="hidden" name="uid" value="<?php echo $row['uid'] ?>">
                  
                  <div class="form-group">
                      <label for="username" class="label">Username  </label>
                      
                      <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'] ?>">    
                  </div>

                  
                  <div class="form-group">
                          <label for="usertype" class="label">Usertype</label>

                        <select name="update_usertype" class="form-control">
                          <option value="admin">admin</option>
                          <option value="user">user</option>
                        </select>
              
                  </div>

                  <div class="form-btn">

                    <button type="submit" name="update_btn" class="button">Update</button>
                    <a href="admin_index.php" class="button edit_btn">Cancel</a>
                    
                  </div>

                </form>
              </div>

              <?php
              }
            }
        ?>
          
      </div>

      <?php
        include './partial/footer.php';
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







































