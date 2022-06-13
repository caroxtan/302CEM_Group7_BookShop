<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$admin_id = $_SESSION['admin_id'];
	
	if($admin_id == ''){
		header('location:adminlogin.php');
	}
	
	include('header_admin.php');
	
	$book_isbn13=$_GET['delete'];
	$query = "DELETE FROM book WHERE book_isbn13='$book_isbn13'";
	
	$data=mysqli_query($combine,$query);
	
	if ($data)
	{
		echo"<script>alert('Stock sucessfully deleted!');
					window.location='stocks_level.php'</script>";
	}
	else
	{
		echo"<script>alert('Stock not sucessfully deleted!');
					window.location='stocks_level.php'</script>";
	}
?>
	
	
	
	