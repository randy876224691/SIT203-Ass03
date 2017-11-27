<?php 
	// ---------------------------------------------------------------- // 
	// DATABASE CONNECTION PARAMETER 									// 
	// ---------------------------------------------------------------- // 
	// Modify global-connect.inc.php with your DB connection parameters or add them //
	// directly below  					//
	
	//include('global-connect.inc.php'); 

  /* Set oracle user login and password info 
OCILogon — oci_connect
OCIParse – oci_parse
OCIExecute – oci_execute
OCIFetch – oci_fetch_array
OCILogOff – oci_close
OCIResult - oci_result
*/
  $dbuser = "xyib";  /* your deakin login */
  $dbpass = "Randy380602";  /* your deakin password */
  $dbname = "SSID"; 
  $connect = oci_connect($dbuser, $dbpass, $dbname); 

  if (!$connect)  {
    echo "An error occurred connecting to the database"; 
    exit; 
  }


	
	// ---------------------------------------------------------------- // 
	// SET PHP VAR - CHANGE THEM										// 
	// ---------------------------------------------------------------- // 
	// You can use these variables to define Query Search Parameters:	//
	
	// $SQL_FROM:	is the FROM clausule, you can add a TABLE: books ...//
	
	// $SQL_WHERE	is the WHER clausule, you can add an table 	 		//
	// 				field for example title  					//
	//$sql	=	"SELECT * FROM $SQL_FROM WHERE lower($SQL_WHERE) LIKE lower('%$searchq%')";
	
	$SQL_FROM = 'bookdetails';
	$SQL_WHERE = 'TITTLE';

	$searchq =	strip_tags($_GET['q']);
	$sql	=	"SELECT * FROM bookdetails WHERE lower(TITLE) LIKE lower('%$searchq%')";
	
	
	$stmt = oci_parse($connect, $sql); 
  
	if(!$stmt)  {
		echo "An error occurred in parsing the sql string.\n"; 
		exit; 
	  }
	oci_execute($stmt); 

	$output[] = '<ul>';

	while(oci_fetch_array($stmt)) {

		$title= oci_result($stmt,"TITLE");
		$output[] = '<li><small>'.$title.'</small></li>';
	}
	$output[] = '</ul>';
	echo join('',$output);		
	oci_close($connect); 
	
?>