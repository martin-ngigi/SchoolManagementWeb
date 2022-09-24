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

		//connect to db
	$data=mysqli_connect('localhost', 'root', '', 'schoolmanagementweb');
	//check if connection succeeeded
	if ($data -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $data -> connect_error;
	  exit();
	}

	$name =$_SESSION['username'];

	$sql="SELECT * FROM USER WHERE username='$name'";

	$result=mysqli_query($data, $sql);

	$info= mysqli_fetch_assoc($result);

	//if update_profile_btn button is clicked, do the following
	if (isset($_POST['update_profile_btn'])) {
		//get data from ui
		$email = $_POST['email_inpt'];
		$phone = $_POST['phone_inpt'];
		$password = $_POST['password_inpt'];

		$sql2 = "UPDATE user SET email='$email', phone='$phone', password='$password' WHERE username='$name'";

		$result = mysqli_query($data, $sql2);

		//if update is success
		if ($result) {
			// echo "Update Success";
			header('location: student_profile.php');
		}
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

	<style type="text/css">
		label
		{
			display: inline-block;
			text-align: right;
			width: 100px;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		.div_deg
		{
			background-color: skyblue;
			width: 500px;
			padding-bottom: 70px;
			padding-top: 70px;
		}
	</style>
</head>
<body>
	<?php 

	include 'student_sidebar.php';

	 ?>

	 <div class="content">
	 	<center>
	 		<h1>Update Profile</h1>
	 		<!-- #... means will stay on this page after clicking submit button -->
	 		<form action="#" method="POST">
	 			<div class="div_deg">
	 				<div>
			 			<label>Usename</label>
			 			<label><?php echo"{$info['username']}" ?></label>
			 		</div>
			 		<div>
			 			<label>Email</label>
			 			<input type="email" name="email_inpt" value="<?php echo"{$info['email']}" ?>">
			 		</div>
			 		<div>
			 			<label>Phone</label>
			 			<input type="number" name="phone_inpt" value="<?php echo"{$info['phone']}" ?>">
			 		</div>
			 		<div>
			 			<label>Password</label>
			 			<input type="text" name="password_inpt" value="<?php echo"{$info['password']}" ?>">
			 		</div>
			 		<div>
			 			<input type="submit" name="update_profile_btn" class="btn btn-primary" value="Update">
			 		</div>
	 			</div>
	 		</form>
	 	</center>
	 	
	 </div>
</body>
</html>