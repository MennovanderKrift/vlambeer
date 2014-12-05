<?php require '../config/Database.php';

if (! isset($_POST['loginUser'])) {
	header('location:../store/login.php');
}

if(empty($_POST['email']) || empty($_POST['password'])){
	$msg = urlencode("beide velden moeten ingevuld zijn");
	header("location: store/login.php?error=$msg");
}

$stmt = $db->prepare("SELECT * FROM users WHERE email = :email && password = :password");
$stmt->bindParam(":email",$_POST['email']);
$stmt->bindParam(":password",$_POST['password']);
$stmt->execute();

if (isset($_GET['logout'])) {
    session_start();
	session_destroy();
    $msg = urlencode("You have successfully logged out");
    header('location:../index.php?logout' );   
    die(); 
}

if (! $user = $stmt->fetch(PDO::FETCH_OBJ)) {
	$msg = urlencode("Wrong username or password");
	header("location:../store/login.php?error=$msg");
	die();
}

session_start();
$_SESSION['id'] = $user->user_id;
$_SESSION['email'] = $user->email;
$_SESSION['username'] = $user->username;
$_SESSION['password'] = $user->password;
$_SESSION['zip_code'] = $user->zip_code;
$_SESSION['gender'] = $user->gender;
$_SESSION['address'] = $user->address;
header('location:../store/index.php');