<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'naquib', 'naquib123', 'users');

		$ID = $con->real_escape_string($_POST['ID']);
		$fname = $con->real_escape_string($_POST['fname']);
		$lname = $con->real_escape_string($_POST['lname']);
		$password = $con->real_escape_string($_POST['password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);

		if ($password != $cPassword)
			$msg = "Please Check Your Passwords!";
		else {
			$hash = hash('sha256', $password);
			$con->query("INSERT INTO kpm_users (KKM_ID, KKM_FName, KKM_LName, KKM_Password) VALUES ('$ID','$fname','$lname','$hash')");
			$msg = "You have been registered!";
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authorized Personnel - REGISTER</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
	integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

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

</head>
<div class="topnav">
	<a href="/kpm_demo/group/login.php">Login</a>
	<a class="active" href="/kpm_demo/group/register.php">Register</a>
</div>

<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<img src="/kpm_demo/images/KKMDUMMY.png" ><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>

				<form method="post" action="register.php">
					<input class="form-control" minlength="3" name="ID" placeholder="Staff ID"><br>
					<input class="form-control" name="fname" placeholder="First Name"><br>
					<input class="form-control" name="lname" placeholder="Last Name"><br>
					<input class="form-control" minlength="7" name="password" type="password" placeholder="Password..."><br>
					<input class="form-control" minlength="7" name="cPassword" type="password" placeholder="Confirm Password..."><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Register..."><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>