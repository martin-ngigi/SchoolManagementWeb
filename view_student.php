
<?php

//4. dont show any uncessary warnings and messages.
error_reporting(0);
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

	$sql="SELECT * FROM user WHERE usertype='student'";
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

	<style type="text/css">
		.table_th
		{
			padding: 20px;
			font-size: 15px;
			background-color: skyblue;
		}

		.table_td
		{
			padding: 5px;
		}
	</style>
	
</head>
<body>
	<?php
		include 'admin_sidebar.php';
	?>
	<div class="content">
		<center>
			<h1> Students Data</h1>

			<?php
			//3. check if there is any message after deleting
			if ($_SESSION['message']) {
				echo $_SESSION['message'];
			}

			//5. after refresshing the browser, remove the message
			unset($_SESSION['message']);

			?>

		<table border="1px">
			<tr>
				<th class="table_th">UserName</th>
				<th class="table_th">Email</th>
				<th class="table_th">Phone</th>
				<th class="table_th">Password</th>
				<th class="table_th">Delete</th>
				<th class="table_th">Update</th>
			</tr>

			<?php
			while ($info=$result->fetch_assoc()) 
			{
			?>

				<tr>
					<td class="table_td"><?php echo "{$info['username']}";?></td>
					<td class="table_td"><?php echo "{$info['email']}";?></td>
					<td class="table_td"><?php echo "{$info['phone']}";?></td>
					<td class="table_td"><?php echo "{$info['password']}";?></td>
					<td class="table_td"><?php echo "<a onClick=\"javascript:return confirm('Are You Sure You Want To delete This ?');\" class='btn btn-danger' href='delete.php?student_id={$info['id']}'>Delete</a>";?></td>
					<!-- ..href='delete.php?student_id={$info['id']}.. means -> after clicking delete button, take/pass specific id of the current student to delete.php -->

					<!-- ..onClick=\"javascript:return confirm('Are You Sure You Want To delete This ?');\.. -> Show Confirmation message  -->

					<!-- Update User -->
					<!-- pass id to update_student.php -->
					<td class="table_td"><?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>";?></td>
				</tr>

			<?php
			}
			?>
		</table>
		</center>
		
	</div>
</body>
</html>