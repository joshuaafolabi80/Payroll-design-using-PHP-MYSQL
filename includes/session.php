<?php
	session_start();

	function loggedIn(){
		if (isset($_SESSION['email'])) {
			return true;
		}else{
			return false;
		}
	}

	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];
	}