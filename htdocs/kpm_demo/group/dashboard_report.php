<?php
	require "logincheck.php";
	error_reporting(E_ALL ^ E_NOTICE);
	$conn = new mysqli('localhost', 'naquib', 'naquib123', 'users');
	$startdate = date("Y-m-d");
	$endate	= date("Y-m-d");
	if(isset($_POST['search']));
	{
			
			$startdate = $_POST['StartDate'];
			$endate	= $_POST['EndDate'];
			$startdate_sql = $startdate;
			$endate_sql	= $endate;
			$ic = $_POST['ic'];
			$query = "select * from temp_data_test WHERE Date BETWEEN '$startdate' AND '$endate' AND user_ic='$ic'";
			$res=mysqli_query($conn,$query);
			
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
input{
	width: 180px;
	height: 30px;
	border: 02px;
	border-radius: 05px;
	padding: 8px 15px 8px 15px;
	margin: 10px 0px 15px 0px;
	box-shadow: 1px 1px 2px 1px grey;
	justify-content: center;
	align-items: center;
}

.center {
  display: flex;
  justify-content: center;
  padding: 50px 15px 8px 15px;
	background-color: white;
	width:900px;
	height:70%;
	border-radius: 05px;
	justify-content: center;
	box-shadow: 1px 1px 2px 1px grey;
	height: 70%;
	border: 1px solid white;
	margin: 40px; 
}

table{
	borber-collapse: collapse;
	width: 800px;
	color: light grey;
	border-radius: 05px;
	font-family: monospace;
	font-size: 17px;
	text-align: Center;
	
}
th {
	background-color: grey;
	border-radius: 05px;
	color: white;

	
}
td{
	border: 1px solid black;
	border-radius: 05px;
}


  
</style>
		<body>
		<center>
		
		<div class="topnav">
			<a href="logout.php">Log Out</a>
			<a href="/kpm_demo/group/premise_covid_entry.php">Premise COVID Entry</a>
			<a href="/kpm_demo/group/covid_entry.php">Patient COVID Entry</a>
			<a class="active" href="/kpm_demo/group/dashboard_report.php">Report Generator</a>
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
		<form method="post">
		<input type="text" name="ic" placeholder="Patient IC">
		<input type="date" name="StartDate">
		<input type="date" name="EndDate">
		<input type="submit" name="search" value="Filter">
			<table>
			<tr>
				<th>Entry ID</th>
				<th>Premise ID</th>
				<th>Temperature</th>
				<th>Date</th>
				<th>Time</th>
			</tr>
			<?php
					while($data=mysqli_fetch_array($res)){
					
					echo "<tr><td>" . $data["id"] ."</td><td>". $data["premise_ID"] ."</td><td>". $data["temp"] ."</td><td>". $data["Date"] ."</td><td>". $data["Time"]."</td></tr>";
					}
					
			?>
			</table
		</div>
		</center>
		</body>
</html>		