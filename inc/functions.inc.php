
<?php
//using to show book details
function bookdetails(){
	
	$bn = $_GET['bookname'];
	$bt = $_GET['booktype'];

	global $connect;
	/* build sql statement using form data */
	$query = "SELECT * FROM bookdetails WHERE NAME = '".$bn."'";

	/* check the sql statement for errors and if errors report them */
	$stmt = oci_parse($connect, $query); 
	//echo "SQL: $query<br>";
	if(!$stmt) {
	echo "An error occurred in parsing the sql string.\n"; 
	exit; 
	}

	oci_execute($stmt);
	// Display all the values in the retrieved records, one record per row, in a loop
	while(oci_fetch($stmt)) {
	// Start define all values
	$id = oci_result($stmt,"BOOKID"); 
	$a = oci_result($stmt,"NAME"); 
	$b = oci_result($stmt,"CATALOG"); 
	$c = oci_result($stmt,"TITLE"); 
	$d = oci_result($stmt,"FIRSTNAME"); 
	$e = oci_result($stmt,"FAMILYNAME"); 
	$f = oci_result($stmt,"WAS"); 
	$g = oci_result($stmt,"PRICE"); 
	$h = oci_result($stmt,"LANGUAGE"); 
	$i = oci_result($stmt,"ISBN"); 
	$j = oci_result($stmt,"ISBN10"); 
	$k = oci_result($stmt,"DESCRIPTION"); 
	$l = oci_result($stmt,"IMAGE"); 
	$m = oci_result($stmt,"URL"); 
	$n = oci_result($stmt,"INPUTDATE"); 
	
	echo
	"
	<div class='left_content'>
	<div class='crumb_nav'>
	  <a href='index.html'>home</a> &gt;&gt; $a
	</div>
	<div class='title'>
	  <span class='title_icon'>
		<img src='images/bullet1.gif' alt='' title='' />
	  </span> $c
	</div>

	<div class='feat_prod_box_details'>

	  <div class='prod_img'>
		<img src='image/bookcoversmall/$l' />
		<br />
		<br />
		<a href='images/big_pic.jpg' rel='lightbox'>
		  <img src='images/zoom.gif' alt='' title='' border='0' />
		</a>
	  </div>

	  <div class='prod_det_box'>
		<div class='box_top'></div>
		<div class='box_center'>
		  <div class='prod_title'>Details</div>
		  <p class='details'>
			ARTIST: $d, $e
			<br />
			CATEGORY: $b
			<br />
			LANGUAGE: $h
			<br />
			ISBN: $i
			<br />
			ISBN-10:$j
			<br />
			<br />
			<br />
		  </p>
		  <div class='price'>
			<strong>Was PRICE:</strong>
			<span class='red'>$f</span>
		  </div>
		  <div class='price'>
			<strong>PRICE:</strong>
			<span class='red'>$g</span>
		  </div>
		  <div class='price'>
			<strong>COLORS:</strong>
			<span class='colors'>
			  <img src='images/color1.gif' alt='' title='' border='0' />
			</span>
			<span class='colors'>
			  <img src='images/color2.gif' alt='' title='' border='0' />
			</span>
			<span class='colors'>
			  <img src='images/color3.gif' alt='' title='' border='0' />
			</span>
		  </div>
		  <a href='cart.php?bookname=$a&bookprice=$g&action=add&bookid=$id' class='more'>
			<img src='images/order_now.gif' alt='' title='' border='0' />
		  </a>
		  <div class='clear'></div>
		</div>

		<div class='box_bottom'></div>
	  </div>
	  <div class='clear'></div>
	</div>


	<div id='demo' class='demolayout'>

	  <ul id='demo-nav' class='demolayout'>
		<li>
		  <a class='active' href='#tab1'>More details</a>
		</li>
		<li>
		  <a class='' href='#tab2'>Related books</a>
		</li>
	  </ul>

	  <div class='tabs-container'>

		<div style='display: block;' class='tab' id='tab1'>
		<div class='prod_title'>Description</div>
		  <p class='more_details'>
			$k
		  </p>
		  <ul class='list'>
			<li>
			  <a href='#'>a</a>
			</li>
			<li>
			  <a href='#'>b</a>
			</li>
			<li>
			  <a href='#'>c</a>
			</li>
			<li>
			  <a href='#'>d</a>
			</li>
		  </ul>
		</div>

		<div style='display: none;' class='tab' id='tab2'>
		  <div class='new_prod_box'>
			<a href='details.html'>product name</a>
			<div class='new_prod_bg'>
			  <a href='details.html'>
				<img src='images/thumb1.gif' alt='' title='' class='thumb' border='0' />
			  </a>
			</div>
		  </div>

		  <div class='new_prod_box'>
			<a href='details.html'>product name</a>
			<div class='new_prod_bg'>
			  <a href='details.html'>
				<img src='images/thumb2.gif' alt='' title='' class='thumb' border='0' />
			  </a>
			</div>
		  </div>

		  <div class='new_prod_box'>
			<a href='details.html'>product name</a>
			<div class='new_prod_bg'>
			  <a href='details.html'>
				<img src='images/thumb3.gif' alt='' title='' class='thumb' border='0' />
			  </a>
			</div>
		  </div>

		  <div class='new_prod_box'>
			<a href='details.html'>product name</a>
			<div class='new_prod_bg'>
			  <a href='details.html'>
				<img src='images/thumb1.gif' alt='' title='' class='thumb' border='0' />
			  </a>
			</div>
		  </div>

		  <div class='new_prod_box'>
			<a href='details.html'>product name</a>
			<div class='new_prod_bg'>
			  <a href='details.html'>
				<img src='images/thumb2.gif' alt='' title='' class='thumb' border='0' />
			  </a>
			</div>
		  </div>

		  <div class='new_prod_box'>
			<a href='details.html'>product name</a>
			<div class='new_prod_bg'>
			  <a href='details.html'>
				<img src='images/thumb3.gif' alt='' title='' class='thumb' border='0' />
			  </a>
			</div>
		  </div>



		  <div class='clear'></div>
		</div>

	  </div>


	</div>
  ";
  }
}

