<?php  

include 'code/dbconfig.php';
global $con;
$selectquery = "SELECT * FROM details ORDER BY id DESC LIMIT 5";
$query = mysqli_query($con, $selectquery) or die("ERROR 404 : Access Denied ERR_DATABASE_ERROR::CONNECTION FAILURE");
// or die("ERROR 404 : Access Denied ERR_FETCH_PROBLEM::CONNECTION FAILURE");

$selectquery = "SELECT * FROM details ORDER BY id DESC LIMIT 5";
$retFeaturedTrip = mysqli_query($con, $selectquery) or die("ERROR 404 : Access Denied ERR_DATABASE_ERROR::CONNECTION FAILURE");

include 'code/head.php';

?>
<!--//-->	
<div class=" banner-buying">
	<div class="container">
		<h3>Our Featured Trips</h3>
	</div>
</div>
<!--//header-->
<!---->
<!---->
<div class="single">
	<div class="container">
		<?php 
		if (mysqli_num_rows($query) != 0) {
			//nothing
		}
		?>
		<div class="buy-single">
			<div class="box-sin">
				<div class="col-md-9 single-box">
					<?php
					if (mysqli_num_rows($query) > 0) {
					    // output data of each row
					    while ($row = mysqli_fetch_array($query) ) {
							echo '
								<div class="box-col">
								     <div class=" col-sm-7 left-side ">
										<a href="artical.php?id='.$row['id'].'"> <img class="img-responsive" src="uploads/'.$row['imageName'].'" alt="'.$row['title'].'"></a>
									</div>				
									<div class="  col-sm-5 middle-side">
									     <h4>'.$row['title'].'</h4>
									     <p><span class="details">Min. Person </span>: <span class="two"> '.$row['peopleRegistered'].'</span></p>
									     <p><span class="details1">Starting Place </span>:<span class="two">'.$row['startPlace'].'</span></p>
									     <p><span class="details2">Date</span>: <span class="two"> '.$row['startDate'].'</span></p>
									     <p><span class="details3">Ends  </span>:<span class="two"> '.$row['endPlace'].'</span></p>
										 <p><span class="details4">Date</span> : <span class="two">'.$row['endDate'].'</span></p>
										 <p><span class="details5">Price </span>:<span class="two"> '.$row['price'].'</span></p>				 
										<div class="right-side">
											 <a href="register-trips.php?id='.$row['id'].'" class="hvr-sweep-to-right more" >Register Now For Trip!</a>   
											 <a href="artical.php?id='.$row['id'].'" class="hvr-sweep-to-right more" >Detail View</a>      
										 </div>
									 </div>
								 <div class="clearfix"> </div>
								</div>';
						}
						echo '<div class="load-more" lastID="'.$row['id'].'" style="display: none;">
				                <img src="images/loading.gif"/>
				              </div>';
					} else {
					    echo '<h1 style="text-align:center">No Result Found &#x2639;</h1>';
					}
					?>
					
				</div>
			</div>
			<div class="col-md-3 map-single-bottom">
				<!-- <div class="map-single">
							<iframe src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJr1_DNw33UjoRF_jI8OzoCxU&key=AIzaSyCr3ZO6vj_EqxevTl82tqxB8f_MiSJHn2w"></iframe>
				</div> -->
				<div class="single-box-right">
			     	<h4>Featured Trips</h4>
			     	<?php
					if (mysqli_num_rows($retFeaturedTrip) > 0) {
					    // output data of each row
					    while ($retFeatured = mysqli_fetch_array($retFeaturedTrip) ) {
							echo '
								<div class="single-box-img">
								<div class="box-img">
									<a href="artical.php?id='.$retFeatured['id'].'"><img class="img-responsive" src="uploads/'.$retFeatured['imageName'].'" alt="'.$retFeatured['title'].'"></a>
								</div>
								<div class="box-text">
									<p><a href="artical.php?id='.$retFeatured['id'].'">Trip start from'.$retFeatured['startPlace'].'</a></p>
									<a href="artical.php?id='.$retFeatured['id'].'" class="in-box">More Info</a>
								</div>
								<div class="clearfix"> </div>
							</div>';
						}
						
					} else {
					    echo '<br/><h1 style="text-align:center;margin:10px;"> No Results &#x2639;</h1>';
					}
					?>
				</div>
			</div>
			<script>
				$(document).ready(function(){
			    $(window).scroll(function(){
			        var lastID = $('.load-more').attr('lastID');
			        if ($(window).scrollTop() == $(document).height() - $(window).height() && lastID != 0){
			            $.ajax({
			                type:'POST',
			                url:'code/getData.php',
			                data:'id='+lastID,
			                beforeSend:function(html){
			                    $('.load-more').show();
			                },
			                success:function(html){
			                    $('.load-more').remove();
			                    $('#postList').append(html);
			                }
			            });
			        }
			    });
			});
			</script>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!---->
<!--footer-->
<?php include 'code/footer.php';?>
<!--//footer-->
</body>
</html>