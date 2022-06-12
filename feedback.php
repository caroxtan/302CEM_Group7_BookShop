<style>
	.pic{text-align:left; width:33%; float:left;}
</style>
        

<?php

	session_start();
	include("bookshop_database.php");
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');
		?>
        <div class="form-style-5">
            <form method="post" action="feedback.php">
		
		<h1 align="center">Feedback Form</h1>
                
        <br/><br/>
       
        <div>
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" placeholder="Enter your Name">
        </div>
                
        <br/><br/>
        <div>
            <label for="email">Email Address: </label>
            <input type="text" id="email" name="email" placeholder="Enter your Email Address">
        </div>
        
        <br/>
        <p>What do you think about the service of our book's shop?</p>
        <div>
            
            <div class="pic">
                <img src="images/bad.jpg" alt="" width="120px" height="110px" value="bad"> <br/>
                <input type="radio" name="service" value="Bad"> Bad
            </div>
            <div class="pic">
                <img src="images/neutral.jpg" alt="" width="110px" height="110px" value="neutral"> <br/>
                <input type="radio" name="service" value="Okay"> Okay
            </div>
            <div class="pic">
                <img src="images/good.jpg" alt="" width="110px" height="100px" value="good"> <br/>
                <input type="radio" name="service" value="Good"> Good
            </div>
        </div>

        <br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <p><b>Do you have any suggestion for us?</b> </p>
        <textarea name=" suggestion" rows="8" cols="40" placeholder="Enter your suggestion here!"></textarea>

        <br/><br/>
         <input type="submit" name="submit" value="Submit Form">
         <input type="hidden" name="submitted" value="true"/>
         
       </form>
     </div>
       
	   
	   <!-- Footer -->
		<?php	
			include("footer.php");
		?>
		<!-- End Footer -->
        
    <?php
    include("bookshop_database.php");
        if (isset($_POST['submitted'])) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $service = $_POST['service'];
                $suggestion = $_POST['suggestion'];

                $name = mysqli_real_escape_string($combine, $name);
                $email = mysqli_real_escape_string($combine, $email);
                $service = mysqli_real_escape_string($combine, $service);
                $suggestion = mysqli_real_escape_string($combine, $suggestion);

                if(empty($name)) {
                    echo "<script>alert('Name is required!')</script>";
                }

                else if(!(preg_match('/^[a-zA-Z\s]+$/', $name))) {
                    echo "<script>alert('Name must be in alphabets!')</script>";
                }

                else if(empty($email)) {
                    echo "<script>alert('E-mail required!')</script>";
                }

                else if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                    echo "<script>alert('Invalid e-mail!')</script>";
                }
                
                else if(empty($service)) {
                        echo "<script>alert('Please select the service.')</script>";
                }
                
                else{
                    //success combine data and display message
                    $query = mysqli_query($combine, "INSERT INTO feedback
                        (name, email, service, suggestion ) VALUES
                        ('$name', '$email ', '$service', '$suggestion')");
                        if ($query)
                        {
                            echo "<script>alert('Thanks for your feedback!');
                                window.location='view_books.php'</script>";
                        }
                }

        }
     ?>
        
        
    </body>
</html>
