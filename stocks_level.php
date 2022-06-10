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
</style>

<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$admin_id = $_SESSION['admin_id'];
	
	if($admin_id == ''){
		header('location:adminlogin.php');
	}
	
	include('header_admin.php');
	
	echo"<center><br/ ><a href='stocks_level.php'><button class='button'>Stocks Level</button></a>";
	
	echo"&nbsp; <a href='add_stock.php'><button class='button'>Add Stock</button></a>";
	
	echo"&nbsp; <a href=''><button class='button'>Update Stock</button></a>";
	
	echo"&nbsp; <a href=''><button class='button'>Edit Stock</button></a>";
	
	echo"<h1 align='center'>Stocks Level</h1>";
	
	//$query = "SELECT * FROM book ";
	$query = mysqli_query($combine, "SELECT * "
            . "FROM book ");
    $count = mysqli_num_rows($query);
	
	//if($r = mysqli_query($combine,$query))
	if($count > 0)
	{
	   echo "<div class='customers'>";
       echo "<table align = 'center' width = '90%' border ='1'>";
       echo "<tr align = 'center'>";
            //echo"<th align='center'></th>";
            echo"<th align='center'>Book Cover</th>";
            echo"<th align='center'>Book Title</th>";
            echo"<th align='center'>ISBN-13 Number</th>";
            echo"<th align='center'>Quantity in Stock</th>";
			echo"<th align='center'>Action</th>";
			echo"<th align='center'>Status</th>";
            
        echo"</tr>";
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
           
                echo"<tr>";
                
				echo"<td align = 'center'><font color = 'black'><img width='100' height='100' src='images/".$row['book_cover']."' ></font></td>";
                echo"<td align = 'center'><font color = 'black'>{$row['book_name']}</font></td>";
                echo"<td align = 'center'><font color = 'black'>{$row['book_isbn13']}</font></td>";
                echo"<td align = 'center'><font color = 'black'>{$row['book_quantity']}</font></td>";
				echo"<td align = 'center'><a href =''><font color='blue'>EDIT</font></a> <br /><br /> <a href ='delete_stock.php?delete=".$row['book_isbn13']."'><font color='red'>DELETE</font></a></td>";
				echo"<td align = 'center'>";
				
				if ($row['book_quantity'] < "10") {
					echo "<font color='red'>LOW!</font></td>";
				}
				else 
					echo "<font color='green'>Normal</font></td>";
		        }
				echo"</td>";
        }
		
		if (isset($GET['delete'])){
			$book_isbn13 = $_GET['delete'];
			$query = mysqli_query($combine, "DELETE FROM book WHERE book_isbn13=$book_isbn13");
		};
		

        echo "</table></div>";
		
		include('footer.php');
?>