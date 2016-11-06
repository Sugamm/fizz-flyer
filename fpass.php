<?php
session_start();
require_once 'manual/class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['userID']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
				   Hello , $email
				   <br /><br />
				   We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
				   <br /><br />
				   Click Following Link To Reset Your Password 
				   <br /><br />
				   <a href='http://localhost/fizzflyer/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
				   <br /><br />
				   thank you :)
				   ";
		$subject = "Password Reset";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  this email not found. 
			    </div>";
	}
}
include 'code/head.php';
?>
<!--//-->	
<div class=" banner-buying">
	<div class=" container">
	<h3><span>Forgo</span>t Password</h3> 
	<!---->
	<div class="menu-right">
		 <ul class="menu">
			<li class="item1"><a href="#"> Menu<i class="glyphicon glyphicon-menu-down"> </i> </a>
			<ul class="cute">
				<li class="subitem1"><a href="index.php">Home </a></li>
				<li class="subitem2"><a href="contact.php">Contact </a></li>
				<li class="subitem3"><a href="Register.php">Register </a></li>
				<li class="subitem1"><a href="suggestion.php">Suggestion</a></li>
				<li class="subitem2"><a href="terms.php">Terms </a></li>
				<li class="subitem3"><a href="faqs.php">FAQ </a></li>
			</ul>
		</li>
		</ul>
	</div>
	<div class="clearfix"> </div>
		<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
      		
	</div>
</div>
		<div class="login-right">
	<div class="container">
		<h3>Lost your Password</h3>
		<div class="login-top">
				
				<div class="form-info">
						 <form class="form-signin" method="post">
 
        	<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
				Please enter your email address. You will receive a link to create a new password via email.!
				</div>  
                <?php
			}
			?>
        				<input type="text" class="text" placeholder="Email address" name="txtemail" required>
						<label class="hvr-sweep-to-right">
				           	<input type="submit" value="Submit" name="btn-submit">
				        </label>
					</form>
					<div class="create">
						<h4>New To FizzFlyer?</h4>
						<a class="hvr-sweep-to-right" href="register.php">Create an Account</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				</div>
			
	</div>
</div>
</div>
<!--//contact-->
<?php include 'code/footer.php';?>
     

    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>