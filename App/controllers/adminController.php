<?php 

require '../config/Database.php';

//////////////////// LOGIN & LOGOUT ////////////////////
if (isset($_GET['logout'])) {
  session_start();
  session_destroy();
  session_start();
  $_SESSION['logoutSucces'] = "You have successfully logged out";
  header('location: ../admin/login.php' );   
  die(); 
}

if (isset($_POST['loginAdmin'])) {

  if ($_POST['username'] == "" || $_POST['password'] == "") {
    session_start();
    $_SESSION['emptyFields'] = "Please fill in your username and password";
    header("location: ../admin/login.php");  
  } else {
    $stmt = $db->prepare("SELECT * FROM tbl_users WHERE username = :username");
    $stmt->bindParam("username",$_POST['username']);
    $result = $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_OBJ);
    $dbpass = $user->password;
    $pass = $_POST['password'];

    if ($dbpass == $pass) {
      session_start();
      $_SESSION['id'] = $user->user_id;
      $_SESSION['role'] = 'admin';
      header("location: ../admin/admin.php?id=" . $_SESSION['id']);    
    } else {
      session_start();
      $_SESSION['wrongCredentials'] = "Password or username incorrect";
      header("location: ../admin/login.php");
    }
  }
}

//////////////////// EDIT & DELETE ADMIN ACOUNTS ////////////////////
if (isset($_POST['editAdminAccounts'])) {
  $stmt = $db->prepare("UPDATE tbl_users SET  username = :username, 
                                              password = :password, 
                                              name = :name, 
                                              last_name = :last_name 
                                        WHERE user_id = :user_id");

  $stmt->bindParam("user_id", $_GET['user_id']);
  $stmt->bindParam("username", $_POST['username'], PDO::PARAM_STR);
  $stmt->bindParam("password", $_POST['password'], PDO::PARAM_STR);
  $stmt->bindParam("name", $_POST['name'], PDO::PARAM_STR);
  $stmt->bindParam("last_name", $_POST['last_name'], PDO::PARAM_STR);

  if (!$stmt->execute()) {
    header("location: ../admin/admin.php?id=$sessionId&fail");
  } else {
    session_start();
    $_SESSION['editSuccesfull'] = "Admin successfully edited";
    header("location: ../admin/admin.php?id=$sessionId");
  }
}

$result = $db->prepare("SELECT count(*) FROM tbl_users"); 
$result->execute(); 
$number_of_rows = $result->fetchColumn();

  if (isset($_POST['deleteAdminAccounts'])) {
    if ($number_of_rows <= 1) {
      session_start();
      $_SESSION['cantDelete'] = "You must have at least 1 admin account";
      header("location: ../admin/admin.php?id=$sessionId");
    } else {
      $deleteUser = $db->prepare("DELETE FROM tbl_users WHERE user_id = :user_id");
      $deleteUser->bindParam(':user_id', $_GET['user_id']);   
     
      if ( !$deleteUser->execute() ) {
        header("location: ../admin/admin.php?id=$sessionId&fail");
      } else {
        session_start();
        $_SESSION['deleteSuccesfull'] = "Admin successfully deleted";
        header("location: ../admin/admin.php");
      }
    }
  }

  if (isset($_GET['newAdminAccount'])) {
    $sql = "INSERT INTO tbl_users(username,
                                  email,
                                  password,
                                  name,
                                  last_name) VALUES (
                                  :username, 
                                  :email, 
                                  :password, 
                                  :name, 
                                  :last_name)";
                                          
    $stmt = $db->prepare($sql);
                                                  
    $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);       
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
    $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR); 
    $stmt->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);   
                                          
    if ( !$stmt->execute() ) {
      header('location: ../admin/admin.php?fail');
    } else {
      header('location: ../admin/admin.php');
    }
  }

//////////////////// EDIT & DELETE USER ACOUNTS ////////////////////
// if (isset($_POST['editCustomerAccounts'])) {
//   $stmt = $db->prepare("UPDATE tbl_customers SET  email_address = :email_address, 
//                                                   username = :username,  
//                                                   name = :name, 
//                                                   last_name = :last_name, 
//                                                   zipcode = :zipcode, 
//                                                   address = :address, 
//                                                   phone_number = :phone_number, 
//                                                   news_letter = :news_letter 
//                                             WHERE customer_id = :customer_id");

//     $stmt->bindParam("customer_id", $_GET['customer_id'], PDO::PARAM_STR);
//     $stmt->bindParam("email_address", $_POST['email_address'], PDO::PARAM_STR);
//     $stmt->bindParam("username", $_POST['username'], PDO::PARAM_STR);
//     $stmt->bindParam("name", $_POST['name'], PDO::PARAM_STR);
//     $stmt->bindParam("last_name", $_POST['last_name'], PDO::PARAM_STR);
//     $stmt->bindParam("zipcode", $_POST['zipcode'], PDO::PARAM_STR);
//     $stmt->bindParam("address", $_POST['address'], PDO::PARAM_STR);
//     $stmt->bindParam("phone_number", $_POST['phone_number'], PDO::PARAM_STR);
//     $stmt->bindParam("news_letter", $_POST['news_letter'], PDO::PARAM_STR);

//   if (!$stmt->execute()) {
//     header("location: ../admin/customers.php?id=$sessionId&fail");
//   } else {
//     session_start();
//     $_SESSION['editSuccesfull'] = "Customer successfully edited";
//     header("location: ../admin/customers.php?id=$sessionId");
//   }
// }

// if (isset($_POST['deleteCustomerAccounts'])) {
//   $stmt = $db->prepare("DELETE FROM tbl_customers WHERE customer_id = :customer_id");
  
//   $stmt->bindParam('customer_id', $_GET['customer_id']);   
 
//   if (!$stmt->execute()) {
//     header("location: ../admin/customers.php?id=$sessionId&fail");
//   } else {
//     session_start();
//     $_SESSION['deleteSuccesfull'] = "Customer successfully deleted";
//     header("location: ../admin/customers.php?id=$sessionId");
//   }
// }
//////////////////// NEWSLETTER ////////////////////

// require 'PHPMailer/PHPMailerAutoload.php';

// $mail = new PHPMailer;

// //$mail->SMTPDebug = 3;                               // Enable verbose debug output

// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'localhost';  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = 'admin@vlambeer.com';                 // SMTP username
// $mail->Password = 'zemmer123';                           // SMTP password
// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 25;                                    // TCP port to connect to

// $mail->From = 'admin@vlambeer.com';
// $mail->FromName = 'Vlambeer Support';


// $mail->addAddress('ellen@example.com');               // Name is optional


// $mail->isHTML(true);                                  // Set email format to HTML

// $mail->Subject = 'Here is the subject';
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// if(!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Message has been sent';
// }