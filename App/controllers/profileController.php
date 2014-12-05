<?php 
	include '../includes/header.php'; 

    if (isset($_POST['editProfile'])) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['zip_code'] = $_POST['zip_code'];
        $_SESSION['address'] = $_POST['address'];

        $stmt = $db->prepare("UPDATE users SET email = :email, username = :username, password = :password, gender = :gender, zip_code = :zip_code, address = :address WHERE user_id = :id");

        $stmt->bindParam("id", $_GET['id'], PDO::PARAM_STR);

        $stmt->bindParam("email", $_POST['email'], PDO::PARAM_STR);
        $stmt->bindParam("username", $_POST['username'], PDO::PARAM_STR);
        $stmt->bindParam("password", $_POST['password'], PDO::PARAM_STR);
        $stmt->bindParam("gender", $_POST['gender'], PDO::PARAM_STR);
        $stmt->bindParam("zip_code", $_POST['zip_code'], PDO::PARAM_STR);
        $stmt->bindParam("address", $_POST['address'], PDO::PARAM_STR);

    if (! $stmt->execute()) {
        $msg = urlencode("Can't update profile");
        header('location: ../store/profile-info.php?error=' .$msg);
    } else {
        $msg = urlencode("Profile edited");
        header('location: ../store/profile-info.php?msg=' .$msg);
    }
}
?>
</body>
</html>