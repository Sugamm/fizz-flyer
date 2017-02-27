<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
session_start();

require_once 'manual/class.user.php';
	$user_home = new USER();

	

if(!$user_home->is_logged_in())
{	
	$stat ='<li data-toggle="modal" data-target="#myModal"><a  href="#" ><i class="glyphicon glyphicon-user"> </i>Login</a></li>';

}else{
	$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
	$stmt->execute(array(":uid"=>$_SESSION['userSession']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stat = '<li>
			<div class="dropdown">
		  		<button class="dropdown-toggle customdrop" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-user"> </i>'.$row['userName'].'</button>
		  		<ul class="dropdown-menu" style="padding:3px 0px; text-align:center;">
		    		<li><a href="register-trips.php" style="color:black;"><i style="font-size:18px;"> &#x270D; </i> Register Trips</a></li>
		    		<li><a href="logout.php" style="color:black;"><i class="glyphicon glyphicon-log-out"> </i>Logout</a></li>
		  		</ul>
			</div>
		</li>';	
	
 }
?>
<!-- /*
Author : Sugam Malviya
code url : https://github.com/Sugamm/
*/
 --><!DOCTYPE html>
<html>
<head>
<title>FizzFlyer</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--menu-->
<script src="js/scripts.js"></script>
<link href="css/styles.css" rel="stylesheet">
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all" />
<!--//menu-->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://use.fontawesome.com/21ce1ffc64.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=""/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- slide -->
<script src="js/responsiveslides.min.js"></script>
   <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      }); 
    });
  </script>
  <style type="text/css">
  .more{
  	background:transparent;
  	border-radius:0px;
  }
  a .more{
  	color: #fff;
  	text-decoration: none;
  }
  a:hover .more{
  	background: ;
  }
  </style>
</head>
<body >
<!--header-->
	<div class="navigation">
			<div class="container-fluid">
				<nav class="pull">
					<ul>
						<li><a  href="index.php">Home</a></li>
						<li><a  href="#services">Service</a></li>
						<li><a href="terms.php">Terms & policies </a></li>
						<li><a  href="contact.php">About Us</a></li>
						<li><a  href="contact.php">Contact</a></li>
					</ul>
				</nav>			
			</div>
		</div>

<div class="header">
	<div class="container">
		<!--logo-->
			<div class="logo" style="display: inline-flex;">
				<h1><a href="index.php"><img src="images/headerLogo.png" class="img-responsive" style="height: 35px;margin: 0 0 0 12px;"  alt="Logo" title="FizzFlyer"></a></h1>
  				<h1 style="color:#fff; text-shadow:-3px 3px 8px #333"><a href="index.php">fizzflyer</a></h1>
  			</div>
		<!--//logo-->
		
		<div class="top-nav">
			<ul class="right-icons">
				<li><span ><i class="glyphicon glyphicon-phone"> </i>+91 988-420-4686</span></li>
				<?php echo $stat;?>
			</ul>
			
					<div class="nav-icon">
						<div class="hero nav_slide_button" id="hero">
								<a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i> </a>
							</div>	
						<!--
						<a href="#" class="right_bt" id="activator"><i class="glyphicon glyphicon-menu-hamburger"></i>  </a>
					-->
					</div>
			</div>
		<div class="clearfix"> </div>
	</div>	
