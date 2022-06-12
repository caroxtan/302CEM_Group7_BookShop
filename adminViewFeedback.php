<!DOCTYPE html>


<!--validation for admin id and password-->
<?php
	include("bookshop_database.php");
	session_start();
        
        $query = mysqli_query($combine, "SELECT * FROM feedback");
        $count = mysqli_num_rows($query);
        
        ?>
<head>
    <title>Feedback from Customers</title>
    <meta charset = "utf-8">
    <!-- CSS -->
    <link rel = "stylesheet" href="register_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
</head>  <!-- end head -->
	
	
		 <!-- include navibar.php -->
		<?php
			include('header_admin.php');
		?>
		
                 <div class="form-style-5">
                     <form action="admin_profile.php" method = "post">
                         <h2>Feedback Form from Customers</h2>
                         <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Service</th>
                        <th>Suggestion</th>
                    </tr>
                </thead>
 
                <tbody>
                    <?php
                       if($count > 0)
                       {
                           echo "<table align = 'center' width = '90%' border ='1'>";
                           echo "<tr align = 'center'>";
                                //echo"<th align='center'></th>";
                                echo"<th align='center'><font color = 'black'>No.</font></th>";
                                echo"<th align='center'><font color = 'black'>Customer Name</font></th>";
                                echo"<th align='center'><font color = 'black'>Email</font></th>";
                                echo"<th align='center'><font color = 'black'>Serivce</font></th>";
                                echo"<th align='center'><font color = 'black'>Suggestion</font></th>";

                            echo"</tr>";
                            //Retrieve and print every record
                            while($row = mysqli_fetch_array($query))
                            {

                                    echo"<tr>";


                                    echo"<td align = 'center'><font color = 'black'>{$row['feedback_ID']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['name']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['email']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['service']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['suggestion']}</font></td>";
                                    echo"</tr>";


                            }
                       }
                    ?>
                </tbody>
            </table>
                </form>
                 </div>
</table>
</body>
</html>