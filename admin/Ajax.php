<?php 
include('../conexion.php');
            $id_c = $_GET['id_comida'];
            $consulta = "SELECT  PrecioC FROM servicios WHERE Id =$id_c";
            $rr= $con->query($consulta);
            $d = $rr->fetch_assoc();
            echo $d['PrecioC']; 
 ?>