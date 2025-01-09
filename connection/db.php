<?php 
define('BASE_URL', 'http://localhost/columbos/');
$servername = "localhost";
$username = "root";        
$password = "";            
$dbname = "columbos"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>