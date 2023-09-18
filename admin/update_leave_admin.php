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
				<div class="update_leave_admin">
					<h3>Update Leave type</h3>
					<div>
						<label>Leave Type</label>
						<input type="text" name="leavetype" placeholder="Enter leavetype" value="<?php echo $data['leavetype'] ?>">
						<input type="hidden" name="id" value="<?php echo $id ?>">
					</div>
					<div>
						
						
					</div>

					<div>
						<button class="button_att" type="submit" name="update_leave_admin_button">Update</button>
					</div>
				</div>
			</form>
		</section>
	</main>
</body>
