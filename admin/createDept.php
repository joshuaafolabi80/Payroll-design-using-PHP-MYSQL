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
			<form method="post">
				<div class="createDept">
					<h3>create Department</h3>
					<?php 
						if (isset($err)) {
							echo $err;
						}else if (isset($suc)) {
							echo $suc;
						}
					?>
					<hr>
					<div>
						<!-- <div>
							<label></label>
							<input type="hidden" name="" placeholder="" value="<?php echo $email ?>">
						</div> -->
						<div>
							<label>Department</label>
							<input type="text" name="departments" placeholder=" Enter Department">
						</div>
						<div>
							<label>Designation 1</label>
							<input type="text" name="designations1" placeholder=" Enter Designation 1">
						</div>
						<div>
							<label>Designation 2</label>
							<input type="text" name="designations2" placeholder=" Enter Designation 2">
						</div>
					</div>

					<div class="actions">
						<ul>
							<li><button>Cancel</button></li>
							<li><button>Reset</button></li>
							<li><button type="submit" name="createDept">Submit</button></li>
						</ul>
					</div>
				</div>
			</form>
		</section>
	</main>
</body>		
