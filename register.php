<?php
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
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to FizzFlyer<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://localhost/fizzflyerAWS/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Registration";
						
			
			if ($reg_user->send_mail($email,$message,$subject)) {
				$msg = "
				<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Success!</strong>  We've sent an email to $email.
                Please click on the confirmation link in the email to create your account. 
		  		</div>
				";
			}else{
				$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  We are not able to send email.
			  </div>
			  ";
			}
			
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
					<p>Already have a FizzFlyer account? <a href="login.php">Login</a></p>
				</div>
			
	</div>
</div>
</div>
<!--//contact-->
<?php include 'code/footer.php';?>
</body>
</html>