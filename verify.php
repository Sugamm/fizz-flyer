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
	
	$statusY = "Y";
	$statusN = "N";
	
	$stmt = $user->runQuery("SELECT userID,userStatus FROM tbl_users WHERE userID=:uID AND tokenCode=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		if($row['userStatus']==$statusN)
		{
			$stmt = $user->runQuery("UPDATE tbl_users SET userStatus=:status WHERE userID=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();	
			
			$msg = "
		           <div class='alert alert-success'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>WoW !</strong>  Your Account is Now Activated : <a href='index.php?verify'>Login here</a>
			       </div>
			       ";	
		}
		else
		{
			$msg = "
		           <div class='alert alert-error'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>sorry !</strong>  Your Account is allready Activated : <a href='index.php?verify'>Login here</a>
			       </div>
			       ";
		}
	}
	else
	{
		$msg = "
		       <div class='alert alert-error'>
			   <button class='close' data-dismiss='alert'>&times;</button>
			   <strong>sorry !</strong>  No Account Found : <a href='register.php'>Signup here</a>
			   </div>
			   ";
	}	
}

include 'code/head.php';
?>
<!--//-->	
<div class=" banner-buying">
	<div class="container">
		<h3><span>Verifica</span>tion</h3> 
	</div>
</div>
<!--//header-->
    
    <div class="form-info">
		<div class="container" style="text-align:center;font-size:30px; padding:100px 0px;">
			<?php 
				if(isset($msg)) { echo $msg; } 
			?>
    	</div> <!-- /container -->
	</div>
	<script type="text/javascript">
		setTimeout(function () {
			   window.location.href= 'index.php?verify'; // the redirect goes here
			},5000); 
	</script>
    <?php include 'code/footer.php';?>
 
  </body>
</html>