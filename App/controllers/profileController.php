<?php 
	require '../includes/header.php'; 

    $session_id = $_SESSION['id'];

    if (isset($_POST['editProfile'])) {
        $_SESSION['email_address'] = $_POST['email_address'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['zipcode'] = $_POST['zipcode'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['phone_number'] = $_POST['phone_number'];
        $_SESSION['news_letter'] = $_POST['news_letter'];

        $password = $_POST['password'];
        $hashedPass = password_hash("$password", PASSWORD_DEFAULT);

    $stmt = $db->prepare("UPDATE tbl_customers SET  email_address = :email_address, 
                                                    username = :username, 
                                                    password = :hashedPass, 
                                                    name = :name, 
                                                    last_name = :last_name, 
                                                    gender = :gender, 
                                                    zipcode = :zipcode, 
                                                    address = :address, 
                                                    phone_number = :phone_number, 
                                                    news_letter = :news_letter 
                                                    WHERE customer_id = :customer_id");

    $stmt->bindParam("customer_id", $_GET['id'], PDO::PARAM_STR);
    $stmt->bindParam("email_address", $_POST['email_address'], PDO::PARAM_STR);
    $stmt->bindParam("username", $_POST['username'], PDO::PARAM_STR);

    $stmt->bindParam("hashedPass", $hashedPass, PDO::PARAM_STR);

    $stmt->bindParam("name", $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam("last_name", $_POST['last_name'], PDO::PARAM_STR);
    $stmt->bindParam("gender", $_POST['gender'], PDO::PARAM_STR);
    $stmt->bindParam("zipcode", $_POST['zipcode'], PDO::PARAM_STR);
    $stmt->bindParam("address", $_POST['address'], PDO::PARAM_STR);
    $stmt->bindParam("phone_number", $_POST['phone_number'], PDO::PARAM_STR);
    $stmt->bindParam("news_letter", $_POST['news_letter'], PDO::PARAM_STR);

    if (! $stmt->execute()) 
    {
        $msg = urlencode("Can't update profile");
        header("location: ../store/profile-info.php?customer_id=$session_id&error=$msg");
    } 
    else 
    {
        $msg = urlencode("Profile edited");
        header("location: ../store/profile-info.php?customer_id=$session_id&msg=$msg");
    }
}
?>
</body>
</html>