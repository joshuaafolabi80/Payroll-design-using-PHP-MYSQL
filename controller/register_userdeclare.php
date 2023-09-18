<?php
session_start();
// require_once './register_parameters.php';
require_once './controller/db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// if(isset($_POST['login'])){
	// 	$email = $_POST['email'];
	// 	$password = $_POST['password'];

	// 	if (empty($email) || empty($password)) {
	// 		echo "All fields are required";
	// 	}
	// 	else if(!passwordMatch($email, $password, $mysqli)){
	// 		echo "invalid password";
	// 	}else if(loginConfig($email, $password, $mysqli)){
	// 		$_SESSION['email'] = $email;
	// 		echo 'login successful';
	// 		header("location: ./employee.php");
	// 	}else{
	// 		echo 'account not found';
	// 	}
	// }
	if(isset($_POST['Register'])){
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$dateofbirth = $_POST['dateofbirth'];
		$address = $_POST['address'];
		$maritalstatus = $_POST['maritalstatus'];
		$phonenumber = $_POST['phonenumber'];
		$password = $_POST['password'];
		$rpassword = $_POST['rpassword'];

		if (empty($email) || empty($firstname) || empty($lastname) || empty($gender) || empty($dateofbirth) || empty($address) || empty($maritalstatus) || empty($phonenumber) || empty($password) || empty($rpassword)) {
			echo "All fields are required";
		}else if(checkEmail($email, $mysqli)){
			echo "Email already exist";
		}else if($password !== $rpassword){
			echo "Password does not match";
		}else if(!createRegister($email, $firstname, $lastname, $gender, $dateofbirth, $address, $maritalstatus, $phonenumber, $password, $rpassword, $mysqli)){
			echo 'no account found';
		}else{
			echo "Your information was saved successfully";
		}
	}
}
?>