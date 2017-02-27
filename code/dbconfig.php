<?php 
//msqli_extation
$host = "localhost";
$user = "root";
$password = "password";
$database = "fizzflyer";

// $host = "LOCALHOST";
// $user = "root";
// $password = "password";
// $database = "fizzflyer";

$con = @mysqli_connect($host,$user,$password,$database) or die('<h1 style="text-align:center">ERROR : 404 Connection Error</h1>');

?>