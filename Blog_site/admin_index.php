<?php 
session_start();

include 'dbconnect.php';

if(isset($_SESSION['username'])){
  $uid = $_SESSION['uid'];
  $user = $_SESSION['username'];

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




<div class="main">
  <div class="index">

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
        <form action="user_edit.php" method="post">
          <input type="hidden" name="edit_id" value="<?php echo $row['uid']; ?>">
          <button type="submit" name="edit_btn" class = "btn btn-success">Edit</button>
        </form>
      </td>
      <td class="div_cell">
        <button type="submit" class = "btn btn-danger">Delete</button>
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

</div>



    
  </body>
</html>