<?php
	require ("logincheck.php");
?> 
    
<html>
	<body>
		Welcome <?php echo $_SESSION["email"] ?>.
	</body>
	<a href="logout.php">Log Out</a>
</html>