</div>
<!--//-->	
	<div class=" header-right">
		<div class=" banner">
			 <div class="slider">
			    <div class="callbacks_container">
			      <ul class="rslides" id="slider">		       
					 <li>
			          	 <div class="banner1">
			           		<div class="caption">
					          	<h3><span>Wher</span>e the Journey Begins</h3>
					          	<p>Discover your next great adventure, become an explorer to get started!</p>					          	
							</div>
			          	</div>
			         </li>
					 <li>
			          	 <div class="banner2">
			           		<div class="caption">
					          	<h3><span>Disco</span>ver Fantastic Place</h3>
					          	<p>We offer a variety of services and options</p>
			          		</div>
			          	</div>
			         </li>
			         <li>
			          	 <div class="banner3">
			           		<div class="caption">
					          	<h3><span>Let</span>'s Discover Fantastic Place</h3>
					          	<p>Let's Explore</p>
			          		</div>
			          	</div>
			         </li>		
			      </ul>
			  </div>
			</div>
		</div>
	</div>
	 
	<!--header-bottom-->
	<div class="banner-bottom-top">
			<div class="container">
			<div class="bottom-header">
				<div class="header-bottom">
					<div class=" bottom-head">
						<a href="#">
							<div class="buy-media">
								<i class="fa fa-bed fawesome" aria-hidden="true"></i>
								<h6>Accommodation</h6>
							</div>
						</a>
					</div>
					<div class=" bottom-head">
						<a href="#">
							<div class="buy-media">
							<i class="fa fa-road fawesome" aria-hidden="true"></i>
							<h6>Travel</h6>
							</div>
						</a>
					</div>
					<div class=" bottom-head">
						<a href="#">
							<div class="buy-media">
							<i class="fa fa-motorcycle fawesome" aria-hidden="true"></i>
							<h6>Games</h6>
							</div>
						</a>
					</div>
					<div class=" bottom-head">
						<a href="#">
							<div class="buy-media">
							<i class="fa fa-binoculars fawesome" aria-hidden="true"></i>
							<h6>Sight Seeing</h6>
							</div>
						</a>
					</div>
					<div class=" bottom-head">
						<a href="#">
							<div class="buy-media">
							<i class="fa fa-blind fawesome" style="" aria-hidden="true"></i>
							<h6>Trekking</h6>
							</div>
						</a>
					</div>
					<div class=" bottom-head">
						<a href="#">
							<div class="buy-media">
							<i class="fa fa-glass fawesome" aria-hidden="true"></i>
							<h6>Food</h6>
							</div>
						</a>
					</div>
					<div class=" bottom-head">
						<a href="#">
							<div class="buy-media">
							<i class="fa fa-hand-spock-o fawesome" aria-hidden="true"></i>
							<h6>Plans</h6>
							</div>
						</a>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
	</div>
	</div>
			<!--//-->
				
	<!--//header-bottom-->
	
	
<!--//header-->
<!--content-->
<div class="content">
<div class="about-bottom" style="background-color: #F44336;">
		<div class="container">
				<div class="col-md-8 bottom-about">
					<h3 style="font-size:28px;color: #fff ">Most Popular</h3><hr>
					<p><span style="font-size: 17px;">This valentine's day be ready to fall in a trance, thumping the night off to electrifying EDM vibes</span><br>
					Venue: <b>EVOKE BISTRO BAR AND GRILL ,CHENNAI <b><b>
					on <b>14th Feb '17<b>
					<br>
					COVER ENTRY -
					(Complimentary Drinks + Unlimited Starters)
					<br>
					
					<span style="color: #e4ff00;">
					*Girls walk in free through out the event.
					</span>

					<br>
					<span style="font-size:20px;font-weight: 900;text-shadow: 2px 2px 12px #ccc;">
					Single entry - Rs 1500 /-<br>
					Couple entry -Rs 2000 /-<Br>
					</span>
					For passes contact on given numbers.
					<br>
					+91-8218377715,	+91-9003750142, +91-7021792975
					<br>
					<span style="color: #fff;">
					<span style="color: #fff;">• </span>Entry strictly by Invitation
					<span style="color: #fff;">• </span> Rights of Admission Reserved.
					<span style="color: #fff;">• </span> Drugs or any kind of substance Abuse is Prohibited.
					<span style="color: #fff;">• </span> The organisers reserve the right to evict anyone, they deem unfit from the premises.
					<span style="color: #fff;">• </span> Normal Club Rules Apply.
					</span>
					</p>

				</div>
				<div class="col-md-4 bottom-about1">
					<img src="images/party.jpeg" style="height: 400px;">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

	<div class="content-grid">
		<div class="container">
			<h3>Most Popular</h3>
				<div class="col-md-4 col-xs-4 col-sm-4 box_2">
			     	 <a href="#" class="mask">
			     	   	<img class="img-responsive zoom-img fix" src="images/3.jpg" alt="">
			     	   	<span class="four">Rs. 4,299</span>
			     	 </a>
			     	   <div class="most-1">
			     	   	 <h5><a href="#">Ooty Trip</a></h5>
			     	    	<p>Organised By FizzFlyer Team.</p>
			     	   </div>
			 </div>
			  <div class="col-md-4 col-xs-4 col-sm-4 box_2">
		     	 <a href="#" class="mask">
			     	   	<img class="img-responsive zoom-img fix" src="images/1.jpg" alt="">
			     	   	<span class="four">Coming Soon</span>
			     	 </a>
		     	   <div class="most-1">
			     	   	<h5><a href="#">Kodaikanal Trip</a></h5>
			     	    	<p>Organised by FizzFlyer Team.</p>
			     	   </div>
		     	
		      </div>
			  <div class="col-md-4 col-xs-4 col-sm-4 box_2">
		     	 <a href="#" class="mask">
			     	   	<img class="img-responsive zoom-img fix" src="images/2.jpg" alt="" >
			     	   	<span class="four">Coming Soon</span>
			     	 </a>
		     	   <div class="most-1">
			     	   	 <h5><a href="#">Coorg Trip</a></h5>
			     	    	<p>Organised by FizzFlyer Team.</p>
			     	   </div>
		     	
		      </div>

		 	<div class="clearfix"> </div>
		 	<div class="col-md-offset-5 col-xs-offset-2" style="padding:5% 0 0 0;">
		 		<a href="blog.php"><button type="button" class="btn btn-danger btn-lg more">More Packages</button></a>
			</div>
		</div>
	</div>
