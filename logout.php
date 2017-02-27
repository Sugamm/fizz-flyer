<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
session_start();
require_once 'manual/class.user.php';
$user = new USER();

if(!$user->is_logged_in())
{
	$user->redirect('index.php');
}

if($user->is_logged_in()!="")
{
	$user->logout();	
	$user->redirect('index.php');
}
?>