<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$admin_id = $_SESSION['admin_id'];
	
	if($admin_id == ''){
		header('location:adminlogin.php');
	}
	
	include('header_admin.php');
	
	$book_isbn13 = $_GET['book_isbn13'];
	$book_quantity = $_GET['book_quantity'];
	$addon_book_quantity = $_GET['addon_book_quantity'];
	
	$new_book_quantity=$book_quantity+$addon_book_quantity;
	
	$query = "SELECT * FROM book WHERE book_isbn13 = '$book_isbn13'";
	$result = mysqli_query($combine, $sql);
	$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	//edit user profile 
	$sqlEditing="UPDATE `book` SET `book_quantity`='$new_book_quantity' WHERE `book`.`book_isbn13`='$book_isbn13'";
		
		//successful edited
		if($combine->query($sqlEditing)===TRUE){
			
			echo"<script>alert('Stock successfully edited!');
			window.location='stocks_level.php'</script>";
		}else{
			//fail edit
			echo "<script>alert('Stock not successfully edited!');
			window.location='stocks_level.php'</script>";
			
		}	
		
	
?>
	
	
	
	