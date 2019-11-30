<?php  
include('../conexion.php');
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservacion </title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a  href="../index.php"><i class="fa fa-home"></i> Página principal</a>
                    </li>
                </ul>
            </div>
        </nav>
       
        <div id="page-wrapper" >
            <div id="page-inner">
                <center>
                    <h1 class="letra"><b>B&B SANTA CECILIA</b></h1><br>
                </center>
                <?php 
                    $idT=$_GET['id'];
                    $sql = "SELECT * FROM cliente 
                                    INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente
                                     INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion 
                                     INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio 
                                     where reservacion.Id=$idT";
                    $result=$con->query($sql);
                    $d=$result->fetch_assoc();
                 ?>
                <div class="row" id="contenido">
                    <div class="col-md-5 col-sm-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                             Agregar Servicio
                            </div>
                            <div class="panel-body">
                            <form name="form" method="post" action="actua.php">
                                <div class="form-group">
                                    <input type="text" hidden="" value="<?php echo $idT; ?>" name="idR">
                                    <input type="text" hidden="" value="<?php echo $d['Id_cliente']; ?>" name="idC">
                                    <input type="text" hidden="" value="<?php echo $d['Id_habitacion']; ?>" name="idH">
                                    <input type="text" hidden="" value="<?php echo $d['Fingreso']; ?>" name="Fi">
                                    <input type="text" hidden="" value="<?php echo $d['Fsalida']; ?>" name="Fs">
                                    <input type="text" hidden="" value="<?php echo $d['Nro_dias']; ?>" name="nrd">
                                    <input type="text" hidden="" value="<?php echo $d['PrecioH']; ?>" name="Ph">

                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value=" <?php echo $d['Nombre']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Régimen de comidas</label>
                                    <select name="P_comida" class="form-control"  onchange ="AsignarPrecioS(this.value)">
                                        <option value="5" selected="">Seleccionar Servicio</option>
                                        <?php 
                                        $sqlC="SELECT * FROM servicios where Tcomida<>'Ninguno'";
                                        $result1=$con->query($sqlC);
                                        while ($d1=$result1->fetch_assoc()) { ?>
                                         <option value="<?php echo $d1['Id']; ?>"> <?php echo $d1['Tcomida']; ?> </option>   
                                  <?php }  ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                       <label>Precio de los Servicios</label>
                                       <input type="text" name="precioS" id="pre" class="form-control" value="<?php echo $d['PrecioS']; ?>">
                                </div>
                                <input type="submit" name="add" value="Insertar Servicio" data-bb-example-key="confirm-default" class="btn btn-success col-md-12" onclick="return Control()">
                            </div>
                        </div>
                    </div> 
                <!-- Actualizar Precio de La reserva -->
                    <div class="row" id="contenido">
                    <div class="col-md-5 col-sm-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                             ACTUALIZAR RESERVACION
                            </div>
                            <div class="panel-body">
                            <form name="form" method="post" action="actua.php">
                                <div class="form-group">
                                    <label>Precio de la Habitacion</label>
                                    <!-- precio de la habitacion -->
                                    <input type="text" name="precioH" class="form-control" value="<?php echo $d['PrecioH']; ?>">
                                    <!-- ingreso -->
                                    <input type="hidden" name="fingre" class="form-control"  value="<?php echo $d['Fingreso']; ?>">
                                    <!-- numero de dias  -->
                                    <input type="hidden" name="numd" class="form-control"  value="<?php echo $d['Nro_dias']; ?>">
                                    <label >fecha de salida:</label><input type="date" name="fsali" class="form-control" value="<?php echo $d['Fsalida']; ?>">
                                </div>
                                <input type="submit" name="edit" value="Actualizar Reserva" class="btn btn-success col-md-12">  
                            </form>

                            </div>

                        </div>
                        <!-- Detalles Servicios -->
                        <div class="panel panel-danger">
                        <div class="panel-heading">
                         Detalles de los servicios
                        </div>
                        <div class="panel-body">
                                <!-- Advanced Tables //PANEL POR DEFECTO -->
                    <div class="panel panel-default">
                        <?php
                            $id_c=$_GET['id_client'];
                           $sql = "SELECT reservacion.Id,servicios.Tcomida,reservacion.PrecioS FROM cliente INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio where reservacion.Id_cliente=$id_c and servicios.Tcomida<>'Ninguno'";

                            $re = $con->query($sql);
                        ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>TIPO DE Atencion</th>
                                            <th>PRECIO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i=1; 
                                        while ($fila = $re->fetch_assoc()){ 
                                                 ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $fila['Tcomida']?></td>
                                            <td><?php echo $fila['PrecioS']?></td>
                                             <td>   <a href="EliminarPrecioS.php?id=<?php echo $fila['Id'];?>&idh=<?php echo $idT?>&idc=<?php echo $id_c ?>"> <input type="submit" name="delete" value="Eliminar" class="btn btn-danger"> </a>   </td>
                                        </tr>
                                    <?php }; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                       </div>
                    </div>
                    </div> 
                </div>
                </div>
                
            </div>
             <!-- /. PAGE INNER  -->
        </div> 
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!-- Bootstrap Js -->
      <script>
           var AsignarPrecioS= function(x){
            var id_comida="Ajax.php?id_comida="+x;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pre").value = xhttp.responseText;
            }
            };
            xhttp.open("GET",id_comida, true);
            xhttp.send();
        }
        function Control(){
            var valor =confirm('Esta seguro que quiere Registrar un servicio');
            return valor;
        }
      
      </script>

    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
