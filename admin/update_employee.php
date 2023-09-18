<?php
	require_once '../admin/controller/db.php';
	require_once '../admin/controller/declare.php';
	require_once '../admin/include/session.php';
	require_once '../admin/include/header.php';

	if($_SERVER["REQUEST_METHOD"] === "GET") {
		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];

			$read = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
			$read->bind_param("s", $email);
			$read->execute();
			$result = $read->get_result();

			if ($result->num_rows > 0) {
				$data = $result->fetch_assoc();
			}
		}else{
			header("location: ./");
		}
		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];

			$read2 = $mysqli->prepare("SELECT * FROM financialdetails WHERE email = ?");
			$read2->bind_param("s", $email);
			$read2->execute();
			$result2 = $read2->get_result();

			if ($result2->num_rows > 0) {
				$data2 = $result2->fetch_assoc();
			}
		}else{
			header("location: ./");
		}

		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];

			$read3 = $mysqli->prepare("SELECT * FROM employee WHERE email = ?");
			$read3->bind_param("s", $email);
			$read3->execute();
			$result3 = $read3->get_result();

			if ($result3->num_rows > 0) {
				$data3 = $result3->fetch_assoc();
			}
		}else{
			header("location: ./");
		}

		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];

			$read4 = $mysqli->prepare("SELECT * FROM document WHERE email = ?");
			$read4->bind_param("s", $email);
			$read4->execute();
			$result4 = $read4->get_result();

			if ($result4->num_rows > 0) {
				$data4 = $result4->fetch_assoc();
			}
		}else{
			header("location: ./");
		}

		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];

			$read5 = $mysqli->prepare("SELECT * FROM bankaccount WHERE email = ?");
			$read5->bind_param("s", $email);
			$read5->execute();
			$result5 = $read5->get_result();

			if ($result5->num_rows > 0) {
				$data5 = $result5->fetch_assoc();
			}
		}else{
			header("location: ./");
		}


			
			// if ($result2->num_rows > 0) {
			// 	$data2 = $result2->fetch_assoc();
			// }
			// if ($result3->num_rows > 0) {
			// 	$data3 = $result3->fetch_assoc();
			// }
			// if ($result4->num_rows > 0) {
			// 	$data4 = $result4->fetch_assoc();
			// }
			// if ($result5->num_rows > 0) {
			// 	$data5 = $result5->fetch_assoc();
			// }
		
	}
	
