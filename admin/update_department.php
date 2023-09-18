<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/include/session.php';
	require_once '../admin/controller/declare.php';

	if ($_SERVER["REQUEST_METHOD"] === "GET") {
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$id = $_GET['id'];
			$read = $mysqli->prepare("SELECT * FROM department_admin WHERE id = ?");
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
				<div class="createDept">
				<h3>Update Department</h3>
				
				<hr>
				<div>
					<div>
						<label>Department</label>
						<input type="text" name="departments" placeholder=" Enter Department" value="<?php echo $data['departments'] ?>">
						<input type="hidden" name="id" value="<?php echo $id ?>">
					</div>
					<div>
						<label>Designation 1</label>
						<input type="text" name="designations1" placeholder=" Enter Designation 1" value="<?php echo $data['designations1'] ?>">
					</div>
					<div>
						<label>Designation 2</label>
						<input type="text" name="designations2" placeholder=" Enter Designation 2" value="<?php echo $data['designations2'] ?>">
					</div>
				</div>

				<div class="actions">
					<ul>
						<li><button type="submit" name="updateDepartment">Update</button></li>
					</ul>
				</div>
			</div>
			</form>
		</section>
	</main>
</body>	