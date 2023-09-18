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
				<div class="flex">
					<div class="columnit1">
						<label>Employee by Department</label>
						<select>
							<option>All Employee</option>
							<option>All Employee</option>
						</select>
					</div>
					<div class="columnit2">
						<label>Year</label>
						<select>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
						</select>
					</div>
				</div>
				<div class="adjustparent">
					<form action="./declareMonth.php" method="post">
						<div class="Month">
							<select class="" name="month">
								<option>Month</option>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						<div class="showReport">
							<button class="button_att" type="submit" name="submit">Show Report by month</button>
							<a href="./attendanceReport.php"><button class="button_att">Show Report</button></a>
						</div>
					</form>
				</div>
			</div>
			<div class="extensionattReport">
				<div class="page-content">
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

								$read = $mysqli->prepare("SELECT * FROM attendance WHERE MONTH(created) = MONTH(NOW())");
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
							?>
						</tbody>
					</table>
				</div>
			
			</div>
		</section>
	</main>
</body>
