<!DOCTYPE html>
<?php
	$result = mysqli_query($combine, $sql);
	$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	//receive data
	
	
?>
<html>
	<head>

			.outer_container
			{
				width : 100%;
				display : flex;
				justify-content : center;
				align-items : center;
			}
			.span_profile{

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

		
		<br/><br/>
		
	</body>
</html>
		