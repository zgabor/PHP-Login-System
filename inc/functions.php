<?php 
	function ForceLogin(){
		if (isset($_SESSION['user_id'])) {
			//user is allowed here

		} else {
			//user is not allowed here
			header("Location: login.php"); exit;
		}
	}

	function ForceDashboard(){
		if (isset($_SESSION['user_id'])) {
			//user is allowed here
			header("Location: dashboard.php"); exit;
		} 
	}
 ?>