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
	
	
	echo"<h1 align='center'>Information Technology</h1>";

	$max_columns = 4;
	//$query = "SELECT * FROM book ";
	$query = mysqli_query($combine, "SELECT * "
            . "FROM book WHERE book_category='Computer Science'");
    $count = mysqli_num_rows($query);

	//if($r = mysqli_query($combine,$query))
	if($count > 0)
	{
       /*echo "<table align = 'center' width = '40%' border ='1'>";*/

		echo"<table align='center' width='80%'>";
		$i=0;
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
				
				if($i%2==0){
					echo "<tr>";
				}
				
                echo"<td><img width='150' height='200' src='images/".$row['book_cover']."'></td>";
				
				echo"<td width='40%'><b>{$row['book_name']}</b> <br /> {$row['book_description']} <br /><br /> Category: {$row['book_category']} <br /> Publishing Date: {$row['book_date']} <br /> Price: RM{$row['book_retail_price']}";
				
				echo "</td>";
				
				if($i%2==1){
					echo "</tr>";
				}
				
				
				$i++;
			
		}  
        
	}

        echo "</table>";
		
		echo"<br /><center><a href='feedback.php'><button class='button'>Feedback</button></a></center></div>";
		
		/*echo"<br/ ><br /><a href='feedback.php'><button>Feedback</button></a>";*/

		include('footer.php');
?>