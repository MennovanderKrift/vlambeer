<?php 
  include '../includes/header.php';
?>

<div class="container">
	
	<form action="addUser.php" method="POST" id="registerForm" class="form-horizontal">
    <div class="form-group">
      <label for="username" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-3">
        <input type="text" class="form-control" name="username" id="username" placeholder="Your desired username">
      </div>
    </div>
    <div class="form-group">
      <label for="email_address" class="col-lg-2 control-label">E-mail</label>
      <div class="col-lg-3">
        <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Your e-mail address">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-3">
        <input type="password" class="form-control" name="password" id="password" placeholder="Your desired password">
      </div>
    </div>
    <div class="form-group">
      <label for="password2" class="col-lg-2 control-label">Password (repeat)</label>
      <div class="col-lg-3">
        <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat password">
      </div>
    </div>
   <?php if(isset($_GET['msg'])) {
	if($_GET['msg'] == 'pe1') {
		echo "<p class='text-danger' style='margin-left:200px;'>The passwords you've entered did not match</p>";
	}elseif($_GET['msg'] == 'pe2') {
		echo "<p class='text-danger' style='margin-left:200px;'>The length of the password you've entered is not long enough<br>The password must be at least 8 characters</p>";
	}elseif($_GET['msg'] == 'ue1') {
		echo "<p class='text-danger' style='margin-left:200px;'>The username you have chosen is already in use</p>";
	}elseif($_GET['msg'] == 'sr1') {
    header('location: login.php?msg=You+are+now+succesfully+registered');
	}elseif($_GET['msg'] == 'ee1') {
		echo "<p class='text-danger' style='margin-left:200px;'>The email you've entered is already in use</p>";
	}
} ?>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <input type="submit" name="register" class="btn btn-warning" value="Register">
        <div id="formReset" class="btn btn-danger">Reset</div>
      </div>
    </div>
	</form>

</div>

<?php
  include '../includes/footer.php';
?>
  <script>
    $('#formReset').click(function(){
      $('#registerForm')[0].reset();
    });
  </script>
</body>
</html>