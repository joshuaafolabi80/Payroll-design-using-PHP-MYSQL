<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/include/session.php';
	require_once '../admin/controller/declareNew.php';

	// function getemailOfEmployee($department, $mysqli){
	// 	$stmt = $mysqli->prepare("SELECT * FROM employee WHERE email = ?");
	// 	$stmt->bind_param("s", $email);
	// 	$stmt->execute();

	// 	$result = $stmt->get_result();

	// 	return $result->num_rows;
	// }
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
				<div class="dailyAtt">
					<h3>Daily Attendance</h3>
					<div class="flexit">
						<div class="columnit1">
							<label>Employee by Department</label>
							<select>
								<option>All Employee</option>
								<option>All Employee</option>
							</select>
						</div>
					</div>
				</div>
				<div>
					<?php 
						if (isset($err)) {
							echo $err;
						}else if (isset($suc)) {
							echo $suc;
						}
					?>
				
					<!-- <table class="gg" border="1" cellpadding="0px">
						<thead>
							<tr>
								<th>serial</th>
								<th>Employee Email</th>
								<th>Time in</th>
								<th>Late(Yes/No)</th>
								<th>Time Out</th>
								<th>Status</th>
								<th>Attendance type</th>
							</tr>
						</thead>
						<tbody>
							<?php
								// $r="admin";
								// $read = $mysqli->prepare("SELECT * FROM users WHERE role != ?");
								// $read->bind_param("s", $r);
								$read = $mysqli->prepare("SELECT * FROM attendance");
								$read->execute();

								$result = $read->get_result();
								if ($result->num_rows > 0) {
									while($data = $result->fetch_assoc()){ ?>
										<tr>
											<td><input style="width: 40px; text-align: center;" type="text" name="id" value="<?php echo $data['id'] ?>"></td>
											<td><input style="text-align: center;" type="hidden" name="email" value="<?php echo $data['email'] ?>"></td>
											<td><input type="text" name="timein" placeholder="Enter Time in"></td>
											<td><select name="late">
												<option>Yes</option>
												<option>No</option>
											</select></td>
											<td><input type="text" name="timeout" placeholder="Enter time out"></td>
											<td><select name="status">
												<option>Absent</option>
												<option>Present</option>
												<option>On Leave</option>
											</select></td>
											<td><select name="attendancetype">
												<option>Manual</option>
												<option>Auto</option>
											</select></td>
										</tr>
									<?php }
								}
							?>
						</tbody>
					</table> -->
					<input style="width: 40%;" type="date" name="startdate" placeholder="Enter start date">
					<input style="width: 40%;" type="date" name="enddate" placeholder="Enter end date">
					<div>
						<button class="button_att" type="submit" name="submit_att">search</button>
					</div>
				</div>
				<?php
					$read = $mysqli->prepare("SELECT * FROM attendance WHERE created between ? and ? order by id");
					$read->execute();
					
					if ($result->num_rows > 0) {
						while($data = $result->fetch_assoc()){ ?>
								<?php echo $data['id'] ?>
								<?php echo $data['name'] ?>
								<?php echo $data['timein'] ?>
								<?php echo $data['late'] ?>
								<?php echo $data['status'] ?>
								<?php echo $data['timeout'] ?>
								<?php echo $data['attendancetype'] ?>
							<?php

						}
					}
				?>
			</form>
		</section>
	</main>
</body>