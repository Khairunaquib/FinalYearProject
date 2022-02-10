<?php                     
		
        $connection = new mysqli("localhost", "naquib", "naquib123", "users");
		
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$id = $connection->real_escape_string($_POST["premise_id"]);
		$premise_pc = $connection->real_escape_string($_POST["premise_pc"]);   		
		$ic_num = $connection->real_escape_string($_POST["ic_num"]);  				
		$latitude = $connection->real_escape_string($_POST["latitude"]);  
		$longitude = $connection->real_escape_string($_POST["longitude"]);
		$time =	date('H:i:s');
		
		$check_prem="SELECT * from premise WHERE premise_ID='$id'";
		$conn_check = mysqli_query($connection,$check_prem);
		while($risk=mysqli_fetch_array($conn_check)){
			echo $risk["covid_status"];
		}
		
		$query="SELECT status_code from app_user_data WHERE ic_num='$ic_num'";
		$covid=mysqli_query($connection,$query);
		$get = mysqli_fetch_array($covid);
		$status = $get[0];
		
		$input=$connection->query("INSERT INTO temp_data_test (premise_ID,premise_postcode, user_ic, latitude, longitude, Time, status_code) 
														VALUES ('$id','$premise_pc', '$ic_num', '$latitude', '$longitude', '$time', '$status')");
		
		

	
?>