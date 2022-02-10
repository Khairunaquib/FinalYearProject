<?php
	$conn = new mysqli("localhost", "naquib", "naquib123", "users");
	$act = $_POST['act'];
	$ic_num = $_POST["ic_num"]; 

	
	$sql = "SELECT * FROM premise INNER JOIN temp_data_test 
				ON premise.premise_ID = temp_data_test.premise_ID 
				WHERE user_ic='$ic_num' ORDER BY Date DESC";
				
	$result = mysqli_query($conn,$sql);
		echo "Premise Name",",","Temperature",",","Date",",","Time","\n";
		
		while($data=mysqli_fetch_array($result)){
			echo $data["premise_name"],",",$data["temp"],",",$data["Date"],",",$data["Time"],"\n";
			}

	
?>

