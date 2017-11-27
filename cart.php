<?php
session_start(); 
if($_SESSION["name"]==null||$_SESSION["name"]==""){
echo "<script>alert('You need login');window.location.href=' http://www.deakin.edu.au/~xyib/SIT203/ass3/logoin.php';</script>";
}
// Include database connection
require_once('inc/global-connect.inc.php');
// Include functions
require_once('inc/functions.inc.php');

// Process actions
$cart = $_SESSION['cart'];
$action = $_REQUEST['action'];
//$bookname = $_REQUEST['bookname'];
//$booprice = $_REQUEST['bookprice'];
//$bookid = $_REQUEST['id']; 
//$cardid = $_REQUEST['cardid']; 


//echo "$bookname, $booprice";
switch ($action) {
   case 'add':
       if ($cart) {
           $cart .= ','.$_GET['bookid'];
       } else {
           $cart = $_GET['bookid'];
       }
       break;    
    case 'delete':
        if ($cart) {
            $items = explode(',',$cart);
            $newcart = '';
            foreach ($items as $item) {
                if ($_GET['bookid'] != $item) {
                    if ($newcart != '') {
                        $newcart .= ','.$item;
                    } else {
                        $newcart = $item;
                    }
                } //end of if
            } //end of foreach
            $cart = $newcart;
        }//end of if
        break;
    //end of switch
    case 'update':
        if ($cart) {
            $newcart = '';
            foreach ($_POST as $key=>$value) {
                if (stristr($key,'qty')) {
                    $bookid = str_replace('qty','',$key);
                    $items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
                    $newcart = '';
                    foreach ($items as $item) {
                        if ($bookid != $item) {
                            if ($newcart != '') {
                                $newcart .= ','.$item;
                            } else {
                                $newcart = $item;
                            }
                        }//end of if
                    }//end of foreach

                    for ($i=1;$i<=$value;$i++) {
                        if ($newcart != '') {
                            $newcart .= ','.$bookid;
                        } else {
                            $newcart = $bookid;
                        }
                    } //end of for

                }//end of if
            }//end of foreach

        }//end of if

        $cart = $newcart;
        break;
}
$_SESSION['cart'] = $cart;

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
            <li><a href="index.php">home</a></li>
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
            


					<div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>My cart</div>
					<div class="feat_prod_box_details">
					
					<table class='cart_table'>
					</table>
					
					<!--Function in inc\function.inc.php -->
					
					<?php
					echo writeShoppingCart();
					?>

					<!--Function in inc\function.inc.php -->
					
					<?php
					echo showCart();
					?>
					
					
					<a href="category.php" class="continue">&lt; continue</a>
					<a href="order.php" class="checkout">checkout &gt;</a>

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