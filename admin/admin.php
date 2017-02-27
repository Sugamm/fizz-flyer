<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
error_reporting (E_ALL ^ E_NOTICE);
include "index.php";
include "file_upload.php";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = addslashes($data);
  return $data;
}
 
$host = "LOCALHOST";
$user = "root";
$password = "Sugam0030";
$database = "fizzflyer";

$con = @mysqli_connect($host,$user,$password,$database) or die('<h1 style="text-align:center">ERROR : 404 Connection Error</h1>');
// Check if image file is a actual image or fake image
if (isset($_POST['submit_header'])) {
	$title =  $_POST["title"];
	$Header_image = $_FILES["fileToUpload"]["name"];
	$description = test_input($_POST["description"]);
	$startPlace =  $_POST["startPlace"];
	$startDate =  $_POST["startDate"];
	$endPlace =  $_POST["endPlace"];
	$endDate =  $_POST["endDate"];
	$price =  $_POST["price"];
	$peopleResgister =  $_POST["peopleResgister"];
	$Header_temp_image = $_FILES["fileToUpload"]["tmp_name"];
    $kaboom = explode(".", $Header_image); // Split file name into an array using the dot
  	$fileExt = end($kaboom); // Now target the last array element to get the file extension
	//we can use that also
  	$Header_image ="h".time().rand().".".$fileExt; // return a nice long number.
  	
  	//Change the permission where are you upload.
 	$Header_image = fileUpload($Header_image, $Header_temp_image, $fileExt);

    $file_dir = "../uploads/";

    if(file_exists($file_dir.$Header_image)) {
    	 $query = 'INSERT Into details(title, imageName, description, startPlace, startDate, endPlace, endDate, price, peopleRegistered) Values ("'.$title.'","'.$Header_image.'","'.$description.'","'.$startPlace.'","'.$startDate.'","'.$endPlace.'","'.$endDate.'","'.$price.'","'.$peopleResgister.'")';
       	// echo $query;
        $result = mysqli_query($con, $query) or die("db Error!!".mysqli_error($con));
        if ($result != true) {
        	$msg = "DB Error";
        }else{
        	$msg = 'Successfully Data Inserted and if active you can see that on Header <a href="../">FizzFLyer</a>.';
        }
    }else{
    	$msg = "Error In Image Upload";
    }
       
    } 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Fizzflyer Admin</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<span>FizzFLyer <span class="bp-icon bp-icon-about" data-content="This is an admin planel where you can post an artical to your blog page, and any latest update."></span></span>
				<h1>Admin Full access of main Website</h1>
					
			</header>	
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-shop"><span>Post Artical</span></a></li>
						<li><a href="#section-2" class="icon-cup"><span>Registered</span></a></li>
						<!-- <li><a href="#section-3" class="icon-food"><span>Registered</span></a></li> -->
						<li><a href="#section-4" class="icon-lab"><span>FeedBack</span></a></li>
						<!-- <li><a href="#section-5" class="icon-truck"><span>FeedBack</span></a></li> -->
					</ul>
				</nav>
				<div class="content">
					<section id="section-1">
						
<!-- Row start -->
  <div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <i class="icon-calendar"></i>
          <h3 class="panel-title">Main Header..</h3>
        </div>
       
        <div class="panel-body">
          <form action="#" method="post" class="form-horizontal row-border" enctype="multipart/form-data" novalidate>
           
           
            <div class="form-group">
              <label class="col-md-2 control-label"> Title</label>
              <div class="col-md-10">
                <input type="text" name="title" class="form-control" placeholder="Title For Artical" required>
                 <span class="help-block">Title of artical. Do not use single qoute or double Qoute System could be fail</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Brif Description</label>
              <div class="col-md-10">
              	<textarea name="description" class="form-control" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Image</label>
              <div class="col-md-10">
                <div class="row">
                  <div class="col-xs-6">
                     <input class="btn btn-Defualt" type="file" name="fileToUpload" required>
                  </div>
                  <label class="col-xs-2 control-label">Price For Trip</label>
                  <div class="col-xs-4">
                   <input type="number" name="price" class="form-control" placeholder="Price For Trip" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Start End Place</label>
              <div class="col-md-10">
                <div class="row">
                  <div class="col-xs-3">
                     <input type="text" name="startPlace" class="form-control" placeholder="Trip Start Place" required>
                  </div>
                  
                  <div class="col-xs-3">
                   	<input type="date" name="startDate" class="form-control" placeholder="Starting Date" required>
                  </div>
                  <div class="col-xs-3">
                   <input type="text" name="endPlace" class="form-control" placeholder="Trip End Place">
                  </div>
                  <div class="col-xs-3">
                   <input type="date" name="endDate" class="form-control" placeholder="Trip End Date">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label"> Person :</label>
              <div class="col-md-10">
                <input type="number" name="peopleResgister" class="form-control" placeholder="Minimum Person" required>
                 <span class="help-block">Minimum People to happen this trip.</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label"></label>
              <div class="col-md-10">
               <input class="btn btn-primary" type="submit" name="submit_header" value="Submit">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->
  <?php 

  	$select_main_query = "SELECT * FROM details";
  	$select_result = mysqli_query($con, $select_main_query) or die("ERORRRRR");

