<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/controller/declare.php';
	require_once '../admin/include/session.php';
	require_once '../admin/include/header.php';

	if($_SERVER["REQUEST_METHOD"] === "GET") {
		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];
			$read = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
			$read->bind_param("s", $email);
			$read->execute();

			$result = $read->get_result();

			if ($result->num_rows > 0) {
				$data = $result->fetch_assoc();
			}
		}else{
			header("location: ./");
		}
		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];
			$read2 = $mysqli->prepare("SELECT * FROM financialdetails WHERE email = ?");
			$read2->bind_param("s", $email);
			$read2->execute();

			$result2 = $read2->get_result();

			if ($result2->num_rows > 0) {
				$data2 = $result2->fetch_assoc();
			}
		}else{
			header("location: ./");
		}
		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];
			$read3 = $mysqli->prepare("SELECT * FROM employee WHERE email = ?");
			$read3->bind_param("s", $email);
			$read3->execute();

			$result3 = $read3->get_result();

			if ($result3->num_rows > 0) {
				$data3 = $result3->fetch_assoc();
			}
		}else{
			header("location: ./");
		}
		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];
			$read5 = $mysqli->prepare("SELECT * FROM bankaccount WHERE email = ?");
			$read5->bind_param("s", $email);
			$read5->execute();

			$result5 = $read5->get_result();

			if ($result5->num_rows > 0) {
				$data5 = $result5->fetch_assoc();
			}
		}else{
			header("location: ./");
		}
	}
	
?>

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
			<div>
				<form method="POST">
					<div>
						<input type="text" readonly name="email" value="<?php echo $data['email'] ?>">
					</div>
					<p>You are about to delete the staff record with the email: <?php echo $data['email']; ?></p>
					<div>
						<button type="submit" name="delete">Continue</button>
						<a href="./manageEmployee.php">Go back</a>
					</div>
				</form>
			</div>
		</section>
	</main>
</body>
