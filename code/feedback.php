<?php

include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['uname'];
	$email = $_POST['uemail'];
	$feedback = test_input($_POST['feedback']);
	$query = "INSERT INTO feedback(name,email,message) VALUES ('".$name."','".$email."','".$feedback."')";
	$result = mysqli_query($con,$query);
	if ($result) {
		$msg = "Thank you for your feedback.";
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


?>