<?php
	//Declare Server Variable
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "payrollnew";

	//Establish a connection to the server
	$mysqli = new mysqli($host, $user, $pass, $dbname);

	// print_r($mysqli);


	//Check if the connection was successful
	if($mysqli->connect_error){
		die("Please contact the administrator, there is an error with your site connection");
	}