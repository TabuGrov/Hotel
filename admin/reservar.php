<?php 
include('../conexion.php');
$ci=$_POST['ci'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$pais=$_POST['pais'];
$telf=$_POST['telf'];
$fingreso=$_POST['fingreso'];
$fsalida=$_POST['fsalida'];
$precio=$_POST['precio'];


//Insertar a la tabla cliente
$sql="INSERT INTO cliente(Ci,Nombre,Apellido,Nacionalidad,Celular,Email) 
			VALUES ($ci,
					'$nombre',
					'$apellido',
					'$pais',
					$telf,
					'$email')";
$con->query($sql);
$id_cliente = $con->insert_id;
//---------------------------------------------------------------------
//seleccionar datos de la tabla habitacion
$id_habit = $_POST['id_habi'];
//---------------------------------------------------------------------
//Datos de la tabla Comida
$id_comida =$_POST['id_comida'];
$sqlC="SELECT * FROM servicios where Id=$id_comida";
$result1=$con->query($sqlC);
$d=$result1->fetch_assoc();


//----------------------------------------------------------------
//Insertar a la relacion Tabla cliente habitacion comida


$date1 = new DateTime("$fsalida");
$date2 = new DateTime("$fingreso");
$diff = $date1->diff($date2);                        
$dia=$diff->days;

$precioH=($precio*$dia);
$precioS=$d['PrecioC'];
$dinero=$_POST['dinero'];
if ($dinero=="Bs") {
	$sql3 = "INSERT INTO reservacion(Id_cliente,Id_habitacion,Id_servicio,Fingreso,Fsalida,Nro_dias,PrecioH,PrecioS)
		Values ($id_cliente,$id_habit,$id_comida,'$fingreso','$fsalida',datediff('$fsalida','$fingreso'),$precioH,$precioS)";
		echo "<script>alert($sql3)</script>";
	$con->query($sql3);	
}
else {
	$precioD=$precio*7;
	$sql3 = "INSERT INTO reservacion(Id_cliente,Id_habitacion,Id_servicio,Fingreso,Fsalida,Nro_dias,PrecioH,PrecioS)
		Values ($id_cliente,$id_habit,$id_comida,'$fingreso','$fsalida',datediff('$fsalida','$fingreso'),$precioD,$precioS)";
		echo "<script>alert($sql3)</script>";
	$con->query($sql3);	
}


	header("location:../index.php")
 ?>