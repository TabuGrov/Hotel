<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clientes</title>
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
                        <a class="active-menu" href="#"><i class="fa fa-users"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="../admin/habitacion.php"><i class="fa fa-home"></i> Habitaciones</a>
                    </li>
                    <li>
                        <a href="../admin/servicios.php"><i class="fa fa-cutlery"></i> Servicios</a>
                    </li>
                    <li>
                        <a href="../Estadisticas/estadisticas.php"><i class="fa fa-bar-chart-o"></i> Estadisticas</a>
                    </li>    
                </ul>

              </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
       <div class="row">
                    <div class="col-md-12">
                       <center> <h1 class="page-header">
                           Detalle de Clientes
                        </h1> </center>
                    </div>
                </div> 
                 <!-- /. ROW  -->
            <div class="row">
        <?php 
        include('../conexion.php');   
?>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Nacionalidad</th>
                                            <th>Celular</th>
                                            <th>Email</th>
                                            <th>Actualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                  <?php
                    $sql1 = "SELECT * FROM cliente";
                                        $result1=$con->query($sql1);
                    while($row=$result1->fetch_assoc() )
                                        {
                      echo"<tr>
                        <td>".$row['Id']." </td>
                        <td>".$row['Nombre']." ".$row['Apellido']."</td>
                        <td>".$row['Apellido']."</td>
                        <td>".$row['Nacionalidad']."</td>
                        <td>".$row['Celular']."</td>
                        <td>".$row['Email']."</td>
                        <th><a href='actualizarCliente.php?id=".$row['Id']."' class='btn btn-primary' >
                                        <i class='fa fa-edit'></i>Actualizar</a></th>
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