<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$admin_id = $_SESSION['admin_id'];
	
	if($admin_id == ''){
		header('location:adminlogin.php');
	}
	
	include('header_admin.php');
	
	
	echo"<h1 align='center'>Stocks Level</h1>";
	
	//$query = "SELECT * FROM book ";
	$query = mysqli_query($combine, "SELECT * "
            . "FROM book ");
    $count = mysqli_num_rows($query);

	//if($r = mysqli_query($combine,$query))
	if($count > 0)
	{
       echo "<table align = 'center' width = '90%' border ='1'>";
       echo "<tr align = 'center'>";
            //echo"<th align='center'></th>";
            echo"<th align='center'><font color = 'black'>Thumbnail Picture</font></th>";
            echo"<th align='center'><font color = 'black'>Book Title</font></th>";
            echo"<th align='center'><font color = 'black'>ISBN-13 Number</font></th>";
            echo"<th align='center'><font color = 'black'>Quantity in Stock</font></th>";
            
        echo"</tr>";
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
           
                echo"<tr>";
                
				if($row['book_isbn13'] == "9781337101356")
					{
						echo"<td align = 'center'><img src='Image/book1.png' width='150' height='200'></img></td>";
					}
				else if($row['book_isbn13'] == "9781418836313")
					{
						echo"<td align = 'center'><img src='Image/book2.jpg' width='150' height='200'></img></td>";
					}
				else if($row['book_isbn13'] == "9780073516882")
					{
						echo"<td align = 'center'><img src='Image/book3.jpg' width='150' height='200'></img></td>";
					}
				else if($row['book_isbn13'] == "9780131592674")
					{
						echo"<td align = 'center'><img src='Image/book4.jpg' width='150' height='200'></img></td>";
					}	
				else if($row['book_isbn13'] == "9781439533536")
					{
						echo"<td align = 'center'><img src='Image/book5.jpg' width='150' height='200'></img></td>";
					}
				else if($row['book_isbn13'] == "9781439533536")
					{
						echo"<td align = 'center'><img src='Image/book5.jpg' width='150' height='200'></img></td>";
					}
				else if($row['book_isbn13'] == "9780471158813")
					{
						echo"<td align = 'center'><img src='Image/book6.jpg' width='150' height='200'></img></td>";
					}	
                echo"<td align = 'center'><font color = 'black'>{$row['book_name']}</font></td>";
                echo"<td align = 'center'><font color = 'black'>{$row['book_isbn13']}</font></td>";
                echo"<td align = 'center'><font color = 'black'>{$row['book_quantity']}</font></td>";
                echo"</tr>";
                
                
        }
	}

        echo "</table>";
		
		echo"<br/ ><br /><a href='add_stock.php'><button>Add Stock</button></a>";
?>