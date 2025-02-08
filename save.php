<?php 
	$user = $_POST['user'];
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$confpass = $_POST['confpass'];

	include 'dbconnect.php';
	$passwordd = md5($oldpass);
	$newpassword = md5($newpass);
	$sql = "SELECT username FROM passanger WHERE username = '$user' AND password = '$passwordd'";
	$result = mysqli_query($conn,$sql);

	$users = mysqli_num_rows($result);
	if($users > 0){
		$sql = "UPDATE passanger SET password = '$newpassword' WHERE username = '$user' AND password = '$passwordd'";
		mysqli_query($conn,$sql);
		header('location:hom.php');
	}else{
		header('location:setting.php?error=wrong username or password');
	}

?>