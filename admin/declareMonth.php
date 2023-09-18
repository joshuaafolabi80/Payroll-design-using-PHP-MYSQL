<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/include/session.php';
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
			<div class="dailyAtt">
				<h3>Attendance Report</h3>
				<div class="table-control">
					<table border="1">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Employee Name/Surname</th>
								<th>Late</th>
								<th>Status</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($_SERVER["REQUEST_METHOD"] === "POST") {
									if (isset($_POST['submit'])) {
										$month = $_POST['month'];

										$read = $mysqli->prepare("SELECT * FROM attendance WHERE MONTH(created) = ?");
										$read->bind_param("s", $month);
										//Change the chronological order and also limit the number of records been retrieve
										// $read = $mysqli->prepare("SELECT * FROM staff ORDER BY id DESC LIMIT 1");
										$read->execute();

										$result = $read->get_result();				

										if ($result->num_rows > 0) {
											while($data = $result->fetch_assoc()){ ?>
												<tr>
													<td><?php echo $data['id'] ?></td>
													<td><?php echo $data['email'] ?></td>
													<td><?php echo $data['late'] ?></td>
													<td><?php echo $data['status'] ?></td>
													<td><?php echo $data['created'] ?></td>
												</tr>
											<?php }
											}
										}
									}
									
							?>
						</tbody>
					</table>
				</div>
		</section>
	</main>
</body>
