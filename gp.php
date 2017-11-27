<?php
// Start the session
session_start();
// Include database connection
include 'inc/global-connect.inc.php';




/*
The database table we use in this example looks like this:
id FirstName LastName Age Hometown Job
1 Mary Doss 42 Geelong High school teacher
2 Robert Dew 40 Newport Piano Teacher
3 Justin Rough 34 Geelong University Lecturer
*/

		$sq=$_GET["q"];

		if (!$connect) {
		echo "An error occurred connecting to the database"; 
		exit; 
		}
		/* build sql statement using form data */
		
		
		if ($sq == "0") 
		{
		$query = "SELECT * FROM bookdetails WHERE CATALOG != 'card'";
		}
		if ($sq == "1") 
		{
		$query = "SELECT * FROM bookdetails WHERE catalog = 'fiction'";
		}
		if ($sq == "2") 
		{
		$query = "SELECT * FROM bookdetails WHERE catalog = 'nonfiction'";
		}
		if ($sq == "3") 
		{
		$query = "SELECT * FROM bookdetails WHERE catalog = 'children'";
		}
		if ($sq == "4") 
		{
		$query = "SELECT * FROM bookdetails WHERE catalog = 'acdemic'";
		}
	


		/* check the sql statement for errors and if errors report them */
		$stmt = oci_parse($connect, $query);

		if(!$stmt) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmt);
		
		// Display all the values in the retrieved records, one record per row, in a loop
		while(oci_fetch($stmt)) {
		// Start define all values
		$a = oci_result($stmt,"NAME"); 
		$b = oci_result($stmt,"CATALOG"); 
		$c = oci_result($stmt,"TITLE"); 
		$l = oci_result($stmt,"IMAGE"); 
		

		echo 
			"
			
			<div id='new_prod' >
		
				<div class='new_prod_box' id='new_prod_box'>
					
					<a href='bookdetail.php?bookname=$a&booktype=$b'> $c </a>
                 
                    <div class='new_prod_bg' id='new_prod_bg'>
                        <a href='bookdetail.php?bookname=$a&booktype=$b' ><img src='image/bookcoversmall/$l' /> </a>
                    </div>
				</div>
			</div>	
			
			";

	
		}

?>

