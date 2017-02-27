<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
session_start();
require_once 'manual/class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$stat ='<li data-toggle="modal" data-target="#myModal"><a  href="#"><i class="glyphicon glyphicon-user"> </i>Login</a></li>';
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
<!-- 
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
 -->
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
						<li><a  href="index.php#services">Service</a></li>
						<li><a href="terms.php">Terms & policies </a></li>
						<li><a  href="contact.php">About Us</a></li>
						<li><a  href="contact.php">Contact</a></li>
					</ul>
				</nav>			
			</div>
		</div>

<div class="header">
	<div class="container">
		<!--logo-->
			<div class="logo" style="display: inline-flex;">
				<h1><a href="index.php"><img src="images/headerLogo.png" class="img-responsive" style="height: 35px;margin: 0 0 0 12px;"  alt="Logo" title="FizzFlyer"></a></h1>
  				<h1 style="color:#fff; text-shadow:-3px 3px 8px #333"><a href="index.php">fizzflyer</a></h1>
  			</div>
		<!--//logo-->
		<div class="top-nav">
			<ul class="right-icons">
				<li><span ><i class="glyphicon glyphicon-phone"> </i>+91 988-420-4686</span></li>
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
			<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
					    <div class="modal-body">
					      <div class="login-right">
							<h3>Login</h3>
							<div class="login-top">
								<?php 
								if(isset($_GET['inactive']))
								{
									?>
						            <div class='alert alert-error'>
										<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it.
										<strong><?php echo $msg;?> </strong>
									</div>
						            <?php
								}
								?>
								<div class="form-info" style="padding:0;">
							        <form class="form-signin" method="post" action="login.php">
							        	<div class='alert alert-error'>
											<strong><?php echo $msg;?></strong>
										</div>
							       		<?php
									        if(isset($_GET['error']))
											{
												?>
									            <div class='alert alert-success'>
													<strong>Wrong Details!</strong> 
												</div>
									            <?php
											}
										?>	
									
										<input type="email" class="text" placeholder="Email address" name="txtemail" required>
										<input type="password"  placeholder="Password" placeholder="Password" name="txtupass" required>
										 <label class="hvr-sweep-to-right">
								           	<input type="submit" value="Submit" name="btn-login">
								           </label>
								         <a href="fpass.php">Lost your Password ? </a>
									</form>
								</div>
							</div>
						  </div>
					   </div>
				      <div class="modal-footer">
				        <div class="create">
							<h4>New To FizzFlyer?</h4>
							<a class="hvr-sweep-to-right" href="register.php">Create an Account</a>
							<div class="clearfix"> </div>
						</div>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- //model -->	
	
		</div>
		<div class="clearfix"> </div>
		</div>	
</div>