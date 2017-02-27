<?php
include 'manual/class.user.php';
$idtoken = $_POST['idtoken'];
if ($idtoken) {
	$json = file_get_contents('https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='.$idtoken);
	$obj = json_decode($json);
	$userName = $obj->name;
	$userEmail = $obj->email;
	$userPass = '';
	$userStatus = 'Y';
	$tokenCode = md5(uniqid(rand()));
	$profilePicture = $obj->picture;

	include 'code/dbconfig.php';
	$gmailInsert = "INSERT INTO tbl_users(userName,userEmail,userPass,userStatus,tokenCode,profilePicture) VALUES ('".$userName."','".$userEmail."','".$userPass."','".$userStatus."','".$tokenCode."','".$profilePicture."')";
	$result = mysqli_query($con, $gmailInsert);
	if ($result) {
		echo 'success';
	}else if(mysqli_error($con) == "Duplicate entry '".$userEmail."' for key 'userEmail'") {
		echo $userEmail;
	}else{
		echo "<br>";
		echo "Fail";
	}
}



?>