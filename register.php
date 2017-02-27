<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
session_start();
require_once 'manual/class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('index.php');
}


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
include 'code/head.php';
?>

<!--//-->	
<div class=" banner-buying"></div>
<!--//header-->
<!--contact-->
<div class="login-right">
	<div class="container">
		<h3>Register</h3>
		<div class="login-top">
				<ul class="login-icons">
					<!-- <li><a href="#" ><i class="facebook"> </i><span>Facebook</span></a></li>
					<li><a href="#" class="twit"><i class="twitter"></i><span>Twitter</span></a></li> -->
					<!-- <li><a href="#" class="go"><i class="google"></i><span>Google +</span></a></li>
					<li><a href="#" class="in"><i class="linkedin"></i><span>Linkedin</span></a></li> -->
					<div class="clearfix"> </div>
				</ul>
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
					<p>Already have a FizzFlyer account?<span data-toggle="modal" data-target="#myModal"> <a href="#" >Login</a></span></p>
				</div>
			
	</div>
</div>
</div>
<!--//contact-->
<?php include 'code/footer.php';?>
</body>
</html>