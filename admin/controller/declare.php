<?php
// session_start();
	// if(!isset($_SESSION['username'])){
// 		header('location:adminlogin.php');
// 	}


	require_once '../admin/controller/db.php';
	
	// require_once './parameters.php';
	// require_once './update.php';


	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['submit'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$address = $_POST['address'];
			$origin = $_POST['origin'];
			$lga = $_POST['lga'];
			$dateofbirth = $_POST['dateofbirth'];
			$maritalstatus = $_POST['maritalstatus'];
			$children = $_POST['children'];
			$gender = $_POST['gender'];
			$religion = $_POST['religion'];
			$qualification = $_POST['qualification'];
			$experience = $_POST['experience'];
			$phonenumber1 = $_POST['phonenumber1'];
			$phonenumber2 = $_POST['phonenumber2'];
			$nationality = $_POST['nationality'];
			$reference = $_POST['reference'];
			$referencephone = $_POST['referencephone'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			// $employeeid = uniqid();
			$department = $_POST['department'];
			$designation = $_POST['designation'];
			$dateofjoining = $_POST['dateofjoining'];
			$status = $_POST['status'];
			$basicsalary = $_POST['basicsalary'];
			$overtime = $_POST['overtime'];
			$hr = $_POST['hr'];
			$others = $_POST['others'];
			$deduction = $_POST['deduction'];
			$totalsalary = $_POST['totalsalary'];
			$cv = $_FILES['cv']['name'];
			$cvTmp = $_FILES['cv']['tmp_name'];
			$cvtype = $_FILES['cv']['type'];
			$otherletters = $_FILES['otherletters']['name'];
			$otherlettersTmp = $_FILES['otherletters']['tmp_name'];
			$otherletterstype = $_FILES['otherletters']['type'];
			$contract = $_FILES['contract']['name'];
			$contractTmp = $_FILES['contract']['tmp_name'];
			$contracttype = $_FILES['contract']['type'];
			$accholder = $_POST['accholder'];
			$accountnumber = $_POST['accountnumber'];
			$bankname = $_POST['bankname'];
			$branch = $_POST['branch'];
			// $id = $_POST['id']
			$file = $_FILES['file']['name'];
			$fileTmp = $_FILES['file']['tmp_name'];
			$filetype = $_FILES['file']['type'];

			$allowedType = array("png", "jpg", "jpeg", "doc");

			$filetype = str_replace("image/", "", $filetype);

			$file = "image-".rand(1000,9999).'.'.$filetype;

			if(empty($firstname) || empty($lastname) || empty($address) || empty($origin) || empty($lga) || empty($dateofbirth) || empty($maritalstatus) || empty($children) || empty($gender) || empty($religion) || empty($qualification) || empty($experience) || empty($phonenumber1) || empty($phonenumber2) || empty($nationality) || empty($file) || empty($reference) || empty($referencephone) || empty($email) || empty($password) || empty($department) || empty($designation) || empty($dateofjoining) || empty($status) || empty($basicsalary) || empty($overtime) || empty($hr) || empty($deduction) || empty($totalsalary) || empty($cv) || empty($otherletters) || empty($contract) || empty($accholder) || empty($accountnumber) || empty($bankname) || empty($branch) || empty($others)) {
				echo "All fields are required";
			}
			else if(is_numeric($firstname)){
				echo "Your name is not supposed to be numeric";
			}else if(!in_array($filetype, $allowedType)){
				echo "Invalid File Type Uploaded";
			}else{
				if(move_uploaded_file($fileTmp, './'.$file) && move_uploaded_file($cvTmp, './'.$cv) && move_uploaded_file($otherlettersTmp, './'.$otherletters) && move_uploaded_file($contractTmp, './'.$contract)) {

					$hashPassword = password_hash($password, PASSWORD_BCRYPT);
					$create = $mysqli->prepare("INSERT INTO users(firstname, lastname, address, origin, lga, dateofbirth, maritalstatus, children, gender, religion, qualification, experience, phonenumber1, phonenumber2, nationality, file, reference, referencephone, email, password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$create->bind_param("ssssssssssssssssssss", $firstname, $lastname, $address, $origin, $lga, $dateofbirth, $maritalstatus, $children, $gender, $religion, $qualification, $experience, $phonenumber1, $phonenumber2, $nationality, $file, $reference, $referencephone, $email, $hashPassword);
					$create->execute();

					$finance = $mysqli->prepare("INSERT INTO financialdetails(hr, others, email, basicsalary, deduction, overtime, totalsalary) VALUES(?, ?, ?, ?, ?, ?, ?)");
					$finance->bind_param("sssssss", $hr, $others, $email, $basicsalary, $deduction, $overtime, $totalsalary);
					$finance->execute();

					$employee = $mysqli->prepare("INSERT INTO employee(email, department, designation, dateofjoining, contract, status) VALUES(?, ?, ?, ?, ?, ?)");
					$employee->bind_param("ssssss", $email, $department, $designation, $dateofjoining, $contract, $status);
					$employee->execute();

					$document = $mysqli->prepare("INSERT INTO document(email, cv, otherletters) VALUES(?, ?, ?)");
					$document->bind_param("sss", $email, $cv, $otherletters);
					$document->execute();

					$bankaccount = $mysqli->prepare("INSERT INTO bankaccount(email, accountnumber, bankname, branch, accholder) VALUES(?, ?, ?, ?, ?)");
					$bankaccount->bind_param("sssss", $email, $accountnumber, $bankname, $branch, $accholder);
					$bankaccount->execute();

					$attendance = $mysqli->prepare("INSERT INTO attendance(email) VALUES(?)");
					$attendance->bind_param("s", $email);
					$attendance->execute();






					if($create->affected_rows > 0){
						// $to = $email;
						// $subject = "Payroll System Credentials";
						// $message = "Email: ".$email." Password: ".$password;
						// mail($to, $subject, $message);
						echo "Your information was saved successfully";
						header('location: ./home.php');
					}
					else{
						echo $create->error;
					}
				}
			}
		}else if(isset($_POST['update'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$address = $_POST['address'];
			$origin = $_POST['origin'];
			$lga = $_POST['lga'];
			$dateofbirth = $_POST['dateofbirth'];
			$maritalstatus = $_POST['maritalstatus'];
			$children = $_POST['children'];
			$gender = $_POST['gender'];
			$religion = $_POST['religion'];
			$qualification = $_POST['qualification'];
			$experience = $_POST['experience'];
			$phonenumber1 = $_POST['phonenumber1'];
			$phonenumber2 = $_POST['phonenumber2'];
			$nationality = $_POST['nationality'];
			$reference = $_POST['reference'];
			$referencephone = $_POST['referencephone'];
			$email = $_POST['email'];
			$department = $_POST['department'];
			$designation = $_POST['designation'];
			$dateofjoining = $_POST['dateofjoining'];
			$status = $_POST['status'];
			$basicsalary = $_POST['basicsalary'];
			$overtime = $_POST['overtime'];
			$hr = $_POST['hr'];
			$others = $_POST['others'];
			$deduction = $_POST['deduction'];
			$totalsalary = $_POST['totalsalary'];
			$accholder = $_POST['accholder'];
			$accountnumber = $_POST['accountnumber'];
			$bankname = $_POST['bankname'];
			$branch = $_POST['branch'];
			// $cv = $_POST['cv'];
			// $contract = $_POST['contract'];
			// $otherletters = $_POST['otherletters'];
			$id = $_POST['id'];

			if(empty($firstname) || empty($lastname) || empty($address) || empty($origin) || empty($lga) || empty($dateofbirth) || empty($maritalstatus) || empty($children) || empty($gender) || empty($religion) || empty($qualification) || empty($experience) || empty($phonenumber1) || empty($phonenumber2) || empty($nationality) || empty($reference) || empty($referencephone) || empty($email) || empty($department) || empty($designation) || empty($dateofjoining) || empty($status) || empty($basicsalary) || empty($overtime) || empty($hr) || empty($others) || empty($deduction) || empty($totalsalary) || empty($accholder) || empty($accountnumber) || empty($bankname) || empty($branch)) {
				echo "All fields are required";
			}
			else if(is_numeric($firstname)){
				echo "Your name is not supposed to contain a number";
			}else{
			    $update = $mysqli->prepare("UPDATE users SET firstname = ?, lastname = ?, address = ?, origin = ?, lga = ?, dateofbirth = ?, maritalstatus = ?, children = ?, gender = ?, religion = ?, qualification = ?, experience = ?, phonenumber1 = ?, phonenumber2 = ?, nationality = ?, reference = ?, referencephone = ? WHERE email = ?");
				$update->bind_param("ssssssssssssssssss", $firstname, $lastname, $address, $origin, $lga, $dateofbirth, $maritalstatus, $children, $gender, $religion, $qualification, $experience, $phonenumber1, $phonenumber2, $nationality, $reference, $referencephone, $email);
				$update->execute();

				$finance2 = $mysqli->prepare("UPDATE financialdetails SET hr = ?, others = ?, basicsalary = ?, deduction = ?, overtime = ?, totalsalary = ? WHERE email = ?");
				$finance2->bind_param("sssssss", $hr, $others, $basicsalary, $deduction, $overtime, $totalsalary, $email);
				$finance2->execute();

				$employee3 = $mysqli->prepare("UPDATE employee SET department = ?, designation = ?, dateofjoining = ?, status = ? WHERE email = ?");
				$employee3->bind_param("sssss", $department, $designation, $dateofjoining, $status, $email);
				$employee3->execute();

				// $document4 = $mysqli->prepare("UPDATE document SET cv = ?, otherletters = ? WHERE email = ?");
				// $document4->bind_param("sss", $cv, $otherletters, $email);
				// $document4->execute();

				$bankaccount5 = $mysqli->prepare("UPDATE bankaccount SET accountnumber = ?, bankname = ?, branch = ?, accholder = ? WHERE email = ?");
				$bankaccount5->bind_param("sssss", $accountnumber, $bankname, $branch, $accholder, $email);
				$bankaccount5->execute();

				//Check if the update was successful
				if($update->affected_rows > 0){
					header("location: ./manageEmployee.php?msg=Staff updated successfully");
				}
				else{
					echo $update->error;
				}
				if($finance2->affected_rows > 0){
					header("location: ./manageEmployee.php?msg=Staff updated successfully");
				}
				else{
					echo $update->error;
				}
				if($employee3->affected_rows > 0){
					header("location: ./manageEmployee.php?msg=Staff updated successfully");
				}
				else{
					echo $update->error;
				}
				if($bankaccount5->affected_rows > 0){
					header("location: ./manageEmployee.php?msg=Staff updated successfully");
				}
				else{
					echo $update->error;
				}
			}
		}else if (isset($_POST['delete'])) {
			$email = $_POST['email'];

			if (empty($email)) {
				echo "All fields are required";
			}else{
				$delete = $mysqli->prepare("DELETE FROM users WHERE email = ?");
				$delete->bind_param("s", $email);
				$delete->execute();

				$finance2 = $mysqli->prepare("DELETE FROM financialdetails WHERE email = ?");
				$finance2->bind_param("s", $email);
				$finance2->execute();

				$employee3 = $mysqli->prepare("DELETE FROM employee WHERE email = ?");
				$employee3->bind_param("s", $email);
				$employee3->execute();

				$bankaccount5 = $mysqli->prepare("DELETE FROM bankaccount WHERE email = ?");
				$bankaccount5->bind_param("s", $email);
				$bankaccount5->execute();

				//Check if the delete was successful
				if($delete->affected_rows > 0){
					header("location: ./manageEmployee.php?msg=Staff deleted successfully");
				}
				else{
					echo $delete->error;
				}
				if($finance2->affected_rows > 0){
					header("location: ./manageEmployee.php?msg=Staff deleted successfully");
				}
				else{
					echo $delete->error;
				}
				if($employee3->affected_rows > 0){
					header("location: ./manageEmployee.php?msg=Staff deleted successfully");
				}
				else{
					echo $delete->error;
				}
				if($bankaccount5->affected_rows > 0){
					header("location: ./manageEmployee.php?msg=Staff deleted successfully");
				}
				else{
					echo $delete->error;
				}
			}
		}
	}

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		if (isset($_POST['createDept'])) {
			$departments = $_POST['departments'];
			$designations1 = $_POST['designations1'];
			$designations2 = $_POST['designations2'];

			if (empty($departments) || empty($designations1) || empty($designations2)) {
				$err = "All fields are required";
			}
			else if(is_numeric($departments)){
				$err = "Your department is not supposed to contain a number";
			}else{
				$create = $mysqli->prepare("INSERT INTO department_admin(departments, designations1, designations2) VALUES(?,?,?)");
				$create->bind_param("sss", $departments, $designations1, $designations2);
				$create->execute();

				//Check if the create was successful
				if($create->affected_rows > 0){
					$suc = "Your information was saved successfully";
				}
				else{
					$err = $create->error;
				}
			}
		}else if (isset($_POST['updateDepartment'])) {
			$departments = $_POST['departments'];
			$designations1 = $_POST['designations1'];
			$designations2 = $_POST['designations2'];
			$id = $_POST['id'];

			if(empty($departments) || empty($designations1) || empty($designations2)) {
				echo "All fields are required";
			}else{
				$update = $mysqli->prepare("UPDATE department_admin SET departments = ?, designations1 = ?, designations2 = ? WHERE id = ?");
				$update->bind_param("ssss",$departments, $designations1, $designations2, $id);
				$update->execute();

				//Check if the update was successful
				if($update->affected_rows > 0){
					header("location: ./manageDepartment.php?msg=Department updated successfully");
				}
				else{
					echo $update->error;
				}
			}
		}else if (isset($_POST['delete'])) {
			$id = $_POST['id'];

			if (empty($id)) {
				echo "All fields are required";
			}else{
				$delete = $mysqli->prepare("DELETE FROM createDept WHERE id = ?");
				$delete->bind_param("i", $id);
				$delete->execute();

				//Check if the delete was successful
				if($delete->affected_rows > 0){
					header("location: ./manageDept.php?msg=Staff deleted successfully");
				}
				else{
					echo $delete->error;
				}
			}
		}
	}
?>

