<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
 include 'code/head.php';
session_start();
require_once 'manual/class.user.php';
include 'code/dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$name = test_input($_POST['tname']);
		$email = test_input($_POST['temail']);
		$phone = test_input($_POST['tphone']);
		$tripName = test_input($_POST['tripName']);
		$query = "INSERT INTO registerdTrips(tripName,phone,userId) VALUES ('".$tripName."','".$phone."','".$row['userID']."')";
		$result = mysqli_query($con,$query);
		if ($result) {
			$msg = "Thank you for registeration, we'll reach you soon!!.";
		}else{
			$err = 'ERROR : 404 Query Execution Error';
		}	
}

function test_input($data) {
  	$data = preg_replace("/'/", '', $data); 
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	// $user_login->redirect('register-trips.php');
}else{
	$user_login->redirect('login.php');
}

?>

<!--//-->	
<div class=" banner-buying"></div>
<!--//header-->
<!--contact-->
<div class="feedback">
	<div class="container">
		<h3>Regisration Form</h3>
		<div class="feedback-top">
			<form method="post" action="#">
				<?php if ($msg) {
					echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>"'.$msg .'" </div> ';
				}elseif($err){
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>"'.$err .'" </div> ';
				}elseif ($error1) {
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>"'.$error1 .'" </div> ';
				}
				?>
				
				<input type="text"  placeholder="Name" name="tname" required value="<?php echo $row['userName'];?>">
				<input type="text"  placeholder="Email" name="temail" required value="<?php echo $row['userEmail'];?>">
				<input type="text"  placeholder="Contact Number" name="tphone" required="" max="12">
				<input type="text"  placeholder="Trip Name Ex. Ooty Trip" name="tripName" required="">
				 <label class="hvr-sweep-to-right">
	           		<input type="submit" value="Register Trip">
	           </label>
			</form>
		</div>
	</div>
</div>
<!--//contact-->
<?php include 'code/footer.php';?>
</body>
</html>