<?php

include_once "config/Database";
include_once "class/User";
$host="localhost";
$username="root";
$password="";
$db="library-system";

$data=mysqli_connect($host,$username,$password,$db);
if ($data==false) {
	die("connection error");
} 


	if (isset($_POST['login'])) {
		$name = $_POST["username"];

		$pass = $_POST["password"];

		$sql="SELECT * FROM `user` WHERE username='$name'";

		$result = mysqli_query($data,$sql);
		while($row = mysqli_fetch_array($result)) {
			$firstname = $row['first_name'];
			$last_name = $row['last_name'];
			$email = $row['email'];
			$password = $row['password'];
			$role = $row['role'];
		}

	

		if ($role == "student") {
			ob_start();
			header("Location: studenthome.php");
			ob_end_flush();
			die();
		} else if($role =="admin") {
			ob_start();
			header("Location:adminome.php");
			ob_end_flush();
			die();
		} else {

			
		}
	}
?>
