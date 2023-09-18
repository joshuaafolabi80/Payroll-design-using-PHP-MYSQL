<?php
	
	require_once './controller/db.php';


	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['submit_new_leave'])){
			$email = $_POST['email'];
			$leavetype = $_POST['leavetype'];
			$fromm = $_POST['fromm'];
			$too = $_POST['too'];
			$leavestatus = $_POST['leavestatus'];
			$comments = $_POST['comments'];

			if(empty($email) || empty($leavetype) || empty($fromm) || empty($too) || empty($leavestatus) || empty($comments)){
				echo "All fields are required";
			}else if(is_numeric($email)){
				echo "Your email is not supposed to be numeric";
			}else{
				$create = $mysqli->prepare("INSERT INTO leave_new3(email, leavetype, fromm, too, leavestatus, comments) VALUES(?,?,?,?,?,?)");
				$create->bind_param("ssssss", $email, $leavetype, $fromm, $too, $leavestatus, $comments);
				$create->execute();
				// $create->store_result();

				//Check if the create was successful
				if($create->affected_rows > 0){
					$suc = "Your information was saved successfully";
				}else{
					$err = $create->error;
				}
			}
		}
	}
?>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['submit_att'])){
			$name = $_POST['name'];
			$timein = $_POST['timein'];
			$late = $_POST['late'];
			$status = $_POST['status'];
			$timeout = $_POST['timeout'];
			$attendancetype = $_POST['attendancetype'];
			
			if(empty($name) || empty($timein) || empty($late) || empty($status) || empty($timeout) || empty($attendancetype)){
				echo "All fields are required";
			}else if(is_numeric($name)){
				echo "Your name is not supposed to be numeric";
			}else{
				$create = $mysqli->prepare("INSERT INTO attendance(name, timein, late, status, timeout, attendancetype) VALUES(?,?,?,?,?,?)");
				$create->bind_param("ssssss", $name, $timein, $late, $status, $timeout, $attendancetype);
				$create->execute();
				// $create->store_result();

				//Check if the create was successful
				if($create->affected_rows > 0){
					$suc = "Your information was saved successfully";
				}else{
					$err = $create->error;
				}
			}
		}
	}


?>