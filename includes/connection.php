<?php

$hostname_localhost="localhost";
$database_localhost="libfio_8mm";
$username_localhost="moche";
$password_localhost="2322715";

//$conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);
// conexion al servidor
$con = mysqli_connect($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);


mysqli_set_charset($con, "utf8mb4_general_ci");
//mysqli_set_charset($con, 'utf8mb4');
//mysqli_set_charset($con);


?>