<!DOCTYPE html>
<?php
	session_start();
	//connection to database
	include('bookshop_database.php');

	$status="";
	
	//print out all book from database
	if (isset($_POST['book_id']) && $_POST['book_id']!=""){
		$book_id = $_POST['book_id'];
		$result = mysqli_query(
		$combine,
		"SELECT * FROM `book` WHERE `book_id`='$book_id'"
	);
	//fetch record
	$row = mysqli_fetch_assoc($result);
	$book_name = $row['book_name'];
	$book_id = $row['book_id'];
	$price = $row['price'];
	$img = $row['img'];
	 
	 //array
	$cartArray = array(
	 $book_id=>array(
	 'book_name'=>$book_name,
	 'book_id'=>$book_id,
	 'price'=>$price,
	 'quantity'=>1,
	 'img'=>$img)
	);
	 
	if(empty($_SESSION["shopping_cart"])) {
		$_SESSION["shopping_cart"] = $cartArray;
		$status = "<div class='box'>book is added to your cart!</div>";
	}else{
		$array_keys = array_keys($_SESSION["shopping_cart"]);
		if(in_array($book_id,$array_keys)) {
	 $status = "<div class='box' style='color:red;'>
	 book is already added to your cart!</div>"; 
		} else {
		$_SESSION["shopping_cart"] = array_merge(
		$_SESSION["shopping_cart"],
		$cartArray
		);
		$status = "<div class='box'>book is added to your cart!</div>";
	 }
	 
	 }
	}
?>
<html>
<style>
	body
	{
		margin : 0;
		padding : 0;
		background-size : cover;
		background-position:center;
	}
		
		.sidenav {
		  width: 130px;
		  position: fixed;
		  z-index: 1;
		  top: 100px;
		  left: 10px;
		  bottom: 100px;
		  overflow-x: hidden;
		  padding: 8px 0;
		}

		.sidenav a {
		  padding: 6px 8px 6px 16px;
		  text-decoration: none;
		  color: #2196F3;
		  display: block;
		}

		.sidenav a:hover {
		  color: #064579;
		}

		.main {
		  margin-left: 140px; /* Same width as the sidebar + left position in px */
		  padding: 0px 10px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}

	
</style>

	<head>
		<title>book</title>
		<meta charset = "utf-8">
		
		 <!-- CSS -->
		<link rel="stylesheet" href="css/themify-icon.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
	</head>
	
	<body>
		<!-- Header-->
		<?php
			include('header.php');
		?>
		<!--End Header-->

		
	<div class = "page-header">
		<center><h1>Book List</h1></center>
		<?php/**
		if(!empty($_SESSION["shopping_cart"])) {
		$cart_count = count(array_keys($_SESSION["shopping_cart"]));
		?>
		<div class="cart_div">
		<a href="cart.php"><i class="fa fa-shopping-cart my-cart-icon" style="color:white; font-size:35px; margin-top:8px; margin-right:3px;"
		aria-hidden="true"></i><span><?php echo $cart_count; ?></span></a>
		</div>**/
		
		?>
	</div>
			
	<div class = "row">
		<br>
		<?php
			$result = mysqli_query($combine,"SELECT * FROM `book`");
			while($row = mysqli_fetch_assoc($result)){
				echo "<div class='book_wrapper'>
				<form method='post' action=''>
				<input type='hidden' name='book_id' value=".$row['book_id']." />
				<div class='image'><img src='Image/".$row['img']."' alt=".$row['book_name']." /></div>
				<div class='name' name='book_name'>".$row['book_name']."</div>
				<div class='price'>$".$row['price']."</div>
				<button type='button' name='detail' class='detail'><a href='".$row['book_link']."'>Detail</a></button>
				<button type='submit' name='add_to_cart' class='add_to_cart'>Add To Cart</button>
				</form>
				</div>";
					}

			?>
	</div>
		
		
		<!--Footer-->
	<?php
		include('footer.php');
	?>
		<!--End Footer-->
	</body>
</html>