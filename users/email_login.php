<?php

//si se escribe email hacer script
// isset determina si la variable user_email ha sido definida


if(isset($_GET['user_email']) && isset($_GET['user_password'])){	

	require('../includes/connection.php');

	$user_email = $_GET['user_email'];
	$user_password = $_GET['user_password'];
	
	$sel_user = "SELECT * FROM users WHERE user_email = '$user_email' AND 
		user_password = '$user_password'";
	$run_user = mysqli_query($con, $sel_user);

	if(mysqli_num_rows($run_user) == "1"){
		$status = "ok";

		$row = mysqli_fetch_array($run_user);
		$user_id = $row['user_id'];
		
	}else {
		$status = "no_account";
		$user_id = "0";
	}	

	
	mysqli_close($con);

}else{
			$status = "no hay nada";
}

echo json_encode(array("response" => $status,
	"user_id" => $user_id));
	//mysqli_close($con);
	


?>

