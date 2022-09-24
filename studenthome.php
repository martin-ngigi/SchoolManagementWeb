<?php

session_start();

	//get the username from login page that was sent to studenthome
	if (!isset($_SESSION['username']))
	{
		//always check if there is no user name sent to here ie student home, then resirect to login.php
		header("location:login.php");
	}
	//else if user is a admin, redirect to login.php
	elseif ($_SESSION['usertype']=='admin') {
		header("location:login.php");
	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

		<?php 

	include 'student_css.php';

	 ?>
	
</head>
<body>
	<?php 

	include 'student_sidebar.php';

	 ?>
</body>
</html>