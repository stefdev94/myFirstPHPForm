<?php include ('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</head>
		<body>
			<div class="header">
				<h2>Register</h2>
			</div>
			<form method="POST" action="register.php">
				<!--display validation errors here-->
				<?php include ('errors.php'); ?>
				<div class="input-group">
					<label>Username<b style="color: red">*</b></p></label>
					<input type="text" name="username" placeholder="Type your username...">
				</div>
				<div class="input-group">
					<label>Email<b style="color: red">*</b></p></label>
					<input type="text" name="email" placeholder="Type your email...">
				</div>
				<div class="input-group">
					<label>Age<b style="color: red">*</b></p></label>
					<input type="text" name="age" placeholder="Type your age...">
				</div>
				<div class="input-group">
					<label>Gender</label>
				</div>
				<div>
					<label class="radio-inline">
	      				<input type="radio" name="gender" value="Male">Male
	    			</label>
				    <label class="radio-inline">
				      <input type="radio" name="gender" value="Female">Female
				    </label>
				</div>
				<div class="input-group">
					<label>Phone</label>
					<input type="text" name="phone" placeholder="Type your phone...">
				</div>
				<div class="input-group">
					<label>Address</label>
					<input type="text" name="address" placeholder="Type your address...">
				</div>
				<div class="input-group">
					<label>Password<b style="color: red">*</b></p></label>
					<input type="password" name="password_1" placeholder="Type your password...">
				</div>
				<div class="input-group">
					<label>Confirm Password<b style="color: red">*</b></p></label>
					<input type="password" name="password_2" placeholder="Confirm your password...">
				</div>
				<div class="input-group">
					<p style="color: red; font-family: Lucida Console;">Fields with * are required</b></p>
				</div>
				<div class="input-group">
					<button type="submit" name="register" class="btn">Register</button>
					Already a member? <a href="index.php">Sign in</a>
				</div>
			</form>
			<footer>
       			<p>© 2018<a style="color:#0a93a6; text-decoration:none;" href="#"> CableNet</a>, Created by Stefanos Manoukakis || All rights reserved.</p>
    		</footer>
		</body>
</html>