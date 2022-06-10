<!DOCTYPE html>
<?php

	include("bookshop_database.php");
	session_start();
	//took record base on the username
	$admin_id = $_SESSION['admin_id'];
	
	//select all admin data from database
	$sql = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
	$result = mysqli_query($combine, $sql);
	$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	//receive data
	$admin_id =  $row['admin_id'];
	$admin_email = $row['admin_email'];
	$admin_contact = $row['admin_contact'];
	$admin_address = $row['admin_address'];
	
	
?>
<html>
	<head>
		<title>Admin | Profile</title>
		
		<style>
			
			.outer_container
			{
				width : 100%;
				display : flex;
				justify-content : center;
				align-items : center;
			}
			.span_profile{
				font-size:20px;
			}
			.admin_profile{
				width:50%;
				height :360px;
				border: 1px solid #ced4da;
				margin-bottom: 130px;
				margin : 50px 50px;
				background-color :rgb(0 , 0 , 0 , 0.4);/*transparent*/
				color : #FFFFFF;
				padding-top: 80px;
				padding : 50px 30px;
				border-radius : 15px;
				margin-right:60px;
				margin-left:40px;

			}
			.admin_profile input[type=text]{
				width: 50%;
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
		<!-- Header-->
		<?php
			include('header_admin.php');
		?>
		<!--End Header-->
		
		<br/><br/>
		
		
		<div class="admin_profile" style="width:50% margin-left:50px">
		<h1>ADMIN | PROFILE</h1>
		</br></br>
			<span class="span_profile" >Admin ID : </span>
				<input type = "text" name = "admin_id" style = "margin-left: 85px" value = "<?php echo isset($admin_id) ? $admin_id : '';?>" readonly />
			</br></br>
			<span class="span_profile">Email : </span>
				<input type = "text" name = "admin_email" style = "margin-left: 116px" value = "<?php echo isset($admin_email) ? $admin_email : '';?>" readonly />
			</br></br>
			<span class="span_profile">Contact Number : </span>
				<input type = "text" name = "admin_contact" style = "margin-left: 20px" value = "<?php echo isset($admin_contact) ? $admin_contact : '';?>" readonly />
			</br></br>
			<span class="span_profile">Address : </span>
				<input type = "text" name = "admin_address" style = "margin-left: 92px" value = "<?php echo isset($admin_address) ? $admin_address : '';?>" readonly />
		</div>
		</div>
	<?php
		include('footer.php');
	?>
	</body>
</html>
		