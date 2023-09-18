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
			<form method="POST">
				<div style="width: 80%;" class="dailyAtt">
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
											<th>Leave Status</th>
											<th>Details</th>
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
											<td><input type="text" name="too" placeholder="DD/MM/YYYY"></td>
											<td><select name="leavestatus"><option>Pending</option></select></td>
											<td><textarea name="comments" placeholder="Enter Your Experience" rows="5" ></textarea></td>
										</tr>
									</tbody>
								</table>
								<div style="display: flex; ">
									<div class="submitdaily" style="flex: 2;">
										<button type="submit" name="submit_new_leave">Apply</button>
									</div>
									<div class="submitdaily" style="flex: 10;">
										<button type="submit" name="reset">Reset</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</form>
		</section>
	</main>
</body>
