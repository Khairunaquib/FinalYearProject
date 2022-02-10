<?php                     

        $con = new mysqli("localhost", "naquib", "naquib123", "users");
		

		$ic_num = $con->real_escape_string($_POST['ic_num']);
		$password = sha1($con->real_escape_string($_POST['password']));
	
		
		$check_data = $con->query("SELECT * FROM app_user_data WHERE ic_num='$ic_num' AND password='$password'");
		$check=mysqli_num_rows($check_data);
		
		if ($check>0){
			echo "Login Success";
		} else{
			echo" Login Failed";
		}
		
?>