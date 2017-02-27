<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
function fileUpload($image_name, $tmp_name, $fileExt)
{
    $target_dir = "../uploads/".$image_name;
    // $target_file = $target_dir . basename($image_name);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_dir,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
        $check = getimagesize($tmp_name);
        if($check !== false) {
             echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $e = "File is not an image.";
            $uploadOk = 0;
        }
    // Check if file already exists
    if (file_exists($target_file)) {
        $e = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $e = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $e = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $err = "Sorry, your file was not uploaded, Because " . $e;
        return $err;
    // if everything is ok, try to upload file
    } else {
   
        
        $moved = move_uploaded_file($tmp_name, $target_dir) or die("Error");
        if ($moved) {
            echo "The file ". basename($image_name). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    return $image_name;
}

// Function for resizing jpg, gif, or png image files
function image_resize($target, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
           $w = $h * $scale_ratio;
    } else {
           $h = $w / $scale_ratio;
    }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
      $img = imagecreatefrompng($target);
    } else { 
      $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagejpeg($tci, $target, 80);
}

// ------------- THUMBNAIL (CROP) FUNCTION -------------
// Function for creating a true thumbnail cropping from any jpg, gif, or png image files
function image_crop($target, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $src_x = ($w_orig / 2) - ($w / 2);
    $src_y = ($h_orig / 2) - ($h / 2);
    $ext = strtolower($ext);
    $img = "";
    if ($ext == "gif"){ 
    $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
    $img = imagecreatefrompng($target);
    } else { 
    $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    imagecopyresampled($tci, $img, 0, 0, $src_x, $src_y, $w, $h, $w, $h);
    if ($ext == "gif"){ 
        imagegif($tci, $target);
    } else if($ext =="png"){ 
        imagepng($tci, $target);
    } else { 
        imagejpeg($tci, $target, 84);
    }
}


?>