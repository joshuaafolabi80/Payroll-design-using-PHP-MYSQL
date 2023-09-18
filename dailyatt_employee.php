<?php

	require_once './controller/db.php';
	require_once './includes/session.php';
	require_once 'declare3.php';

?>





<?php require_once './includes/header.php'; ?>
<?php
	if(!isset($_SESSION['email'])){
		header("location: ./index.php");
	}
	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];
	}
	echo $email;
?>
<body class="payrolbody">
	<main class="payrolmain">
		<?php require_once './includes/sidenav.php'; ?>
		<section class="right-container">
			<?php require_once './includes/topnav.php'; ?>
			<form method="post">
				<div class="dailyAtt">
					<h3>Daily Attendance</h3>
					<!-- <div class="flexit">
						<div class="columnit1">
							<label>Employee by Department</label>
							<select>
								<option>All Employee</option>
								<option>All Employee</option>
							</select>
						</div>
					</div> -->
				</div>
				<div class="extension" style="width: 70%;">
					
				
					<table style="width: 100%; text-align: center;" border="1" cellpadding="0px">
						<?php 
							if (isset($err)) {
								echo $err;
							}else if (isset($suc)) {
								echo $suc;
							}
						?>
						<thead>
							<tr>
								<!-- <th>serial</th> -->
								<th>Name/Surname</th>
								<th>Time in</th>
								<th>Late(Yes/No)</th>
								<th>Status</th>
								<th>Timeout</th>
								<th>Attendance type</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="text" name="name" placeholder="Name/Surname"></td>
								<td><input type="text" name="timein" placeholder="Enter Time in"></td>
								<td>
									<select name="late">
										<option>Yes</option>
										<option>No</option>
									</select>
								</td>
								<td>
									<select name="status">
										<option>Absent</option>
										<option>Present</option>
										<option>On Leave</option>
									</select>
								</td>
								<td><input type="text" name="timeout" placeholder="Enter Timeout"></td>
								<td>
									<select name="attendancetype">
										<option>Manual</option>
										<option>Auto</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
					<div>
						<button class="button_att" type="submit" name="submit_att">Save</button>
					</div>
				</div>
			</form>
		</section>
	</main>
</body>






								<th>Time Out</th>
								<th>Status</th>
								<th>Attendance type</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<!-- <td><input style="width: 40px; text-align: center;" type="text" name="id" value="<?php echo $data['id'] ?>"></td>
								<td><input style="text-align: center;" type="hidden" name="email" value="<?php echo $data['email'] ?>"></td> -->
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
						</tbody>
					</table>
					<div>
						<button class="button_att" type="submit" name="submit_att">Save</button>
					</div>
				</div>
			</form>
			<?php
			if(isset($_POST['created']) || isset($_POST['attendancetype']) || isset($_POST['timein']) || isset($_POST['timeout']) || isset($_POST['late']) || isset($_POST['status'])){
				$created = $_POST['created'];
				$attendancetype = $_POST['attendancetype'];
				$timein = $_POST['timein'];
				$timeout = $_POST['timeout'];
				$late = $_POST['late'];
				$status = $_POST['status'];
			}

			?>
		</section>
	</main>
</body>
							<!-- <?php
								$r="admin";
								$read = $mysqli->prepare("SELECT * FROM users WHERE role != ?");
								$read->bind_param("s", $r);
								$read = $mysqli->prepare("SELECT * FROM attendance");
								$read->execute();

								$result = $read->get_result();
								if ($result->num_rows > 0) {
									while($data = $result->fetch_assoc()){ ?>
										
									<?php }
								}
							?> -->
					
				</div>
			</form>
		</section>
	</main>
</body>
