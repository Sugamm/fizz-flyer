<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
require_once 'manual/class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
	$stmt->execute(array(":uid"=>$id,":token"=>$code));
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() == 1)
	{
		if(isset($_POST['btn-reset-pass']))
		{
			$pass = $_POST['pass'];
			$cpass = $_POST['confirm-pass'];
			
			if($cpass!==$pass)
			{
				$msg = "<div class='alert alert-block'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Password Doesn't match. 
						</div>";
			}
			else
			{
				$password = md5($cpass);
				$stmt = $user->runQuery("UPDATE tbl_users SET userPass=:upass WHERE userID=:uid");
				$stmt->execute(array(":upass"=>$password,":uid"=>$rows['userID']));
				
				$msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Password Changed.
						</div>";
				header("refresh:5;login.php");
			}
		}	
	}
	else
	{
		$msg = "<div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				No Account Found, Try again
				</div>";
				
	}
	
	
}
include 'code/head.php';
?>
<div class=" banner-buying">
	<div class=" container">
		<h3><span>Rese</span>t Password</h3> 
		<div class="clearfix"> </div>     		
	</div>
</div>
		<div class="login-right">
	<div class="container">
		<div class="login-top">
				
				<div class="form-info">
					<div class='alert alert-success'>
						<strong>Hello !</strong>  <?php echo $rows['userName'] ?> you are here to reset your forgetton password.
					</div>
			        <form class="form-signin" method="post">
			       
			        <?php
			        if(isset($msg))
					{
						echo $msg;
					}
					?>
			        <input type="password" class="input-block-level" placeholder="New Password" name="pass" required />
			        <input type="password" class="input-block-level" placeholder="Confirm New Password" name="confirm-pass" required />
			     	<hr />
			        <button class="btn btn-large btn-primary" type="submit" name="btn-reset-pass">Reset Your Password</button>
			        
			      </form>
				</div>
				</div>
			
	</div>
</div>
</div>
<!--//contact-->
    <?php include 'code/footer.php';?>
  </body>
</html>