//using to show customer details
function accountdetails(){

	$check=$_SESSION['name'];
	$checkid=$_SESSION['cid'];
	$ca=$_REQUEST['USERNAME'];
	$cb=$_REQUEST['EMAIL'];
	$cc=$_REQUEST['PHONE'];
	$cd=$_REQUEST['ADDRESS'];
	$ce=$_REQUEST['STATE'];
	$cf=$_REQUEST['POSTCODE'];

	global $connect;
	/* build sql statement using form data */
	$query="SELECT * FROM customeraccount WHERE USERNAME='".$check."'";
	/* check the sql statement for errors and if errors report them */
	$stmt = oci_parse($connect, $query);

	if(!$stmt) {
	echo "An error occurred in parsing the sql string.\n";
	exit;
	}
	oci_execute($stmt);

	while (oci_fetch_array($stmt))
	{
		$cid = oci_result($stmt,"ID"); 
		$cname=oci_result($stmt,"USERNAME");
		$password=oci_result($stmt,"PASSWORD");
		$email=oci_result($stmt,"EMAIL");
		$phone=oci_result($stmt,"PHONE");
		$address=oci_result($stmt,"ADDRESS");
		$state=oci_result($stmt,"STATE");
		$postcode=oci_result($stmt,"POSTCODE");
	}

	echo
	"
	<div class='contact_form'>
		<div class='form_subtitle'>Customer Detail</div>
			<table width=auto>
	
				<tr>
				<th>Name</th>
				<td>$cname</td>
				</tr>
			
				<tr>
				<th>Email</th>
				<td>$email</td>
				</tr>
			
				<tr>
				<th>Phone</th>
				<td>$phone</td>
				</tr>
			
				<tr>
				<th>Address</th>
				<td>$address, $state, $postcode</td>
				</tr>

			</table>
	</div>
		
	<br/>
	<br/>
	
	<div class='contact_form'>
	<a href='Change.php'>If you want change some details, Please Click Here &gt&gt&gt</a>
	</div>
	";
}

