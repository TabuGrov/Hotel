<?php 
	 include('../conexion.php');
	  $idH=$_GET['idh'];
      $ide=$_GET['id'];
      $idc=$_GET['idc'];
      $sqlR = "DELETE FROM reservacion where Id=$ide";
      $con->query($sqlR);
      header("location:actualizar.php?id=$idH&&id_client=$idc");

 ?>