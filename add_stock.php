<?php
	include('header.php');
	
	echo"<h1 align='center'>Add Stock</h1>";
	
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
	
    echo"<br /><br /><input type='submit'>";
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
