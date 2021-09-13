<?php 
session_start();

spl_autoload_register(function($class){
  require_once($class.'.php');
});

include 'dbconnect.php';

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

    
  
    <!-- <link rel="stylesheet" href="home.css" > -->
    <link rel="stylesheet" href="sass/admin_index.css" >
    <link rel="stylesheet" href="sass/modal.css" >
    <link rel="stylesheet" href="sass/partials/navbar.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    <title>Welcome</title>
    
  </head>
  
  <body>

    <?php if(isset($_REQUEST['info'])){ ?>
        <?php if($_REQUEST['info'] == "added"){ ?>
        
          <?php echo '<center><div class="post_notify">User data is Updated!!</div></center>'; ?>

          <?php
        }else if($_REQUEST['info'] == "notadded"){ ?>
                  
          <?php echo '<center><div class="post_notify">User data is not Updated!!</div></center>'; ?>

          <?php
        }else if($_REQUEST['info'] == "deleted"){ ?>
                  
          <?php echo '<center><div class="post_notify">User data deleted Successfully!!</div></center>'; ?>

        <?php
        }
      } ?>


    <div class="container">
      
      <?php
        include './partial/navbar.php';
      ?>

        


        <div class="content">

            <input type="checkbox" id="show">  


            <div class="modal_cont">

                <label for="show" class="close">&times</label>
            
                <form action="/Blog_site/addUser.php" method="post">        
                  
                      <div class="head">Add User</div>
                         
                      <div class="form-group">
                          <label class="label">User Name</label>
                          <input type="text" class="form-control" id="username" name="username" required>
                      </div> 
                
                      <div class="form-group">
                          <label class="label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                      </div>   
                  

                      <div class="form-group">
                        
                        <label for="usertype" class="label">Usertype</label>
              
                        <select name="update_usertype" class="form-control">
                          <option value="admin">admin</option>
                          <option value="user">user</option>
                        </select>  

                      </div>
                  

                      <div class="form-btn">
                      
                        <button type="submit" class="btn">Sign Up</button>

                      </div>

                </form> 
            </div>

            <div class="index">

              <div class="post_div">
                
                <a href="#manage_posts" class="index_link">Manage Posts</a>
                <i class="fas fa-edit post_icon"></i>

              </div>

              <div class="user_div">
                   
                <a href="#manage_users" class="index_link">Manage Users</a>
                <i class="fas fa-user-edit post_icon"></i>

              </div>

              <div class="add_post_div">
                
                <a href="create.php" class="index_link">Add Posts</a>
                <i class="fas fa-plus-square post_icon"></i>
                
              </div>

              <div class="add_user_div">
                
                <label for="show" class="index_link">Add User</label>
                <i class="fas fa-user-plus post_icon"></i>

              </div>
              
            </div>

            <section id="manage_posts" class="admin_manage">


              <div class="utable_div">

                <table class="user_table">
                    <thead>

                          <th class="div_cell">No.</th>
                          <th class="div_cell">Image</th> 
                          <th class="div_cell">Title</th> 
                          <th class="div_cell">Author</th> 
                          <th class="div_cell">Operation</th>
                          
                        
                    </thead>

                    <tbody>

                      <?php
                      
                        $obj = new User();
                        $result = $obj->getAdminPost();
                        if(!empty($result)){
                        foreach($result as $row){
                    
                      ?>

                        <tr>
                            <td class="div_cell"><?php echo $row['id']; ?></td>
                            <td class="div_cell"><?php echo "image/".$row['image'];?></td>
                            <td class="div_cell post_row"><?php echo $row['title']; ?></td>
                            <td class="div_cell"><?php echo $row['username']; ?></td>
                    

                            <td class="div_cell">

                              <form action="admin_edit_post.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="edit_btn" class = "btn">Edit</button>
                              </form>

                              <form action="admin_dlt_post.php" method="POST" >
                                <input type="text" hidden value='<?php echo $row['id']?>' name="dlt_id">
                                <button class="btn " name="delete">Delete</button>
                              </form>

                            </td>
                
                        </tr>

                        <?php
                          }
                        }
                        else{
                          echo "No record Found"; 
                        }
                        ?> 
                    </tbody>

                </table>

              </div>

          </section>

          <section id="manage_users" class="admin_manage">
          

            <div class="utable_div">
              <table class="user_table">
                  <thead>
                    <tr>
                        <th class="div_cell">User Id</th>
                        <th class="div_cell">Username</th> 
                        <th class="div_cell">Password</th> 
                        <th class="div_cell">Usertype</th>
                        <th class="div_cell">Edit</th>
                        <th class="div_cell">Delete</th>
                      </tr>
                  </thead>
                
                  <tbody>
                  <?php 
                    $obj = new User();
                    $result = $obj->getAllUser();
                    if(!empty($result)){
                      foreach($result as $row){
                  ?>
                    <tr>
                      <td class="div_cell"><?php echo $row['uid']; ?></td>
                      <td class="div_cell"><?php echo $row['username']; ?></td>
                      <td class="div_cell"><?php echo $row['password']; ?></td>
                      <td class="div_cell"><?php echo $row['usertype']; ?></td>

                      <td class="div_cell">
                        <form action="admin_edit_user.php" method="post">
                          <input type="text" hidden name="edit_id" value="<?php echo $row['uid']; ?>">
                          <button type="submit" name="edit_btn" class = "btn">Edit</button>
                        </form>
                      </td>

                      <td class="div_cell">
                        <form action="admin_dlt_user.php" method="POST">
                          <input type="hidden" name="delete_id" value="<?php echo $row['uid']; ?>">
                          
                          <button name="delete_btn" class = "btn">Delete</button>
                        </form>
                      </td>

                    </tr>
                    <?php
                      }
                    }
                    else{
                      echo "No record Found"; 
                    }
                    ?> 
                  </tbody>
              
              </table>
            </div>
          </section>
                
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



    $(document).ready(function(){
      $(".post_icon").click(function(){
        $(this).siblings('.index_link').toggle();
      });
    });
    

</script>

    
  </body>
</html>

