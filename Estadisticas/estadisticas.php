<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Estadisticas</title>
	<!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    
	<link rel="stylesheet" href="../assets/css/morris.css">
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js//raphael-min.js"></script>
	<script src="../assets/js/morris.min.js"></script>

   
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Navegación de palanca</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><i class="fa fa-sign-out" ></i>VOLVER </a>
            </div>
        </nav>
        <!--/. NAV TOP  -->
         <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li><a  href="../index.php"><i class="fa fa-dashboard"></i> Estado</a>
                    </li>
                    </li>
                    <li>
                        <a href="../admin/cliente.php"><i class="fa fa-users"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="../admin/habitacion.php"><i class="fa fa-home"></i> Habitaciones</a>
                    </li>
                    <li>
                        <a href="../admin/servicios.php"><i class="fa fa-cutlery"></i> Servicios</a>
                    </li>
                    <li>
                        <a class="active-menu" href="estadisticas.php"><i class="fa fa-bar-chart-o"></i> Estadisticas</a>
                    </li>    
                </ul>

              </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Detalles de Ingresos<small> </small>
                        </h1>
                        <div class="btn-group">
                            <button class="btn btn-primary" id="dia" > DETALLES POR DIA</button>
                             <button class="btn btn-primary" id="mes" > DETALLES POR MES</button>
                             <button class="btn btn-primary" id="anio" > DETALLES POR AÑO</button>
                        </div>
                    </div>
                </div> 
                 <!-- /. ROW  -->
				 
				 
            <div class="row">
			
				<?php 
				include('../conexion.php');
				include('LibE.php');
				$est = new estadistica();
                



					
				
?>
				 
				<br>
				<br>
				<br>
				<br><div id="chart">
                 <!-- Imprimiendo estadisticas --> 
                 

                </div>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>#</th>
                                            <th>Nombre</th>
                                            <th>Tipo Habitacion</th>
                                            <th>Fecha ingreso</th>
                                            <th>Fecha Salida</th>
                                            <th>Nro de Dias</th>
                                            <th>Servicios</th>
                                            <th>Precio Habitacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										$sql1 = "SELECT reservacion.Id,cliente.Nombre,cliente.Apellido,habitacion.Thabitacion,habitacion.Nrohabitacion,servicios.Tcomida,servicios.PrecioC,Date_format(reservacion.Fsalida,'%d-%M-%Y') as salida ,reservacion.PrecioH,SUM(reservacion.PrecioS) as PrecioS, Date_format(reservacion.Fingreso,'%d-%M-%Y') as ingreso,reservacion.Nro_dias FROM cliente 
                                    INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente
                                     INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion 
                                     INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio GROUP BY cliente.Nombre,cliente.Apellido";
                                     $con->query("SET lc_time_names = 'es_ES'");
                                        $result1=$con->query($sql1);
                                        $i=1;
										while($row=$result1->fetch_assoc() )
                                        {
											echo"<tr>
												<td>".$i++." </td>
												<td>".$row['Nombre']." ".$row['Apellido']."</td>
												<td>".$row['Thabitacion']."</td>
                                                <td>".$row['ingreso']."</td>
												<td>".$row['salida']."</td>
												<td>".$row['Nro_dias']."</td>
												<td>".$row['PrecioS']." Bs</td>
												<td>".$row['PrecioH']." Bs</td>
											</tr>";
											
										}
										
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                </div>
               
            </div>
        
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () 
            {
                $('#dataTables-example').DataTable( {
            "language": {
            "lengthMenu": "Mostrar _MENU_ Registros por Pagina",
            "zeroRecords": "Nada encontrado - lo siento",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
                        }
                                                    } );
            });
    </script>
         <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
<script>
var morris1= new Morris.Bar({
 element : 'chart',
 data:[<?php echo $est->dia(); ?>],
 xkey:'Fecha',
 ykeys:['Ganancia'],
 labels:['Ganancia Bs'],
 resize: true,
 barColors:['#17A6C0'],
 gridTextColor:['blue'] 
});
$("#mes").on("click",function(){
    console.log('morris1');
    var data1=[<?php echo $est->mes(); ?>];
    morris1.setData(data1);
});
$("#dia").on("click",function(){
    console.log('morris1');
    var data1=[<?php echo $est->dia(); ?>];
    morris1.setData(data1);
});
$("#anio").on("click",function(){
    console.log('morris1');
    var data1=[<?php echo $est->year(); ?>];
    morris1.setData(data1);
});

</script>