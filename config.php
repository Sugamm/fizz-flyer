<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '1743528282592686'; //Facebook App ID
$appSecret = 'ae95a5f391aaec57a9d3fe6bcfe53e5b'; // Facebook App Secret
$homeurl = 'http://fizzflyer.in/login.php';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>