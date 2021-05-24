<?php

//si se escribe email hacer script
if(!isset($_GET['user_phone'])){

	require('../includes/connection.php');
	
	$user_phone = $_GET['user_phone'];
	
	$sel_user = "SELECT * FROM users WHERE user_phone = '$user_phone'";
	$run_user = mysqli_query($con, $sel_user);
	
	if(mysqli_num_rows($run_user) == "0"){
		$insert = "INSERT INTO users(user_phone, date_created) VALUES('$user_phone', NOW())";
		$run_insert = mysqli_query($con, $insert);

		if($run_insert){
			$status = "ok";

		}else{
			$status = "failed";
		}
		
	}else {
		$status = "already";
	}	

	echo json_encode(array("response" => $status));
	mysqli_close($con);
}

?>

