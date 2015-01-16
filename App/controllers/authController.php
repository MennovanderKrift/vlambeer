<?php 

require '../config/Database.php';

if (isset($_GET['logout'])) {
    session_start();
 session_destroy();
    $msg = urlencode("You have successfully logged out");
    header('location: ../store/index.php?logout' );   
    die(); 
}

if (isset($_POST['loginUser'])) {
  $stmt = $db->prepare("SELECT * FROM tbl_customers WHERE email_address = :email_address");
  $stmt->bindParam("email_address",$_POST['email_address']);
  $result = $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_OBJ);
  $dbpass = $user->password;
  $pass = $_POST['password'];

  if (empty($_POST['email_address']) || empty($_POST['password'])) {
    session_start();
    $_SESSION['emptyFields'] = "All fields must be filled in";
    header("location: ../store/login.php");
  }

  if (password_verify($pass, $dbpass)) {
    session_start();
    $_SESSION['id'] = $user->customer_id;
    $_SESSION['email_address'] = $user->email_address;
    $_SESSION['username'] = $user->username;
    $_SESSION['password'] = $user->password;
    $_SESSION['name'] = $user->name;
    $_SESSION['role'] = 'customer';
    $_SESSION['last_name'] = $user->last_name;
    $_SESSION['gender'] = $user->gender;
    $_SESSION['address'] = $user->address;
    $_SESSION['zipcode'] = $user->zipcode;
    $_SESSION['phone_number'] = $user->phone_number;
    $_SESSION['news_letter'] = $user->news_letter;
    header('location: ../store/index.php');    
  } else {
    session_start();
    $_SESSION['wrongCredentials'] = "Password or username incorrect. <a href='../controllers/authController.php?forgotPassword'>Forgot your password?</a>";
    header("location: ../store/login.php");
  }
}

///////////////////////////////// ALS USER PASSWORD VERGETEN IS /////////////////////////////////
if (isset($_GET['forgotPassword'])) {
?>
  <form action="authController.php?sendEmail" method="POST">
    <label for="email">Email</label>
      <input type="email" name="email_address" id="email_address">
      <input type="submit" value="Reset Password">
  </form>
<?php
}
if (isset($_GET['sendEmail'])) {
  $stmt = $db->prepare("SELECT * FROM tbl_customers WHERE email_address = :email_address");
  $stmt->bindParam("email_address", $_POST['email_address']);
  $stmt->execute();
  $user = $stmt->fetchAll(PDO::FETCH_OBJ);
 
  

  ini_set("SMTP","aspmx.l.google.com");
  // Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
  ini_set("smtp_port","25");
  // Please specify the return address to use
  ini_set('sendmail_from', 'koendebont@gmail.com');

  $to = $_POST['email_address']; 
  $subject = "Hi!"; 
  $body = "Hi,\n\nHow are you?"; 

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
  $headers .= "From: test@gmail.com" . "\r\n";
  

    if (mail($to, $subject, $body, $headers)) {   
      echo("<p>Email successfully sent</p>");  
    } else {   
      echo("<p>Email delivery failed</p>");  
    }
}


/////////////////////////////////////////////////
if (isset($_POST['subscribeToNewsletterSubmit'])) {
  session_start();
  var_dump($_SESSION['id']);
  if (isset($_SESSION['id'])) {
    if ($_POST['subscribeToNewsletter'] == 'Yes') {
      $stmt = $db->prepare("UPDATE tbl_customers SET news_letter = 1 WHERE customer_id = :customer_id");
      $stmt->bindParam("customer_id", $_SESSION['id']);
      $stmt->execute();
      echo "Subscribed";
    } else {
      echo "cant subscribe";
    }
  } else {
    echo "log in or enter your email"?><input type="email" placeholder="example@email.com"><?php ;
  }
}    