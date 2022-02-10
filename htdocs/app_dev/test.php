<?php

		$connection = new mysqli("localhost", "naquib", "naquib123", "users");
		$ic_num="990704105685";
		

		$query="SELECT status_code from app_user_data WHERE ic_num='$ic_num'";
		$covid=mysqli_query($connection,$query);
		$get = mysqli_fetch_array($covid);
		$status = $get[0];	
		echo $status;
?>