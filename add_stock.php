<?php
	include('header.php');
	
	echo"<h1 align='center'>Add Stock</h1>";
	
	include("bookshop_database.php");
	
	if (isset($_POST['submitted'])) {
		$book_name = $_POST['book_name'];
		$book_author = $_POST['book_author'];
		$book_date = $_POST['book_date'];
		$book_isbn13 = $_POST['book_isbn13'];
		$book_description = $_POST['book_description'];
		$book_trade_price = $_POST['book_trade_price'];
		$book_retail_price = $_POST['book_retail_price'];
		$book_quantity = $_POST['book_quantity'];
		

		$valid = true;

		$book_name = mysqli_real_escape_string($store, $book_name);
		$book_author = mysqli_real_escape_string($store, $book_author);
		$book_date = mysqli_real_escape_string($store, $book_date);
		$book_isbn13 = mysqli_real_escape_string($store, $book_isbn13);
		$book_description = mysqli_real_escape_string($store, $book_description);
		$book_trade_price = mysqli_real_escape_string($store, $book_trade_price);
		$book_retail_price = mysqli_real_escape_string($store, $book_retail_price);
		$book_quantity = mysqli_real_escape_string($store, $book_quantity);
		
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
		} else
			/*$file = addslashes(file_get_contents($_FILES["book_cover"]["tmp_name"]));
			
			$folder = 'Image/';*/
			
			//Success store data and display message
			$query = mysqli_query($store, "INSERT INTO book
				(book_name, book_author, book_date, book_isbn13, book_description, book_trade_price, book_retail_price, book_quantity) VALUES
				('$book_name', '$book_author', '$book_date', '$book_isbn13', '$book_description', '$book_trade_price', '$book_retail_price', '$book_quantity')");
			if ($query) {
				echo"<script>alert('Add stock is successful!');
					window.location='add_stock.php'</script>";
			}
		
	}
	
	//echo"<div class='form-center'>";
	echo"<form action='add_stock.php' method = 'post'>";
	
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
	
	echo"<br /><br /><label>Trade Price:</label>";
	echo"<br /><input type='range' min='1' max='100' value='1' name='book_trade_price' id='book_trade_price' onchange='showRangeValueTrade(this.value)' >";
	echo"<input type='text' id='trade_price' value='1' readonly>";
	
	echo"<br /><br /><label>Retail Price:</label>";
	echo"<br /><input type='range' min='1' max='100' value='1' name='book_retail_price' id='book_retail_price' onchange='showRangeValueRetail(this.value)' >";
	echo"<input type='text' id='retail_price' value='1' readonly>";
	
	echo"<br /><br /><label>Quantity:</label>";
	echo"<br /><input type='range' min='1' max='20' value='1' name='book_quantity' id='book_quantity' onchange='showRangeValueQuantity(this.value)' >";
	echo"<input type='text' id='quantity' value='1' readonly>";
	
	/*echo"<br /><br /><label>Image Cover:</label>";
	echo"<br /><br /><input type='file' name='book_cover' id='fileUpload'>";*/
	
	echo "<br /><br /><input type='submit' name='submit' value='Submit' />";
	echo "<input type='hidden' name='submitted' value='true'/>";
	echo"</form>";
	echo"</center>";
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
