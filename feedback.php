<?php 
	include 'code/feedback.php';
	include 'code/head.php';
?>

<div class=" banner-buying">
	<div class="container">
		<h3><span>Feedb</span>ack</h3>
	</div>
</div>
<!--//header-->
<!--contact-->
<div class="feedback">
	<div class="container">
		<div class="feedback-top">
			<form method="post" action="#">
				<?php if ($msg) {
					echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>"'.$msg .'" </div> ';
				}elseif($err){
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>"'.$err .'" </div> ';
				}?>
				
				<input type="text"  placeholder="Name" name="uname" required="">
				<input type="text"  placeholder="Email" name="uemail" required="" >
				<textarea  placeholder="Feedback" name="feedback" requried=""></textarea>
				 <label class="hvr-sweep-to-right">
	           	<input type="submit" value="Send Feedback">
	           </label>
			</form>
		</div>
	</div>
</div>
<!--//contact-->
<!--footer-->
<?php include 'code/footer.php';?>
<!--//footer-->
</body>
</html>