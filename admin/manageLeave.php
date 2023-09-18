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
			<div class="page-content">
				<div class="table-control">
					<table border="1">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Leave type</th>
								<th>Date</th>
								<th class="bb">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$read = $mysqli->prepare("SELECT * FROM addleave_admin");
								//Change the chronological order and also limit the number of records been retrieve
								// $read = $mysqli->prepare("SELECT * FROM staff ORDER BY id DESC LIMIT 1");
								$read->execute();

								$result = $read->get_result();
								if ($result->num_rows > 0) {
									while($data = $result->fetch_assoc()){ ?>
										<tr>
											<td><?php echo $data['id'] ?></td>
											<td><?php echo $data['leavetype'] ?></td>
											<td><?php echo $data['created'] ?></td>
											<td><a href="./update_leave_admin.php?id=<?php echo $data['id']; ?>">Edit</a> | <a href="./delete_leave_admin.php?id=<?php echo $data['id']; ?>">Delete</a></td>
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
