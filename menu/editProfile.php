<?php include ('../server.php'); 
	
	// If user is not logged in, they cannot access this page
	if (empty($_SESSION['id'])) {
		header('Location: ../index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Profile</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
		<body>
			<div class="header">
				<nav class="navbar navbar-default" style="background: #FF8C00; border: 0px;margin: 0px auto 0px;">
					<div class="container-fluid">
				    	<div class="navbar-header">
				      		<a class="navbar-brand" href="index.php?home" style="color: white;">CableNet</a>
				    	</div>
					    <ul class="nav navbar-nav">
					      <li><a href="index.php?home" style="color: white;"><strong>Home</strong></a></li>
					      <li><a href="profile.php?profile" style="color: white;"><strong>Profile</strong></a></li>
					      <li class="active"><a href="editProfile.php?editProfile" style="color: blue;"><strong>Edit Profile</strong></a></li>
					      <li><a href="editPassword.php?editPassword" style="color: white;"><strong>Edit Password</strong></a></li>
					    </ul>
				  	</div>
				</nav>
			</div>
				<form method="POST" action="editProfile.php">
					<!--display validation errors here-->
					<?php include ('../errors.php'); ?>
					<div class="input-group">
						<label>Username</label>
						<input type="text" name="username" placeholder="New username..." value="<?php echo $username; ?>">
					</div>
					<div class="input-group">
						<label>Email</label>
						<input type="text" name="email" placeholder="New email..." value="<?php echo $email; ?>">
					</div>
					<div class="input-group">
						<label>Phone</label>
						<input type="text" name="phone" placeholder="New phone..." value="<?php echo $phone; ?>">
					</div>
					<div class="input-group">
						<label>Address</label>
						<input type="text" name="address" placeholder="New address..." value="<?php echo $address; ?>">
					</div>
						<button type="submit" name="updateProfile" class="btn">Update Profile</button><p><p style="font-family: Lucida Console;"><a href="index.php?logout='1'" style="color: red;">Log out</a></p></p>
					</div>	
				</form>
			<footer>
       			<p>© 2018<a style="color:#0a93a6; text-decoration:none;" href="#"> CableNet</a>, Created by Stefanos Manoukakis || All rights reserved.</p>
    		</footer>
		</body>
</html>