//using to show book order history
function orderHistory(){

$check=$_SESSION['name'];
$checkid=$_SESSION['cid'];

	global $connect;
	//query book order history between 12 month(1 years, 365 days)
	$query="SELECT TITLE, IMAGE, order_date FROM customeorder, customeorderline, bookdetails WHERE customeorder.orderID = customeorderline.orderID AND customeorderline.bookID = bookdetails.bookID AND ID = '".$checkid."' AND sysdate-order_date<365 AND CATALOG != 'card' ORDER BY order_date DESC";
	/* check the sql statement for errors and if errors report them */
	$stmt = oci_parse($connect, $query);

	if(!$stmt) {
	echo "An error occurred in parsing the sql string.\n";
	exit;
	}
	oci_execute($stmt);

	while (oci_fetch_array($stmt))
	{
		$btitle = oci_result($stmt,"TITLE"); 
		$image = oci_result($stmt,"IMAGE"); 
		$date = oci_result($stmt,"ORDER_DATE");
		
		echo
		"
		<table width='320px'>
			
				<tr>
					<th rowspan='2'>
					<img src='image/bookcoversmall/".$image."'/>
					</th>
				<th>Book Name</th>
				<td>$btitle</td>
				</tr>
				<tr>
					
						
						<th>Date</th>
						<td>$date</td>
					
				</tr>
			</table>
		";
	}
}

//using to show card order history
function cardorderdetails(){

$check=$_SESSION['name'];
$checkid=$_SESSION['cid'];

	global $connect;
	//query Gift card order history between 3 month(91 days)
	$query5="SELECT cardID, getID, corderdate, cardused FROM giftcard WHERE ID = '".$checkid."' AND sysdate-corderdate<91 ORDER BY corderdate DESC";
	/* check the sql statement for errors and if errors report them */
	$stmt_5 = oci_parse($connect, $query5);

	if(!$stmt_5) {
	echo "An error occurred in parsing the sql string.\n";
	exit;
	}
	oci_execute($stmt_5);
	
	while (oci_fetch($stmt_5))
	{
		$cardid = oci_result($stmt_5,"CARDID"); 
		$getid = oci_result($stmt_5,"GETID"); 
		$cdate = oci_result($stmt_5,"CORDERDATE");
		$cu = oci_result($stmt_5,"CARDUSED");
		
		if ($cu == 1)
		{
			echo
			"
			<table border='1' width='320px'>
			
				<tr>
					<th rowspan='2'>
					<img src='image/giftcard/Gift".$cardid."bst.jpg'/>
					</th>
				<th>Card number</th>
				<td><span style='color:red;'>$getid<span></td>
				</tr>
				<tr>
					
						
						<th>Date</th>
						<td>$cdate</td>
					
				</tr>
			</table>
			";
		}
		else
		{
			echo
			"
			<table border='1' width='320px'>
			
				<tr>
					<th rowspan='2'>
					<img src='image/giftcard/Gift".$cardid."bst.jpg'/>
					</th>
				<th>Card number</th>
				<td><span style='color:green;'>$getid<span></td>
				</tr>
				<tr>
					
						
						<th>Date</th>
						<td>$cdate</td>
					
				</tr>
			</table>
			";
		}
	}
}

//login and logout stat
function loginshow(){
	if (isset($_SESSION['name'])){
	echo "<a href='logout.php'><strong>Logout</strong></a>";
	} else {
	echo "<a href='login.php'><strong>Login</strong></a>";
	}
}

//function for right box promotions
function rightbookShow(){
	global $connect;
	/* build sql statement using form data */
	$query = "SELECT * FROM bookdetails WHERE DISCOUNT=1 AND ROWNUM<=3 ORDER BY INPUTDATE";
	/* check the sql statement for errors and if errors report them */
	$stmt_c = oci_parse($connect, $query);
	if(!$stmt_c) {
	echo "An error occurred in parsing the sql string.\n";
	exit;
	}
	oci_execute($stmt_c);


	while(oci_fetch($stmt_c))
	{
	$a2 = oci_result($stmt_c,"NAME"); 
	$b2 = oci_result($stmt_c,"CATALOG"); 
	$c2 = oci_result($stmt_c,"TITLE"); 
	$l2 = oci_result($stmt_c,"IMAGE");		
	echo
	"
	<div id='new_prod' >

		<div class='new_prod_box' id='new_prod_box'>

			<a href='bookdetail.php?bookname=$a2&booktype=$b2'> $c2 </a>

			<div class='new_prod_bg' id='new_prod_bg'>
				<span class='new_icon'><img src='images/promo_icon.gif' alt='' title=''/></span>
				<a href='bookdetail.php?bookname=$a2&booktype=$b2' ><img src='image/bookcoversmall/$l2' /> </a>
			</div>
		</div>
	</div>	
	";
	}
}

