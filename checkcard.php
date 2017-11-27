<?php
// Start the session
session_start();

include 'inc/global-connect.inc.php';

	$gcn = $_GET["a"];	
		global $connect;
			$sql_G = "SELECT GETID FROM giftcard where GETID = '".$gcn."'";
			$stmt_G = oci_parse($connect, $sql_G); 
	
			if(!$stmt_G)  
			{
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			}
			
			oci_execute($stmt_G); 
			
			if ($keywords !='') 
			{

				while(oci_fetch_array($stmt_G))
				{
					if(oci_result($stmt_G,"GETID")!=$gcn || oci_result($stmt_G,"CARDUSED")==0)
					{
					echo"this card have problem.";
					}
					else
					{
					$_SESSION['gcid'] = $gcn ;
					}
				}

			}
 ?>
