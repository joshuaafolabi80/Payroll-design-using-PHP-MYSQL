<?php
	function passwordMatch($email, $password, $mysqli){
		$read = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
		$read->bind_param("s", $email);
		$read->execute();

		$result = $read->get_result();

		if($result->num_rows > 0){
			$data = $result->fetch_assoc();

			if($password === $data['password']){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function loginConfig($email, $password, $mysqli){
		$read = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
		$read->bind_param("s", $email);
		$read->execute();

		$result = $read->get_result();

		if($result->num_rows > 0){
			return true;
		}else{
			return false;
		}

	}
	function createRegister($email, $firstname, $lastname, $gender, $phonenumber, $password, $rpassword, $mysqli){
		$create = $mysqli->prepare("INSERT INTO users(email, firstname, lastname, gender, dateofbirth, phonenumber, password) VALUES(?,?,?,?,?,?,?)");
		$create->bind_param("sssssss", $email, $firstname, $lastname, $gender, $dateofbirth, $phonenumber, $password);
		$create->execute();

		if($create->affected_rows > 0){
			return true;
		}else{
			return false;
		}
	}

	function checkEmail($email, $mysqli){
		$read = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
		$read->bind_param("s", $email);
		$read->execute();

		$result = $read->get_result();

		if($result->num_rows > 0){
			return true;
		}else{
			return false;
		}
	}
?>