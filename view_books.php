<?php
	include('header.php');
	
	include('bookshop_database.php');
	
	echo"<h1 align='center'>View Books</h1>";
	
	//$query = "SELECT * FROM book ";
	$query = mysqli_query($store, "SELECT * "
            . "FROM book ");
    $count = mysqli_num_rows($query);

	//if($r = mysqli_query($store,$query))
	if($count > 0)
	{
       echo "<table align = 'center' width = '90%' border ='1'>";
       echo "<tr align = 'center'>";
            //echo"<th align='center'></th>";
            echo"<th align='center'><font color = 'black'>Thumbnail Picture</font></th>";
            echo"<th align='center'><font color = 'black'>Book Title</font></th>";
            
        echo"</tr>";
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
           
                echo"<tr>";
                
                echo"</tr>";
                
                
        }
	}

        echo "</table>";
?>