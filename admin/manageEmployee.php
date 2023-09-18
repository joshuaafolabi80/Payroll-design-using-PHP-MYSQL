<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/include/session.php';

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
			<div class="page-content">
				<div class="table-control">
					<table border="1">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Surname</th>
								<th>Email</th>
								<th>Date</th>
								<th class="bb">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$read = $mysqli->prepare("SELECT * FROM users");
								//Change the chronological order and also limit the number of records been retrieve
								// $read = $mysqli->prepare("SELECT * FROM staff ORDER BY id DESC LIMIT 1");
								$read->execute();

								$result = $read->get_result();
								if ($result->num_rows > 0) {
									while($data = $result->fetch_assoc()){ ?>
										<tr>
											<td><?php echo $data['id'] ?></td>
											<td><?php echo $data['firstname'] ?></td>
											<td><?php echo $data['lastname'] ?></td>
											<td><?php echo $data['email'] ?></td>
											<!-- <td><?php echo $data['dept'] ?></td>
											<td><?php echo $data['desig'] ?></td>
											<td><?php echo $data['status'] ?></td> -->
											<td><?php echo $data['created'] ?></td>
											<td><a href="./viewEmployee.php?email=<?php echo $data['email']; ?>">View More</a> | <a href="./update_employee.php?email=<?php echo $data['email']; ?>">Edit</a> | <a href="./delete.php?email=<?php echo $data['email']; ?>">Delete</a></td>
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
	