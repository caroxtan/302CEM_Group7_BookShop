<!DOCTYPE html>
<?php

	session_start();
	//took record base on the username
	$username = $_SESSION['username'];
	
	//select all user data from database
	$sql = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($combine, $sql);
	$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	//receive data
	$username =  $row['username'];
	$email = $row['email'];
	$contact = $row['contact'];
	$dob = $row['dob'];
	$address = $row['address'];
	
	
?>
<html>
	<head>
		<title>Profile</title>
		
		<style>

			.outer_container
			{
				width : 100%;
				display : flex;
				justify-content : center;
				align-items : center;
			}
			.span_profile{

				height :360px;
				border: 1px solid #ced4da;
				margin-bottom: 1300px;
				margin : 50px 50px;
				background-color :rgb(0 , 0 , 0 , 0.4);/*transparent*/
				color : #FFFFFF;

				padding: 12px 20px; margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing:border-box;
			}
		</style>
		<!-- CSS -->
		<link rel = "stylesheet" href="css/themify-icon.css">
		<link rel = "stylesheet" type = "text/css" href = "profile.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	</head>
	<body>
		
		<br/><br/>
		
		

		<h1>PROFILE</h1>
		</br></br>
			<span class="span_profile" >Username : </span>
				<input type = "text" name = "username" style = "margin-left: 85px" value = "<?php echo isset($username) ? $username : '';?>" readonly />
			</br></br>
			<span class="span_profile">Email : </span>

	?>
	</body>
</html>
		