<?php 
	include("../conexion.php");
	$id=$_POST['id'];
	$tcomida=$_POST['comida'];
	$precio=$_POST['precio'];

			$sql="UPDATE servicios SET Tcomida='$tcomida',
							   PrecioC=$precio
							WHERE Id=$id";
		
	
	/*
	$sql="UPDATE productos SET producto='$producto',
							   descripcion='$descripcion',
							   precio=$precio 
							WHERE id=$id";*/
	if($con->query($sql)==1){
		header("location:servicios.php");
	}
	else
	{
        echo "Fallo al Modificar";
        echo $sql;
	}
 ?>