<html>
	<head>
		<title>Header</title>
		<link href="css/style.css" rel="stylesheet" type"text/css">
		<style>
			.account{
				float: right;
				margin-top: -50px;
				margin-right: 10px;
			}
			.fa-user-circle{
				font-size:38px; 
				float:right; 
				color: white;
				margin-right: 15px;
			}
		</style>
	</head>
	<body>
		<header>
			<ul id="left-nav">
				<li><a href="index.php"><img src='Images/logo.png' alt='logo' width'50' height='50'/></a></li>
			</ul>
			
			<ul id="right-nav">
				 <?php
                        
                            echo"<a href='login.php' style='float: right margin-right: 10px; margin-bottom: 20px;'>Log in</a>";
							 echo"&nbsp;<a href='register.php' style='float: right margin-right: 10px; margin-bottom: 20px;'>Sign Up</a>";
                            echo "<i class='far fa-user-circle' ></i>";
                    ?>
			</ul>
		</header>
	</body>
</html>

<?php
	
	include('bookshop_database.php');
	
		echo"<h1 align='center'>View Books</h1>";
	
	echo"<center><a href='view_books.php'><button>Home</button></a><br/><br />";

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
				
				echo"<td width='40%'><b>{$row['book_name']}</b> <br /> {$row['book_description']} <br /><br /> Publishing Date: {$row['book_date']} <br /> Price: RM{$row['book_retail_price']}";
				
				echo "</td>";
				
				if($i%2==1){
					echo "</tr>";
				}
				
				
				$i++;
			
		}  
        
	}

        echo "</table>";
		
		echo"<br/ ><br /><a href='feedback.php'><button>Feedback</button></a>";

?>