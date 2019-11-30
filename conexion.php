<?php 
	$server="localhost";
	$user="root";
	$pass="";
	$bd="hotel_db";
	$con=new mysqli($server,$user,$pass,$bd);
	if ($con->connect_error) die("Conexion Fallada ".$con->connect_error);
?>