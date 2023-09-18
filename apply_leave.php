<?php
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);

	require_once './controller/db.php';
	require_once './includes/session.php';
	require_once './controller/declare.php';

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
			<div class="dailyAtt" style="width: 80%; margin-left: 20px;">
				<h3>Apply for Leave</h3>
				<?php 
					if (isset($err)) {
						echo $err;
					}else if (isset($suc)) {
						echo $suc;
					}
				?>
				<form method="post">
					<div class="page-content">
						<div class="table-control" style="margin-right: 80px;">
							<table border="1">
								<thead>
									<tr>
										<th>Email</th>
										<th>Leave type</th>
										<th>From</th>
										<th>To</th>
										<th>Leave status</th>
										<th>Comment</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><input type="text" name="email" placeholder="Enter Email"></td>
										<td><select name="leavetype">
										<option>Choose leave type</option>
										<option>Medical leave</option>
										<option>Childbirth leave</option>
										<option>Marriage leave</option>
										<option>Academic leave</option>
										<option>Casual leave</option>
										</select></td>
										<td><input type="text" name="fromm" placeholder="DD/MM/YYYY"></td>
										<td><input type="text" name="expiry" placeholder="DD/MM/YYYY"></td>
										<td><select name="leavestatus"><option>Pending</option></select></td>
										<td><textarea name="comments" placeholder="Enter Your Experience" rows="5" ></textarea></td>
									</tr>
								</tbody>
							</table>
							<div>
								<button class="button_att" type="submit" name="submit_apply_leave">Apply</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</main>
</body>
































				<div class="dailyAtt">
					<h3>Apply for Leave</h3>
					<?php 
						if (isset($err)) {
							echo $err;
						}else if (isset($suc)) {
							echo $suc;
						}
					?>
					<div class="flexit">
						<div class="leave">
							<div class="columnit1">
								<label>Leave type</label>
								<select name="leavetype">
									<option>Choose leave type</option>
									<option>Medical leave</option>
									<option>Childbirth leave</option>
									<option>Marriage leave</option>
									<option>Academic leave</option>
									<option>Sick leave</option>
									<option>Casual leave</option>
								</select>
							</div>
	
							<div class="leave4">
								<label>Name:</label>
								<input type="" name="name" placeholder="Enter name/Surname">
							</div>

							<div class="leave1">
								<label>From:</label>
								<input type="" name="fromm" placeholder="DD/MM/YYYY">
							</div>
							
							<div class="leave2">
								<label>To:</label>
								<input type="" name="too" placeholder="DD/MM/YYYY">
							</div>
							
							<div class="leave3">
								<label>Comment:</label>
								<textarea name="comment" placeholder="Enter Comment" rows="5"></textarea>
							</div>

							<div class="submitdaily">
								<button type="submit" name="submit">Apply</button>
							</div>
					</div>
						
					</div>
				</div>
			</form>
		</section>
	</main>
</body>
