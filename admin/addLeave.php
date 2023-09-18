<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/include/session.php';
	require_once '../admin/controller/declare.php';
?>

<a href="./logout.php"></a>

<?php require_once '../admin/include/header.php'; ?>
<?php
	if(!isset($_SESSION['email'])){
		header("location: ./home.php");
	}
	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];
	}
?>
<body class="payrolbody">
	<main class="payrolmain">
		<?php require_once './include/sidenav.php'; ?>
		<section class="right-container">
			<?php require_once './include/topnav.php'; ?>
			<form method="post">
				<div class="dailyAtt">
					<h3>Add Leave</h3>
					<?php 
						if (isset($err)) {
							echo $err;
						}else if (isset($suc)) {
							echo $suc;
						}
					?>
					<div class="">
						<div class="columnit1">
							<label>Leave type</label>
							<input type="text" name="leavetype" placeholder="Enter Leave type">
						</div>
						<div>
							<button class="button_att" type="submit" name="submit_leave">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</section>
	</main>
</body>
