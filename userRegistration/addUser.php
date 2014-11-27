<?php

$con = mysqli_connect('localhost', 'root', '', 'vlambeer');

$username		=		$_POST['username'];
$email			=		$_POST['email'];
$password 		=		$_POST['password'];
$password2		=		$_POST['password2'];

if(isset($_POST['register'])) {
	if($password !== $password2) {
		header("location: index.php?msg=pe1");
	}elseif(!(strlen($password) >= 8)) {
		header("location: index.php?msg=pe2");
	}elseif(mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE username = '$username'"))) {
		header("location: index.php?msg=ue1");
	}elseif(mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email = '$email'"))) {
		header("location: index.php?msg=ee1");
	} else {
		$hashedPass = password_hash("$password", PASSWORD_DEFAULT);
		$query = mysqli_query($con, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPass')");
	} if (!$query) {
		trigger_error("Registration failed");
	} else {
            $to = $email;
            $subject = "Registration vlambeer.com";
            $message = "Welcome " . $username . "<br><br>Welcome on the new vlambeer.com website.<br>Your login info:</br>Username: " . $username . "<br>Password: " . $password . "<br>";
            $from = "info@vlambeer.com";
            $headers = "From: $from";
            mail($to,$subject,$message,$headers);
            header("location: ../index.php?msg=rs");
	}
}

?>