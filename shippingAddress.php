<!DOCTYPE html>

<?php


	{
		$fname          = $_POST['fname'];
		$lname          = $_POST['lname'];
		$contact_number = $_POST['contact_number'];
		$address        = $_POST['address'];
		$city           = $_POST['city'];
		$country        = $_POST['country'];
		$state          = $_POST['state'];
		$zip_code       = $_POST['zip_code'];
		
		$number = preg_match('@[0-9]@', $zip_code);
		

			//Validation
			//First name validation
			if(empty($fname))
			{
				echo"<script>alert('Please enter your first name!')</script>";
			}
			//Last name validation
			else if(empty($lname))
			{
				echo"<script>alert('Please enter your last name!')</script>";
			}
			//Contact number validation
			else if(empty($contact_number))
			{
				echo"<script>alert('Please enter your contact number!')</script>";
			}
			else if (!preg_match("/^[0-9]{3}-[0-9]{7}$/", $contact_number) && !preg_match("/^[0-9]{3}-[0-9]{8}$/", $contact_number))
			{
				echo"<script>alert('Please enter your contact number in numberic!(e.g: 012-3456789)')</script>";
			}
			//Address validation
			else if (empty($address))
			{
				echo"<script>alert('Please enter your address!')</script>"; 
			}
			//City validation
			else if (empty($city))
			{
				echo"<script>alert('Please enter your city!')</script>"; 
			}
			//Country validation
			else if (empty($country))
			{
				echo"<script>alert('Please enter your country!')</script>"; 
			}
			//State validation
			else if (empty($state))
			{
				echo"<script>alert('Please enter your state!')</script>"; 
			}
			//ZIP code validation
			else if (empty($zip_code))
			{
				echo"<script>alert('Please enter your ZIP code!')</script>"; 
			}
			else if (!preg_match("/^[0-9]{5}(?:-[0-9]{4})?$/", $zip_code))
			{
				echo"<script>alert('Please enter your ZIP code in numberic!(e.g: 11500)')</script>";
			}

	}	

?>

<html lang="en">

	<style>
	
		.container
		{
			align:center"
		}
		
		input[type=text]
		{
			padding:12px;
			border:1px solid #ccc;
			border-radius:4px;
			box-sizing:border-box;
			margin-top:6px;
			margin-bottom: 16px;
		}
		
		.button_1
		{
			border:none;
			border-radius:4px;
			color:white;
			padding: 15px 100px;
			text-align:center;
			text-decoration:none;
			font-size:16px;
			margin: 4px 2px;
			cursor:pointer;
			background-color:#008CBA;
		}

	</style>
	
	<head>
	
		<meta charset="utf-8">
		<title>Shipping Address</title>
	
	</head>
	
	<body>

				<input type = "text" id = "fname" name = "fname" size = "50" value= "<?php if(isset($_POST["fname"])) echo $_POST["fname"]; ?>" placeholder = "First Name"/>
				<input type = "text" id = "lname" name = "lname" size = "49" value= "<?php if(isset($_POST["fname"])) echo $_POST["fname"]; ?>" placeholder = "Last Name"/>
				
				<br/>
				
				<input type = "text" id = "contact_number" name = "contact_number" size = "108" value= "<?php if(isset($_POST["contact"])) echo $_POST["contact"]; ?>" placeholder = "Contact Number">
				
				<br/>
				
				<input type = "text" id = "address" name = "address" size = "108" value= "<?php if(isset($_POST["address"])) echo $_POST["address"]; ?>" placeholder = "Address">
				
				<br/>
				
				<input type = "text" id = "city" name = "city" size = "108" value= "<?php if(isset($_POST["city"])) echo $_POST["city"]; ?>" placeholder = "City">
				
				<br/>
				
				<input type = "text" id = "country" name = "country" size = "30" value= "<?php if(isset($_POST["country"])) echo $_POST["country"]; ?>" placeholder = "Country">
				
				<input type = "text" id = "state" name = "state" size = "30" value= "<?php if(isset($_POST["state"])) echo $_POST["state"]; ?>" placeholder = "State">
				
				<input type = "text" id = "zip_code" name = "zip_code" size = "30" value= "<?php if(isset($_POST["zipCode"])) echo $_POST["zipCode"]; ?>" placeholder = "ZIP code">
				
				<br/>
				

				
			</form></center>
		
		</div>

</html>