<?php

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

// else{
// 	echo " connected to 'schoolmanagementweb' MySQL: successfully ";
// }

?>