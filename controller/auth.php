<?php
	


	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		if (isset($_POST['login'])) {
			$email = rtrim($_POST['email']);
			$password = rtrim($_POST['password']);

			if(empty($email) || empty($password)){
				$err = "All fields are required";
			}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$err = "Invalid Email Entered";
			}else{
				$read = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
				$read->bind_param("s", $email);
				$read->execute();
				$result = $read->get_result();				

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					if(password_verify($password, $row['password'])){
						if($row["role"]=="admin"){
							$_SESSION['email'] = $email;
							header("location: ./admin/home.php");
						}else{					
							$_SESSION['email']=$email;
							header("location: ./home.php");
						}

						$err = "Login successful";	
					}else{
						$err = "Password does not match";
					}
				}else{
					$err = "Invalid Email and/or Password";	
				}
			}
		}
		if(isset($_POST['Register'])){
			$email = $_POST['email'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$gender = $_POST['gender'];
			$phonenumber = $_POST['phonenumber'];
			$password = $_POST['password'];
			$rpassword = $_POST['rpassword'];

			if (empty($email) || empty($firstname) || empty($lastname) || empty($gender) || empty($phonenumber) || empty($password) || empty($rpassword)) {
				echo "All fields are required";
			}else if(checkEmail($email, $mysqli)){
				echo "Email already exist";
			}else if($password !== $rpassword){
				echo "Password does not match";
			}else{
				if(createRegister($email, $firstname, $lastname, $gender, $phonenumber, $password, $rpassword, $mysqli)){
					echo "Your information was saved successfully";
				}else{
					echo 'Error'; 
				}
			}
		}
	}