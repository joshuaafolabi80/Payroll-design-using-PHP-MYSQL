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
			<div class="main" style="margin-top: 110%; margin-bottom: 110%;">
				<div class="form-container">
					<form class="indexform" method="POST" enctype="multipart/form-data">
						<div>
							<aside></aside>
							<span><h4>PERSONAL DETAILS</h4></span>
						</div>
						<div>
							<label>Name</label>
							<input type="text" name="firstname" placeholder="Enter First Name">
							</div>
						<div>
							<label>Surname</label>
							<input type="text" name="lastname" placeholder="Enter Last name">
						</div>
						<div>
							<label>Address</label>
							<input type="text" name="address" placeholder="Enter Address">
						</div>
						<div>
							<label>State of origin</label>
							<input type="text" name="origin" placeholder=" Enter State of origin">
						</div>
						<div>
							<label>Local Govt. Area</label>
							<input type="text" name="lga" placeholder="Enter Local Govt Area">
						</div>
						<div>
							<label>Date of birth</label>
							<input type="text" name="dateofbirth" placeholder="Enter Date of birth">
						</div>
						<div>
							<label>Marital Status</label>
							<select name="maritalstatus">
								<option>Select</option>
								<option>Single</option>
								<option>Married</option>
							</select>
						</div>
						<div>
							<label>Employee photo:</label>
							<input type="file" name="file">
						</div>
						<div>
							<label>Number of children</label>
							<input type="text" name="children" placeholder="Enter Number of children">
						</div>
						<div>
							<label>Gender:</label>
							<select name="gender">
								<option>Select Gender</option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
						<div>
							<label>Religion:</label>
							<select name="religion">
								<option>Select Religion</option>
								<option>Christianity</option>
								<option>Islam</option>
							</select>
						</div>
						<div>
							<label>Qualification:</label>
							<select name="qualification">
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
							<textarea name="experience" placeholder="Enter Your Experience" rows="5" ></textarea>
						</div>
						<div>
							<label>Phone 1</label>
							<input type="text" name="phonenumber1" placeholder="Enter Phone 1">
						</div>
						<div>
							<label>Phone 2</label>
							<input type="text" name="phonenumber2" placeholder="Enter Phone 2">
						</div>
						<div>
							<label>Nationality</label>
							<input type="text" name="nationality" placeholder="Enter Nationality">
						</div>
						<div>
							<label>Reference</label>
							<input type="text" name="reference" placeholder="Enter Reference">
						</div>
						<div>
							<label>Reference Phone</label>
							<input type="text" name="referencephone" placeholder="Enter Reference Phone">
						</div>
						<aside></aside>
						<span><h4>Account Login</h4></span>
						<div>
							<label>Email:</label>
							<input type="text" name="email" placeholder="Enter Employee Email">
						</div>
						<div>
							<label>Password</label>
							<input type="text" name="password" placeholder="Enter Employee Password">
						</div>
					
						<aside></aside>
						<span><h4>Company details</h4></span>
						
						<div>
							<label>Department:</label>
							<select name="department">
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
							<input type="text" name="dateofjoining" placeholder="Enter date of Joining">
						</div>
						<div>
							<label>Status:</label>
							<select name="status">
								<option>Select status</option>
								<option>Active</option>
								<option>Non Active</option>
							</select>
						</div>
						<aside></aside>
						<span><h4>Financial details</h4></span>
						<div>
							<label>Basic Salary:</label>
							<input type="text" name="basicsalary" placeholder="Enter basic salary">
						</div>
						<div>
							<label>Overtime:</label>
							<input type="text" name="overtime" placeholder="Enter overtime amount">
						</div>
						<div>
							<label>Allowances:</label>
							<div>
								<label>HRA:</label>
								<input type="text" name="hr" placeholder="Enter HRA value">
							</div>
							<div>
								<label class="allowances">Other Allowances:</label>
								<input type="text" name="others" placeholder="Enter others">
							</div>
						</div>
						<div>
							<label>Deduction:</label>
							<input type="text" name="deduction" placeholder="Enter deduction amount">
						</div>
						<div>
							<label>Total Salary:</label>
							<input type="text" name="totalsalary" placeholder="Enter Total Salary">
						</div>
						<aside></aside>
						<span><h4>Documents</h4></span>
						<div>
							<label>CV upload:</label>
							<input type="file" name="cv">
						</div>
						<div>
							<label>Other letters:</label>
							<input type="file" name="otherletters">
							
						</div>
						<div>
							<label>Contract & Agreement:</label>
							<input type="file" name="contract">
						</div>
						<aside></aside>
						<span><h4>Bank details</h4></span>
						<div>
							<label>Account Holder Name:</label>
							<input type="text" name="accholder" placeholder="Enter Account Holder">
						</div>
						<div>
							<label>Account Number:</label>
							<input type="text" name="accountnumber" placeholder="Enter Account Number">
						</div>
						<div>
							<label>Bank Name:</label>
							<input type="text" name="bankname" placeholder="Enter Bank Name">
						</div>
						<div>
							<label>Branch:</label>
							<input type="text" name="branch" placeholder="Enter Branch">
						</div>
						<div>
							<button type="submit" name="submit">Submit</button>
						</div>
					</form>
				</div>	
			</div>
			
			












































































			<!-- <form method="POST" enctype="multipart/form-data">
					<div class="gggg">
						<div class="post-content">
							<div class="hhh">
								
							</div>
							
						</div>	
					</div>
				</form> -->
		</section>
	</main>
</body>		