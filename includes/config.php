<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "ev";
	
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Failed:" . $conn->connect_error;
	}
?>