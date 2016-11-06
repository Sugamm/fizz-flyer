<?php
session_start();
require_once 'manual/class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$stat ='<li><a  href="login.php"><i class="glyphicon glyphicon-user"> </i>Login</a></li>';
}else{

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stat = '<li>
			<div class="dropdown" >
		  		<button class="dropdown-toggle customdrop" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-user"> </i>'.$row['userName'].'</button>
		  		<ul class="dropdown-menu">
		  			<li><a href="trips.php" style="color:black;"><i class="glyphicon glyphicon-car"> </i>Register Trips</a></li>
		    		<li><a href="logout.php" style="color:black;"><i class="glyphicon glyphicon-log-out"> </i> Logout </a></li>
		  		</ul>
			</div>
		</li>';

}

?>
<!DOCTYPE html>
<html>
<head>
<title>FizzFlyer <?php if ($row['userName']){echo "- ". $row['userName'];} ?></title>
<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--menu-->
<script src="js/scripts.js"></script>
<link href="css/styles.css" rel="stylesheet">
<!--//menu-->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://use.fontawesome.com/21ce1ffc64.js"></script>	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="google-signin-scope" content="profile email">
<script src="https://apis.google.com/js/platform.js" async defer></script>
 <meta name="google-signin-client_id" content="100363814575-v12rqfibkq2t0lcftbgpga7m163ohsc3.apps.googleusercontent.com">   

</head>
<body>
<!--header-->
	<div class="navigation">
			<div class="container-fluid">
				<nav class="pull">
					<ul>
						<li><a  href="index.php">Home</a></li>
						<li><a  href="blog.php">Programs</a></li>
						<li><a href="Register.php">Register </a></li>
						<li><a href="suggestion.php">Suggestion</a></li>
						<li><a href="terms.php">Terms </a></li>
						<li><a href="faqs.php">FAQ </a></li>
						<li><a  href="privacy.php">Privacy</a></li>
						<li><a  href="about.php">About Us</a></li>
						<li><a  href="contact.php">Contact</a></li>
					</ul>
				</nav>			
			</div>
		</div>

<div class="header">
	<div class="container">
		<!--logo-->
			<div class="logo" style="display: inline-flex;">
				<h1><a href="index.php"><img src="images/3.png" class="img-responsive" style="height: 35px;margin: 0 0 0 12px;"  alt="Logo" title="FizzFlyer"></a></h1>
  				<h1 style="color:#fff; text-shadow:-3px 3px 8px #333">Fizzflyer</h1>
  			</div>
		<!--//logo-->
		<div class="top-nav">
			<ul class="right-icons">
				<li><span ><i class="glyphicon glyphicon-phone"> </i>+91 701-050-9355</span></li>
				<?php  echo $stat; ?>
			</ul>
			<div class="nav-icon">
				<div class="hero nav_slide_button" id="hero">
						<a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i> </a>
					</div>	
				<!---
				<a href="#" class="right_bt" id="activator"><i class="glyphicon glyphicon-menu-hamburger"></i>  </a>
			-->
			</div>
		<div class="clearfix"> </div>
				
		<script>
		  function signOut() {
		    var auth2 = gapi.auth2.getAuthInstance();
		    auth2.signOut().then(function () {
		      console.log('User signed out.');
		    });
		  }
		</script>	
	
		</div>
		<div class="clearfix"> </div>
		</div>	
</div>