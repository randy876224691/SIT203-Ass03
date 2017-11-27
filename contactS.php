<?php
session_start();
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
			$ctname = $_REQUEST["name"];
			$ctemail=$_REQUEST["email"];
			$ctphone=$_REQUEST["phone"];
			$ctcompany=$_REQUEST["company"];
			$ctmessage=$_REQUEST["message"];
			$ctcaptcha=$_REQUEST["captcha"];
			
			$captchaS = $_SESSION["answer"];
			
	//Converting Input into HTML Entities
	$htmlentitiesctname = htmlentities($ctname,ENT_QUOTES,"utf-8");
	$htmlentitiesctemail = htmlentities($ctemail, ENT_QUOTES,"utf-8");
	$htmlentitiesctphone = htmlentities($ctphone, ENT_QUOTES,"utf-8");
	$htmlentitiesctcompany = htmlentities($ctcompany, ENT_QUOTES,"utf-8");
	$htmlentitiesctmessage = htmlentities($ctmessage, ENT_QUOTES,"utf-8");


				if ($ctcaptcha == $captchaS)
				{
					
					// count the record in plants table and use id number $count+1 for the new record

					$query_count = "SELECT max(ID) FROM customeraccount";

					//echo "SQL: $query_count<br>";

					/* check the sql statement for errors and if errors report them */
					$stmt = oci_parse($connect, $query_count); 

					if(!$stmt)  {
					echo "An error occurred in parsing the sql string.\n"; 
					exit; 
					}

					oci_execute($stmt);
					
					if (oci_fetch_array($stmt))  {

					$count = oci_result($stmt,1);//returns the data for column 1  
					//echo $count."</br>";

					} else {
					//echo "An error occurred in retrieving order id.\n"; 
					echo "<script>alert('An error occurred in retrieving Id.');window.location.href=' http://www.deakin.edu.au/~xyib/SIT203/ass3/register.php';</script>";
					exit; 
					}
					
					$count++;
					$query = "INSERT INTO CONTACT(CONTACTID, CTNAME, CTEMAIL, CTPHONE, CTCOMPANY, CTMESSAGE)  VALUES ($count, '$htmlentitiesctname','$htmlentitiesctemail','$htmlentitiesctphone','$htmlentitiesctcompany','$htmlentitiesctmessage')";
					$stmt_w = oci_parse($connect, $query); 
					oci_execute($stmt_w);
					
					echo "<script type='text/javascript'>alert('Success');location.href='index.php';</script>";
					oci_close($connect);
				}
				else
				{
					echo "<script type='text/javascript'>alert('captcha error, please re-enter.');location='javascript:history.back()';</script>";
				} 
?>