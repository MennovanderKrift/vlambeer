<?php

$con = mysqli_connect('localhost', 'root', '', 'vlambeer');

$username		=		$_POST['username'];
$email_address	=		$_POST['email_address'];
$password 		=		$_POST['password'];
$password2		=		$_POST['password2'];

if(isset($_POST['register'])) {
	if($password !== $password2) {
		header("location: register.php?msg=pe1");
	}elseif(!(strlen($password) >= 8)) {
		header("location: register.php?msg=pe2");
	}elseif(mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE username = '$username'"))) {
		header("location: register.php?msg=ue1");
	}elseif(mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email = '$email'"))) {
		header("location: register.php?msg=ee1");
	} else {
		$hashedPass = password_hash("$password", PASSWORD_DEFAULT);
		$query = mysqli_query($con, "INSERT INTO tbl_customers (username, email_address, password) VALUES ('$username', '$email_address', '$hashedPass')");
		$msg = urlencode('You are succesfully registered, please login');
		header("location: login.php?msg=$msg");
	}
}

?>