if (mysqli_num_rows($select_result) > 0) {
    // output data of each row
    while($rowshow = mysqli_fetch_assoc($select_result)) {
        // echo "id: " . $row["Header_id"]. " - Name: " . $row["title"]. " " . $row["sDescription"]. " " . $row["image"]. "<br>";
        // echo '<img src="../uploads/'.$row["image"].'" alt="image" />';
    		echo '<div class="mediabox" style="">
					<a href="http://fizzflyer.in/artical.php?id='.$rowshow['id'].'" style="    text-decoration: none;
    color: inherit;"><img src="../uploads/'.$rowshow["imageName"].'" alt="image" height="300" />
					<h3>'.$rowshow["title"].'</h3>
					<p>'.htmlspecialchars_decode($rowshow['description']).'</p>
					</a>
				  </div>';
        
    }
} else {
    echo "0 results";
}


  ?>
					</section>
					<section id="section-2">
						  <table class="table table-hover">
						    <thead>
						      <tr>
						        <th>User Id</th>
						        <th>Name</th>
						        <th>Email</th>
						        <th>Phone</th>
						        <th>Trip Name </th>
						      </tr>
						    </thead>
						    <tbody>

<?php 
	


	$reg_query = "SELECT * FROM registerdTrips INNER JOIN tbl_users ON registerdTrips.userId=tbl_users.userID";
	// echo $reg_query;
	$select_reg= mysqli_query($con, $reg_query) or die("ERORRRRR".mysqli_error($con));

	if (mysqli_num_rows($select_reg)>0) {
	// output data of each row
	while($rowreg=mysqli_fetch_array($select_reg)) {
		echo ' 
		<tr>
		    <td>'.$rowreg['userId'].'</td>
		    <td>'.$rowreg['userName'].'</td>
		    <td>'.$rowreg['userEmail'].'</td>
		    <td>'.$rowreg['phone'].'</td>
		    <td>'.$rowreg['tripName'].'</td>
		</tr>';
		}
	} else {
	echo "0 results";
	}


  ?>
						     
						    </tbody>
						  </table>
					</section>
					<!-- <section id="section-3">

						<div class="mediabox">
							<img src="img/02.png" alt="img02" />
							<h3>Noodle Curry</h3>
							<p>Lotus root water spinach fennel kombu maize bamboo shoot green bean swiss chard seakale pumpkin onion chickpea gram corn pea.Sushi gumbo beet greens corn soko endive gumbo gourd.</p>
						</div>
						<div class="mediabox">
							<img src="img/06.png" alt="img06" />
							<h3>Leek Wasabi</h3>
							<p>Sushi gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato.</p>
						</div>
						<div class="mediabox">
							<img src="img/01.png" alt="img01" />
							<h3>Green Tofu Wrap</h3>
							<p>Pea horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut wasabi tofu broccoli mixture soup.</p>
						</div>
					</section> -->
					<section id="section-4">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>User Id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Suggestion</th>
									<th>Date</th>
								</tr>
							</thead>
						<tbody>

						<?php 



						$feedback_query = "SELECT * FROM feedback";
						// echo $reg_query;
						$select_feedback= mysqli_query($con, $feedback_query) or die("ERORRRRR".mysqli_error($con));

						if (mysqli_num_rows($select_feedback)>0) {
						// output data of each row
						while($rowfeedback=mysqli_fetch_array($select_feedback)) {
						echo ' 
						<tr>
							<td>'.$rowfeedback['id'].'</td>
							<td>'.$rowfeedback['name'].'</td>
							<td>'.$rowfeedback['email'].'</td>
							<td>'.$rowfeedback['message'].'</td>
							<td>'.$rowfeedback['feedbackDate'].'</td>
						</tr>';
						}
						} else {
						echo "<tr><td>0 results</td></tr>";
						}


						?>

						</tbody>
						</table>
						<!-- <div class="mediabox">
							<img src="img/03.png" alt="img03" />
							<h3>Tomato Cucumber Curd</h3>
							<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
						</div>
						<div class="mediabox">
							<img src="img/01.png" alt="img01" />
							<h3>Mushroom Green</h3>
							<p>Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot squash brussels sprout chard.</p>
						</div>
						<div class="mediabox">
							<img src="img/04.png" alt="img04" />
							<h3>Swiss Celery Chard</h3>
							<p>Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. </p>
						</div> -->
					</section>
					<section id="section-5">
						<div class="mediabox">
							<img src="img/02.png" alt="img02" />
							<h3>Radish Tomato</h3>
							<p>Catsear cauliflower garbanzo yarrow salsify chicory garlic bell pepper napa cabbage lettuce tomato kale arugula melon sierra leone bologi rutabaga tigernut.</p>
						</div>
						<div class="mediabox">
							<img src="img/06.png" alt="img06" />
							<h3>Fennel Wasabi</h3>
							<p>Sea lettuce gumbo grape kale kombu cauliflower salsify kohlrabi okra sea lettuce broccoli celery lotus root carrot winter purslane turnip greens garlic.</p>
						</div>
						<div class="mediabox">
							<img src="img/01.png" alt="img01" />
							<h3>Red Tofu Wrap</h3>
							<p>Green horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut wasabi tofu broccoli mixture soup.</p>
						</div>
					</section>
				</div><!-- /content -->
			</div><!-- /tabs -->
			<p class="info">Designed By <a href="http://wishent.com/sugam/"> Sugam Malviya</a></p>
		</div>
		<script src="js/cbpFWTabs.js"></script>
		<script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
		</script>
	</body>
</html>
