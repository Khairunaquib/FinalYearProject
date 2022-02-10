<?php                     

        $connection = new mysqli("localhost", "naquib", "naquib123", "users");

		$ic = $connection->real_escape_string($_POST["ic"]);  		
		$phonenumber = $connection->real_escape_string($_POST["phonenumber"]);  				
		$email = $connection->real_escape_string($_POST["email"]);  
		$password = sha1($connection->real_escape_string($_POST["password"])); 
			
		
		
		$check_data=$connection->query ("SELECT * FROM  app_user_data WHERE ic_num='$ic'");
		$check=mysqli_num_rows($check_data);
		
    	if ($check > 0){
        	echo"Already Register";
		}
		else{
		$input=$connection->query("INSERT INTO app_user_data (ic_num, phone, email, password) VALUES ('$ic', '$phonenumber', '$email', '$password')");
		if ($input){
			echo "Register Succesful! Please Login.";
		
		}
		
		}
		
?>