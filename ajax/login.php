<?php 
	//Allow the config
	define('__CONFIG__', true);
	//Require the config
	require_once "../inc/config.php";



	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		//header('Content-Type: application/json');

		$return = [];

		$email = Filter::String($_POST['email']);
		$password = $_POST['password'];

		// Make sure the user does not exist
		$userFound = User::Find($email, true);

		if ($userFound) {
			
			$user_id = (int) $userFound['user_id'];
			$hash = (string) $userFound['password'];

			if (password_verify($password, $hash)) {
				//User is signed in
				$return['redirect'] = "./dashboard.php";

				$_SESSION['user_id'] = $user_id;
			} else {
				//Invalid email/password
				$return['error'] = "Invalid email/password";
			}


		} else {

			$return['error'] = "You do not have an account. <a href='./register.php'>Create one now</a>";
		}


		//Hozzá lehet-e adni

		//Retrun the proper information back to JavaScript to redirect us.

		$return['name'] = 'gabor';

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		//Die kill the script, and redirect the user
		exit('Invalid URL');

	}



 ?>