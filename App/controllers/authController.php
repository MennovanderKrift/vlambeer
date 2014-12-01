<?php require '../config/Database.php';

if (! isset($_POST['loginUser'])) {
	header('location:../store/login.php');
}

if (isset($_POST['logout'])) {
	session_destroy();
	header('location: ../store/index.php');
	die();
}

if(empty($_POST['email']) || empty($_POST['password'])){
	$msg = urlencode("beide velden moeten ingevuld zijn");
	header("location: store/login.php?msg=$msg");
}

$stmt = $db->prepare("SELECT * FROM users WHERE email = :email && password = :password");
$stmt->bindParam(":email",$_POST['email']);
$stmt->bindParam(":password",$_POST['password']);
$stmt->execute();

if (! $user = $stmt->fetch(PDO::FETCH_OBJ)) {
	$msg = urlencode("wachtwoord of gebruikers naam fout");
	header("location:../store/login.php?msg=$msg");
	die();
}

session_start();
$_SESSION['email'] = $user->email;
header('location:../store/index.php?username=' . $user->username);
die();