<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">

		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body background="images/2.jpg" class="body_deg_login">
	<center>
		<div class="form_deg">
			<center class="title_deg">
				Login form
				<!-- show error message -->
				<h4 style="color: red">
					<?php
					//dont show warnings and uncessary errors
					error_reporting(0); 
					session_start(); //show the message
					session_destroy();
					echo $_SESSION['loginMessage'];
					?>
				</h4>
			</center>
			<form action="login_check.php" method="POST" class="login_form">
				<div>
					<label class="label_deg">Username</label>
					<input type="text" name="username">
				</div>
				<div>
					<label class="label_deg">Password</label>
					<input type="Password" name="password">
				</div>
				<div>
					<input class="btn-primary" type="submit" name="submit" value="login" id="login_btn">
				</div>
			</form>
		</div>
	</center>
</body>
</html>