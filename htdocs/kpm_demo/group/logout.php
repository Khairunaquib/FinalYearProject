<?php
	session_start();
	
	unset($_SESSION["email"]);
	unset($_SESSION["loggedIn"]);
	header("Location: login.php");
	


?>