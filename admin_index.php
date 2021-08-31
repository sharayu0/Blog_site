<?php 
session_start();

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

    <link rel="stylesheet" href="navbar.css" >
    <link rel="stylesheet" href="admin_index.css" >
  <title>Welcome</title>

  </head>

  <body>
    <?php
    include 'navbar.php';
    ?>


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


<div class="main">
  <div class="index">
    <a href="#manage_posts">Manage Posts</a>
    <a href="#manage_users">Manage Users</a>


  </div>


  <section id="manage_users">

<?php 
$sql = "SELECT b.id, b.title, u.username FROM blog_data b JOIN users u ON b.user_id = u.uid ORDER BY b.id";
$result = mysqli_query($conn, $sql);
?>


<table class="user_table">
  <thead>
    <tr>
        <th>No.</th>
        <th>Title</th> 
        <th>Author</th> 
        <th>Edit</th>
        <th>Delete</th>
      </tr>
  </thead>
<tbody>
  <?php

  if(mysqli_num_rows($result)>0)
  {
    while($row = mysqli_fetch_assoc($result)){
  ?>
  <tr>
    <td class="div_cell"><?php echo $row['id']; ?></td>
    <td class="div_cell"><?php echo $row['title']; ?></td>
    <td class="div_cell"><?php echo $row['username']; ?></td>
    

    <td class="div_cell">
      <form action="admin_edit_post.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
        <button type="submit" name="edit_btn" class = "btn btn-success">Edit</button>
      </form>
    </td>
 
    <td class="div_cell">
      <form action="admin_dlt_post.php" method="POST" >
        <input type="text" hidden value='<?php echo $row['id']?>' name="dlt_id">
        <button class="btn btn-danger" name="delete">Delete</button>
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
</section>




    <section id="manage_users">

      <?php 
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      ?>


      <table class="user_table">
        <thead>
          <tr>
              <th>User Id</th>
              <th>Username</th> 
              <th>Password</th> 
              <th>Usertype</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
        </thead>
      <tbody>
        <?php 
        if(mysqli_num_rows($result)>0)
        {
          while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
          <td class="div_cell"><?php echo $row['uid']; ?></td>
          <td class="div_cell"><?php echo $row['username']; ?></td>
          <td class="div_cell"><?php echo $row['password']; ?></td>
          <td class="div_cell"><?php echo $row['usertype']; ?></td>

          <td class="div_cell">
            <form action="admin_edit_user.php" method="post">
              <input type="text" hidden name="edit_id" value="<?php echo $row['uid']; ?>">
              <button type="submit" name="edit_btn" class = "btn btn-success">Edit</button>
            </form>
          </td>

          <td class="div_cell">
            <form action="admin_dlt_user.php" method="POST">
              <input type="hidden" name="delete_id" value="<?php echo $row['uid']; ?>">
              
              <button name="delete_btn" class = "btn btn-danger">Delete</button>
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
    </section>
  </div>


    
  </body>
</html>