<!--service-->
	<div class="services" id="services">
		<div class="container">
			<div class="service-top">
				<h3>Services</h3>
				<p style="font-size: 16px;">We are best in</p>
			</div>
			<div class="services-grid">
		   		<div class="col-md-6 service-top1">
		   			<div class=" ser-grid">	
		   				<a href="#" class="hi-icon hi-icon-archive"><i class="fa fa-fire" style="font-size: 22px;" aria-hidden="true"></i> </a>
		   			</div>
		   			<div  class="ser-top">
		   				<h4>GROUP ROAD TRIPS</h4>
		   				<p>Hanging out by one of these with some good friends is our idea of a good time. Sitting around a bonfire with those who bring out the best in you; not the stress in you.</p>
		   		    </div>
					<div class="clearfix"> </div>
		   	   </div>
				<div class="col-md-6 service-top1">
		   			<div class=" ser-grid">	
		   				<a href="#" class="hi-icon hi-icon-archive"><i class="fa fa-leaf" style="font-size: 22px;" aria-hidden="true"></i> </a>
		   			</div>
		   			<div  class="ser-top">
		   				<h4>TREKKING EXPEDITION</h4>
		   				<p>Food is essential for life therefore food is something we never compromise on. One should not attend even the end of the world without a good <b>Breakfast</b>.</p>
		   		    </div>
					<div class="clearfix"> </div>
		   		</div>
		   	<div class="clearfix"> </div>
		 </div>
		 <div class="services-grid">
			   	<div class="col-md-6 service-top1">
			   		<div class=" ser-grid">	
			   			<a href="#" class="hi-icon hi-icon-archive"><i class="fa fa-puzzle-piece" style="font-size: 22px;" aria-hidden="true"></i> </a>
			   		</div>
			   		<div  class="ser-top">
			   			<h4>CAB BOOKING</h4>
			   				<p>We provide amazing group games which you never expect and Playing games with those who don't know much onne of the most amazing exprience in the world.</p>
			   		</div>
					<div class="clearfix"> </div>
			   	</div>
				<div class="col-md-6 service-top1">
			   		<div class=" ser-grid">	
			   			<a href="#" class="hi-icon hi-icon-archive"><i class="fa fa-bed" style="font-size: 22px;" aria-hidden="true"></i> </a>
			   		</div>
			   		<div  class="ser-top">
			   			<h4>Accomodation</h4>
			   			<p>We provide a perfect ambience for a vacay where you can be a kid again and enjoy to the fullest with friends and family alike. Dont believe it? Try out our packages to be awed.</p>
			   		</div>
					<div class="clearfix"> </div>
			   	</div>
		   	  <div class="clearfix"> </div>
		 	</div>
		</div>
	</div>
