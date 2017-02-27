<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
error_reporting (E_ALL ^ E_NOTICE);
include "index.php";
include '../code/dbconfig.php';
include "file_upload.php";
// Check if image file is a actual image or fake image
if (isset($_POST['submit_header'])) {
	$title =  $_POST["title"];
	$Header_image = $_FILES["fileToUpload"]["name"];
	$description = $_POST["description"];
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
    	 $query = 'INSERT Into details(title, imageName, description, startPlace, startDate, endPlace, endDate, price, peopleResgister) Values ("'.$title.'","'.$Header_image.'","'.$description.'","'.$startPlace.'","'.$startDate.'","'.$endPlace.'","'.$endDate.'","'.$price.'","'.$peopleResgister.'")';
       	echo $query;
        $result = mysqli_query($con, $query);
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