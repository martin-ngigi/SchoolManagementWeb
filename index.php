<?php

error_reporting(0);
session_start();
session_destroy();

if ($_SESSION['message']) 
{
	$message=$_SESSION['message'];
	
	echo "<script type='text/javascript'>
			alert('$message');
	      </script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>School Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<nav>
		<label class="logo">W-School</label>
		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="">Admission</a></li>
			<li><a href="login.php" class="btn btn-success">Login</a></li>
		</ul>
	</nav>
	<div class="section1">
		<label class="img_text">We Teach Students with care.</label>
		<img class="main_img" src="images/school.jpg"> 
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img class="welcome_img" src="images/2.jpg">
			</div>
			<div class="col-md-8">
				<h1>Welcome to W-School</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>
	<center>
		<h1>Our Able Teachers</h1>
	</center>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img class="teacher" src="images/teacher1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
			<div class="col-md-4">
				<img class="teacher" src="images/teacher2.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
			<div class="col-md-4">
				<img class="teacher" src="images/teacher3.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
		</div>
	</div>

	<center>
		<h1>Our Courses</h1>
	</center>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img class="course" src="images/computer.jpg">
				<p>Bachelors Degree in Computer Science</p>
			</div>
			<div class="col-md-3">
				<img class="course" src="images/it.jpg">
				<p>Bachelors Degree in Information Technology</p>
			</div>
			<div class="col-md-3">
				<img class="course" src="images/mechanical.jpg">
				<p>Bachelors Degree in Mechanical Engineering</p>
			</div>
			<div class="col-md-3">
				<img class="course" src="images/electrical.jpg">
				<p>Bachelors Degree in Electrical Engineering</p>
			</div>
		</div>
	</div>
	<center>
		<h1 class="adm">Admission Form</h1>
	</center>
	<div align="center" class="admission_form">
		<form action="adm_from_data_check.php" method="POST">
			<div class="adm_int">
				<label class="label_text">Name</label>
				<input class="input_deg" type="text" name="name_input">
			</div>
			<div class="adm_int">
				<label class="label_text">Email</label>
				<input class="input_deg" type="text" name="email_input">
			</div>
			<div class="adm_int">
				<label class="label_text">Phone</label>
				<input class="input_deg" type="text" name="phone_input">
			</div>
			<div class="adm_int">
				<label class="label_text">Message</label>
				<textarea class="input_txt" name="message_input"></textarea>
			</div>
			<div class="adm_int">
				<input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply_btn">
			</div>
		</form>
	</div>
	<footer>
		<h3 class="footer_text">All @copyright reserved by Wainaina</h3>
	</footer>

</body>
</html>