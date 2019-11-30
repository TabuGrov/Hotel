<?php 
	include('../conexion.php');
	$id=$_GET['id'];
	$sql="DELETE FROM servicios where Id=$id";
	if($con->query($sql)==1){
		header("location:servicios.php");
	}
	else
	{
		echo "Fallo eliminar";
	}
 
  
 ?>