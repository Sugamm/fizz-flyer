<!--footer-->
<?php
if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = '
						<html>
							<head>
							<title>Hello $uname,</title>
								<style type="text/css">
								.btn {
								    padding: 14px 24px;
								    border: 0 none;
								    font-weight: 700;
								    letter-spacing: 1px;
								    text-transform: uppercase;
								}
								 
								.btn:focus, .btn:active:focus, .btn.active:focus {
								    outline: 0 none;
								}
								 
								.btn-primary {
								    background: #0099cc;
								    color: #ffffff;
								}
								</style>
								</head>
							<body style="text-align:center;">
							<h3>Welcome to FizzFlyer</h3>
								<p>Hello '.$uname.',</p>
								<p>To complete your registration  please , just click following link<p>
								
								<a href="http://fizzflyer.in/verify.php?id='.$id.'&code='.$code.'" class="btn btn-primary">Click HERE to Activate</a>
								
								<p>Thankyou. <br> Keep in touch with <a href="http://fizzflyer.in">Fizzflyer.in</a>.</p>
							</body>
							</html>
						';
						
			$subject = "Confirm Registration";
						
			
			$reg_user->send_mail($email,$message,$subject);
				$msg = "
				<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Success!</strong>  We've sent an email to $email.
                Please click on the confirmation link in the email to create your account. 
                <br> <b style='color:red'>If it is not appear in indox section then check it in Span section.</b>
		  		</div>
				";
			
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>
<div class="footer">
	<div class="container">
		<div class="footer-top-at">
			<div class="col-md-3 amet-sed">
				<h4>Our Company</h4>
				<ul class="nav-bottom">
					<li><a href="contact.php">About Us</a></li>
					<li><a href="terms.php">Terms & Conditions</a></li>
					<li><a href="#">Privacy Policy</a></li>	
					<li><a href="blog.php">Blog</a></li>
					
				</ul>	
			</div>
			<div class="col-md-3 amet-sed ">
				<h4>Property Services</h4>
				   <ul class="nav-bottom">
						<li><a href="terms.php">Sevices</a></li>
						<li><a href="terms.php">Transportation</a></li>
						<li data-toggle="modal" data-target="#myModal"><a href="#">Login</a></li>
						<li data-toggle="modal" data-target="#signup"><a href="#">Sign Up</a></li>	
					</ul>	
			</div>
			<div class="col-md-3 amet-sed">
				<h4>Customer Support</h4>
				<p>Mon-Fri, 5PM-10PM </p>
				<p>Sat-Sun, 8AM-5PM </p>
				<p>+91 701-050-9355</p>
					<ul class="nav-bottom">
						<li><a href="contact.php">Contact</a></li>
						<li><a href="faqs.php">Frequently Asked Questions</a></li>
						<li><a href="suggestion.php">Make a Suggestion</a></li>
					</ul>	
			</div>
			<div class="col-md-3 amet-sed ">
				<h4>Work With Us</h4>
					<ul class="nav-bottom">
						<li><a href="#">Business Development</a></li>
						<li><a href="#">Affiliate Programs</a></li>
						<li><a href="#">Sitemap</a></li>
						<li><a href="career.html">Careers</a></li>
						<li><a href="feedback.php">Feedback</a></li>	
					</ul>
					
					<ul class="social">
						<li><a href="#"><i> </i></a></li>
						<li><a href="#"><i class="gmail"> </i></a></li>
						<li><a href="#"><i class="twitter"> </i></a></li>
						<li><a href="#"><i class="camera"> </i></a></li>
					</ul>
			</div>
		<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="col-md-12 footer-class" style="text-align: center;">
				<p >©fizzflyer 2017 | All Rights Reserved | Developed with &#10084; by Sugam Malviya</p>
			</div>
		<div class="clearfix"> </div>
	 	</div>
	</div>
</div>
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
				<a class="hvr-sweep-to-right" href="#" data-toggle="modal" data-target="#signup">Create an Account</a>
				<div class="clearfix"> </div>
			</div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- //model -->
		<!-- Modal -->
				<div id="signup" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
					    <div class="modal-body">
					      <div class="login-right">
							<h3>Sign Up</h3>
							<div class="login-top">
								<div class="form-info">
									<?php if(isset($msg)) echo $msg;  ?>
									<form  method="post">
										<input type="text" placeholder="Username" name="txtuname" required >
										<input type="email" placeholder="Email address" name="txtemail" required>
										<input type="password"  placeholder="Password" name="txtpass" required>
										
										 <label class="hvr-sweep-to-right">
								           	<input type="submit" value="Sign Up" name="btn-signup">
								           </label>
									</form>
								</div>
							</div>
						  </div>
					   </div>
				      <div class="modal-footer">
				        <div class="create">
							<h4>Already have a FizzFlyer account?</h4>
							<a class="hvr-sweep-to-right" href="#" data-toggle="modal" data-target="#myModal">Login</a>
							<div class="clearfix"> </div>
						</div>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- //model -->
<!--//footer-->