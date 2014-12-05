<?php 
	include '../includes/header.php'; 

    if (isset($_POST['editProfile'])) {
        $stmt = $db->prepare("UPDATE users SET email = :email, username = :username, password = :password, gender = :gender, zip_code = :zip_code, address = :address");

        $stmt->bindParam(":email", $_POST['email']);
        $stmt->bindParam(":username", $_POST['username']);
        $stmt->bindParam(":password", $_POST['password']);
        $stmt->bindParam(":gender", $_POST['gender']);
        $stmt->bindParam(":zip_code", $_POST['zip_code']);
        $stmt->bindParam(":address", $_POST['address']);

    if (! $stmt->execute()) {
        $msg = urlencode("Cant update profile");
        header('location: ../store/profile-info.php?error=' .$msg);
    } else {
        $msg = urlencode("Profile edited");
        header('location: ../store/profile-info.php?msg=' .$msg);
    }
}
?>
</body>
</html>