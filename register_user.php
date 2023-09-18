<?php
require_once './controller/db.php';
require_once './controller/register_userdeclare.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Register User</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body class="login1">
<main class="login4">
	<section class="login2">
		<div>
			<h1>RG PAYROLL SYSTEMS</h1>
			<h3>User-Register interface</h3>		
		</div>
	
	</section>

	<section class="login3">
		<div>
			<form class="login5" method="POST" action="register_user.php">
				<label>Email</label>
				<input class="login6" type="text" name="email" placeholder="Email">
				<label>Password</label>
				<input class="login6" type="password" name="password" placeholder="password">
				<label>Re-type Password</label>
				<input class="login6" type="password" name="rpassword" placeholder="Re-type Password">
				<label>First Name</label>
				<input class="login6" type="text" name="firstname" placeholder="First Name">
				<label>Last Name</label>
				<input class="login6" type="text" name="lastname" placeholder="Last Name">
				<label>Gender</label>
				<input class="login6" type="text" name="gender" placeholder="Gender">
				<label>Date of Birth</label>
				<input class="login6" type="text" name="dateofbirth" placeholder="Date of Birth">
				<label>Address</label>
				<input class="login6" type="text" name="address" placeholder="Address">
				<label>Marital Status</label>
				<input class="login6" type="text" name="maritalstatus" placeholder="Marital Status">
				<label>Phone number</label>
				<input class="login6" type="text" name="phonenumber" placeholder="Phone number">
				<button class="login7" type="submit" name="Register">Register</button>
			</form>
			Already a Member?<a href="./index.php">Login.</a>
		</div>
	</section>
</main>
</body>
</html>