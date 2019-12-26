<?php include ('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</head>
		<body>
			<div class="header">
				<h2>Login</h2>
			</div>
			<form method="POST" action="index.php">
				<!--display validation errors here-->
				<?php include ('errors.php'); ?>
				<div class="input-group">
					<label>Username</label>
					<input type="text" name="username" placeholder="Type your username...">
				</div>
				<div class="input-group">
					<label>Password</label>
					<input type="password" name="password" placeholder="Type your password...">
				</div>
				<div class="input-group">
					<button type="submit" name="index" class="btn">Login</button>
					Not a member yet? <a href="register.php">Sign up</a>
				</div>
			</form>
			<footer>
       			<p>© 2018<a style="color:#0a93a6; text-decoration:none;" href="#"> CableNet</a>, Created by Stefanos Manoukakis || All rights reserved.</p>
    		</footer>
		</body>
</html>