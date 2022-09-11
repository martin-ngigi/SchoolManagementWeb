
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

	else{
		//echo " connected to 'schoolmanagementweb' MySQL: successfully ";
	}

	$sql="SELECT * FROM admission";
	$result=mysqli_query($data, $sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
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
			<h1>Applied for Admission</h1>

		<table border="1px">
			<!-- table header -->
			<tr>
				<th style="padding: 20px; font-size: 15px;">Name</th>
				<th style="padding: 20px; font-size: 15px;">Email</th>
				<th style="padding: 20px; font-size: 15px;">Phone</th>
				<th style="padding: 20px; font-size: 15px;">Message</th>
			</tr>

			<!-- while loop -->
			<?php
			while ($info=$result->fetch_assoc())
			{ // while loop start
			?>
			<!-- cells where data will be displayed -->
			<tr>
				<td style="padding: 10px;">
					<?php echo "{$info['name']}"; ?>
				</td>
				<td style="padding: 10px;">
					<?php echo "{$info['email']}"; ?>
				</td>
				<td style="padding: 10px;">
					<?php echo "{$info['phone']}"; ?>
				</td>
				<td style="padding: 10px;">
					<?php echo "{$info['message']}"; ?>
				</td>
			</tr>
			<?php
			} // while loop end -->
			?>
		</table>
		</center>
		
	</div>
</body>
</html>