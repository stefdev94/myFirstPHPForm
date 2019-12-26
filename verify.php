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
			<form method="GET" action="verify.php">
				<!--display validation errors here-->
				<?php include ('errors.php'); ?>
				<div class="input-group">
					<h3>Mr/Mrs <strong><?php echo ($_GET['username']);?></strong> a Verification Email has been sent to you.<br>
					Please check your mailbox in order to verify your account.</h3>	
				</div>
			</form>
			<footer>
       			<p>© 2018<a style="color:#0a93a6; text-decoration:none;" href="#"> CableNet</a>, Created by Stefanos Manoukakis || All rights reserved.</p>
    		</footer>
		</body>
</html>