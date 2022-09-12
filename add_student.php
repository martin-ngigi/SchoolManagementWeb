
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

	// if add_student_btn is clicked
	if (isset($_POST['add_student_btn'])) {
		$username=$_POST['user_name_input'];
		$email=$_POST['email_input'];
		$phone=$_POST['phone_input'];
		$password=$_POST['password_input'];
		$usertype="student";


		//before saving, first check whether there is another student with the same username so as to avoid corrission of usernames
		$check="SELECT * FROM user WHERE username='$username'";
		$check_user=mysqli_query($data,$check);
		//check if there is multiple users
		$row_count=mysqli_num_rows($check_user);
		//if there is an existing user with the same username
		if ($row_count==1) 
		{
			echo "<script type='text/javascript'>
				alert('Username already exists. Try another username');
				</script>";
		}
		else
		{
				//sql statement to save data to db
			$sql="INSERT INTO user(username, email, phone, usertype, password) VALUES('$username', '$email', '$phone', '$usertype', '$password')";

			$result=mysqli_query($data, $sql);
			if ($result)
			{
				echo "<script type='text/javascript'>
				alert('data uploaded successfully');
				</script>";
			}
			else
			{
				echo "upload failed";
			}
		}


		
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<!-- style the labels and the UI -->
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
			width: 400px;
			padding-bottom: 70px;
			padding-top: 70px;

		}
	</style>
	<?php
		include 'admin_css.php';

	?>
	
</head>
<body>
	<?php
		include 'admin_sidebar.php';
	?>
	<div class="content">
		<center>
			<h1>Add Student</h1>\
		<div class="div_deg">
			<!-- # means we are going to add some code in the same same file so as to save/insert/upload -->
			<form action="#" method="POST">
				<div>
					<label>Username</label>
					<input type="text" name="user_name_input">
				</div>
				<div>
					<label>Email</label>
					<input type="text" name="email_input">
				</div>
				<div>
					<label>Phone</label>
					<input type="number" name="phone_input">
				</div>
				<div>
					<label>Password</label>
					<input type="text" name="password_input">
				</div>
				<div>
					<input class="btn btn-primary" type="submit" name="add_student_btn" value="Add Student">
				</div>
			</form>
		</div>
	</div>
		</center>
</body>
</html>