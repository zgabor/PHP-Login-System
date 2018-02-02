<?php 
	//Allow the config
	define('__CONFIG__', true);
	//Require the config
	require_once "inc/config.php";
 ?>


<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Page Title</title>

    <base href="/php_login_system/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

  <body>

	<div class="uk-section uk-container ">
		<?php 

				echo "Today is: " . date('Y m d') . "<br>";

		 ?>

		 		<a href="login.php">Login</a>
		 		<a href="register.php">Register</a>
	</div>

	<?php require_once "inc/footer.php"; ?>

	
	

  </body>
</html>