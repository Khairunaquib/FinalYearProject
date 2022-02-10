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
				$query = "UPDATE premise set covid_status='".$_POST['status']."' WHERE premise_ID='".$_POST['pid']."' ";
				$res=mysqli_query($conn,$query);
				$query3 = "Select premise_email from premise WHERE premise_ID='".$_POST['pid']."'";
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

				$mail->Subject = "COPREMS - COVID-19 Notification (SAFE)";
				$mail->Body = ("Greetings ".$fname.". 
				\n You're premise is SAFE.
				\n Always remeber to sanitize the premise and follow the SOP");
				$mail->Send();
			}
			else{
				$query = "UPDATE premise set covid_status='".$_POST['status']."' WHERE premise_ID='".$_POST['pid']."' ";
				$res=mysqli_query($conn,$query);
				$query3 = "Select premise_email from premise WHERE premise_ID='".$_POST['pid']."'";
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

				$mail->Subject = "COPREMS - COVID-19 Notification (RISK)";
				$mail->Body = ("Greetings ".$fname.". 
				\n You're premise is at RISK.
				\n Please do a immediate cleaning of the area.");
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
			<a class="active" href="/kpm_demo/group/premise_covid_entry.php">Premise COVID Entry</a>
			<a href="/kpm_demo/group/covid_entry.php">Patient COVID Entry</a>
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
		<img src="/kpm_demo/images/premisecovidentry.png" width="400px" height="250px">
		<input type="Text" name="pid" placeholder="Premise ID"><br>
		<select name="status">
		<option value="1">Risk</option>
		<option value="0">Safe</option>
		</select><br>
		<input type="submit" name="insert" value="Enter">
		</form>
		</div>
		</center>
		</body>
</html>	