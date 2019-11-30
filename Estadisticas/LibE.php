<?php 

				
class estadistica
{
    public function dia()
    {
    	include('../conexion.php');
    	$con->query("SET lc_time_names = 'es_ES'");
    	$sql = "SELECT sum(reservacion.PrecioH)+sum(reservacion.PrecioS) as Total, Date_format(reservacion.Fsalida,'%d-%M-%Y') as Dia FROM cliente INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente
                      INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion 
                      INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio
                      where DAY(reservacion.Fsalida)=Day(reservacion.Fsalida) GROUP BY reservacion.Fsalida";
                    $result=$con->query($sql);
					$chart_data = '';
					$tot = 0;
					while($row = $result->fetch_assoc())
					{
					 $chart_data .= "{ Fecha:'".$row["Dia"]."', Ganancia:".$row["Total"] ."}, ";
					 $tot = $tot + $row["Total"] ;
					}
                    $chart_data = substr($chart_data, 0, -2);
                    return $chart_data;
                    
    }
    public function mes()
    {
    	include('../conexion.php');
    	$con->query("SET lc_time_names = 'es_ES'");
    	$sql = "SELECT sum(reservacion.PrecioH)+sum(reservacion.PrecioS) as Total,Date_format(reservacion.Fsalida,'%M %Y') as Mes FROM cliente INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio where MONTH(reservacion.Fsalida)=MONTH(reservacion.Fsalida) GROUP BY MONTH(reservacion.Fsalida)";

                    $result=$con->query($sql);
					$chart_data1 = '';
					$tot = 0;
					while($row = $result->fetch_assoc())
					{
					 $chart_data1 .= "{ Fecha:'".$row["Mes"]."', Ganancia:".$row["Total"] ."}, ";
					 $tot = $tot + $row["Total"] ;
					}
                    $chart_data1 = substr($chart_data1, 0, -2);
                    return $chart_data1;
                    
    }
    public function year()
    {
    	include('../conexion.php');
    	$sql2 = "SELECT sum(reservacion.PrecioH)+sum(reservacion.PrecioS) as Total, YEAR(reservacion.Fsalida) as year FROM cliente INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente
                      INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion 
                      INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio
                      where YEAR(reservacion.Fsalida)=YEAR(reservacion.Fsalida) GROUP BY YEAR(reservacion.Fsalida)";
                    $result=$con->query($sql2);
					$chart_data2 = '';
					$tot = 0;
					while($row = $result->fetch_assoc())
					{
					 $chart_data2 .= "{ Fecha:'".$row["year"]."', Ganancia:".$row["Total"] ."}, ";
					 $tot = $tot + $row["Total"] ;
					}
                    $chart_data2 = substr($chart_data2, 0, -2);
                    return $chart_data2;                
    }
}
 ?>