//search page main function
function search() {

	global $connect;
	$keywords = $_REQUEST['search'];
	$where = $_REQUEST['where'];
	$sql = "SELECT * FROM bookdetails where TITLE LIKE '%".$keywords."%'";
	$stmt = oci_parse($connect, $sql); 
	
	if(!$stmt)  
	{
		echo "An error occurred in parsing the sql string.\n"; 
		exit; 
    }
			
	oci_execute($stmt); 
			
	if ($keywords !='') 
	{

	$output[] = '<div class="contact_form">';
	$output[] = '<div class="form_subtitle">Result</div>';
	
	while(oci_fetch_array($stmt)) 
	{
	$a = oci_result($stmt,"NAME"); 
	$b = oci_result($stmt,"CATALOG"); 
	$c = oci_result($stmt,"TITLE"); 
	$d = oci_result($stmt,"FIRSTNAME"); 
	$e = oci_result($stmt,"FAMILYNAME"); 
	$f = oci_result($stmt,"WAS"); 
	$g = oci_result($stmt,"PRICE"); 
	$h = oci_result($stmt,"LANGUAGE"); 
	$i = oci_result($stmt,"ISBN"); 
	$j = oci_result($stmt,"ISBN10"); 
	$k = oci_result($stmt,"DESCRIPTION"); 
	$l = oci_result($stmt,"IMAGE"); 
	$m = oci_result($stmt,"URL"); 
	$n = oci_result($stmt,"INPUTDATE"); 
			
				$output[] = '<div width="325" padding="5px">';
					$output[] = '<table>';
						$output[] = '<tr>';
							$output[] = '<th width="70"><a href="bookdetail.php?bookname='.$a.'&booktype='.$b.'" ><img src="image/bookcoversmall/'.$l.'" /> </a></th>';
							$output[] = '<th width="200"> '.$c.' </th>';
							$output[] = '<th> '.$d.', '.$e.' </th>';
						$output[] = '</tr>';
					$output[] = '</table>';
				$output[] = '</div>';
				
	
			
	}
	$output[] = '</div>';	
    return join('',$output);}
	else
	{		
	return 'No Items';
	}
	
 }

//using to show shopping cart state (how many items in shopping cart)
function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return '<p>You have no items in your shopping cart</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<a href="cart.php">'.count($items).' item'.$s.' in shopping cart</a></p>';
	}
}

//show shopping cart for told items, qty and total price
function showCart() {
	global $connect;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		$output[] = '<table>';
		$output[] = '<tr class="cart_title">';
        $output[] = '<td>Item pic</td>';
        $output[] = '<td>Book name</td>';
        $output[] = '<td>Unit price</td>';
        $output[] = '<td width="3px">Qty</td>';
        $output[] = '<td>Total price</td>';
        $output[] = '<td>Remove</td>';
        $output[] = '</tr>';
		foreach ($contents as $id=>$qty) {
		
			$sql = 'SELECT * FROM bookdetails WHERE BOOKID = '.$id;
			
			// modified by Shang			
			$stmt = oci_parse($connect, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt); 
			$itotal = $price * $qty;
			while(oci_fetch_array($stmt)) {

				$title= oci_result($stmt,"TITLE");
				$price = oci_result($stmt,"PRICE");
				$id = oci_result($stmt,"BOOKID");				
				$image = oci_result($stmt,"IMAGE");				
			}
			$output[] = '<tr>';
			$output[] = '<td><img src="image/bookcoversmall/'.$image.'" alt="" title="" border="0" class="cart_thumb"/></td>';
			$output[] = '<td>'.$title.'</td>';
			$output[] = '<td>AU$ '.$price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>$ '.($price * $qty).'</td>';
			$output[] = '<td><a href="cart.php?action=delete&bookid='.$id.'" class="r">Remove</a></td>';
			
			$total += $price * $qty;
			$gst = $total*0.099;
			$_SESSION['total']=$total;
			$output[] = '</tr>';


		}
		$output[] = '</table>';
		$output[] = '<p>Grand total: <strong>AU$ '.$total.'</strong></p>';
		$output[] = '<p>GST: <strong>AU$ '.$gst.'</strong></p>';
		$output[] = '<div><button type="submit">Update cart</button></div>';
		$output[] = '</form>';
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}

