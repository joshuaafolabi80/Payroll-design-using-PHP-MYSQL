<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/include/session.php';
	require_once '../admin/controller/declare.php';

	if ($_SERVER["REQUEST_METHOD"] === "GET") {
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$id = $_GET['id'];
			$read = $mysqli->prepare("SELECT * FROM addleave_admin WHERE id = ?");
			$read->bind_param("i", $id);
			$read->execute();

			$result = $read->get_result();

			if ($result->num_rows > 0) {
				$data = $result->fetch_assoc();
			}
		}else{
			header("location: ./");
		}
	}

?>


<?php require_once '../admin/include/header.php'; ?>
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
		<?php require_once './include/sidenav.php'; ?>
		<section class="right-container">
			<?php require_once './include/topnav.php'; ?>
			<div>
				<form method="POST">
					<div>
						<input type="text" readonly name="id" value="<?php echo $data['id'] ?>">
					</div>
					<p>You are about to delete the leave type with the id: <?php echo $data['id']; ?></p>
					<div>
						<button type="submit" name="delete_leave_admin_button">Continue</button>
						<a href="./manageLeave.php">Go back</a>
					</div>
				</form>
			</div>
		</section>
	</main>
</body>
