<?php

session_start();

$data=mysqli_connect('localhost', 'root', '', 'schoolmanagementweb');

//this method is called only if "apply-btn" is clicked.... "apply-btn" is in index.php
if (isset($_POST['apply_btn'])) 
{
	
	//get data from index.php
	//declare variables and assign them
	$data_name=$_POST['name_input'];
	$data_email=$_POST['email_input'];
	$data_phone=$_POST['phone_input'];
	$data_message=$_POST['message_input'];

	//sql statement
	$sql="INSERT INTO admission(name, email, phone, message)
		 VALUES('".$data_name."','".$data_email."','".$data_phone."','".$data_message."')";

	 
	$result=mysqli_query($data, $sql);

	//if result upload is success
	if ($result) 
	{
		//message to be displayed in index.php
		$_SESSION['message'] = "Your Application sent successfully";
		header("location:index.php");
	}
	//else upload failed
	else
	{
		echo "Upload Failed";
	}
		
}

?>