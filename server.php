<?php 
	session_start();
	
	// variable declaration
	$email = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	
	
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'project',"3308");
	
	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: list.php');
			}else {
				array_push($errors, " <div style ='color:#ff0000'> Wrong email/password combination</div>");
			}
		}
	}

?>