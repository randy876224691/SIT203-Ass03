<?php //file login.php
session_start(); 
session_regenerate_id(true); 


// Include database connection
include 'inc/global-connect.inc.php';
// Include functions
include'inc/functions.inc.php';


$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];

//Converting Input into HTML Entities
$htmlentitiesusername = htmlentities($username, ENT_QUOTES , "UTF-8");

$salt="hahahaImBatman";//salt is used here, which can be an arbitrary string

$md5pass = md5($salt.$pass);

//$lname = $_REQUEST['lname']; 
/*
$_SESSION['id'] = $id; 
$_SESSION['fname'] = $fname; 
$_SESSION['lname'] = $lname;*/

	global $connect;

	 // build SELECT query
	$query ="SELECT * FROM customeraccount WHERE USERNAME = '$htmlentitiesusername'";

	$flag=false;
	
	 /* check the sql statement for errors and if errors report them */
	$stmt = oci_parse($connect, $query);

	if(!$stmt) {
	echo "An error occurred in parsing the sql string.\n";
	exit;
	}
	oci_execute($stmt);
		// Display all the values in the retrieved records, one record per row, in a loop
		while(oci_fetch_array($stmt)) {
		if($md5pass == oci_result($stmt,"PASSWORD")) {
		$flag=true;	
	
		$CUID=oci_result($stmt,"ID");
		$name=oci_result($stmt,"USERNAME");
		$password=oci_result($stmt,"PASSWORD");
		//set up session values
		//session_start();
		$_SESSION['cid'] = $CUID;
		$_SESSION['name'] = $htmlentitiesusername; 
		$_SESSION['pass'] = $password;	
		//$_SESSION['sessionID']=$PHPSESSID;
		}	
	} //end of while
	
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<meta http-equiv="refresh" content="3;url=myaccount.php">
<title>Book Store</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">

       <div class="header">
       		<div class="logo"><a href="index.php"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>            
        <div id="menu">
            <ul>                                                                       
            <li><a href="index.php">home</a></li>
            <li><a href="about.php">about us</a></li>
            <li><a href="category.php">books</a></li>
            <li><a href="specials.php">specials books</a></li>
            <li class="selected"><a href="myaccount.php">my accout</a></li>
            <li><a href="gift.php">gift</a></li>
            <li><a href="search.php">search</a></li>
            <li><a href="contact.php">contact</a></li>
            </ul>
        </div>     
            
            
       </div> 
       
       
        <div class="center_content">
			<div class="left_content">
				<div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>My account</div>
			
				<div class="feat_prod_box_details">
				  
				<?php
				if ($flag) {
			
				$sid= $_SESSION['id'];
				$sname = $_SESSION['name'];
				$spass = $_SESSION['pass']; 
				echo "<h1>Hello $sname, welcome to our BookShop! </h1>";
				echo "<br/>";
				echo "<h1>After 3 seconds will go your Account page! </h1>";
				
				} //end of if
				else {
			
					echo "Your password is wrong or your username doesn't exist. Sorry.<br /><br />";
				}
			
				//echo "this is your session id: ".$_SESSION['sessionID']."<br /><br />";
				oci_close($connect);
				?> 
	 
				</div>	
		
			<div class="clear"></div>
			</div><!--end of left content-->
        
			<div class="right_content">
        	<div class="languages_box">
				<span class="red">Languages:</span>
				<a href="#"><img src="images/au.gif" width="15" height="10" alt="" title="" border="0" /></a>           
            </div>
			<div class="currency">
				<span class="red">Currency: </span>                
				<a href="#"><strong>AUD</strong></a>
			</div>
				
			<div class="state">
			<?php 
				echo loginshow();
			?>
            </div>
                
                
			<div class="cart">
			<div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
				<div class="home_cart_content">
				<?php
					echo writeShoppingCart();
				?>
				</div>
			<a href="cart.php" class="view_cart">view cart</a>
			</div>
                       
            	
        
        
            <div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span>About Our Store</div> 
            <div class="about">
				<p>
					<img src="images/about.gif" alt="" title="" class="right" />
					BookStore is a 100% Australian-owned online retail store selling books Australia wide. Based in Geelong, Australia we offer handreds books from our database which have been categorised into a variety of subjects to make it easier for you to browse and shop.
				</p>
			</div>
             
            <div class="right_box">
            <div class="title"><span class="title_icon"><img src="images/bullet4.gif" alt="" title="" /></span>Promotions</div> 
                <?php
					echo rightbookShow();
				?>               
            </div>
             
            <div class="right_box">
            <div class="title"><span class="title_icon"><img src="images/bullet5.gif" alt="" title="" /></span>Categories</div> 
                
                <ul class="list">
                <li><a href="#">accesories</a></li>
                <li><a href="#">books gifts</a></li>
                <li><a href="#">specials</a></li>
                <li><a href="#">hollidays gifts</a></li>
                <li><a href="#">accesories</a></li>
                <li><a href="#">books gifts</a></li>
                <li><a href="#">specials</a></li>
                <li><a href="#">hollidays gifts</a></li>
                <li><a href="#">accesories</a></li>
                <li><a href="#">books gifts</a></li>
                <li><a href="#">specials</a></li>                                              
                </ul>
            </div>       
             
        
        </div><!--end of right content-->
        
        
       
       
		<div class="clear"></div>
		</div><!--end of center content-->
       
              
		<div class="footer">
       	
		<div class="left_footer"><img src="images/footer_logo.gif" alt="" title="" />
		<br /> 
		<a href="http://csscreme.com/freecsstemplates/" title="free templates">
			<img src="images/csscreme.gif" alt="free templates" title="free templates" border="0" />
		</a>
		
		</div>
        
		
		<div class="right_footer">
        <a href="index.php">home</a>
        <a href="about.php">about us</a>
        <a href="search.php">search</a>
        <a href="license.txt">privacy policy</a>
        <a href="contact.php">contact us</a>
        </div>
		
		<div class="center_footer">
		<p>
		"©Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT203: Web Programming. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY."
		</p>
		</div>
        
       
       </div>
    

</div>

</body>

</html>