<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/include/session.php';
	require_once '../admin/controller/declare.php';

	function getNumberOfEmployee($department, $mysqli){
		$stmt = $mysqli->prepare("SELECT * FROM employee WHERE department = ?");
		$stmt->bind_param("s", $department);
		$stmt->execute();

		$result = $stmt->get_result();

		return $result->num_rows;
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
			<div class="page-content">
				<div class="table-control">
					<table border="1">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Department</th>
								<th>Designation 1</th>
								<th>Designation 2</th>
								<th>Total Employee</th>
								<th>Date</th>
								<th class="bb">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$read = $mysqli->prepare("SELECT * FROM department_admin");
								//Change the chronological order and also limit the number of records been retrieve
								// $read = $mysqli->prepare("SELECT * FROM staff ORDER BY id DESC LIMIT 1");
								$read->execute();

								$result = $read->get_result();
								if ($result->num_rows > 0) {
									while($data = $result->fetch_assoc()){ ?>
										<tr>
											<td><?php echo $data['id'] ?></td>
											<td><?php echo $data['departments'] ?></td>
											<td><?php echo $data['designations1'] ?></td>
											<td><?php echo $data['designations2'] ?></td>
											<td><?php echo getNumberOfEmployee($data['departments'], $mysqli); ?></td>
											<td><?php echo $data['created'] ?></td>
											<td><a href="./update_department.php?id=<?php echo $data['id']; ?>">Edit</a> | <a href="./delete_create_department.php?id=<?php echo $data['id']; ?>">Delete</a></td>
										</tr>
									<?php }
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</main>
</body>
