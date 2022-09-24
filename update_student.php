
<?php

session_start();

	//get the username from login page that was sent to studenthome
	if (!isset($_SESSION['username']))
	{
		//always check if there is no user name sent to here ie student home, then resirect to login.php
		header("location:login.php");
	}
	//else if user is a student, redirect to login.php
	elseif ($_SESSION['usertype']=='student') {
		header("location:login.php");
	}

	//connect to db
	$data=mysqli_connect('localhost', 'root', '', 'schoolmanagementweb');
	//check if connection succeeeded
	if ($data -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $data -> connect_error;
	  exit();
	}

	$id = $_GET['student_id'];

	$sql="SELECT * FROM user WHERE id='$id'";

	$result=mysqli_query($data, $sql);

	$info =$result->fetch_assoc();

	//will be invoked only when update_btn is pressed
	if (isset($_POST['update_btn'])) {
		$name = $_POST['name_input'];
		$email = $_POST['email_input'];
		$phone = $_POST['phone_input'];
		$password = $_POST['password_input'];

		$query = "UPDATE user SET username='$name', email='$email', phone='$phone', password='$password' WHERE id=$id";

		$result2 = mysqli_query($data, $query);

		//result success
		if ($result2) {
			// echo "Update success";
			//after updating, redirect to view_student.php
			header("location: view_student.php");
		}
	}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<?php
		include 'admin_css.php';
	?>

	<style type="text/css">
		label
		{
			display: inline-block;
			width: 100px;
			text-align: right;
			padding-top: 10px;
			padding-bottom: 10px;

		}
		.div_deg
		{
			background-color: skyblue;
			width:  400px;
			padding-bottom: 70px;
			padding-top: 70px;
		}
	</style>
	
</head>
<body>
	<?php
		include 'admin_sidebar.php';
	?>
	<div class="content">
		<center>
			<h1>Update Student</h1>
		<div class="div_deg">
			<!-- # means will stay in this file... ie update will take place in this method -->
			<form action="#" method="POST">
			<div>
				<label>UserName</label>
				<input type="text" name="name_input" value="<?php echo"{$info['username']}" ?>">
			</div>
			<div>
				<label>Email</label>
				<input type="email" name="email_input" value="<?php echo"{$info['email']}" ?>">
			</div>
			<div>
				<label>Phone</label>
				<input type="number" name="phone_input" value="<?php echo"{$info['phone']}" ?>">
			</div>
			<div>
				<label>Password</label>
				<input type="text" name="password_input" value="<?php echo"{$info['password']}" ?>">
			</div>
			<div>
				<input class="btn btn-success" type="submit" name="update_btn" value="Update">
			</div>

		</form>
		</div>
		</center>
	</div>
</body>
</html>