//confirm order information, show delivery details, and input gift card info
function showOrder() {
	global $connect;
	$sname = $_SESSION['name'];
	$cart = $_SESSION['cart'];
	$cprice = $_SESSION['Cprice'];
	$gcn = $_POST['gcnumber'];
	$total = $_POST['total'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="orderS.php" method="post" name="order" id="order">';
		$output[] = '<div class="contact_form">';
		$output[] = '<div class="form_subtitle">Order List</div>';
		$output[] = '<table>';
		$output[] = '<tr class="cart_title">';
        $output[] = '<td>Item pic</td>';
        $output[] = '<td>Book name</td>';
        $output[] = '<td>Unit price</td>';
        $output[] = '<td>Qty</td>';
        $output[] = '<td>Total</td>';
        $output[] = '</tr>';
		foreach ($contents as $id=>$qty) {
		
			$sql = 'SELECT * FROM bookdetails WHERE BOOKID = '.$id;
			
			// modified by Shang			
			$stmt = oci_parse($connect, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt); 

			while(oci_fetch_array($stmt)) 
			{
				$title= oci_result($stmt,"TITLE");
				$price = oci_result($stmt,"PRICE");
				$id = oci_result($stmt,"BOOKID");
				$image = oci_result($stmt,"IMAGE"); 				
				$output[] = '<tr>';
				$output[] = '<td><img src="image/bookcoversmall/'.$image.'" alt="" title="" border="0" class="cart_thumb"/></td>';
				$output[] = '<td>'.$title.'</td>';
				$output[] = '<td>AU$ '.$price.'</td>';
				$output[] = '<td>'.$qty.'</td>';
				$output[] = '<td>$ '.($price * $qty).'</td>';
				$total += $price * $qty;
				$gst = $total*0.099;
				$_SESSION['total']=$total;
				$output[] = '</tr>';
			}
				$output[] = '</tr>';
		}	
		$output[] = '</table>';
		$output[] = '</div>';
	
//customer delivery info
		
			$query = "SELECT * FROM customeraccount WHERE USERNAME = '".$sname."'";

			/* check the sql statement for errors and if errors report them */
			$stmt_d = oci_parse($connect, $query);
			if(!$stmt_d) {
			echo "An error occurred in parsing the sql string.\n";
			exit;
			}
			oci_execute($stmt_d);
			
			// Display all the values in the retrieved records, one record per row, in a loop
			while(oci_fetch_array($stmt_d)) {
			// Start define all values
			$cid = oci_result($stmt_d,"ID"); 
			$cname=oci_result($stmt_d,"USERNAME");
			$password=oci_result($stmt_d,"PASSWORD");
			$email=oci_result($stmt_d,"EMAIL");
			$phone=oci_result($stmt_d,"PHONE");
			$address=oci_result($stmt_d,"ADDRESS");
			$state=oci_result($stmt_d,"STATE");
			$postcode=oci_result($stmt_d,"POSTCODE");
			}
			
			$output[] = '<div class="contact_form">';
			$output[] = '<div class="form_subtitle">Delivery Detail</div>';
			$output[] = '<table width=auto>';
			
			$output[] = '<tr>';
			$output[] = '<th>Name</th>';
			$output[] = '<td>'.$cname.'</td>';
			$output[] = '</tr>';
			
			$output[] = '<tr>';
			$output[] = '<th>Email</th>';
			$output[] = '<td>'.$email.'</td>';
			$output[] = '</tr>';
			
			$output[] = '<tr>';
			$output[] = '<th>Phone</th>';
			$output[] = '<td>'.$phone.'</td>';
			$output[] = '</tr>';
			
			$output[] = '<tr>';
			$output[] = '<th>Address</th>';
			$output[] = '<td>'.$address.', '.$state.', '.$postcode.'</td>';
			$output[] = '</tr>';

			$output[] = '</table>';
			$output[] = '</div>';
			
			
			$output[] = '<br/>';
			
			
			
// gift card check				
			$query_gfc = "SELECT * FROM giftcard WHERE getID  = '$gcn' AND cardused  ='0'";
	
			$stmt_gfc = OCIParse($connect, $query_gfc);
			if(!$stmt_gfc)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			}
			oci_execute($stmt_gfc); 
			if (oci_fetch_array($stmt_gfc))
			{
				$Cprice  = oci_result($stmt_gfc,"CARDPRICE");

			}
			else
			{
				$Cprice = 0;
				echo 'Invalid card!';
			}
	
			$_SESSION['Cprice'] = $Cprice;
			$_SESSION['gcnn'] = $gcn;
			
		
// payment info				
				$output[] = '<div class="contact_form">';
					$output[] = '<div class="form_subtitle">Bank Card Number:</div>';
					$output[] = '<div class="feat_prod_box_details">'; 		
							
						$output[] = '<div class="form_subtitle">Bank Card Number:</div>';
				 			 
							$output[] = '<div class="form_row">';
							$output[] = '<label class="contact"><strong>Bank Card Number:</strong></label>';
							$output[] = '<input type="text" class="contact_input" name="paynumber" onblur="check_len(this)"/><span id="show_payn" style="color:red;"></span>';
							$output[] = '</div>';
							
							$output[] = '<div class="form_row">';
							$output[] = '<label class="contact"><strong>CSV Number:</strong></label>';
							$output[] = '<input type="text" class="contact_input" name="paycsv" onblur="check_len(this)"/><span id="show_payc" style="color:red;"></span>';
							$output[] = '</div>';
							
					$output[] = '</div>';	
				$output[] = '</div>';	
			
			echo "$Cprice";
			$Ltotal = $total - $Cprice;
			if ($Ltotal < 0)
			{
				$LLtotal = 0;
				$_SESSION['LLtotal'] = $LLtotal;
				$LLgst = 0;
			}
			else
			{
				$LLtotal = $Ltotal;
				$_SESSION['LLtotal'] = $LLtotal;
				$LLgst = $Ltotal*0.099;
			}
			$_SESSION['Ltotal'] = $Ltotal;
			
			$output[] = '<div class="contact_form">';
				$output[] = '<div class="feat_prod_box_details">'; 
					$output[] = '<p>Grand total: <strong>AU$ '.$LLtotal.'</strong></p>';
					$output[] = '<p>GST: <strong>AU$ '.$LLgst.'</strong></p>';
					$output[] = '<input type="submit" class="register" value="Make Order" />';	
				$output[] = '</div>';		
			$output[] = '</div>';		
		$output[] = '</form>';
		
		
// giftcard input		
		$output[] = '<form action="order.php" method="post" name="order" id="order">';
			$output[] = '<div class="contact_form">';
				$output[] = '<div class="form_subtitle">Gift card Details</div>';
				$output[] = '<div class="feat_prod_box_details">'; 
				
					$output[] = '<div class="form_subtitle">Gift card Details</div>';  
					

						$output[] = '<div class="form_row">';
						$output[] = '<label class="contact"><strong>Gift Card Number:</strong></label>';
						$output[] = '<input type="text" class="contact_input" name="gcnumber" onblur="checkcard(str)"/><span id="show_gcn" style="color:red;"></span>';
						$output[] = '<input type="submit" class="register" value="Confirm" />';	
						$output[] = '<P> ONLY USING ONE CARD </P>';
						$output[] = '</div>';
						
				$output[] = '</div>';		
			$output[] = '</div>';
			$output[] = '</form>';

			
	} else {
		$output[] = 'No items please buy somethings.';
	}
	return join('',$output);
}

