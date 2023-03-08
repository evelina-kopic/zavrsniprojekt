<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "ev";
	
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Greška:" . $conn->connect_error;
	}
?>