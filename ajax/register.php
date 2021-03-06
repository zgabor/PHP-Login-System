<?php 
	//Allow the config
	define('__CONFIG__', true);
	//Require the config
	require_once "../inc/config.php";


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		//header('Content-Type: application/json');

		$return = [];

		$email = Filter::String($_POST['email']);

		// Make sure the user does not exist
		$userFound = User::Find($email);

		if ($userFound) {
			//User exist
			//Megnézzük, hogy be tud-e lépni
			$return['error'] = "You already have an account";
			$return['is_logged_in'] = false;
		} else {

			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

			$addUser = $con->prepare("INSERT INTO users(email, password) VALUES (LOWER(:email), :password)");
			$addUser->bindParam(':email',$email, PDO::PARAM_STR);
			$addUser->bindParam(':password',$password, PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();

			$_SESSION['user_id'] = (int) $user_id;

			$return['redirect'] = './dashboard.php?message=welcome';
			$return['is_logged_in'] = true;
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