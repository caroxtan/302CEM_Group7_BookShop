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
	include('sidebar.php');

	echo"<div class='main'>";
	echo "<form method='post' action='payment.php'>";
	echo"<h1 align='center'>Complete Order</h1>";
	
	$query = mysqli_query($combine, "SELECT * FROM cart WHERE cart.username = '$username'");
        $count = mysqli_num_rows($query);


                       if($count > 0)
                       {
                            echo "<div class='customers'>";
                            echo "<table align = 'center' width = '90%' border ='1'>";
                            echo "<tr align = 'center'>";
							
                                echo"<th align='center'><font color = 'white'>Book Cover</font></th>";
								echo"<th align='center'><font color = 'white'>Book Name</font></th>";
                                echo"<th align='center'><font color = 'white'>Unit Price</font></th>";
                                echo"<th align='center'><font color = 'white'>Quantity</font></th>";
								echo"<th align='center'><font color = 'white'>Action</font></th>";

                            echo"</tr>";
                            //Retrieve and print every record
                            while($row = mysqli_fetch_array($query))
                            {

                                    echo"<tr>";
									
                                    echo"<td align = 'center'><img width='100' height='100' src='images/".$row['book_cover']."'></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['book_name']}</font></td>";
									 echo"<td align = 'center'><font color = 'black'>{$row['book_retail_price']}</font></td>";
									echo"<td align = 'center'><input class='input' type='text' id='quantity' value ='".$row['quantity']."' name='quantity' readonly></td>";
									echo"<td align = 'center'>";
									
									if ($row['book_quantity'] == 0) {
										echo "<font color='red'>OUT OF STOCK!</font>";
									}
									else {
										echo "<font color='green'>IN STOCK!</font>";
									}
									
									echo"</td>";
                                    echo"</tr>";
 
                            }
                       }
                   
            echo"</table></div></div>";

	//$query = "SELECT * FROM book ";
	$queryQuantity = mysqli_query($combine, "SELECT SUM(quantity) FROM cart WHERE cart.username = '$username'");
	
	$total = mysqli_query($combine, "SELECT SUM(book_retail_price*quantity) FROM cart WHERE cart.username = '$username'");
	
	while($rowTotal = mysqli_fetch_array($total))
    {
	echo"<center><h4>Total Price: RM".$rowTotal['SUM(book_retail_price*quantity)']."</h4>";
	
	
	while($rowQuantity = mysqli_fetch_array($queryQuantity))
     {
		 $one_quantity = 3;
		 $many_quantity = 3 + $rowQuantity['SUM(quantity)'] - 1;
		 if ($rowQuantity['SUM(quantity)'] == 1) {
			 echo"<h4>Postage Cost: RM$one_quantity </h4>";
			 $total_full_price = $rowTotal['SUM(book_retail_price*quantity)'] +  $one_quantity;
		 }
		 else
			 echo"<h4>Postage Cost: RM$many_quantity </h4>";
			 $total_full_price = $rowTotal['SUM(book_retail_price*quantity)'] + $many_quantity;
	}
	}
	
	echo"<h4>Total Full Price: RM$total_full_price</h4>";
	
	echo"<a href='payment.php'<button class='button'>Pay Now</button></a></form>";
	echo "&nbsp; <a href='view_books.php'><button class='button'>Cancel</button></a></center></div>";
	echo"<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
	
	include('footer.php');
?>
