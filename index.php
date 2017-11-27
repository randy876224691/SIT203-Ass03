<?php
// Start the session
session_start();
// Include database connection
include 'inc/global-connect.inc.php';
// Include functions
include'inc/functions.inc.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Book Store</title>
<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
<div id="wrap">

       <div class="header">
       		<div class="logo"><a href="index.php"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>            
        <div id="menu">
            <ul>                                                                       
            <li class="selected"><a href="index.php">home</a></li>
            <li><a href="about.php">about us</a></li>
            <li><a href="category.php">books</a></li>
            <li><a href="specials.php">specials books</a></li>
            <li><a href="myaccount.php">my accout</a></li>
            <li><a href="gift.php">gift</a></li>
            <li><a href="search.php">search</a></li>
            <li><a href="contact.php">contact</a></li>		
            </ul>
        </div>     
            
            
       </div> 
       
       
       <div class="center_content">
       	<div class="left_content">
		<div class='title'><span class='title_icon'><img src='images/bullet1.gif' alt='' title='' /></span>Featured books</div>
        <?php
		if (!$connect) {
		echo "An error occurred connecting to the database"; 
		exit; 
		}
		/* build sql statement using form data */
		$query = "SELECT * FROM bookdetails WHERE catalog='acdemic'";
		/* check the sql statement for errors and if errors report them */
		$stmt_a = oci_parse($connect, $query);

		if(!$stmt_a) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmt_a);
		?>
	   
	   
	    <?php 
		$connect = oci_connect($dbuser, $dbpass, $db);
		if (!$connect) {
		echo "An error occurred connecting to the database"; 
		exit; 
		}
		/* build sql statement using form data */
		$query = "SELECT * FROM bookdetails WHERE ROWNUM<=3 ORDER BY INPUTDATE";
		/* check the sql statement for errors and if errors report them */
		$stmt_b = oci_parse($connect, $query);
		if(!$stmt_b) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmt_b);
		?>
		
		<?php 
		$connect = oci_connect($dbuser, $dbpass, $db);
		if (!$connect) {
		echo "An error occurred connecting to the database"; 
		exit; 
		}
		/* build sql statement using form data */
		$query = "SELECT * FROM bookdetails WHERE DISCOUNT=1 AND ROWNUM<=3 ORDER BY INPUTDATE";
		/* check the sql statement for errors and if errors report them */
		$stmt_c = oci_parse($connect, $query);
		if(!$stmt_c) {
		echo "An error occurred in parsing the sql string.\n";
		exit;
		}
		oci_execute($stmt_c);
		?>
		
		
		<!--flash-->
		<div class="feat_prod_box_2">
		
		<object class="feat_prod_box_2">
		<embed src="image/flash.swf" width="450" height="520" wmode="transparent" type="application/x-shockwave-flash">
		</embed>
		</object>
		
		<div class='clear'></div>
        </div>
		
		<div class="title"><span class="title_icon"><img src="images/bullet2.gif" alt="" title="" /></span>New books</div> 
		<div class='new_products'>
		
		<?php
		// Display all the values in the retrieved records, one record per row, in a loop
		while(oci_fetch($stmt_b)) {
		// Start define all values
		$a2 = oci_result($stmt_b,"NAME"); 
		$b2 = oci_result($stmt_b,"CATALOG"); 
		$c2 = oci_result($stmt_b,"TITLE"); 
		$l2 = oci_result($stmt_b,"IMAGE");		
		echo
		"
							<div id='new_prod' >
		
								<div class='new_prod_box' id='new_prod_box'>
					
									<a href='bookdetail.php?bookname=$a2&booktype=$b2'> $c2 </a>
                 
									<div class='new_prod_bg' id='new_prod_bg'>
										<a href='bookdetail.php?bookname=$a2&booktype=$b2' ><img src='image/bookcoversmall/$l2' /> </a>
									</div>
								</div>
							</div>	
		";
		}
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