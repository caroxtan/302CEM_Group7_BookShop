<style>
		
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
	echo"</div>";
	echo"<div class='main'>";
	
	
	echo"<h1 align='center'>View Books</h1>";

	$max_columns = 4;
	//$query = "SELECT * FROM book ";
	$query = mysqli_query($combine, "SELECT * "
            . "FROM book ");
    $count = mysqli_num_rows($query);

	//if($r = mysqli_query($combine,$query))
	if($count > 0)
	{

	}

        echo "</table>";
		
		echo"<br /><center><a href='feedback.php'><button class='button'>Feedback</button></a></center></div>";
		
		/*echo"<br/ ><br /><a href='feedback.php'><button>Feedback</button></a>";*/

		include('footer.php');
?>