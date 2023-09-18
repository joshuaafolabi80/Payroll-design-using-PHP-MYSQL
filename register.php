<?php 
	session_start();
	require_once './controller/db.php';
	require_once './controller/register_parameters.php';
	require_once './controller/auth.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcom to my payroll system</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
	<main class="main">
		<section class="form-container">
			<?php 
				if (isset($err)) { ?>
					<p class="err"><?php echo $err; ?></p>
				<?php }else if (isset($suc)) { ?>
					<p class="suc"><?php echo $suc; ?></p>
			<?php }
			?>
			<form class="indexform" method="POST" enctype="multipart/form-data">
				<div>
					<aside></aside>
					<span>Create an account!</span>
				</div>
				<div>
					<label>Email</label>
					<input type="email" name="email" placeholder="Enter Email Address">
				</div>
				<div>
					<label>Password</label>
					<input type="password" name="password" placeholder="Enter password">
				</div>
				<div>
					<label>Re-type Password</label>
					<input type="password" name="rpassword" placeholder="Enter Re-type password">
				</div>
				<div>
					<label>First Name</label>
					<input type="text" name="firstname" placeholder="Enter firstname">
				</div>
				<div>
					<label>Last name</label>
					<input type="text" name="lastname" placeholder="Enter lastname">
				</div>
				<div>
					<label>Gender</label>
					<input type="text" name="gender" placeholder="Enter Gender">
				</div>
				<div>
					<label>Phone number</label>
					<input type="text" name="phonenumber" placeholder="Enter phone number">
				</div>
				<div>
					<button name="Register" type="submit">Register</button>
				</div>
			</form>
			Already a Member?<a href="./index.php">Login.</a>

		</section>
	</main>
</body>
</html>