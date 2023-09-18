<?php
	require_once './controller/db.php';
	require_once './includes/session.php';

?>

<?php require_once './includes/header.php'; ?>
<?php
	if(!isset($_SESSION['email'])){
		header("location: ./index.php");
	}
	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];
	}
?>
<body class="payrolbody">
	<main class="payrolmain">
		<?php require_once './includes/sidenav.php'; ?>
		<section class="right-container">
			<?php require_once './includes/topnav.php'; ?>
			<section class="welcome">
				<div class="rgpayroll">
					<div class="hhh">
						<h1>welcome to RG payroll systems</h1>
						<h3>...providing global payroll solutions...</h2>
					</div>
				</div>
			</section>
			<div class="bigbox">
				<h2>...Payroll computations made easy... </h2>
				<div class="c">
					<div class="container">
						<div class="dashboard">
							<div class="num">
							
							</div>
							<div class="icon">
								<i class="fa fa-box fa-2x"></i>
							</div>
						</div>
							
						<div class="parentfields">
							<div class="fields">
								<p>Attendance</p>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="dashboard">
							<div class="num">
							
							</div>
							<div class="icon">
								<i class="fa fa-box fa-2x"></i>
							</div>
						</div>
							
						<div class="parentfields">
							<div class="fields">
								<p>Payslips</p>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="dashboard">
							<div class="num">
							
							</div>
							<div class="icon">
								<i class="fa fa-box fa-2x"></i>
							</div>
						</div>
							
						<div class="parentfields">
							<div class="fields">
								<p>Leave</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>	
	</main>
</body>