?>

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
			<div class="main" style="margin-top: 110%; margin-bottom: 110%;">
				<div class="form-container">
					<form class="indexform" method="POST" enctype="multipart/form-data" id="updateForm">
						<div>
						<aside></aside>
						<span><h4>PERSONAL DETAILS</h4></span>
						</div>
						<div>
							<input type="text" readonly name="id" value="<?php echo $data['email'] ?>">
						</div>
						<div>
							<label>Name</label>
							<input type="text" name="firstname" placeholder="Enter Name" value="<?php echo $data['firstname'] ?>">
						</div>
						<div>
							<label>Surname</label>
							<input type="text" name="lastname" placeholder="Enter Surname" value="<?php echo $data['lastname'] ?>">
						</div>
						<div>
							<label>Address</label>
							<input type="text" name="address" placeholder="Enter Address" value="<?php echo $data['address'] ?>">
						</div>
						<div>
							<label>State of origin</label>
							<input type="text" name="origin" placeholder=" Enter State of origin" value="<?php echo $data['origin'] ?>">
						</div>
						<div>
							<label>Local Govt. Area</label>
							<input type="text" name="lga" placeholder="Enter Local Govt Area" value="<?php echo $data['lga'] ?>">
						</div>
						<div>
							<label>Date of birth</label>
							<input type="text" name="dateofbirth" placeholder="Enter Date of birth" value="<?php echo $data['dateofbirth'] ?>">
						</div>
						<div>
							<label>Marital Status:</label>
							<select name="maritalstatus">
								<option value="<?php echo $data['maritalstatus'] ?>"><?php echo $data['maritalstatus'] ?></option>
								<option>Select Marital Status</option>
								<option>Single</option>
								<option>Married</option>
							</select>
						</div>
						<div>
							<label>Number of children</label>
							<input type="text" name="children" placeholder="Enter Number of children" value="<?php echo $data['children'] ?>">
						</div>
						<div>
							<label>Gender:</label>
							<select name="gender">
								<option  value="<?php echo $data['gender'] ?>"><?php echo $data['gender'] ?></option>
								<option>Select Gender</option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
						<div>
							<label>Religion:</label>
							<select name="religion">
								<option value="<?php echo $data['religion'] ?>"><?php echo $data['religion'] ?></option>
								<option>Select Religion</option>
								<option>Christianity</option>
								<option>Islam</option>
							</select>
						</div>
						<div>
							<label>Qualification:</label>
							<select name="qualification">
								<option  value="<?php echo $data['qualification'] ?>"><?php echo $data['qualification'] ?></option>
								<option>Select Qualification</option>
								<option>B.sc</option>
								<option>M.sc</option>
								<option>P.hd</option>
								<option>Dr.</option>
								<option>Prof.</option>
							</select>
						</div>
						<div>
							<label>Experience</label>
							<textarea name="experience" placeholder="Enter Your Experience" rows="5" ><?php echo $data['experience'] ?></textarea>
						</div>
						<div>
							<label>Phone 1</label>
							<input type="text" name="phonenumber1" placeholder="Enter Phone 1" value="<?php echo $data['phonenumber1'] ?>">
						</div>
						<div>
							<label>Phone 2</label>
							<input type="text" name="phonenumber2" placeholder="Enter Phone 2" value="<?php echo $data['phonenumber2'] ?>">
						</div>
						<div>
							<label>Nationality</label>
							<input type="text" name="nationality" placeholder="Enter Nationality" value="<?php echo $data['nationality'] ?>">
						</div>
						<div>
							<label>Reference</label>
							<input type="text" name="reference" placeholder="Enter Reference" value="<?php echo $data['reference'] ?>">
						</div>
						<div>
							<label>Reference Phone</label>
							<input type="text" name="referencephone" placeholder="Enter Reference Phone" value="<?php echo $data['referencephone'] ?>">
						</div>
						<span><h4>Account Login</h4></span>
						<div>
							<label>Email:</label>
							<input type="text" name="email" placeholder="Enter Employee Email" value="<?php echo $data['email'] ?>">
						</div>
						<span><h4>Company Details</h4></span>
						<div>
							<label>Department:</label>
							<select name="department">
								<option value="<?php echo $data3['department'] ?>"><?php echo $data3['department'] ?></option>
								<option>Select a department</option>
								<option>Technical</option>
								<option>Marketing</option>
								<option>Sales</option>
								<option>HR</option>
							</select>
						</div>
						<div>
							<label>Designation:</label>
							<select name="designation">
								<option value="<?php echo $data3['designation'] ?>"><?php echo $data3['designation'] ?></option>
								<option>Select a department first</option>
								<option>Head</option>
								<option>Social</option>
								<option>Media Marketing Expert</option>
								<option>IT Executive</option>
								<option>HR Executive</option>
							</select>
						</div>
						<div>
							<label>date of Joining:</label>
							<input type="text" name="dateofjoining" placeholder="Enter date of Joining" value="<?php echo $data3['dateofjoining'] ?>">
						</div>
						<div>
							<label>Status:</label>
							<select name="status">
								<option value="<?php echo $data3['status'] ?>"><?php echo $data3['status'] ?></option>
								<option>Select status</option>
								<option>Active</option>
								<option>Non Active</option>
							</select>
						</div>
						<span><h4>Financial details</h4></span>
						<div>
							<label>Basic Salary:</label>
							<input type="text" name="basicsalary" placeholder="Enter basic salary" value="<?php echo $data2['basicsalary'] ?>">
						</div>
						<div>
							<label>Overtime:</label>
							<input type="text" name="overtime" placeholder="Enter overtime amount" value="<?php echo $data2['overtime'] ?>">
						</div>
						<label>Allowances:</label>
						<div>
							<label>HRA:</label>
							<input type="text" name="hr" placeholder="Enter HRA value" value="<?php echo $data2['hr'] ?>">
						</div>
						<div>
							<label class="allowances">Other Allowances:</label>
							<input type="text" name="others" placeholder="Enter others" value="<?php echo $data2['others'] ?>">
						</div>
						<div>
							<label>Deduction:</label>
							<input type="text" name="deduction" placeholder="Enter deduction amount" value="<?php echo $data2['deduction'] ?>">
						</div>
						<div>
							<label>Total Salary:</label>
							<input type="text" name="totalsalary" placeholder="Enter Total Salary" value="<?php echo $data2['totalsalary'] ?>">
						</div>
						<!-- <span><h4>Documents</h4></span>
						<div>
							<label>CV upload:</label>
							<input type="file" name="cv" value="<?php echo $data4['cv'] ?>">
						</div>
						<div>
							<label>Other letters:</label>
							<input type="file" name="otherletters" value="<?php echo $data4['otherletters'] ?>">
							
						</div>
						<div>
							<label>Contract & Agreement:</label>
							<input type="file" name="contract" value="<?php echo $data3['contract'] ?>">
						</div> -->
						<span><h4>Bank details</h4></span>
						<div>
						<div>
							<label class="Account">Account Holder Name:</label>
							<input type="text" name="accholder" placeholder="Enter Account Holder" value="<?php echo $data5['accholder'] ?>">
						</div>
						<div>
							<label>Account Number:</label>
							<input type="text" name="accountnumber" placeholder="Enter Account Number" value="<?php echo $data5['accountnumber'] ?>">
						</div>
						<div>
							<label>Bank Name:</label>
							<input type="text" name="bankname" placeholder="Enter Bank Name" value="<?php echo $data5['bankname'] ?>">
						</div>
						<div>
							<label>Branch:</label>
							<input type="text" name="branch" placeholder="Enter Branch" value="<?php echo $data5['branch'] ?>">
						</div>
						<div>
							<input type="hidden" name="update">
						<button type="submit">Update Data</button>
						</div>
					</form>
				</div>	
			</div>
		</section>
	</main>
</body>