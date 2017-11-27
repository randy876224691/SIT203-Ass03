<?php
						$dbuser="xyib";
						$dbpass="Randy380602";
						$db="SSID";
						
						$salt="hahahaImBatman";//salt is used here, which can be an arbitrary string
								
						$connect=oci_connect($dbuser,$dbpass,$db);
						if (!$connect) {
						echo "An error occurred connecting to the database"; 
						exit; 
						}
						//Extract CGI variables
						$cname = $_REQUEST["username"];
						$a=$_REQUEST["password"];
						$b=$_REQUEST["email"];
						$c=$_REQUEST["phone"];
						$d=$_REQUEST["address"];
						$e=$_REQUEST["state"];
						$f=$_REQUEST["postcode"];
						
	//Converting Input into HTML Entities
	$htmlentitiescname = htmlentities($cname, ENT_QUOTES , "UTF-8");
	$htmlentitiesb = htmlentities($b, ENT_QUOTES , "UTF-8");
	$htmlentitiesc = htmlentities($c, ENT_QUOTES , "UTF-8");
	$htmlentitiesd = htmlentities($d, ENT_QUOTES , "UTF-8");
	$htmlentitiese = htmlentities($e, ENT_QUOTES , "UTF-8");
	$htmlentitiesf = htmlentities($f, ENT_QUOTES , "UTF-8");
	

						// count the record in plants table and use id number $count+1 for the new record

						$query_count = "SELECT max(ID) FROM customeraccount";
						$query_name = "SELECT USERNAME FROM customeraccount WHERE USERNAME = '".$htmlentitiescname."'";

						//echo "SQL: $query_count<br>";

						/* check the sql statement for errors and if errors report them */
						$stmt = oci_parse($connect, $query_count); 
						$stmt_n = oci_parse($connect, $query_name); 

						if(!$stmt)  {
						echo "An error occurred in parsing the sql string.\n"; 
						exit; 
						}

						oci_execute($stmt);
						oci_execute($stmt_n);
						
						if (oci_fetch_array($stmt))  {
	
						$count = oci_result($stmt,1);//returns the data for column 1  
						//echo $count."</br>";

						} else {
						//echo "An error occurred in retrieving order id.\n"; 
						echo "<script>alert('An error occurred in retrieving Id.');window.location.href=' http://www.deakin.edu.au/~xyib/SIT203/ass3/register.php';</script>";
						exit; 
						}
						
						while (oci_fetch_array($stmt_n))  
						{
						$dbname = oci_result($stmt_n,1);//returns the data for column 1
						//echo $count."</br>";
						}
						
						
						$count++;
						echo $count."</br>";
						$password = md5($salt.$a);
						if($dbname == null || $dbname == "")
						{
							// Create the SQL statement to add the data
							//$query = "INSERT INTO Plants (ID, Drainage, Aspect, CommonName) VALUES ($count, $Drainage, $Aspect, '$CommonName')"; 
							//$query = "INSERT INTO Products (ID, CommonName,SpeciesName, Photo, Location ) VALUES ( $count, '$CommonName','$SpeciesName', '$Photo', '$Location')"; 
							$query = "INSERT INTO CUSTOMERACCOUNT(ID, USERNAME, PASSWORD, EMAIL, PHONE, ADDRESS, STATE, POSTCODE)  VALUES ($count, '$htmlentitiescname','$password','$htmlentitiesb','$htmlentitiesc','$htmlentitiesd','$htmlentitiese',$htmlentitiesf)";
							//$query = "INSERT INTO CUSTOMERACCOUNT(ID, USERNAME, PASSWORD, EMAIL, PHONE, ADDRESS, STATE, POSTCODE)  VALUES (1, 'a','a','a','a','a','a',0000)";
							/* check the sql statement for errors and if errors report them */
							$stmt_w = oci_parse($connect, $query); 
							oci_execute($stmt_w);
							echo "<script type='text/javascript'>alert('Success');location.href='login.php';</script>";
						}				
						else
						{
							echo "<script type='text/javascript'>alert('Username Exist');location='javascript:history.back()';</script>";
						}
						exit; 

						//echo ("<p>The plant with ID ".$count. " has been added to the database!</p>");

						// Close the connection
						oci_close($connect); 
						?>