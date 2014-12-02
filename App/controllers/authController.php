<?php require '../config/Database.php';

if (! isset($_POST['loginUser'])) {
	header('location:../store/login.php');
}

if(empty($_POST['email']) || empty($_POST['password'])){
	$msg = urlencode("beide velden moeten ingevuld zijn");
	header("location: store/login.php?msg=$msg");
}

$stmt = $db->prepare("SELECT * FROM users WHERE email = :email && password = :password");
$stmt->bindParam(":email",$_POST['email']);
$stmt->bindParam(":password",$_POST['password']);
$stmt->execute();

if ($user = $stmt->fetch(PDO::FETCH_OBJ)) {
	$msg = urlencode("wachtwoord of gebruikers naam fout");
	header("location:../store/login.php?msg=$msg");
	die();
}

session_start();
$_SESSION['email'] = $user->email;
$_SESSION['username'] = $user->username;
header('location:../store/index.php?username=' . $user->username);

if (isset($_GET['logout'])) {
    session_destroy();
    $msg = urlencode("You have successfully logged out");
    header('location:../index.php?msg='. $msg );   
    die(); 
}