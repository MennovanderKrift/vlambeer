<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vlambeer.com</title>
</head>
<body>
	<?php

	if(isset($_GET['msg'])) {
		if($_GET['msg'] == 'rs') {
			echo "<p class='text-success'>Welcome to Vlambeer.com. You've been succesfully registered now.<br> You will receive an information email in a few minutes.</p>";
		}
	}

	?>
</body>
</html>