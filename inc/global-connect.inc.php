<?php
  /* Set oracle user login and password info */
  $dbuser = "xyib";  /* your deakin login */
  $dbpass = "Randy380602";  /* your deakin password */
  $db = "SSID"; 
  $connect = oci_connect($dbuser, $dbpass, $db); 

  if (!$connect)  {
    echo "An error occurred connecting to the database"; 
    exit; 
  }
?>