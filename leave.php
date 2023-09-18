<?php
	// ini_set('display_errors', '1');
	// ini_set('display_startup_errors', '1');
	// error_reporting(E_ALL);

	require_once './controller/db.php';
	require_once './includes/session.php';
	require_once './controller/declare2.php';

?>

<?php require_once './includes/header.php'; ?>
<?php
	if(!isset($_SESSION['email'])){
		header("location: ./index.php");
	}
	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];
	}
	echo $email;
?>
<body class="payrolbody">
	<main class="payrolmain">
		<?php require_once './includes/sidenav.php'; ?>
		<section class="right-container">
			<?php require_once './includes/topnav.php'; ?>
			<form method="POST">
				<div class="dailyAtt">
					<h3>Apply for Leave</h3>
					<?php 
						if (isset($err)) {
							echo $err;
						}else if (isset($suc)) {
							echo $suc;
						}
					?>
					<div class="flexit">
						<div class="leave">
							<div class="leave4">
								<label>Name:</label>
								<input type="text" name="email" placeholder="Enter email">
							</div>
							<div class="columnit1">
								<label>Leave type</label>
								<select name="leavetype">
									<option>Choose leave type</option>
									<option>Medical leave</option>
									<option>Childbirth leave</option>
									<option>Marriage leave</option>
									<option>Academic leave</option>
									<option>Sick leave</option>
									<option>Casual leave</option>
								</select>
							</div>

							<div class="leave1">
								<label>From:</label>
								<input type="text" name="fromhere" placeholder="DD/MM/YYYY">
							</div>
							
							<div class="leave2">
								<label>To:</label>
								<input type="text" name="tothere" placeholder="DD/MM/YYYY">
							</div>
							
							<div class="leave3">
								<label>Comment:</label>
								<textarea name="comm" placeholder="Enter comments" rows="5"></textarea>
							</div>
							<div>
								<select name="onhold">
									<option>pending</option>
								</select>
							</div>

							<div class="submitdaily">
								<button type="submit" name="submit">Apply</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</section>
	</main>
</body>