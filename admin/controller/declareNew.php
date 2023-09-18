
<?php
	require_once '../admin/controller/db.php';
	if ($_SERVER["REQUEST_METHOD"] === "POST"){
		if (isset($_POST["submit_att"])) {
		$startdate = $_POST["startdate"];
		$enddate = $_POST["enddate"];

		if (empty($startdate) || empty($enddate)){
			$err = "All fields are required";
		}else{
			$read = $mysqli->prepare("SELECT * FROM attendance WHERE created between ? and ? order by id");
			$read->bind_param("ss", $startdate, $enddate);
			$read->execute();

			$result = $read->get_result();

		}
	}
