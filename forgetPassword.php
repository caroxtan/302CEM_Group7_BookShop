<!DOCTYPE html>
<?php
	include('bookshop_database.php');
			
	if(isset($_POST['ChangePassword'])){
		
		$username=$_POST['username'];
		$NewPassword=$_POST['NewPassword'];
		$CNewPassword=$_POST['CNewPassword'];
				
		//new password validation
		if(empty($username))
		{
			echo "<script>alert('Please enter your username')</script>";
		}
		else if (empty($NewPassword))
		{
			echo"<script>alert('Please enter your new password')</script>";
		}
		else if (strlen($NewPassword) <='8') 
		{
			echo "<script>alert('Enter your new password at least contain 8 Characters!')</script>";
		}
		else if (strlen($NewPassword) >'16') 
		{
			echo "<script>alert('Enter your new password not more than 16 Characters!')</script>";
		}
		else if(!preg_match("#[0-9]+#",$NewPassword)) 
		{
			echo "<script>alert('Enter new password at least contain 1 Number !')</script>";
		}
		else if(!preg_match("#[A-Z]+#",$NewPassword)) 
		{
			echo "<script>alert('Enter new password at least contain 1 Capital Letter!')</script>";
		}
		else if(!preg_match("#[a-z]+#",$NewPassword)) 
		{
			echo "<script>alert('Enter new password at least contain 1 Lowercase Letter!')</script>";
		}
		//comfirm password validation
		else if (empty($CNewPassword))
		{
			echo"<script>alert('Please comfirm your password!')</script>";
		}
		else if (strlen($CNewPassword) <='8') 
		{
			echo "<script>alert('Enter your password at least contain 8 Characters!')</script>";
		}
		else if (strlen($CNewPassword) >'16') 
		{
			echo "<script>alert('Enter your password not more than 16 Characters!')</script>";
		}
		else if(!preg_match("#[0-9]+#",$CNewPassword)) 
		{
			echo "<script>alert('Enter password at least contain 1 Number !')</script>";
		}
		else if(!preg_match("#[A-Z]+#",$CNewPassword)) 
		{
			echo "<script>alert('Enter password at least contain 1 Capital Letter!')</script>";
		}
		else if(!preg_match("#[a-z]+#",$CNewPassword)) 
		{
			echo "<script>alert('Enter password at least contain 1 Lowercase Letter!')</script>";
		}
		else if($CNewPassword != $NewPassword)
		{
			echo "<script>alert('Confirm Password incorrect!!')</script>";
		}
		else{
			$sql="SELECT username FROM user WHERE username='$username'";
			$result=mysqli_query($combine,$sql);
			$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
			if(mysqli_num_rows($result)== 1)
			{
				mysqli_query($combine, "UPDATE user set password='" . $_POST["NewPassword"] . "' WHERE username='" . $_POST["username"] . "'");
				echo"<script>alert('Password changed.');
				window.location='login.php'</script>";
			}
			else{
				echo"<script>alert('Your username not found.')</script>";
			}
		}
	}
	
?>

<html>
	<head>
		<title>Forget Password</title>
		<meta charset = "utf-8">
		 <!-- CSS -->
		 <style>
			body
			{
				margin:0;
				padding:0;
				background-image:url(Image/register_bg.jpg);
				background-position:center;
				background-size:cover;
			}
			input{
				color: white;
			}
		</style>
		<link rel = "stylesheet" href="css/themify-icon.css">
		<link rel = "stylesheet" href="forgetPassword.css">
		<link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		
	</head>  <!-- end head -->
	
	<body>
		 <!-- include header.php -->
		<?php
			include('header.php');
		?>
		
		<div class="forget_pass">
			<h1 style="float:center">Forget Password</h1>
			<form action="" method="POST">
				<p style="float:left;"><i class="fa fa-user" aria-hidden="true">&nbsp; Username</i></p>
					<input type = "text" name = "username" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>"
					placeholder = "Enter Username"></input>
					
				<br/>
				<p style="float:left;"><i class="fa fa-lock" aria-hidden="true">&nbsp; New Password</i></p>
				<div class = "visible">
					<input type = "password" id = "NewPassword" name = "NewPassword" value= "<?php if(isset($_POST["NewPassword"])) echo $_POST["NewPassword"]; ?>"
					placeholder = "Enter New Password">
					<span>
						<!-- fa fa-eye is icon of the password visible -->
						<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "Toggle()"></i>
					</span>
				</div>
				<p style="float:left;"><i class="fa fa-lock" aria-hidden="true">&nbsp; Confirm New Password</i></p>
				<div class = "visible">
					<input type = "password" id = "CNewPassword" name = "CNewPassword" placeholder = "Enter Confirm New Password">
					<span>
						<!-- fa fa-eye is icon of the password visible -->
						<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "CFToggle()"></i>
					</span>
				</div>
				
				
				<input type="submit" style="float:center" value='SUBMIT' name="ChangePassword"/>
				
			</form>
		</div>
		</br></br></br>
		<!-- Password Visibility -->
			<script> 
		// Change the type of input to password or text 
			function Toggle() 
			{ 
				var temp = document.getElementById("NewPassword"); 
				if (temp.type === "password")
				{ 
					temp.type = "text"; 
				} 
				else 
				{ 
					temp.type = "password"; 
				} 
			} 
			
			function CFToggle() 
			{ 
				var temp = document.getElementById("CNewPassword"); 
				if (temp.type === "password")
				{ 
					temp.type = "text"; 
				} 
				else 
				{ 
					temp.type = "password"; 
				} 
			} 
			</script>
			</script> 
			<!-- End Password Visibility -->
		<!--Footer-->
		<?php
			require('footer.php');
		?>
		<!--End Footer-->
		  
	</body> <!-- end body -->
</html>