<!--//services-->

<!--project-->
<!-- <div style="background:#4f4f51;">
	<div class="container">
	<div class="future">
		<h3 style="color:#fff;">Featured Trips</h3>
			<div class="content-bottom-in">
					<ul id="flexiselDemo1">			
						<li>
							<div class="project-fur">
								<a href="#" ><img class="img-responsive" src="images/ooty.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <h6 class="fur-name"><a href="#" style="color:#fff;">Ooty Trip</a></h6>
		                                   	<span style="color:#fff;">Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<b><a href="register-trips.php"><span>Book Now!</span></a></b>
			                             </div>
									</div>					
							</div>
						</li>
						<li>
							<div class="project-fur">
								<a href="#" ><img class="img-responsive" src="images/ooty.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <h6 class="fur-name"><a href="#" style="color:#fff;">Ooty Trip</a></h6>
		                                   	<span style="color:#fff;">Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<b><a href="register-trips.php"><span>Book Now!</span></a></b>
			                             </div>
									</div>					
							</div>
						</li>
						<li>
							<div class="project-fur">
								<a href="#" ><img class="img-responsive" src="images/ooty.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <h6 class="fur-name"><a href="#" style="color:#fff;">Ooty Trip</a></h6>
		                                   	<span style="color:#fff;">Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<b><a href="register-trips.php"><span>Book Now!</span></a></b>
			                             </div>
									</div>					
							</div>
						</li>
						<li>
							<div class="project-fur">
								<a href="#" ><img class="img-responsive" src="images/ooty.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <h6 class="fur-name"><a href="#" style="color:#fff;">Ooty Trip</a></h6>
		                                   	<span style="color:#fff;">Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<b><a href="register-trips.php"><span>Book Now!</span></a></b>
			                             </div>
									</div>					
							</div>
						</li>
						<li>
							<div class="project-fur">
								<a href="#" ><img class="img-responsive" src="images/ooty.jpg" alt="" />	</a>
									<div class="fur">
										<div class="fur1">
		                                    <h6 class="fur-name"><a href="#" style="color:#fff;">Ooty Trip</a></h6>
		                                   	<span style="color:#fff;">Oraganised by FizzFlyer Team.</span>
                               			</div>
			                            <div class="fur2">
			                               	<b><a href="register-trips.php"><span>Book Now!</span></a></b>
			                             </div>
									</div>					
							</div>
						</li>
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
</div>		 -->
		
<!--partners-->
	<!-- <div class="content-bottom1" style="background:#fff;">
		<h3>Our Partners</h3>
	 		<div class="container">
				<ul>
					<li><a href="#"><img class="img-responsive" src="images/lg.png" alt=""></a></li>
					<li><a href="#"><img class="img-responsive" src="images/lg1.png" alt=""></a></li>
					<li><a href="#"><img class="img-responsive" src="images/lg2.png" alt=""></a></li>
					<li><a href="#"><img class="img-responsive" src="images/lg3.png" alt=""></a></li>
					<li><a href="#"><img class="img-responsive" src="images/lg4.png" alt=""></a></li>
				<div class="clearfix"> </div>
				</ul>
				<ul>
					<li><a href="#"><img class="img-responsive" src="images/lg5.png" alt=""></a></li>
					<li><a href="#"><img class="img-responsive" src="images/lg6.png" alt=""></a></li>
					<li><a href="#"><img class="img-responsive" src="images/lg7.png" alt=""></a></li>
					<li><a href="#"><img class="img-responsive" src="images/lg8.png" alt=""></a></li>
					<li><a href="#"><img class="img-responsive" src="images/lg9.png" alt=""></a></li>	
				<div class="clearfix"> </div>
				</ul>
			</div>
		</div> -->	
<!--//partners-->	
	</div>

<?php include 'code/footer.php';?>

</body>
</html>