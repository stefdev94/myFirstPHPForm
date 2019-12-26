<?php
	session_start();
	$errors = array();

	// Create connection
	$conn = mysqli_connect('localhost', 'root', '', 'registration');

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Verify new user
	function getUsername($username) {
		$conn = mysqli_connect('localhost', 'root', '', 'registration');
		$username = ($_GET['username']);
		$sql = "UPDATE users SET verificationStatus = 1 WHERE username = '$username'";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
	}

	// If the register button is clicked, register user in database
	if (isset($_POST['register'])) {
		$username = ($_POST['username']);
		$email = ($_POST['email']);
		$age = ($_POST['age']);
		$gender = "";
		$phone = ($_POST['phone']);
		$address = ($_POST['address']);
		$password_1 = ($_POST['password_1']);
		$password_2 = ($_POST['password_2']);

		// Ensure that form fields are filled properly
		if(empty($username)) {
			array_push($errors, "Username is required");
		}
		if(empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($age)) {
			array_push($errors, "Age is required");
		}
		if(empty($password_1)) {
			array_push($errors, "Password is required");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// If there are no errors, save user to database
		if (count($errors) == 0) {
			$password = md5($password_1); // Encrypt password before storing to database

			if (isset($_POST['gender'])) {
				$gender = $_POST['gender'];
			}
			
			// Verification Email
			// recipient
			$to  = 'manoukakis.stefanos@gmail.com'; 
			// subject
			$subject = 'Verification Email';
			// message
			$message = '
				<html>
				<head>
				</head>
				<body>
				  Hello '.$username.', welcome to CableNet!<br>Please click on the link below to verify your account.<br>
				  <a href = "http://localhost/php-sql/verified.php?username='.$username.'">http://localhost/php-sql/verified.php?username='.$username.'</a>
				</body>
				</html>
			';
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Mail it
			mail($to, $subject, $message, $headers);

			$sql = "INSERT INTO users (username, email, password, age, gender, phone, address, verificationStatus) 
					VALUES ('$username', '$email', '$password', '$age', '$gender', '$phone' ,'$address' ,0);";
			$result = mysqli_query($conn, $sql);

			header("Location: ./verify.php?username=$username");
		}
	}
	if (isset($_GET['login'])) {
		header("Location: ./index.php");
	}

	// If Index button is clicked, log user in using database
	if (isset($_POST['index'])) {
		$username = ($_POST['username']);
		$password = ($_POST['password']);

		// Ensure that form fields are filled properly
		if(empty($username)) {
			array_push($errors, "Username is required");
		}
		if(empty($password)) {
			array_push($errors, "Password is required");
		}

		// If there are no errors, log in user using database
		if (count($errors) == 0) {
			$password = md5($password); // Encrypt password before comparing with that from database
			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 1) {
				// Log user in
				$getID = "SELECT id FROM users WHERE username = '$username' AND password = '$password' AND verificationStatus = 1;";
				echo "getID = ".$getID;
				if (empty($getID)){
					array_push($errors, "Please Verify your account!");
				}
				$resultID = mysqli_query($conn, $getID);
				$row = mysqli_fetch_assoc($resultID);
				$id = $row['id'];
				$_SESSION['id'] = $id;
				$_SESSION['success'] = "You are now logged in";
				header("Location: ./menu/index.php?home"); // Redirect to home page
				mysqli_free_result($result);
				mysqli_free_result($resultID);
			}
			else {
				array_push($errors, "Invalid combination");
			}
		}
	}

	// If Home link is clicked
	if (isset($_GET['home'])) {
		$sql = "SELECT username FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		mysqli_free_result($result);
	}

	// If Profile link is clicked
	if (isset($_GET['profile'])) {
		$sql = "SELECT email FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$email = $row['email'];
		mysqli_free_result($result);
		$sql = "SELECT username FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		mysqli_free_result($result);
		$sql = "SELECT age FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$age = $row['age'];
		mysqli_free_result($result);
		$sql = "SELECT gender FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$gender = $row['gender'];
		mysqli_free_result($result);
		$sql = "SELECT phone FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$phone = $row['phone'];
		mysqli_free_result($result);
		$sql = "SELECT address FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$address = $row['address'];
		mysqli_free_result($result);
	}

	// If edit profile link is clicked
	if (isset($_GET['editProfile'])) {
		$sql = "SELECT username FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		mysqli_free_result($result);
		$sql = "SELECT email FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$email = $row['email'];
		mysqli_free_result($result);
		$sql = "SELECT password FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$password = $row['password'];
		mysqli_free_result($result);
		$sql = "SELECT phone FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$phone = $row['phone'];
		mysqli_free_result($result);
		$sql = "SELECT address FROM users WHERE id = '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$address = $row['address'];
		mysqli_free_result($result);
	}

	// If the update profile button is clicked
	if (isset($_POST['updateProfile'])) {
		$username = ($_POST['username']);
		$email = ($_POST['email']);
		$phone = ($_POST['phone']);
		$address = ($_POST['address']);

		// Ensure that form fields are filled properly
		if(empty($username)) {
			array_push($errors, "Username is required");
		}
		if(empty($email)) {
			array_push($errors, "Email is required");
		}
		
		// If there are no errors, change user fields in database
		if (count($errors) == 0) {
			$sql = "UPDATE users SET username = '$username', email = '$email',  phone = '$phone', address = '$address' WHERE id = '".$_SESSION['id']."'";
			$result = mysqli_query($conn, $sql);
			header("Location: ./index.php?home");
			mysqli_free_result($result);
		}
	}

	// If the update password button is clicked
	if (isset($_POST['updatePassword'])) {
		$password = ($_POST['password']);
		$password_1 = ($_POST['password_1']);
		$password_2 = ($_POST['password_2']);

		// Ensure that form fields are filled properly
		if(empty($password)) {
			array_push($errors, "Current password is required");
		}
		if(empty($password_1)) {
			array_push($errors, "New password is required");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		
		// If there are no errors, change user fields in database
		if (count($errors) == 0) {
			$password = md5($password);
			$getPassword = "SELECT password FROM users WHERE id = '".$_SESSION['id']."'";
			$resultPassword = mysqli_query($conn, $getPassword);
			$row = mysqli_fetch_assoc($resultPassword);
			$old = $row['password'];
			if ($password == $old) {
				$password = md5($password_1); // Encrypt password before storing to database
				$sql = "UPDATE users SET password = '$password' WHERE id = '".$_SESSION['id']."'";
				$result = mysqli_query($conn, $sql);
				header("Location: ./index.php?home");
				mysqli_free_result($result);
			}
			else {
				array_push($errors, "Invalid combination");
			}
		}
	}

	// Logout
	if (isset($_GET['logout'])) {
		unset($_SESSION['id']);
		session_destroy();
		header("Location: ../index.php");
	}
	mysqli_close($conn);
?>