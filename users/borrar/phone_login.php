<?php

//si se escribe email hacer script
if(!isset($_GET['user_phone'])){

	require('../includes/connection.php');
	
	$user_phone = $_GET['user_phone'];
	
	$sel_user = "SELECT * FROM users WHERE user_phone = '$user_phone'";
	$run_user = mysqli_query($con, $sel_user);
	
	if(mysqli_num_rows($run_user) == "1"){

		$status = "ok";

		$row = mysqli_fetch_array($run_user);
		$user_id = $row['user_id'];
		
	}else {
		$status = "no account";
	}	

	echo json_encode(array("response" => $status, "user_id"=>$user_id));
	mysqli_close($con);
}

?>

