<?php

include 'code/dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST['contactname']);
	$email = test_input($_POST['contactemail']);
	$subject = test_input($_POST['contactsubject']);
	$message = test_input($_POST['contactmessage']);
	$query = "INSERT INTO contact(name,email,subject,message) VALUES ('".$name."','".$email."','".$subject."','".$message."')";
	$result = mysqli_query($con,$query);
	if ($result) {
		$msg = "Thank you for Contact Us.";
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

<?php include 'code/head.php';?>

<!--//-->	
<div class=" banner-buying"></div>
<!--//header-->
<!--contact-->
<div class="contact">
	<div class="container">
		<h3>Contact</h3>
	 <div class="contact-top">
		<div class="col-md-6 contact-top1">
		  <h4 > Info</h4>
          <p class="text-contact">Fizzflyer is event or trips orgranising company which includes worlds best pricing and well organised. We don't treat people as our customer, we treat people as our family member.</p>
		  <div class="contact-address">
		  	<div class="col-md-6 contact-address1">
			  	 <h5>Address</h5>
	             <p><b>FizzFlyer</b></p>
	             <p>Near Nandivaram, Guduvancherry,</p>
	             <p>Chennai-603202 Tamil Nadu.</p>	
		  	</div>
		  	<div class="col-md-6 contact-address1">
			  	  <h5>Email Address </h5>
	             <p>Manager :<a href="mailto:manager@fizzflyer.in"> manager@fizzflyer.in</a></p>
	             <p>Support :<a href="mailto:support@fizzflyer.in"> support@fizzflyer.in</a></p>
		  	</div>
		  	<div class="clearfix"></div>
		  </div>
		  <div class="contact-address">
		  	<div class="col-md-6 contact-address1">
			  	 <h5 >Phone </h5>
	             <p>Landline : 044 kuch bhi</p>
	             <p>Mobile : +91 90036 53661</p>
	        </div>
		  	<div class="clearfix"></div>
		  </div>
		</div>
		<div class="col-md-6 contact-right">
	
            <form method="post" action="#">
            	<?php if ($msg) {
					echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>"'.$msg .'" </div> ';
				}elseif($err){
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>"'.$err .'" </div> ';
				}?>
               <input type="text"  placeholder="Name" name="contactname" required="">
			   <input type="text" placeholder="Email" name="contactemail" required="">
			   <input type="text" placeholder="Subject" name="contactsubject" required="">
			   <textarea  placeholder="Message" name="contactmessage" requried=""></textarea>
			   <label class="hvr-sweep-to-right">
	           <input type="submit" value="Submit">
	           </label>
			</form>
		</div>
		<div class="clearfix"> </div>
</div>
	</div>
	<div class="map">
	     <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978">  -->
	     <iframe src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJr1_DNw33UjoRF_jI8OzoCxU&key=AIzaSyCr3ZO6vj_EqxevTl82tqxB8f_MiSJHn2w"> 

	     	<!--  -->
	     </iframe>
	    </div>
</div>
<!--//contact-->
<?php include 'code/footer.php';?>
</body>
</html>