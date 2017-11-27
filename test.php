<?php
session_start();
// Step 1.Capture the script and convert to string except tags
$string= session_start();
$stringgen = mt_rand(10000, 99999);

//store generate random number to a session
$_SESSION["answer"]=$stringgen;

//create image 50 x 50 pixels
$imagecreate = imagecreate(50, 50);

// white background and blue text
$background = imagecolorallocate($imagecreate, 255, 255, 255);
$textcolor = imagecolorallocate($imagecreate, 0, 0, 255);

// write the string at the top left
imagestring($imagecreate, 5, 5, 10, $stringgen, $textcolor);

// output the image
header("Content-type: image/png");
$image= imagepng($imagecreate);


?>