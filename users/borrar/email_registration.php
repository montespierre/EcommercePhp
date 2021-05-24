<?php

//si se escribe email hacer script
if(isset($_GET['user_email'])){

	require('../includes/connection.php');
	
	$user_name = $_GET['user_name'];
	$user_email = $_GET['user_email'];
	$user_password = $_GET['user_password'];
	
	$sel_user = "SELECT * FROM users WHERE user_email = '$user_email'";
	$run_user = mysqli_query($con, $sel_user);
	
	if(mysqli_num_rows($run_user) == "0"){
		$insert = "INSERT INTO users(user_name, user_email, user_password, date_created) VALUES('$user_name', 'user_email', 'user_password', NOW())";
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

