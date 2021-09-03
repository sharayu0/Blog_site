<?php

include 'dbconnect.php';
$obj = new Database();
$obj->insert('users',['username'=>'$username','password'=>'$password']);
?>



