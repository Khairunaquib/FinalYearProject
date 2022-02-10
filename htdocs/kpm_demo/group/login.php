<?php
//	$msg = "";
	session_start();
	
	if (isset($_SESSION["email"]) && isset($_SESSION["loggedIn"])){
		header("Location: dashboard.php");
		exit();
	}
	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'naquib', 'naquib123', 'users');

		$ID = $con->real_escape_string($_POST['ID']);
		$password = ($con->real_escape_string(hash('sha256', $_POST['password'])));
		
		$data = $con->query("SELECT KKM_FName FROM kpm_users WHERE KKM_ID='$ID' AND KKM_Password='$password'");
		if ($data->num_rows > 0){
			
				$query_fetch ="select * FROM kpm_users WHERE KKM_ID='$ID'";
				$results = mysqli_query($con, $query_fetch);
				$check = mysqli_num_rows($results);
				
				if($check > 0){
					
					while($row = mysqli_fetch_assoc($results)){
						$test1 = $row["KKM_ID"];
						
						
						$_SESSION["email"] = $test1;
						$_SESSION["loggedIn"] = 1;
						
						header("Location: dashboard.php");
						exit();
					}
				}			

		} else {
			echo "please check again";
			
		}
	

	}
?>
<!doctype html>
<html lang="en">
<head>
<style>
body {
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
</style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authorized Personnel - LOGIN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<div class="topnav">
	<a class="active" href="/kpm_demo/group/login.php">Login</a>
	<a href="/kpm_demo/group/register.php">Register</a>
</div>

<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<img src="/kpm_demo/images/KKMDUMMY.png" ><br><br>

				

				<form method="post" action="login.php">
					<input class="form-control" name="ID" type="ID" placeholder="Staff ID"><br>
					<input class="form-control" minlength="5" name="password" type="password" placeholder="Password..."><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Log In"><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>