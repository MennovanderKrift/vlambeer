<?php require '../config/Database.php';

if (isset($_GET['logout'])) {
    session_start();
	session_destroy();
    $msg = urlencode("You have successfully logged out");
    header('location: ../store/index.php?logout' );   
    die(); 
}

$stmt = $db->prepare("SELECT * FROM tbl_customers WHERE email_address = :email_address ");
$stmt->bindParam("email_address",$_POST['email_address']);
// $stmt->bindParam("password", $_POST['password']);
$result = $stmt->execute();

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
// 	extract($row);
// 	var_dump($row);
// }

$user = $stmt->fetch(PDO::FETCH_OBJ);
$dbpass = $user->password;

$pass = $_POST['password'];

if (password_verify($pass, $dbpass)) {
	session_start();
	$_SESSION['id'] = $user->customer_id;
	$_SESSION['email_address'] = $user->email_address;
	$_SESSION['username'] = $user->username;
	$_SESSION['password'] = $user->password;
	$_SESSION['name'] = $user->name;
	$_SESSION['last_name'] = $user->last_name;
	$_SESSION['gender'] = $user->gender;
	$_SESSION['address'] = $user->address;
	$_SESSION['zipcode'] = $user->zipcode;
	$_SESSION['phone_number'] = $user->phone_number;
	$_SESSION['news_letter'] = $user->news_letter;
	header('location: ../store/index.php?Hij werkt');    
} else {
    echo "Password incorrect";
}

// if (password_verify($_POST['password'], $hash)) {
// 	echo "Succesvol ingelogd!";
// } else {
// 	echo "Oeps!";
// }

// if (password_verify($_POST['password'], $result->password) {
// 	header("location:index.php?success");
// } else {
// 	header("location:index.php?false");
// }

// if (':password', $hash)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }

// if (!$user = $stmt->fetch(PDO::FETCH_OBJ)) {
// 	$msg = urlencode("Wrong username or password");
// 	header("location: ../store/login.php?error=$msg");
// 	die();
// }

if(empty($_POST['email_address']) || empty($_POST['password'])){
	$msg = urlencode("beide velden moeten ingevuld zijn");
	header("location: store/login.php?error=$msg");
}