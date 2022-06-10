<?php

	session_start();
	include("bookshop_database.php");
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');
	
	
	echo"<h1 align='center'>View Books</h1>";

	$max_columns = 4;
	//$query = "SELECT * FROM book ";
	$query = mysqli_query($combine, "SELECT * "
            . "FROM book ");
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
		
		echo"<br /><center><a href='feedback.php'><button class='button'>Feedback</button></a></center>";
		
		/*echo"<br/ ><br /><a href='feedback.php'><button>Feedback</button></a>";*/

		include('footer.php');
?>