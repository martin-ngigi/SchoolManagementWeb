<?php

//dont show errors and warnings
error_reporting(0);
//start session
session_start();

$host="localhost";
$user="root";
$password="";
$db="schoolmanagementweb";

$data=mysqli_connect('localhost', 'root', '', 'schoolmanagementweb');

//check if connection succeeeded
if ($data -> connect_errno) {
  echo "Failed to connect to MySQL: " . $data -> connect_error;
  exit();
}

else{
	//echo " connected to 'schoolmanagementweb' MySQL: successfully ";
}


//VALIDATE LOGIN CREDENIALS
//This method will be executed only if one clicks the submit button with the post method in the login.php
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{

	//get data from form
	$name=$_POST['username']; //username from the login.php
	$pass=$_POST['password']; //password from the login.php

	$sql="SELECT * FROM user WHERE username='".$name."' AND password='".$pass."' ";

	$result=mysqli_query($data, $sql);
	$row=mysqli_fetch_array($result);

	//check type of user
	//if user is a student
	if ($row["usertype"]=="student")
	{
		//send username and usertype to studenthome
		$_SESSION['username']=$name;
		$_SESSION['usertype']="student";

		//take student to studenthome
		header("location:studenthome.php");
	}
		//if user is a student
	elseif ($row["usertype"]=="admin")
	{
		//send username and usertype to studenthome
		$_SESSION['username']=$name;
		$_SESSION['usertype']="admin";

		//take admin to adminhome
		header("location:adminhome.php");
	}

		//if login credentials dont match 
	else
	{
		$message="username or password dont match";
		$_SESSION['loginMessage']=$message; //store error message in loginMessage
		header("location:login.php");
	}

}


?>