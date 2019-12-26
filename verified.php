<?php include ('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Verify Account</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</head>
		<body>
			<div class="header">
				<h2>Verification Status</h2>
			</div>
			<form method="GET" action="verified.php">
				<!--display validation errors here-->
				<?php include ('errors.php'); ?>
				<div class="input-group">
					<?php
						getUsername($_GET['username']);
					?>
					<h3>Congratulations! Your Account has been Varified successfully.</h3>
					<button type="submit" name="login" class="btn">Login</button>	
				</div>
			</form>
			<footer>
       			<p>© 2018<a style="color:#0a93a6; text-decoration:none;" href="#"> CableNet</a>, Created by Stefanos Manoukakis || All rights reserved.</p>
    		</footer>
		</body>
</html>