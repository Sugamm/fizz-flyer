<?php 
	error_reporting(E_ERROR | E_PARSE);	
	$admin = "admin";
	$admin_pw = "Sugam0030";

	session_start();
	
	if (isset($_POST['user']) && isset($_POST['pass'])) {

		$username = $_POST['user'];
		$password = $_POST['pass'];
		if (($username == $admin) && ($password ==$admin_pw)) {
			$_SESSION['admin'] = $username;
			$_SESSION['admin_pw'] = $password;
		}
		header("Location: admin.php");
		exit();
	} 
	elseif ((isset($_SESSION['admin']) && isset($_SESSION['admin_pw']) &&$_SESSION['admin'] == $admin && $_SESSION['admin_pw'] == $admin_pw ) || (getenv("REMOTE_ADDR")=="")) {

	} else {
		
	?>
	<html>
	<head>
	<title>FizzFlyer Admin Login</title>	
	</head>

	<body>
		<center>
			<br><br>
			<fieldset style="width:30%;margin-top:10%;padding-top:2%;"><legend><h1><b>FizzFlyer Admin Login</b></h1></legend>
				<form action="index.php" method="post">
					<table>
						<tr>
							<td>Username</td>
							<td><input type="text" name="user"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="pass"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Log in" id="submit"></td>
						</tr>
						<tr>
							<td></td>
							<td>Forget Password <a href="#">Contact Us</a></td>
						</tr>
					</table>
				</form>
			</fieldset>
		</center>
	</body>
	</html>
	<?php 
	exit();
}


$settings_dir = "../settings";
include "$settings_dir/database.php";

?>