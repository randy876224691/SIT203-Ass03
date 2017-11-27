<?php
	session_start();
	// Include database connection
	include 'inc/global-connect.inc.php';
	
	$CUID = $_SESSION["name"];
	$salt="hahahaImBatman";//salt is used here, which can be an arbitrary string
			
	global $connect;
	//Extract CGI variables
	$cname = $_REQUEST["username"];
	$a=$_REQUEST["password"];
	$b=$_REQUEST["email"];
	$c=$_REQUEST["phone"];
	$d=$_REQUEST["address"];
	$e=$_REQUEST["state"];
	$f=$_REQUEST["postcode"];
	
	$cpassword = md5($salt.$a);
	
	
	//Converting Input into HTML Entities
	$htmlentitiescname = htmlentities($cname, ENT_QUOTES , "UTF-8");
	$htmlentitiesb = htmlentities($b, ENT_QUOTES , "UTF-8");
	$htmlentitiesc = htmlentities($c, ENT_QUOTES , "UTF-8");
	$htmlentitiesd = htmlentities($d, ENT_QUOTES , "UTF-8");
	$htmlentitiese = htmlentities($e, ENT_QUOTES , "UTF-8");
	$htmlentitiesf = htmlentities($f, ENT_QUOTES , "UTF-8");
	
	
	
	$update = "UPDATE customeraccount 
					SET PASSWORD = '$cpassword',EMAIL = '$htmlentitiesb',PHONE = '$htmlentitiesc',ADDRESS = '$htmlentitiesd',STATE = '$htmlentitiese',POSTCODE = '$htmlentitiesf'
					WHERE USERNAME ='$CUID'";


	//$query_count = "SELECT max(ID) FROM customeraccount";
	//$query_name = "SELECT USERNAME FROM customeraccount WHERE USERNAME = '".$cname."'";

	//echo "SQL: $query_count<br>";

	/* check the sql statement for errors and if errors report them */
	$stmt = oci_parse($connect, $update); 
	oci_execute($stmt);
	
	echo "<script type='text/javascript'>alert('Success');location.href='myaccount.php';</script>";

	oci_close($connect); 
?>