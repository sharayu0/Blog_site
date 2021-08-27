<?php 

// error reporting
$conf['error_level'] = 2;
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('max_execution_time', '0');

// database connection
$server = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn){
//     echo "success";
// }
// else{
    die("error" . mysqli_connect_error());
}

?>