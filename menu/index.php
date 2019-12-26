<?php include ('../server.php'); 
	
	// If user is not logged in, they cannot access this page
	if (empty($_SESSION['id'])) {
		header('Location: ../index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
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
					      <li class="active"><a href="index.php?home" style="color: blue;"><strong>Home</strong></a></li>
					      <li><a href="profile.php?profile" style="color: white;"><strong>Profile</strong></a></li>
					      <li><a href="editProfile.php?editProfile" style="color: white;"><strong>Edit Profile</strong></a></li>
					      <li><a href="editPassword.php?editPassword" style="color: white;"><strong>Edit Password</strong></a></li>
					    </ul>
				  	</div>
				</nav>
			</div>
			<div class="content">
				<?php if (isset($_SESSION['success'])): ?>
					<div class="error success">
						<h3>
							<?php 
								echo $_SESSION['success'];
								unset($_SESSION['success']);
							?>
						</h3>
					</div>
				<?php endif ?>
				<?php if (isset($_SESSION['id'])): ?>
					<p style="font-family: Lucida Console;">Welcome <strong><?php echo $username; ?><br></strong></p>
					<p style="font-family: Lucida Console;"><a href="index.php?logout='1'" style="color: red;">Log out</a></p>
				<?php endif ?>
			</div>
			<footer>
       			<p>© 2018<a style="color:#0a93a6; text-decoration:none;" href="#"> CableNet</a>, Created by Stefanos Manoukakis || All rights reserved.</p>
    		</footer>
		</body>
</html>