<?php
	
	session_start();
	
	include("bookshop_database.php");
	
	$admin_id = $_SESSION['admin_id'];
	
	if($admin_id == ''){
		header('location:adminlogin.php');
	}
	
	include('header_admin.php');
	
	echo"<center><br/ ><a href='stocks_level.php'><button class='button'>Stocks Level</button></a>";
	
	echo"&nbsp; <a href='add_stock.php'><button class='button'>Add Stock</button></a>";
	
	echo"&nbsp; <a href=''><button class='button'>Update Stock</button></a>";
	
	echo"&nbsp; <a href=''><button class='button'>Edit Stock</button></a>";
	
	echo"&nbsp; <a href=''><button class='button'>Delete Stock</button></a></center><br />";
	
	echo"<h1 align='center'>Add Stock</h1>";
	
	if (isset($_POST['submitted'])) {
		$book_name = $_POST['book_name'];
		$book_author = $_POST['book_author'];
		$book_date = $_POST['book_date'];
		$book_isbn13 = $_POST['book_isbn13'];
		$book_description = $_POST['book_description'];
		$book_category = $_POST['book_category'];
		$book_trade_price = $_POST['book_trade_price'];
		$book_retail_price = $_POST['book_retail_price'];
		$book_quantity = $_POST['book_quantity'];
		$book_cover = $_FILES['book_cover']['name'];
		

		$valid = true;

		$book_name = mysqli_real_escape_string($combine, $book_name);
		$book_author = mysqli_real_escape_string($combine, $book_author);
		$book_date = mysqli_real_escape_string($combine, $book_date);
		$book_isbn13 = mysqli_real_escape_string($combine, $book_isbn13);
		$book_description = mysqli_real_escape_string($combine, $book_description);
		$book_category = mysqli_real_escape_string($combine, $book_category);
		$book_trade_price = mysqli_real_escape_string($combine, $book_trade_price);
		$book_retail_price = mysqli_real_escape_string($combine, $book_retail_price);
		$book_quantity = mysqli_real_escape_string($combine, $book_quantity);
		
		if (empty($book_name)) {
			echo"<script>alert('You are required to enter the book name!')</script>";
		} else if (empty($book_author)) {
			echo"<script>alert('You are required to enter the author's name!')</script>";
		} else if (empty($book_date)) {
			echo"<script>alert('You are required to choose a publication date!')</script>";
		} else if (empty($book_isbn13)) {
			echo"<script>alert('You are required to enter the ISBN-13 number!')</script>";
		} else if (empty($book_description)) {
			echo"<script>alert('You are required to enter the book description!')</script>";
		} else if (empty($book_category)) {
			echo"<script>alert('You are required to enter the book category!')</script>";
		} else
			
			$target = "images/".basename($_FILES['book_cover']['name']);
			
			if (move_uploaded_file($_FILES['book_cover']['tmp_name'], $target)) {
				$msg = "Image uploaded successfully";
			}else{
			$msg = "There was a problem uploading image";
			}
			/*$file = addslashes(file_get_contents($_FILES["book_cover"]["tmp_name"]));
			
			$folder = 'Image/';*/
			
			//Success combine data and display message
			$query = mysqli_query($combine, "INSERT INTO book
				(book_name, book_author, book_date, book_isbn13, book_description, book_category, book_trade_price, book_retail_price, book_quantity, book_cover) VALUES
				('$book_name', '$book_author', '$book_date', '$book_isbn13', '$book_description', '$book_category', '$book_trade_price', '$book_retail_price', '$book_quantity', '$book_cover')");
			if ($query) {
				echo"<script>alert('Add stock is successful!');
					window.location='stocks_level.php'</script>";
			}
		
	}
	echo"<div class='form-style-5'>";
	echo"<form action='add_stock.php' method = 'post' enctype='multipart/form-data'>";
	
	echo "<input type='hidden' name='submitted' value='true'>";
	
	echo "<center>";
    echo"<label>Book Name:</label>";
    echo"<br /><input type='text' id='book_name' name='book_name' placeholder='Book Name' size='50'>";
	
	echo"<br /><br /><label>Book Author:</label>";
    echo"<br /><input type='text' id='book_author' name='book_author' placeholder='Book Author' size='50'>";
	
	echo"<br /><br /><label>Publication Date:</label>";
    echo"<br /><input type='date' id='book_date' name='book_date' placeholder='Publication Date' size='50'>";
	
	echo"<br /><br /><label>ISBN-13 Number:</label>";
    echo"<br /><input type='text' id='book_isbn13' name='book_isbn13' placeholder='ISBN-13 Number' size='50'>";
	
	echo"<br /><br /><label>Book Description:</label>";
	echo"<br /><textarea rows = '5' cols = '48' id='book_description' name='book_description' placeholder='Book Description'></textarea>";
	
	echo"<br /><br /><label>Book Category:</label>";
    echo"<br /><input type='text' id='book_category' name='book_category' placeholder='Book Category' size='50'>";
	
	echo"<br /><br /><label>Trade Price:</label>";
	echo"<br /><input type='range' min='1' max='100' value='1' name='book_trade_price' id='book_trade_price' onchange='showRangeValueTrade(this.value)' >";
	echo"<input type='text' id='trade_price' value='1' readonly>";
	
	echo"<br /><br /><label>Retail Price:</label>";
	echo"<br /><input type='range' min='1' max='100' value='1' name='book_retail_price' id='book_retail_price' onchange='showRangeValueRetail(this.value)' >";
	echo"<input type='text' id='retail_price' value='1' readonly>";
	
	echo"<br /><br /><label>Quantity:</label>";
	echo"<br /><input type='range' min='1' max='20' value='1' name='book_quantity' id='book_quantity' onchange='showRangeValueQuantity(this.value)' >";
	echo"<input type='text' id='quantity' value='1' readonly>";
	
	echo"<br /><br /><label>Image Cover:</label>";
	echo"<br /><br /><input type='file' name='book_cover' id='book_cover'>";
	
	echo "<br /><br /><input type='submit' name='submit' value='Submit'>";
	echo"</form></div>";
	echo"</center>";
	
	include('footer.php');

?>

	<script>
		function showRangeValueTrade(val){
			document.getElementById('trade_price').value=val
		}
		
		function showRangeValueRetail(val){
			document.getElementById('retail_price').value=val;
		}
		
		function showRangeValueQuantity(val){
			document.getElementById('quantity').value=val;
		}
	</script>
