<?php
	require "logincheck.php";
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';
	require 'PHPMailer-master/src/Exception.php';
	error_reporting(E_ALL ^ E_NOTICE);
	$conn = new mysqli('localhost', 'naquib', 'naquib123', 'users');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if(isset($_POST['insert']))
	{
			$status_=$_POST['status'];
			if($status_=='0'){
			$query = "UPDATE app_user_data set status_code='".$_POST['status']."' WHERE ic_num='".$_POST['ic']."' ";
			$res=mysqli_query($conn,$query);
			$query2 = "INSERT into cases (user_ic,covid_status) VALUES ('".$_POST['ic']."','".$_POST['status']."')";
			$res2=mysqli_query($conn,$query2);
			$query3 = "Select email from app_user_data WHERE ic_num='".$_POST['ic']."'";
			$res3=mysqli_query($conn,$query3);		
			$res3_get = mysqli_fetch_array($res3);
			$user_email = $res3_get[0];
			
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->SMTPAuth = "true";
			$mail->SMTPSecure = 'tls';

			$mail->Host = "smtp.gmail.com";
			$mail->Port = '587';
			$mail->isHTML();

			$mail->Username = 'coprems.demo@gmail.com';
			$mail->Password = 'coprems97';
			$mail->SetFrom('no-reply@copremskkm.my');
			$mail->AddAddress($user_email);

			$mail->Subject = "COPREMS - COVID-19 Notification (Negative COVID-19)";
			$mail->Body = ("Greetings ".$_POST['ic'].". 
			\n You have been diagnosed as Negative COVID.
			\n Please stay safe, and follow SOP. Thank you");
			$mail->Send();	
			}

			else{	
			$query = "UPDATE app_user_data set status_code='".$_POST['status']."' WHERE ic_num='".$_POST['ic']."' ";
			$res=mysqli_query($conn,$query);
			$query2 = "INSERT into cases (user_ic,covid_status) VALUES ('".$_POST['ic']."','".$_POST['status']."')";
			$res2=mysqli_query($conn,$query2);
			$query3 = "Select email from app_user_data WHERE ic_num='".$_POST['ic']."'";
			$res3=mysqli_query($conn,$query3);		
			$res3_get = mysqli_fetch_array($res3);
			$user_email = $res3_get[0];
			
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->SMTPAuth = "true";
			$mail->SMTPSecure = 'tls';

			$mail->Host = "smtp.gmail.com";
			$mail->Port = '587';
			$mail->isHTML();

			$mail->Username = 'coprems.demo@gmail.com';
			$mail->Password = 'coprems97';
			$mail->SetFrom('no-reply@copremskkm.my');
			$mail->AddAddress($user_email);

			$mail->Subject = "COPREMS - COVID-19 Notification (Positive COVID-19)";
			$mail->Body = ("Greetings ".$_POST['ic'].". 
			\n You have been diagnosed as POSITIVE COVID.
			\n Please wait for the Hospital near you to contact you.");
			$mail->Send();
			}

	}		
?>
<html>
<head>
	<title>KKM DASHBOARD</title>
</head>
<style>
body {
	background-color: lightgrey;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
input{
	width: 250px;
	height: 36px;
	border: 02px;
	border-radius: 05px;
	padding: 8px 15px 8px 15px;
	margin: 10px 0px 15px 0px;
	box-shadow: 1px 1px 2px 1px grey;
	justify-content: center;
	align-items: center;
}
select{
	width: 250px;
	height: 36px;
	border: 02px;
	border-radius: 05px;
	padding: 8px 15px 8px 15px;
	margin: 10px 0px 15px 0px;
	justify-content: center;
	align-items: center;
	box-shadow: 1px 1px 2px 1px grey;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #fed8b1;
  color: white;
}



.topnav p {
  float: left;
  text-align: center;
  color: #fff;
}

.center {
	background-color: white;
	width:500px;
	height:100px;
	display: flex;
	border-radius: 05px;
	justify-content: center;
	box-shadow: 1px 1px 2px 1px grey;
	height: 70%;
	border: 1px solid white;
	margin: 40px; 
}



  
</style>
		<body>
		<center>
		
		<div class="topnav">
			<a href="logout.php">Log Out</a>
			<a href="/kpm_demo/group/premise_covid_entry.php">Premise COVID Entry</a>
			<a class="active" href="/kpm_demo/group/covid_entry.php">Patient COVID Entry</a>
			<a href="/kpm_demo/group/dashboard_report.php">Report Generator</a>
			<a href="/kpm_demo/group/dashboard.php">Dashboard</a>
			
			<p class="navbar-text text" style="color: #fff;">Welcome, 
			<?php
				$query_user = "SELECT KKM_FName from kpm_users WHERE KKM_ID='".$_SESSION["email"]."' ";
				$req_user=mysqli_query($conn,$query_user);	
				$req_get = mysqli_fetch_array($req_user);
				$fname = $req_get[0];
				echo $fname;
			?>.</p>
		</div>
		<div class="center">

		<form method="POST">
		<img src="/kpm_demo/images/patientcovidentry.png" width="400px" height="250px">
		<input type="Text" name="ic" placeholder="Patient IC"><br>
		
		<select name="status">
		<option value="1">Positive</option>
		<option value="0">Negative</option>
		</select><br>
		<input type="submit" name="insert" value="Enter">
		</form>
		</div>
		</center>
		</body>
</html>		