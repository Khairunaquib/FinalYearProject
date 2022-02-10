<?php
	require "logincheck.php";
	error_reporting(E_ALL ^ E_NOTICE);
	$conn = new mysqli('localhost', 'naquib', 'naquib123', 'users');
	$getdate =	date('Y-m-d');
	$startdate = date("Y-m-d");
	$endate	= date("Y-m-d");
	if(isset($_POST['search']));
	{
			$startdate = $_POST['StartDate'];
			$endate	= $_POST['EndDate'];
			$startdate_sql = $startdate;
			$endate_sql	= $endate;
			$query = "select * from temp_data_test WHERE Date>='$startdate' AND Date<='$endate'";
			$res=mysqli_query($conn,$query);
	
	}
	

?>
<html>
<head>
	<title>COPREMS DASHBOARD</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Temperature'],

		  <?php
				while($data=mysqli_fetch_array($res)){
					$premise=$data['Time'];
					$id=$data['temp'];
			?>
				['<?php echo $premise;?>',<?php echo $id;?>],
				<?php
				}		  
			?>

        ]);

        var options = {
          title: 'Temperature Trends',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
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

.center2 {
	background-color: white;
	width:1200px;
	height:70%;
	border-radius: 05px;
	justify-content: center;
	box-shadow: 1px 1px 2px 1px grey;
	height: 70%;
	border: 1px solid white;
	margin: 40px 
}

input{
	width: 180px;
	height: 30px;
	border: 02px;
	border-radius: 05px;
	padding: 8px 15px 8px 15px;
	margin: 20px 0px 15px 0px;
	box-shadow: 1px 1px 2px 1px grey;
	justify-content: center;
	align-items: center;
}

.box1 {
	position: center;
	width: 200px;
	height: 80px;
	background-color: #4F77AA;
	float: left;
	padding: 8px 15px 8px 15px;
	box-shadow: 1px 1px 2px 1px grey;
	margin:15px;
	box-sizing:border-box;
	overflow: hidden;
	border-radius: 10px;
	font-family: Verdana;
	font-size:17.5px;
	
	
}
.box2 {
	position: center;
	width: 200px;
	height: 80px;
	background-color: #FF2014;
	float: left;
	padding: 8px 15px 8px 15px;
	box-shadow: 1px 1px 2px 1px grey;
	margin:15px;
	box-sizing:border-box;
	overflow: hidden;
	border-radius: 10px;
	font-family: Verdana;
	font-size:17.5px;
	
	
}
.box3 {
	position: center;
	width: 200px;
	height: 80px;
	background-color: #89c689;
	float: left;
	padding: 8px 15px 8px 15px;
	box-shadow: 1px 1px 2px 1px grey;
	margin:15px;
	box-sizing:border-box;
	overflow: hidden;
	border-radius: 10px;
	font-family: Verdana;
	font-size:17.5px;
	
	
}

.box4 {
	position: center;
	width: 200px;
	height: 80px;
	background-color: #67b668;
	float: left;
	padding: 8px 15px 8px 15px;
	box-shadow: 1px 1px 2px 1px grey;
	margin:15px;
	box-sizing:border-box;
	overflow: hidden;
	border-radius: 10px;
	font-family: Verdana;
	font-size:17.5px;
	
	
}

.container{
	position: center;
	background-color:white;
	width:920px;
	height:100px;
	margin:15px;
	
}

h1{
		font-family: Verdana;
	font-size:16px;
	text-shadow: 1px 1px grey;
	color: white;
}
h2{
	font-family: Verdana;
	font-size:16px;
	text-shadow: 1px 1px grey;
	color: white;
	text-decoration: underline;
}

	
	
}

  
</style>
		<body>
		<center>
		
		<div class="topnav">
			<a href="logout.php">Log Out</a>
			<a href="/kpm_demo/group/premise_covid_entry.php">Premise COVID Entry</a>
			<a href="/kpm_demo/group/covid_entry.php">Patient COVID Entry</a>
			<a href="/kpm_demo/group/dashboard_report.php">Report Generator</a>
			<a class="active" href="/kpm_demo/group/dashboard.php">Dashboard</a>
			
			
			<p class="navbar-text text" style="color: #fff;">Welcome, 
			<?php
				
				$query_user = "SELECT KKM_FName from kpm_users WHERE KKM_ID='".$_SESSION["email"]."' ";
				$req_user=mysqli_query($conn,$query_user);	
				$req_get = mysqli_fetch_array($req_user);
				$fname = $req_get[0];
				echo $fname;
			?>.</p>
		</div>

		<div class="center2">
		
				<div class="container">
				
					<div class="box1">
					<h1>Total Cases</h1>
					<h2><?php	
						$TC_query="SELECT case_id FROM cases where covid_status='1'";
						$TC_run=mysqli_query($conn,$TC_query);
						$TC_row=mysqli_num_rows($TC_run);
						
						echo $TC_row;
					
					?></h2>
					</div>
					
					<div class="box2">
					<h1>New Cases Today</h1>
					<h2><?php	
						$NCT_query="SELECT case_id FROM cases where case_date='$getdate' AND covid_status='1'";
						$NCT_run=mysqli_query($conn,$NCT_query);
						$NCT_row=mysqli_num_rows($NCT_run);
						
						echo $NCT_row;
					
					?></h2>
					</div>
					
					<div class="box3">
					<h1>Cured Cases Today</h1>
					<h2><?php	
						$CCT_query="SELECT case_id FROM cases where case_date='$getdate' AND covid_status='0'";
						$CCT_run=mysqli_query($conn,$CCT_query);
						$CCT_row=mysqli_num_rows($CCT_run);
						
						echo $CCT_row;
					
					?></h2>
					</div>
					
					<div class="box4">
					<h1>Total Cured Cases</h1>
					<h2><?php	
						$TCC_query="SELECT case_id FROM cases where covid_status='0'";
						$TCC_run=mysqli_query($conn,$TCC_query);
						$TCC_row=mysqli_num_rows($TCC_run);
						
						echo $TCC_row;

					?></h2>
					</div>
				</div>
		<form method="post">
		<input type="date" name="StartDate">
		<input type="date" name="EndDate">
		<input type="submit" name="search" value="Filter">
		<div id="curve_chart" style="width: 900px; height: 400px"></div>
		</div>
		<?php
					
					echo $id;
		?>
		

		</center>
		</body>
</html>		