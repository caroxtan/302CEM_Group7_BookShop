<?php
	include("bookshop_database.php");
	session_start();
	//took record base on the username
	$username = $_SESSION['username'];
	if($username == ''){
		header('location:login.php');
	}
	$status="";
	if (isset($_POST['action']) && $_POST['action']=="remove"){
	if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $key => $value) {
		  if($_POST["book_id"] == $key){
		  unset($_SESSION["shopping_cart"][$key]);
		  $status = "<div class='box' style='color:red;'>
		  book is removed from your cart!</div>";
		  }
		  if(empty($_SESSION["shopping_cart"]))
		  unset($_SESSION["shopping_cart"]);
		  } 
	}
	}
	 
	if (isset($_POST['action']) && $_POST['action']=="change"){
	  foreach($_SESSION["shopping_cart"] as &$value){
		if($value['book_id'] === $_POST["book_id"]){
			$value['quantity'] = $_POST["quantity"];
			break; // Stop the loop after we've found the book
		}
	 }   
	}
	
?>
<html>
<head>
		<title>Shopping cart</title>
		<meta charset = "utf-8">
		
		
		 <!-- CSS -->
		<link rel = "stylesheet" href="css/themify-icon.css">
		<link rel = "stylesheet" type = "text/css" href = "profile.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
	</head>
	
	<body>
		<!-- Header-->
		<?php
			include('header.php');
		?>
		<!--End Header-->
		
	<div class='sidenav'>
		<a href='view_books.php'><font color='black'><b>VIEW BOOKS</b></font></a>
		<a href='it_books.php'><font color='black'>Information Technology</font></a>
		<a href='cs_books.php'><font color='black'>Computer Science</font></a>
	    <a href='maths_books.php'><font color='black'>Mathematics</font></a>
		<a href='science_books.php'><font color='black'>Science</font></a>
		<a href='feedback.php'><font color='green'><b>FEEDBACK</b></font></a>
	</div>
	
	<div class="cart">
	<?php 
		if(isset($_SESSION["shopping_cart"])){
		$total_price = 0;
	?>
		<table class="table">
			<tr>
				<th style="align:center;" colspan="5"><h2 style="font_size:+4">CART</h2></th>
			</tr>
			<tr>
				<td></td>
				<td  class="title">ITEM</td>
				<td  class="title">QUANTITY</td>
				<td  class="title">UNIT PRICE</td>
				<td  class="title">ITEMS TOTAL</td>
				
			</tr> 
			<?php 
			
				foreach ($_SESSION["shopping_cart"] as $book){
			?>
			<tr>
				<td>
					<img src='Image/<?php echo $book["book_cover"]; ?>' width="50" height="40" />
				</td>
				<td>
					<?php echo $book["book_name"]; ?><br />
					<form method='post' action=''>
						<input type='hidden' name='book_id' value="<?php echo $book["book_id"]; ?>" />
						<input type='hidden' name='action' value="remove" />
						<button type='submit' class='remove'>Remove Item</button>
					</form>
				</td>
				<td>
					<form method='post' action=''>
						<input type='hidden' name='book_id' value="<?php echo $book["book_id"]; ?>" />
						<input type='hidden' name='action' value="change" />
					<select name='quantity' class='quantity' onChange="this.form.submit()">
						<option <?php if($book["quantity"]==1) echo "selected";?>
						value="1">1</option>
						<option <?php if($book["quantity"]==2) echo "selected";?>
						value="2">2</option>
						<option <?php if($book["quantity"]==3) echo "selected";?>
						value="3">3</option>
						<option <?php if($book["quantity"]==4) echo "selected";?>
						value="4">4</option>
						<option <?php if($book["quantity"]==5) echo "selected";?>
						value="5">5</option>
					</select>
					</form>
				</td>
				<td>
					<?php echo "RM".$book["book_retail_price"]; ?>
				</td>
				<td>
					<?php echo "RM".$book["book_retail_price"]*$book["quantity"]; ?>
				</td>
			</tr>
			<?php
				$total_price += ($book["book_retail_price"]*$book["quantity"]);
			}
			?>
			<tr>
				<td colspan="5" align="right">
				<strong>TOTAL: <?php echo "RM".$total_price; ?></strong>
				</td>
			</tr>
			<tr>
				<td colspan="5" align="right">
				<a href="payment.php" name ="payment" class="payment_btn">CheckOut</a>
				</td>
			</tr>
		</table> 
		<?php
		}else{
		 echo "<h3>Your cart is empty!</h3>";
		 }
		?>
	</div>
	
		<div style="clear:both;"></div>
		 
		<div class="message_box" style="margin:10px 0px;">
		<?php echo $status; ?>
</div>
		<!--Footer-->
		<?php
		include('footer.php');
		?>
		<!--End Footer-->
</body>
</html>