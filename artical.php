<?php  

include 'code/dbconfig.php';
$selectquery = "SELECT * FROM details WHERE id='".$_GET['id']."'";
$query = mysqli_query($con, $selectquery) or die("ERROR 404 : Access Denied ERR_DATABASE_ERROR::CONNECTION FAILURE");
if (mysqli_num_rows($query) > 0) {
	$rowblog = mysqli_fetch_array($query) or die(mysqli_error($con)."ERROR 404 : Access Denied ERR_FETCH_PROBLEM::CONNECTION FAILURE");
}else{
	header("location:404.php");
}
include 'code/head.php';
?>
<!--//-->	
<div class=" banner-buying"></div>
<!--//header-->
<!---->

<div class="container">
	
	
	<div class="buy-single-single">
		<div class="col-md-9 single-box">
		<div class="beautiful">
			<h2 style="color:#ee6e0d; padding-bottom:10px"><?php echo $rowblog['title'];?></h2>
		</div>		
        <div class=" buying-top">	
			<img src=<?php echo "uploads/".$rowblog['imageName'];?> class="img-responsive" />
		</div>
		<div class="buy-sin-single">
			<div class="col-sm-5 middle-side immediate">
					     <h4>Essential Details</h4>
					     <p><span class="details">Min. Person </span>: <span class="two"> <?php echo $rowblog['peopleRegistered'];?></span></p>
					     <p><span class="details1">Starting Place </span>:<span class="two"><?php echo $rowblog['startPlace'];?></span></p>
					     <p><span class="details2">Date</span>: <span class="two"><?php echo $rowblog['startDate'];?></span></p>
					     <p><span class="details3">Ends  </span>:<span class="two"> <?php echo $rowblog['endPlace'];?></span></p>
						 <p><span class="details4">Date</span> : <span class="two"><?php echo $rowblog['endDate'];?></span></p>
						 <p><span class="details5">Price </span>:<span class="two"> <?php echo $rowblog['price'];?></span></p>				 
						<div class="   right-side">
							 <a href="register-trips.php" class="hvr-sweep-to-right more" >Register Now For Trip!</a>     
					 	</div>
					</div>
				 <div class="col-sm-7 buy-sin">
				 	<h4>Description</h4>
				 	<p><?php echo htmlspecialchars_decode($rowblog['description']);?></p>
				 </div>
			<div class="clearfix"> </div>
		</div>
					<!--  <div class="map-buy-single">
					 	<h4>Neighborhood Info</h4>
						 	<div class="map-buy-single1">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37494223.23909492!2d103!3d55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x453c569a896724fb%3A0x1409fdf86611f613!2sRussia!5e0!3m2!1sen!2sin!4v1415776049771"></iframe>
							
						</div>
					</div> -->
					<!-- <div class="video-pre">
						<h4>Video Presentation</h4>
						<iframe src="https://player.vimeo.com/video/63931426"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div> -->
		</div>
	

			
		
		<div class="col-md-3">
			<div class="single-box-right right-immediate">
		     	<h4>Featured Trips</h4>
				<div class="single-box-img ">
					<div class="box-img">
						<a href="single.html"><img class="img-responsive" src="images/sl.jpg" alt=""></a>
					</div>
					<div class="box-text">
						<p><a href="single.html">Chennai to goa</a></p>
						<a href="single.html" class="in-box">More Info</a>
					</div>
					<div class="clearfix"> </div>
				</div>
		 </div>
			
	  </div>
		<div class="clearfix"> </div>
		</div>
	</div>

<!---->
<!--project-->
<div class="container">
	<div class="future">
		<h3 >Featured Projects</h3>
			<div class="content-bottom-in">
					<ul id="flexiselDemo1">			
						<li><div class="project-fur">
								<a href="#" ><img class="img-responsive" style="height:200px;" src="images/ooty.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <span class="fur-money">Date : 27 Aug 2016</span>
		                                    <h6 class="fur-name"><a href="#">Ooty Trip</a></h6>
		                                   	<span>Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<span>Book Now!</span>
			                             </div>
									</div>					
							</div></li>
							<li><div class="project-fur">
								<a href="#" ><img class="img-responsive" style="height:200px;" src="images/kodai.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <span class="fur-money">Trip + Industrial visit </span>
		                                    <h6 class="fur-name"><a href="#">Kodaikanal Trip</a></h6>
		                                   	<span>Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<span>Coming Soon!</span>
			                             </div>
									</div>					
							</div></li>
								<li><div class="project-fur">
								<a href="#" ><img class="img-responsive" style="height:200px;" src="images/bangalore.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <span class="fur-money">Trip + Industrial visit </span>
		                                    <h6 class="fur-name"><a href="#">Bangalore Trip</a></h6>
		                                   	<span>Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<span>Coming Soon!</span>
			                             </div>
									</div>					
							</div></li>
							<li><div class="project-fur">
								<a href="#" ><img class="img-responsive" style="height:200px;" src="images/goa.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <span class="fur-money">Trip + Industrial visit </span>
		                                    <h6 class="fur-name"><a href="#">Goa Trip</a></h6>
		                                   	<span>Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<span>Coming Soon!</span>
			                             </div>
									</div>					
							</div></li>
							<li><div class="project-fur">
								<a href="#" ><img class="img-responsive" style="height:200px;" src="images/himachal.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <span class="fur-money">Industrial visit </span>
		                                    <h6 class="fur-name"><a href="#">Himachal Trip</a></h6>
		                                   	<span>Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<span>Coming Soon!</span>
			                             </div>
									</div>					
							</div></li>
						</ul>
					<script type="text/javascript">
						$(window).load(function() {
							$("#flexiselDemo1").flexisel({
								visibleItems: 4,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,    		
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
						    	responsiveBreakpoints: { 
						    		portrait: { 
						    			changePoint:480,
						    			visibleItems: 1
						    		}, 
						    		landscape: { 
						    			changePoint:640,
						    			visibleItems: 2
						    		},
						    		tablet: { 
						    			changePoint:768,
						    			visibleItems: 3
						    		}
						    	}
						    });
						    
						});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
</div>
		
<!--footer-->
<?php include 'code/footer.php';?>
<!--//footer-->
</body>
</html>