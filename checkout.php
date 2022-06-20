<style>
		
		.customers {
		  font-family: Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		.customers td, #customers th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		.customers tr:nth-child(even){background-color: #f2f2f2;}

		.customers tr:hover {background-color: #ddd;}

		.customers th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: center;
		  background-color: #157DEC;
		  color: white;
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

<?php

	session_start();
	include("bookshop_database.php");
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');

	echo "<div class='sidenav'>";
		echo "<a href='view_books.php'><font color='black'><b>VIEW BOOKS</b></font></a>";
		echo "<a href='it_books.php'><font color='black'>Information Technology</font></a>";
		echo "<a href='cs_books.php'><font color='black'>Computer Science</font></a>";
	    echo "<a href='maths_books.php'><font color='black'>Mathematics</font></a>";
		echo "<a href='science_books.php'><font color='black'>Science</font></a>";
		echo "<a href='feedback.php'><font color='green'><b>FEEDBACK</b></font></a>";
	echo"</div>";
	echo"<div class='main'>";
	echo "<form method='post' action='payment.php'>";
	echo"<h1 align='center'>Checkout</h1>";

	//$query = "SELECT * FROM book ";
	$query = mysqli_query($combine, "SELECT * "
            . "FROM book ");
    $count = mysqli_num_rows($query);
	

    $total_price = $_POST['total_price'];
	$total_full_price = $total_price + 3;
	
	echo"<center><h4>Total Price: RM$total_price</h4>";
	echo"<h4>Packaging Cost: RM3.00 </h4>";
	echo"<h4>Total Full Price: RM$total_full_price.00</h4>";
	
	echo"<a href='payment.php'<button class='button'>Pay Now</button></a></center></div>";
	echo"<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
	
	include('footer.php');
?>
