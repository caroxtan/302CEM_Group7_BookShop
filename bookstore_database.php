<?php

	$datab_mysql="bookstore_database"; //the name of database

	//connect and select the database that created
	$store = mysqli_connect("localhost","root","") or die
		("Sorry...Could not select database.");
		
	mysqli_select_db($store, $datab_mysql) or die
		("Sorry..You didn't select the database.");
	
?>