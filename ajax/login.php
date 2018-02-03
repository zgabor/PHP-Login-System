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
		$findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
		$findUser->bindParam(':email', $email, PDO::PARAM_STR);
		$findUser->execute();

		if ($findUser->rowCount() == 1) {
			
			$User = $findUser->fetch(PDO::FETCH_ASSOC);
			$user_id = (int) $User['user_id'];
			$hash = (string) $User['password'];

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