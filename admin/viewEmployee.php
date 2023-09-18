<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/include/session.php';
	if (isset($_GET['email']) && !empty($_GET['email'])) {
			$userEmail = $_GET['email'];
	}
?>

<a href="./logout.php"></a>

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
			<div class="post-holder">
				<div class="passport-content">
					<?php
						$read = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
						$read->bind_param("s", $userEmail);
						//Change the chronological order and also limit the number of records been retrieve
						// $read = $mysqli->prepare("SELECT * FROM staff ORDER BY id DESC LIMIT 1");
						$read->execute();

						$result = $read->get_result();
						if ($result->num_rows > 0) {
							while($data = $result->fetch_assoc()){
								?>
									<div class="tweet">
										<div class="passport">
											<img src="./<?php echo $data['file'] ?>" style="width: 150px; height: 150px;" alt="POST IMAGE">
										</div>
										<div class="job">
											<div class="border-line"></div>
											<div class="hhh">
												<h4>PERSONAL DETAILS</h4>
											</div>
											<label><h4>Employee Name:</label></h4>
											<div>
												<?php echo $data['firstname'] ?>	
											</div>
											<label><h4>Employee Surname:</label></h4>
											<div>
												<?php echo $data['lastname'] ?>	
											</div>
											<label><h4>Address/Location:</label></h4>
											<div>
												<?php echo $data['address'] ?>	
											</div>
											<label><h4>State of origin:</label></h4>
											<div>
												<?php echo $data['origin'] ?>
											</div>
											<label><h4>LGA:</label></h4>
											<div>
												<?php echo $data['lga'] ?>
											</div>	
											<label><h4>Date of birth:</label></h4>
											<div>
												<?php echo $data['dateofbirth'] ?>
											</div>	
											<label><h4>Marital Status:</label></h4>
											<div>
												<?php echo $data['maritalstatus'] ?>
											</div>	
											<label><h4>Number of Children:</label></h4>
											<div>
												<?php echo $data['children'] ?>
											</div>	
											<label><h4>Gender:</label></h4>
											<div>
												<?php echo $data['gender'] ?>
											</div>	
											<label><h4>Religion:</label></h4>
											<div>
												<?php echo $data['religion'] ?>
											</div>	
											<label><h4>Qualification:</label></h4>
											<div>
												<?php echo $data['qualification'] ?>
											</div>	
											<label><h4>Experience:</label></h4>
											<div>
												<?php echo $data['experience'] ?>
											</div>	
											<label><h4>Phone 1:</label></h4>
											<div>
												<?php echo $data['phonenumber1'] ?>
											</div>	
											<label><h4>Phone 2:</label></h4>
											<div>
												<?php echo $data['phonenumber2'] ?>
											</div>	
											<label><h4>Nationality:</label></h4>
											<div>
												<?php echo $data['nationality'] ?>
											</div>	
											<label><h4>Reference:</label></h4>
											<div>
												<?php echo $data['reference'] ?>
											</div>	
											<label><h4>Reference Phone:</label></h4>
											<div>
												<?php echo $data['referencephone'] ?>
											</div>	
											<label><h4>Email:</label></h4>
											<div>
												<?php echo $data['email'] ?>
											</div>	
											<label><h4>Password:</label></h4>
											<div style="font-size: 12.5px;">
												<?php echo $data['password'] ?>
											</div>
										
									
								<?php
							}
						}
					?>	
					<?php
						$read2 = $mysqli->prepare("SELECT * FROM department WHERE email = ?");
						$read2->bind_param("s", $userEmail); 
						$read2->execute();
						$result2 = $read2->get_result();
						if ($result2->num_rows > 0) {
							while($data2 = $result2->fetch_assoc()){
								?>
									<!-- <div class="tweet"> -->
										<!-- <div class="job"> -->
											<label><h4>Department:</label></h4>
											<div>
												<?php echo $data2['department'] ?>
											</div>	
											<label><h4>Designation:</label></h4>
											<div>
												<?php echo $data2['designation'] ?>
											</div>
										
									
								<?php
							}
						}
					?>

					<?php
						$read3 = $mysqli->prepare("SELECT * FROM employee WHERE email = ?");
						$read3->bind_param("s", $userEmail); 
						$read3->execute();
						$result3 = $read3->get_result();
						if ($result3->num_rows > 0) {
							while($data3 = $result3->fetch_assoc()){
								?>
									<!-- <div class="tweet"> -->
										<!-- <div class="job"> -->
											<label><h4>Date of Joining:</label></h4>
											<div>
												<?php echo $data3['dateofjoining'] ?>
											</div>
											<label><h4>Employee Status:</label></h4>
											<div>
												<?php echo $data3['status'] ?>
											</div>
											<label><h4>Contract:</label></h4>
											<div>
												<a href="./<?php echo $data3['contract'] ?>" target="__blank">View</a> 
											</div>
											<div class="border-line"></div>
										
									
								<?php
							}
						}
					?>
											
					<?php
						$read4 = $mysqli->prepare("SELECT * FROM financialdetails WHERE email = ?");
						$read4->bind_param("s", $userEmail); 
						$read4->execute();
						$result4 = $read4->get_result();
						if ($result4->num_rows > 0) {
							while($data4 = $result4->fetch_assoc()){
								?>
									<!-- <div class="tweet"> -->
										<!-- <div class="job"> -->
											<div class="hhh">
											<h4>Financial Details</h4>
											</div>
											<label><h4>Basic Salary:</label></h4>
											<div>
												<?php echo $data4['basicsalary'] ?>
											</div>
											<label><h4>Overtime:</label></h4>
											<div>
												<?php echo $data4['overtime'] ?>
											</div>
											<label><h4>Allowances:</label></h4>
											<div>
												<label>HRA</label>
												<?php echo $data4['hr'] ?>
											</div>
											<div>
												<label>Others</label>
												<?php echo $data4['others'] ?>
											</div>
											<label><h4>Deduction:</label></h4>
											<div>
												<?php echo $data4['deduction'] ?>
											</div>
											<label><h4>Total Salary:</label></h4>
											<div class="border-line">
												<?php echo $data4['totalsalary'] ?>
											</div>
										
									
								<?php
							}
						}
					?>	
					
					<?php
						$read5 = $mysqli->prepare("SELECT * FROM document WHERE email = ?");
						$read5->bind_param("s", $userEmail); 
						$read5->execute();
						$result5 = $read5->get_result();
						if ($result5->num_rows > 0) {
							while($data5 = $result5->fetch_assoc()){
								?>
									<!-- <div class="tweet"> -->
										<!-- <div class="job"> -->
											<div class="hhh">
											<h4>Document</h4>
											</div>
											<label><h4>Empployee CV:</label></h4>
											<div>
												<a href="./<?php echo $data5['cv'] ?>" target="__blank">View</a> 

											</div>
											<label><h4>Other Letters:</label></h4>
											<div>
												<a href="./<?php echo $data5['otherletters'] ?>" target="__blank">View</a> 
											</div>
										
									
								<?php
							}
						}
					?>

					<?php
						$read6 = $mysqli->prepare("SELECT * FROM bankaccount WHERE email = ?");
						$read6->bind_param("s", $userEmail);
						$read6->execute();
						$result6 = $read6->get_result();
						if ($result6->num_rows > 0) {
							while($data6 = $result6->fetch_assoc()){
								?>
									<!-- <div class="tweet"> -->
										<!-- <div class="job"> -->
											<div class="border-line"></div>
											<div class="hhh">
											<h4>Bank Account details</h4>
											</div>
											<label><h4>Account Holder:</label></h4>
											<div>
												<?php echo $data6['accholder'] ?>
											</div>
											<label><h4>Account Number:</label></h4>
											<div>
												<?php echo $data6['accountnumber'] ?>
											</div>
											<label><h4>Bank Name:</label></h4>
											<div>
												<?php echo $data6['bankname'] ?>
											</div>
											<label><h4>Branch:</label></h4>
											<div>
												<?php echo $data6['branch'] ?>
											</div>
											<label><h4>Date:</label></h4>
											<div>
												<?php echo $data6['created'] ?>
											</div>
										</div>
									</div>
								<?php
							}
						}
					?>
				</div>
			</div>
		</section>
	</main>
</body>


												


												



