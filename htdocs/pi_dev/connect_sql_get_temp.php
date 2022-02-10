<?php

	$con = new mysqli("localhost", "naquib", "naquib123", "users");
	
	$temp_fetch = $_GET["temperature"];
	
	$connection->query("INSERT INTO temp_data_test (temp) VALUES ('$temp_fetch')");
	
	
?>	