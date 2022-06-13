<!DOCTYPE html>
<?php
	session_start();
	//connection to database
	include('bookshop_database.php');
	$username = $_SESSION['username'];
	$status="";
	
	
	if(isset($_POST['add_to_cart']))
	{
		$username =  $_POST['username'];
		$book_id = $_POST['book_id'];
		$quantity = $_POST['quantity'];

		$username=mysqli_real_escape_string($combine, $username);
		$book_id=mysqli_real_escape_string($combine, $book_id);
		$quantity=mysqli_real_escape_string($combine, $quantity);
		
		//success store data and display message
		$query = mysqli_query($combine, "INSERT INTO user_shopping_cart
			(username, book_id, quantity) VALUES
			('$username', '$book_id', '$quantity')");
		
	}
	
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
	$book_retail_price = $row['book_retail_price'];
	$book_cover = $row['book_cover'];
	$book_description = $row['book_description'];
	$book_category = $row['book_category'];
	$book_date = $row['book_date'];
	
	 //array
	$cartArray = array(
	 $book_id=>array(
	 'book_name'=>$book_name,
	 'book_id'=>$book_id,
	 'price'=>$book_retail_price,
	 'quantity'=>1,
	 'book_cover'=>$book_cover)
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
		.cart_div{
		 position: absolute;
		right: 10px;
		margin-top:-70px;		
		}
		.add_to_cart {
		 text-transform: uppercase;
		
		 border: 1px solid #FFD700;
		 cursor: pointer;
		 color: #fff;
		 padding: 8px 40px;
		 margin-top: 10px;
		 font-size:14px;
		}
		.add_to_cart {
			 background: #feb303;
			 border-color: #feb303;
		}
		.book_wrapper {	
		 float:left;
		 padding: 20px;
		 text-align: center;
		 height: 400px;
		 width:300px;
		 margin-left: 280px;
		 margin-bottom:40px;
		 border-radius : 15px;
		 background-color :rgba(0 , 0 , 0 , 0.5);/*transparent*/
		 }
		.book{
			text-align:left;
		}
</style>

	<head>
		<title>Book List</title>
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

		<?php
		
			echo "<div class='sidenav'>";
			echo "<a href='view_books.php'><font color='black'><b>VIEW BOOKS</b></font></a>";
			echo "<a href='it_books.php'><font color='black'>Information Technology</font></a>";
			echo "<a href='cs_books.php'><font color='black'>Computer Science</font></a>";
			echo "<a href='maths_books.php'><font color='black'>Mathematics</font></a>";
			echo "<a href='science_books.php'><font color='black'>Science</font></a>";
			echo "<a href='feedback.php'><font color='green'><b>FEEDBACK</b></font></a>";
			echo"</div>";
	
		?>
	<div class = "page-header">
		<center><h1>Book List</h1></center>
		
		<?php
		if(!empty($_SESSION["shopping_cart"])) {
		$cart_count = count(array_keys($_SESSION["shopping_cart"]));
		?>
		<div class="cart_div">
		<a href="user_shopping_cart.php"><i class="fa fa-shopping-cart my-cart-icon" style="color:black; font-size:35px; margin-top:8px; margin-right:3px; align:right"
		aria-hidden="true"></i><span><?php echo $cart_count; ?></span></a>
		</div>
		<?php
		}
		?>
	</div>
			
	<div class = "row">
		<br>
		<?php
		
			$max_columns = 4;
			
			$result = mysqli_query($combine,"SELECT * FROM `book`");
			
			while($row = mysqli_fetch_assoc($result)){
			echo "<div class='book_wrapper'>
				<form method='post' action=''>
				<input type='hidden' name='book_id' value=".$row['book_id']." />
				<div class='image'><img width='150' height='200' src='images/".$row['book_cover']."' alt=".$row['book_name']." /></div>
				<div class='book' name='book_name'>".$row['book_name']."</div>
				<div class='book' name='book_description'>".$row['book_description']."</div>
				<div class='book' name='book_category'>Category: ".$row['book_category']."</div>
				<div class='book' name='book_date'>Publishing Date: ".$row['book_date']."</div>
				<div class='book'>RM".$row['book_retail_price']."</div>
				<input type='hidden' name='username' Value= ".$_SESSION['username']." />
				<input type='hidden' name='quantity' Value=1/>
				<button type='submit' name='add_to_cart' class='add_to_cart'>Add To Cart</button>
				
				</form>
				</div>";
				}
			/**
			echo"<table align='center' width='75%'>";
			$i=0;
			//Retrieve and print every record
			while($row = mysqli_fetch_array($result))
			{
					
					if($i%2==0){
						echo "<tr>";
					}
					echo"<form method='post' action=''>";
					echo" <input type='hidden' name='book_id' Value= ".$row['book_id']. "'/>";
					echo"<td><img width='150' height='200' src='images/".$row['book_cover']."'></td>";
					
					echo"<td width='40%'><b>".$row['book_name']."</b> <br /> ".$row['book_description']." <br /><br /> Category: ".$row['book_category']." <br /> Publishing Date: ".$row['book_date']." 
					<br /> Price: RM".$row['book_retail_price']."<br />";
					echo "<button type='submit' name='add_to_cart' class='add_to_cart'>Add To Cart</button>";
					echo "</td>";
					
					if($i%2==1){
						echo "</tr>";
					}
					
					
					$i++;
				
			}  
			echo" <input type='hidden' name='username' Value= ".$_SESSION['username']." />";
			echo" <input type='hidden' name='quantity' Value=1/>";
			echo "</table></form></div>";**/

			?>
	</div>
		
		
		<!--Footer-->
	<?php
		include('footer.php');
	?>
		<!--End Footer-->
	</body>
</html>