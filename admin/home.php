<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/include/session.php';

?>

<a href="./logout.php"></a>

<?php require_once '../admin/include/header.php'; ?>
<?php
	if(!isset($_SESSION['email'])){
		header("location: register_userlogin.php");
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
								<p>Number of departments</p>
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
								<p>Number of employee</p>
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
								<p>Daily attendance</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</body>
		