<?php
session_start();

include '../classes/autoload.php';

if (isset($_SESSION['username'])) {
  $uid = $_SESSION['uid'];
  $username = $_SESSION['username'];
} else {
  header("location:login.php");
}

$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];


  if ($password == $cpassword) {

    $obj = new Register();
    $result = $obj->user_check($username);

    if (empty($result)) {

      $obj->signup($username, $password);

      $showAlert = true;
      $showAlert = "<div class='alert'>Your Account is Successfully created !!!</div>";
    } else {
      echo "<div class='alert'>Username <span class='dup_entry'>$username</span> already exist.. Try another one!!!!!</div>";
    }
  } else {
    $showError = "<div class='alert'>Password do not match !!!</div>";
  }
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
  <link rel="stylesheet" href="../../css/admin_index.css">
  <link rel="stylesheet" href="../../css/modal.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>Welcome</title>

</head>

<body>

  <div class="container">

    <?php
    include '../partial/navbar.php';
    ?>


    <div class="content">

      <input type="checkbox" id="show">


      <?php
      include '../partial/modal.php';
      ?>

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

          <a href="../post/create.php" class="index_link">Add Posts</a>
          <i class="fas fa-plus-square post_icon"></i>

        </div>

        <div class="add_user_div">

          <label for="show" onclick="on()" class="index_link">Add User</label>
          <i class="fas fa-user-plus post_icon"></i>

        </div>

      </div>

      <?php
      if (isset($_SESSION['status'])) {

      ?>
        <div class="post_notify">
          <?php
          echo $_SESSION['status'];
          ?>
        </div>
      <?php
        unset($_SESSION['status']);
      }
      ?>

      <section id="manage_posts" class="admin_manage">

        <div class="head">
          Manage Blog Posts
        </div>
        <div class="utable_div">



          <table class="user_table">
            <thead>

              <th class="div_cell no" id="white_col">No.</th>
              <th class="div_cell image" id="white_col">Image</th>
              <th class="div_cell title" id="white_col">Title</th>
              <th class="div_cell Author" id="white_col">Author</th>
              <th class="div_cell Operation" id="white_col">Operation</th>


            </thead>

            <tbody>

              <?php

              $obj = new User();
              $result = $obj->getAdminPost();
              if (!empty($result)) {
                foreach ($result as $row) {

              ?>

                  <tr>
                    <td class="div_cell no"><?php echo $row['id']; ?></td>
                    <td class="div_cell image"><?php echo "image/" . $row['image']; ?></td>
                    <td class="div_cell title post_row"><?php echo $row['title']; ?></td>
                    <td class="div_cell Author"><?php echo $row['username']; ?></td>


                    <td class="div_cell Operation">

                      <div class="in_btn">
                        <form action="../post/admin_edit_post.php" method="post">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="edit_btn" class="btn"><i class="fas fa-edit"></i></button>
                        </form>
                      </div>

                      <div class="in_btn">
                        <form action="../post/admin_dlt_post.php" method="POST">
                          <input type="text" hidden value='<?php echo $row['id'] ?>' name="dlt_id">
                          <button class="btn " name="delete"><i class="fas fa-trash"></i></button>
                        </form>
                      </div>

                    </td>

                  </tr>

              <?php
                }
              } else {
                echo "No record Found";
              }
              ?>
            </tbody>

          </table>

        </div>

        <?php

        $obj = new User();
        $pages = $obj->getCount();


        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        ?>


        <div class="page_div">
          <ul class="pagination">

            <?php if ($page > 1) {
              $previous = $page - 1; ?>
              <li>
                <a href="admin_index.php?page=<?= $previous; ?>" class="page_no">&laquo;</a>
              </li>
            <?php } else {
              // $previous = 1;
            ?>
              <li>
                <a href="admin_index.php?page=<?= $page; ?>" class="page_no" hidden>&laquo;</a>
              </li>
            <?php } ?>



            <?php

            for ($i = 1; $i <= $pages; $i++) : ?>
              <li><a href="admin_index.php?page=<?= $i; ?>" class="page_no"><?= $i; ?></a></li>
            <?php endfor;

            ?>

            <?php if ($page < $pages) {
              $nextt = $page + 1; ?>
              <li>
                <a href="admin_index.php?page=<?= $nextt; ?>" class="page_no">&raquo;</a>
              </li>
            <?php } else {
              $nextt = $pages; ?>
              <li>
                <a href="admin_index.php?page=<?= $nextt; ?>" class="page_no" hidden>&raquo;</a>
              </li>
            <?php } ?>

          </ul>
        </div>
      </section>

      <section id="manage_users" class="admin_manage">

        <div class="head">
          Manage Users
        </div>

        <div class="utable_div">



          <table class="user_table">
            <thead>
              <tr>
                <th class="div_cell" id="white_col">User Id</th>
                <th class="div_cell" id="white_col">Username</th>
                <th class="div_cell" id="white_col">Password</th>
                <th class="div_cell" id="white_col">Usertype</th>
                <th class="div_cell" id="white_col">Operation</th>

              </tr>
            </thead>

            <tbody>
              <?php
              $obj = new User();
              $result = $obj->getAllUser();
              if (!empty($result)) {
                foreach ($result as $row) {
              ?>
                  <tr>
                    <td class="div_cell"><?php echo $row['uid']; ?></td>
                    <td class="div_cell"><?php echo $row['username']; ?></td>
                    <td class="div_cell"><?php echo $row['password']; ?></td>
                    <td class="div_cell"><?php echo $row['usertype']; ?></td>

                    <td class="div_cell">

                      <div class="in_btn">
                        <form action="admin_edit_user.php" method="post">
                          <input type="text" hidden name="edit_id" value="<?php echo $row['uid']; ?>">

                          <button type="submit" name="edit_btn" class="btn"><i class="fas fa-user-plus post_icon"></i></button>
                        </form>
                      </div>


                      <div class="in_btn">
                        <form action="admin_dlt_user.php" method="POST">
                          <input type="hidden" name="delete_id" value="<?php echo $row['uid']; ?>">

                          <button name="delete_btn" class="btn"><i class="fas fa-trash"></i></button>
                        </form>
                      </div>

                    </td>

                  </tr>
              <?php
                }
              } else {
                echo "No record Found";
              }
              ?>
            </tbody>

          </table>
        </div>

        <?php

        $obj = new User();
        $pages = $obj->getCountUser();
        $user_page = isset($_GET['user_page']) ? $_GET['user_page'] : 1;

        ?>

        <div class="page_div">
          <ul class="pagination">

            <?php if ($user_page > 1) {
              $pre = $user_page - 1; ?>
              <li>
                <a href="admin_index.php?user_page=<?= $pre; ?>" class="page_no">&laquo;</a>
              </li>
            <?php } else {
              $pre = 1; ?>
              <li>
                <a href="admin_index.php?user_page=<?= $pre; ?>" class="page_no" hidden>&laquo;</a>
              </li>
            <?php } ?>

            <?php

            for ($i = 1; $i <= $pages; $i++) : ?>
              <li><a href="admin_index.php?user_page=<?= $i; ?>" class="page_no"><?= $i; ?></a></li>
            <?php endfor;

            ?>

            <?php if ($user_page < $pages) {
              $next = $user_page + 1; ?>
              <li>
                <a href="admin_index.php?user_page=<?= $next; ?>" class="page_no">&raquo;</a>
              </li>
            <?php } else {
              $next = $pages; ?>
              <li>
                <a href="admin_index.php?user_page=<?= $next; ?>" class="page_no" hidden>&raquo;</a>
              </li>
            <?php } ?>

          </ul>
        </div>
      </section>

      <?php
      include '../partial/footer.php';
      ?>

    </div>

    <div id="overlay">

    </div>

  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="../../js/admin_index.js"></script>


</body>

</html>