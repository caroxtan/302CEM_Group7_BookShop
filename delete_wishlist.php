<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');
	
	$wishlist_id=$_GET['delete_wishlist'];
	$query = "DELETE FROM wishlist WHERE wishlist_id='$wishlist_id'";
	
	$data=mysqli_query($combine,$query);
	
	if ($data)
	{
		echo"<script>alert('Book sucessfully removed from wishlist!');
		window.location='view_wishlist.php'</script>";
	}
	else
	{
		echo"<script>alert('Book was not sucessfully removed from wishlist!');
		window.location='view_wishlist.php'</script>";
	}
?>
	
	
	
	