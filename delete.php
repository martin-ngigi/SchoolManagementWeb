<?php

//2.start session
session_start();

//connect to db
$data=mysqli_connect('localhost', 'root', '', 'schoolmanagementweb');
//check if connection succeeeded
if ($data -> connect_errno) {
  echo "Failed to connect to MySQL: " . $data -> connect_error;
  exit();
}

// else{
// 	echo "connection succeeeded";
// }


//if... first all get user id from view_student.php
if ($_GET['student_id']) {

	$user_id=$_GET['student_id'];

	//echo "$user_id";
	//Sql querry
	$sql="DELETE FROM user WHERE id='$user_id'";

	$result = mysqli_query($data, $sql);

	//if delete is successful, do the following
	if ($result) 
	{

		//1.show a message at the top of view_student.php
		$_SESSION['message'] = 'Deleting student successful';

		//redirect to view_student.php
		header("location: view_student.php");
		// echo "delete is successful";
	}

}
?>