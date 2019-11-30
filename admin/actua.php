<?php
include('../conexion.php');            
 if(isset($_POST['add']))
 {
            $idC = $_POST['idC'];
            $idH = $_POST['idH'];
            $Fi = $_POST['Fi'];
            $Fs = $_POST['Fs'];
            $nrd = $_POST['nrd'];
            $id_servicio = $_POST['P_comida'];
            $PrecioS = $_POST['precioS'];
            $PrecioH = $_POST['precioH'];
            $sqli="INSERT INTO reservacion(Id_cliente,Id_habitacion,Id_servicio,Fingreso,Fsalida,Nro_dias,PrecioH,PrecioS)
                  VALUES ($idC,$idH,$id_servicio,'$Fi','$Fs',$nrd,0,$PrecioS)";
            $con->query($sqli);
            header("location:../index.php");
}
 if(isset($_POST['edit']))
 {

      $idR=$_POST['idR'];
      $mos="Select * from reservacion where Id=$idR";
      $result=$con->query($mos);
      $d=$result->fetch_assoc();
      $idC = $_POST['idC'];
      $nrodias=$_POST['numd'];
      $fing = $_POST['fingre'];
      $fsali=$_POST['fsali'];
      $date1 = new DateTime("$fsali");
      $date2 = new DateTime("$fing");
      $diff = $date1->diff($date2);                        
      $dia=$diff->days;
      $PrecioH = $_POST['precioH'];
      
      $sqlR = "UPDATE reservacion SET PrecioH=$PrecioH WHERE Id_cliente=$idC and Id=$idR ";
      $con->query($sqlR);
      if ($fsali>$d['Fsalida']){
      $precioE=$PrecioH/$nrodias;
      $precioT=$precioE*$dia;      
      $sqlEd="UPDATE reservacion SET PrecioH=$precioT,Nro_dias=$dia,Fsalida='$fsali' WHERE Id_cliente=$idC and Id=$idR";
      }
      else{
       $precioE=$PrecioH/$nrodias;
       $precioT=$precioE*$dia;      
      $sqlEd="UPDATE reservacion SET PrecioH=$precioT,Nro_dias=$dia,Fsalida='$fsali' WHERE Id_cliente=$idC and Id=$idR";     
      }
      $con->query($sqlEd);
      echo $sqlEd;
      header("location:../index.php");
}

 if(isset($_POST['add']))
 {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido=$_POST['apellido'];
            $nacionalidad=$_POST['pais'];
            $Celular=$_POST['celular'];
            $Email=$_POST['email'];
            $sql="UPDATE cliente SET Nombre='$nombre', Apellido='$apellido',Nacionalidad='$nacionalidad',Celular=$Celular,Email='$Email' 
                WHERE Id=$id";
            $con->query($sql);	
			header("location:../index.php");

}



?>