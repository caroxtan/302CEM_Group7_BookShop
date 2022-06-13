<!DOCTYPE html>
<?php
	session_start();
	//connection to database
	include('bookshop_database.php');
	$status="";
	/**
	//print out all product from database
	if (isset($_POST['product_id']) && $_POST['product_id']!=""){
		$product_id = $_POST['product_id'];
		$result = mysqli_query(
		$combine,
		"SELECT * FROM `product` WHERE `product_id`='$product_id'"
	);
	//fetch record
	$row = mysqli_fetch_assoc($result);
	$product_name = $row['product_name'];
	$product_id = $row['product_id'];
	$price = $row['price'];
	$img = $row['img'];
	 
	 //array
	$cartArray = array(
	 $product_id=>array(
	 'product_name'=>$product_name,
	 'product_id'=>$product_id,
	 'price'=>$price,
	 'quantity'=>1,
	 'img'=>$img)
	);
	 
	if(empty($_SESSION["shopping_cart"])) {
		$_SESSION["shopping_cart"] = $cartArray;
		$status = "<div class='box'>Product is added to your cart!</div>";
	}else{
		$array_keys = array_keys($_SESSION["shopping_cart"]);
		if(in_array($product_id,$array_keys)) {
	 $status = "<div class='box' style='color:red;'>
	 Product is already added to your cart!</div>"; 
		} else {
		$_SESSION["shopping_cart"] = array_merge(
		$_SESSION["shopping_cart"],
		$cartArray
		);
		$status = "<div class='box'>Product is added to your cart!</div>";
	 }
	 
	 }
	}**/
?>
<html>


	<head>
		<title>Book</title>
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
		
	<div class = "page-header">
		<center><h1>Book</h1></center>
		<?php /**
		if(!empty($_SESSION["shopping_cart"])) {
		$cart_count = count(array_keys($_SESSION["shopping_cart"]));**/
		?>
		<div class="cart_div">
		<a href="cart.php"><i class="fa fa-shopping-cart my-cart-icon" style="color:white; font-size:35px; margin-top:8px; margin-right:3px;"
		aria-hidden="true"></i><span><?php echo $cart_count; ?></span></a>
		</div>
		
	</div>
			
	<div class = "row">
		<br>
		<?php/**
			$result = mysqli_query($combine,"SELECT * FROM `product`");
			while($row = mysqli_fetch_assoc($result)){
				echo "<div class='product_wrapper'>
				<form method='post' action=''>
				<input type='hidden' name='product_id' value=".$row['product_id']." />
				<div class='image'><img src='Image/".$row['img']."' alt=".$row['product_name']." /></div>
				<div class='name' name='product_name'>".$row['product_name']."</div>
				<div class='price'>$".$row['price']."</div>
				<button type='button' name='detail' class='detail'><a href='".$row['product_link']."'>Detail</a></button>
				<button type='submit' name='add_to_cart' class='add_to_cart'>Add To Cart</button>
				</form>
				</div>";*/
					}

			?>
	</div>
		
		
		<?php
		include('footer.php');
		?>
	</body>
</html>