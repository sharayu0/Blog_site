<?php

 session_start();

 session_unset();
 session_destroy();

 setcookie('usercookie','', time()-86400);
 setcookie('passwordcookie',' ', time()-86400);

 header('location:login.php');
?>