//make order information, show delivery details, and gift card info, input everythings into every tables of database
function makeOrder(){

	global $connect;

//php random data 
	$pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
	for($i=0;$i<8;$i++)
	{
	$cardkey .= $pattern{mt_rand(0,35)};
	}
	
	
	$sname = $_SESSION['name'];
	$cart = $_SESSION['cart'];
	$cprice = $_SESSION['Cprice'];
	$LLtotal = $_SESSION['LLtotal'];
	$gcnn = $_SESSION['gcnn'];
	
	//query customer info
			$query = "SELECT * FROM customeraccount WHERE USERNAME = '".$sname."'";
			/* check the sql statement for errors and if errors report them */
			$stmt_d = oci_parse($connect, $query);
			if(!$stmt_d) {
			echo "An error occurred in parsing the sql string.\n";
			exit;
			}
			oci_execute($stmt_d);
			
			// Display all the values in the retrieved records, one record per row, in a loop
			while(oci_fetch_array($stmt_d)) {
			// Start define all values
			$cid = oci_result($stmt_d,"ID"); 
			$cname=oci_result($stmt_d,"USERNAME");
			$password=oci_result($stmt_d,"PASSWORD");
			$email=oci_result($stmt_d,"EMAIL");
			$phone=oci_result($stmt_d,"PHONE");
			$address=oci_result($stmt_d,"ADDRESS");
			$state=oci_result($stmt_d,"STATE");
			$postcode=oci_result($stmt_d,"POSTCODE");
			}
			
	//payment info input			
			$payn = $_POST['paynumber'];
			$payc = $_POST['paycsv'];
			
			$query_count = "SELECT max(orderID) FROM customeorder";
			$stmt = oci_parse($connect, $query_count); 
			if(!$stmt)  {
			echo "An error occurred in parsing the sql string.\n"; 
			exit; 
			}
			oci_execute($stmt);
			
			if (oci_fetch_array($stmt))  
			{
				$count = oci_result($stmt,1);//returns the data for column 1  
			} 
			else 
			{
				//echo "An error occurred in retrieving order id.\n"; 
				echo "<script>alert('An error occurred in retrieving Id.');window.location.href=' http://www.deakin.edu.au/~xyib/SIT203/ass2/register.php';</script>";
				exit; 
			}

			$count++;
			echo $count."</br>";
				$SQL = "INSERT INTO customeorder VALUES ($count,'$cid',sysdate ,'$LLtotal','$payn','$pays')";

				$stmt_w = oci_parse($connect, $SQL);
				oci_execute($stmt_w);
	
	// every items input database
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		
		
		
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		
		foreach ($contents as $bookid=>$qty) {
		
			$sql = "SELECT * FROM bookdetails WHERE BOOKID = '".$bookid."'";
			
			// modified by Yibing			
			$stmt = oci_parse($connect, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt); 

			while(oci_fetch_array($stmt)) {
				$title= oci_result($stmt,"TITLE");
				$price = oci_result($stmt,"PRICE");
				$bookid = oci_result($stmt,"BOOKID");
				$l = oci_result($stmt,"IMAGE");
				$a = oci_result($stmt,"NAME"); 
				$b = oci_result($stmt,"CATALOG"); 				
			}
			$itotal = $price * $qty;
			
			if ($b == "card")
				{
					$SQL3 = "INSERT INTO giftcard VALUES ('$bookid', '$cardkey','$price' ,'$cid', sysdate, '0')";
				}
				else
				{
					$SQL3 = "INSERT INTO customeorderline VALUES ($count, '$bookid','$qty')";				
				}
				$stmt_xx = oci_parse($connect, $SQL3);
				oci_execute($stmt_xx);		
		}
		
// using gift card update
			if($gcnn != '')
			{
			$sqlUpdate = "UPDATE giftcard SET cardused = '1' WHERE GETID = '$gcnn'";
			$stmt = oci_parse($connect, $sqlUpdate); 
			oci_execute($stmt);
			}
	
			// Close the connection
			oci_close($connect);	
			
			echo "<h1>Hello $sname, You Order success </h1>";
			
	} else {
		$output[] = 'XX';
	}
}

//for gift card page, show card details
function showCard() {
	global $connect;
	if (!$connect) 
	{
		echo "An error occurred connecting to the database"; 
		exit;
	}
	/* check the sql statement for errors and if errors report them */
	$sql = "SELECT * FROM bookdetails WHERE catalog = 'card'";
	// modified by Yibing			
	$stmt = oci_parse($connect, $sql); 
  
			if(!$stmt)  
			{
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			}
	oci_execute($stmt);

		while(oci_fetch_array($stmt)) {
		// Start define all values
		$gca = oci_result($stmt,"BOOKID"); 
		$gcB = oci_result($stmt,"NAME"); 
		$gcc = oci_result($stmt,"PRICE");  
		$gcf = oci_result($stmt,"IMAGE"); 
	
	echo
			"<div id='new_prod' >
		
				<div class='new_prod_box' id='new_prod_box'>
					
					<a href='bookdetail.php?bookname=$gcB'> $gcc Gift Certificate</a>
                 
                    <div class='new_prod_bg' id='new_prod_bg'>
                        <a href='bookdetail.php?bookname=$gcB'><img src='image/bookcoversmall/$gcf' /> </a>
                    </div>
				</div>
			</div>	
			
			";
	
	}
	oci_close($connect);
}
