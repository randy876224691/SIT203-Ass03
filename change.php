<?php
session_start(); 
if($_SESSION["name"]==null||$_SESSION["name"]==""){
echo "<script>alert('You need login');window.location.href=' http://www.deakin.edu.au/~xyib/SIT203/ass3/logoin.php';</script>";
}
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

<script>
	 function CheckForm()
	{
		var a=document.register.username.value;
		var b=document.register.password.value;
		var c=document.register.repassword.value;
		var d=document.register.email.value;
		var e=document.register.phone.value;
		var f=document.register.address.value;
		var g=document.register.state.value;
		var h=document.register.postcode.value;
			
		if (a.length==0)
		{
			alert("Please enter your surname");
			return false;
		}
		if (b.length==0)
		{
			alert("Please enter your password");
			return false;
		}
		if (c!=b)
		{
			alert("Incorrect password, please re-enter");
			return false;
		}
		if (d.length==0 || d.indexOf('@')==-1)
			{
				alert("Please enter your E-Mail curretly");
				return false;
			}	
		if (h.length<1 ||h.length>4)
			{
				alert("Please enter your postcode curretly!");
				return false;
			}
			
		return true;
	
	}
</script>

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
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Register</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">
             
            </p>
            
              	<div class="contact_form">
                <div class="form_subtitle">Change Asccount Details</div>
                 <form name="register" action="changeS.php" onSubmit="return CheckForm()" method="POST">   
				 
                    <div class="form_row">
                    <label class="contact"><strong>Password:</strong></label>
                    <input type="text" class="contact_input" name="password" onblur="check_len(this)" required/><span id="show_pass" style="color:red;"></span>
                    </div> 
					
					<div class="form_row">
                    <label class="contact"><strong>Check Password:</strong></label>
                    <input type="text" class="contact_input" name="repassword" onblur="check_pass(this)" required/><span id="show_repass" style="color:red;"></span>
                    </div> 

                    <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input type="text" class="contact_input" name="phone" required/>
                    </div>
					
					<div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" class="contact_input" name="email" onblur="check_email(this)" required/><span id="show_e" style="color:red;">
                    </div>
                    
                    <div class="form_row">
                    <label class="contact"><strong>Address:</strong></label>
                    <input type="text" class="contact_input" name="address" required/>
                    </div>      

					<div class="form_row">
                    <label class="contact"><strong>State:</strong></label>
                    <input type="text" class="contact_input" name="state" required/>
                    </div> 	

					<div class="form_row">
                    <label class="contact"><strong>Postcode:</strong></label>
                    <input type="text" class="contact_input" name="postcode" required/>
                    </div> 					

                    <div class="form_row">
                    <input type="submit" class="register" value="UPDATE" />
					<input type="reset" class="register2" align="center"/>
                    </div>   
                  </form>     
                </div>  
            
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