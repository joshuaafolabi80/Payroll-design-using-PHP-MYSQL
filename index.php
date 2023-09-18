<?php 
	session_start();
	require_once './controller/db.php';
	require_once './controller/register_parameters.php';
	require_once './controller/auth.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register User</title>
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
					<span>Enter details to continue!</span>
				</div>
				<div>
					<label>Email</label>
					<input type="email" name="email" placeholder="Enter Email Address">
				</div>
				<div>
					<label>Password</label>
					<input type="password" name="password" placeholder="Enter Password">
				</div>
				<div>
					<button name="login" type="submit">Sign in</button>
				</div>
			</form>
			Not a member?<a href="./register.php">Create Account.</a>

		</section>
	</main>
</body>
</html>