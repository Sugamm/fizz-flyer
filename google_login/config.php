<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '100363814575-1442odss4upule7vqq21a02lqvjov3jl.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'dRQAX8OnqMX0dlSkI6jGJQn0'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/fizzflyer/';  //return url (url to script)
$homeUrl = 'http://localhost/fizzflyer/';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to fizzflyer.in');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>