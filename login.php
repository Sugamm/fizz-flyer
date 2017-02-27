<?php 
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
session_start();
require_once 'manual/class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	if($user_login->login($email,$upass))
	{
		$user_login->redirect('login.php');
	}
}
?>

