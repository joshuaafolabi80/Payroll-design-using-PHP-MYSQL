<?php
	// ini_set('display_errors', '1');
	// ini_set('display_startup_errors', '1');
	// error_reporting(E_ALL);
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		if (isset($_POST['submit_apply_leave'])) {
			$email = $_POST['email'];
			$leavetype = $_POST['leavetype'];
			$fromm = $_POST['fromm'];
			$expiry = $_POST['expiry'];
			$leavestatus = $_POST['leavestatus'];
			$comments = $_POST['comments'];


			if (empty($email) || empty($leavetype) || empty($fromm) || empty($expiry) || empty($leavestatus) || empty($comments)) {
				$err = "All fields are required";
			}
			else if(is_numeric($email)){
				$err = "Your email is not supposed to contain a number";
			}else{
				$create = $mysqli->prepare("INSERT INTO leave(email, leavetype, fromm, expiry, leavestatus, comments) VALUES(?,?,?,?,?,?)");
				$create->bind_param("ssssss", $email, $leavetype, $fromm, $expiry, $leavestatus, $comments);
				$create->execute();

				//Check if the create was successful
				if($create->affected_rows > 0){
					$suc = "Your information was saved successfully";
				}
				else{
					$err = $create->error;
				}

				echo $err;
			}
		}
?>	}

<?php
	
	require_once './controller/db.php';
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['submit'])){
			$email = $_POST['email'];
			$leavetype = $_POST['leavetype'];
			$fromhere = $_POST['fromhere'];
			$tothere = $_POST['tothere'];
			$comm = $_POST['comm'];
			$onhold = $_POST['onhold'];

			if(empty($email) || empty($leavetype) || empty($fromhere) || empty($tothere) || empty($comm) || empty($onhold){
				echo "All fields are required";
			}else if(is_numeric($email)){
				echo "Your email is not supposed to be numeric";
			}else{
				$create = $mysqli->prepare("INSERT INTO leave2(email, leavetype, fromhere, tothere, comm, onhold) VALUES(?,?,?,?,?,?)");
				$create->bind_param("ssssss", $email, $leavetype, $fromhere, $tothere, $comm, $onhold);
				$create->execute();

				//Check if the create was successful
				if($create->affected_rows > 0){
					$suc = "Your information was saved successfully";
				}
				else{
					$err = $create->error;
				}
			}
		}
	}
?>