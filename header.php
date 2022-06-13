<html>
	<head>
		<title>Book Shop</title>
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
			</ul>
			
			<ul id="right-nav">
				 <?php
                        
                        if(isset($_SESSION['username'])){
                            echo"<a href='user_profile.php'>";
                            echo  $_SESSION['username'] ;
                            echo " </a>";
							echo"&nbsp; <a href='logout_user.php'>Log Out</a>";
                            /*echo "<i class='far fa-user-circle'></i>";*/
                        }
                        else{
                            echo"<a href='login.php' style='float: right margin-right: 10px; margin-bottom: 20px;'>Log in</a>";
							 echo"&nbsp;<a href='register.php' style='float: right margin-right: 10px; margin-bottom: 20px;'>Sign Up</a>";
                            /*echo "<i class='far fa-user-circle' ></i>";*/
                        }
                    ?>
			</ul>
		</header>
	</body>
</html>