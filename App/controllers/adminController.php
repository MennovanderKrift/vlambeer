<?php require '../config/Database.php';

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
      $_SESSION['username'] = $user->username;
      $_SESSION['password'] = $user->password;
      $_SESSION['name'] = $user->name;
      $_SESSION['last_name'] = $user->last_name;
      header("location: ../admin/admin.php?id=" . $_SESSION['id']);    
    } else {
      session_start();
      $_SESSION['wrongCredentials'] = "Password or username incorrect";
      header("location: ../admin/login.php");
    }
  }
}
session_start();
if (isset($_SESSION['id'])) {
  $sessionId = $_SESSION['id'];
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

  if (isset($_POST['deleteAdminAccounts'])) {
    if ($number_of_rows <= 1) {
      session_start();
      $_SESSION['cantDelete'] = "You can't have less than 1 admin account";
      header("location: ../admin/admin.php?id=$sessionId");
    } else {
      $stmt = $db->prepare("DELETE FROM tbl_users WHERE user_id = :user_id");
      
      $stmt->bindParam(':user_id', $_GET['user_id']);   
     
      if (!$stmt->execute()) {
        header("location: ../admin/admin.php?id=$sessionId&fail");
      } else {
        session_start();
        $_SESSION['deleteSuccesfull'] = "Admin successfully deleted";
        header("location: ../admin/admin.php?id=$sessionId");
      }
    }
  }

//////////////////// EDIT & DELETE USER ACOUNTS ////////////////////
if (isset($_POST['editCustomerAccounts'])) {
  $stmt = $db->prepare("UPDATE tbl_customers SET  email_address = :email_address, 
                                                  username = :username,  
                                                  name = :name, 
                                                  last_name = :last_name, 
                                                  zipcode = :zipcode, 
                                                  address = :address, 
                                                  phone_number = :phone_number, 
                                                  news_letter = :news_letter 
                                            WHERE customer_id = :customer_id");

    $stmt->bindParam("customer_id", $_GET['customer_id'], PDO::PARAM_STR);
    $stmt->bindParam("email_address", $_POST['email_address'], PDO::PARAM_STR);
    $stmt->bindParam("username", $_POST['username'], PDO::PARAM_STR);
    $stmt->bindParam("name", $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam("last_name", $_POST['last_name'], PDO::PARAM_STR);
    $stmt->bindParam("zipcode", $_POST['zipcode'], PDO::PARAM_STR);
    $stmt->bindParam("address", $_POST['address'], PDO::PARAM_STR);
    $stmt->bindParam("phone_number", $_POST['phone_number'], PDO::PARAM_STR);
    $stmt->bindParam("news_letter", $_POST['news_letter'], PDO::PARAM_STR);

  if (!$stmt->execute()) {
    header("location: ../admin/customers.php?id=$sessionId&fail");
  } else {
    session_start();
    $_SESSION['editSuccesfull'] = "Customer successfully edited";
    header("location: ../admin/customers.php?id=$sessionId");
  }
}

if (isset($_POST['deleteCustomerAccounts'])) {
  $stmt = $db->prepare("DELETE FROM tbl_customers WHERE customer_id = :customer_id");
  
  $stmt->bindParam('customer_id', $_GET['customer_id']);   
 
  if (!$stmt->execute()) {
    header("location: ../admin/customers.php?id=$sessionId&fail");
  } else {
    session_start();
    $_SESSION['deleteSuccesfull'] = "Customer successfully deleted";
    header("location: ../admin/customers.php?id=$sessionId");
  }
}
//////////////////// NEWSLETTER ////////////////////

//   $datetime = date("Y-m-d h:i:s");

//   $sql = "INSERT INTO tbl_newsletter (newsletter_title,
//                                       newsletter_content,
//                                       newsletter_date)
//                               VALUES (:newsletter_title, 
//                                       :newsletter_content, 
//                                       :newsletter_date)";                                       
//   $stmt = $db->prepare($sql);
                                                
//   $stmt->bindParam(':newsletter_title', $_POST['newsletter_title'], PDO::PARAM_STR);       
//   $stmt->bindParam(':newsletter_content', $_POST['newsletter_content'], PDO::PARAM_STR); 
//   $stmt->bindParam(':newsletter_date', $datetime, PDO::PARAM_STR);                                      

//   if (!$stmt->execute()) {
//       echo 'wrong statement';
//   } else {
//     session_start();
//     $sessionId = $_SESSION['id'];
//     header("location: ../admin/newsletter.php?id=$sessionId");
//   }
// }

if (isset($_POST['sendNewsletter'])) {
  // $stmt = $db->prepare("SELECT email_address FROM tbl_customers WHERE news_letter = '1'");
  // $stmt->execute();
  // $toEmail = $stmt->fetchAll(PDO::FETCH_OBJ);

  // foreach ($toEmail as $row) {
  //   $toEmail2 = $row->email_address . " , ";
  // }
  // $to ="koen-debont@hotmail.com";

  // $subject = "HTML email";

  // $message = "<html>
  //               <head>
  //                 <meta charset='UTF-8'>
  //               </head>
  //               <body>
  //                 <h1>" . $_POST['newsletter_title'] . "</h1>
  //                 <p>" . $_POST['newsletter_content'] . "</p>
  //               </body>
  //             </html>";

  // ini_set("sendmail_from", "admin@vlambeer.com");
  // $headers = "Content-type: text/html; charset=iso-8859-1" . "\r\n";
  // $headers .= 'From: <admin@vlambeer.com>' . "\r\n";

  // if (mail($to, $subject, $message, $headers)) {
  //   echo "werkt wel";
  // } else {
  //   echo "werkt niet";
  // }

/////////////////////////////////////////

  require 'PHPMailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;

  $mail->SMTPDebug = 3;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.localhost';                     // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'administrator';                 // SMTP username
  $mail->Password = 'zemmer123';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 25;                                    // TCP port to connect to

  $mail->From = 'admin@vlambeer.com';
  $mail->FromName = 'Vlambeer';
  $mail->addAddress('koen-debont@hotmail.com');               // Name is optional
  // $mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if(!$mail->send()) {
      echo 'Message could not be sent. ';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
  }
}