<?php 

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'taskflow';

// Create a database connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if(!$conn){
    die(mysqli_error($conn));
}
session_start();

?>