<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
// Inialize session
session_start();

// Delete certain session
unset($_SESSION['username']);
// Delete all session variables
// session_destroy();

// Jump to login page
header('Location: index.php');

?>