<?php include('conexion.php'); ?> 
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> HOTEL Santa Cecilia</title>
  <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <h1 class="navbar-brand" ><i class="fa fa-home"></i> ADMIN</h1>
            </div>
        </nav>
              <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li><a class="active-menu" href="index.php"><i class="fa fa-dashboard"></i> Estado</a>
                    </li>
                    </li>
                    <li>
                        <a href="admin/cliente.php"><i class="fa fa-users"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="admin/habitacion.php"><i class="fa fa-home"></i> Habitaciones</a>
                    </li>
                    <li>
                        <a href="admin/servicios.php"><i class="fa fa-cutlery"></i> Servicios</a>
                    </li>
                    <li>
                        <a  href="Estadisticas/estadisticas.php"><i class="fa fa-bar-chart-o"></i> Estadisticas</a>
                    </li>    
                </ul>

              </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
      <div class="row">
          <div class="col-md-12">
            <center>
              <b><h1 class="bg-gradient-success letra">B&B SANTA CECILIA</h1></b>
            </center>
              <h1 class="page-header">Detalles de Reservaciones
                <button type="button" class="btn btn-primary col-md-12" data-toggle="modal" data-target=".bd-example-modal-lg">Registrar Reserva</button>
              </h1> 
          </div>
      </div> 
                 <!-- /.Listas -->

                    
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover letra2" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Tipo Habitacion</th>
                                        <th>Nro de hab.</th>
                                        <th>Fecha ingreso</th>
                                        <th>Fecha Salida</th>
                                        <th>Nro de Dias</th>
                                        <th>Costo Servicios</th>
                                        <th>Costo Habitacion</th>
                                        <th>Monto a pagar</th>
                                        <th>Actualizar</th>
                                        <th>Accion</th>
                                        <th>Datos</th>
                                        
                                    </tr>
                                </thead>
                                    <tbody>
                                         
                                <?php
                                $con->query("SET lc_time_names = 'es_ES'");
                                $sql = "SELECT reservacion.Id_cliente,reservacion.Id,cliente.Nombre,cliente.Apellido,habitacion.Thabitacion,habitacion.Nrohabitacion,servicios.Tcomida,servicios.PrecioC,Date_format(reservacion.Fsalida,'%d-%M-%Y') as salida ,reservacion.PrecioH,SUM(reservacion.PrecioS) as PrecioS, Date_format(reservacion.Fingreso,'%d-%M-%Y') as ingreso,reservacion.Nro_dias FROM cliente 
                                    INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente
                                     INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion 
                                     INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio GROUP BY cliente.Nombre,cliente.Apellido ORDER by reservacion.Id";
                                $result=$con->query($sql);
                                $i=1;
                                while($d=$result->fetch_assoc() )
                                {
                                    echo"<tr>
                                        <th>".$i++."</th>
                                        <td>".$d['Nombre']." ".$d['Apellido']."</td>
                                        <td>".$d['Thabitacion']."</td>
                                        <td>".$d['Nrohabitacion']."</td>
                                        <td>".$d['ingreso']."</td>
                                        <td>".$d['salida']."</td>
                                        <td>".$d['Nro_dias']."</td>
                                        <td>".$d['PrecioS']." BS</td>
                                        <td>".$d['PrecioH']." BS</td>
                                        <td>".($d['PrecioH']+$d['PrecioS'])." BS</td>
                                        <th><a href='admin/actualizar.php?id=".$d['Id']."&&id_client=".$d['Id_cliente']."' class='btn btn-primary' >
                                        <i class='fa fa-edit'></i>Actualizar</a></th>
                                        <th><a href='prueba.php?id=".$d['Id']."' class='btn btn-primary' >
                                        <i class='fa fa-print'></i>Imprimir</a></th>
                                        <th><a href='admin/actualizarCliente.php?id=".$d['Id_cliente']."' class='btn btn-primary' >
                                        <i class='fa fa-edit'></i>Editar</a></th>
                                        ";
                                }   
                                ?>   
                       
                                    </tbody>
                                </table>
                                <?php
                                
                                $rsql = "SELECT * FROM cliente INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio where curdate() >= Fingreso && curdate() <= Fsalida GROUP BY cliente.Nombre,cliente.Apellido";
                                $rre = mysqli_query($con,$rsql);
                                $r =1;
                                while($row=mysqli_fetch_array($rre))
                                {       
                                  $br = 1;
                                  if($br=="1")
                                  {
                                      $r = $r + 1;
                                  }
                                }
                        
                                ?>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                            <button class="btn btn-primary" type="button">
                                                 Cuartos reservados
                                            <span class="badge"><?php echo $r ; ?></span>
                                            </button>
                                            
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                        <?php
                                        $msql = "SELECT cliente.Nombre,cliente.Apellido, reservacion.PrecioH, SUM(reservacion.PrecioS) as PrecioS, reservacion.Nro_dias, Date_format(reservacion.Fingreso,'%d-%m-%Y') as inicio,Date_format(reservacion.Fsalida,'%d-%m-%Y') as fin FROM cliente INNER JOIN reservacion ON reservacion.Id_cliente = cliente.Id GROUP BY cliente.Nombre,cliente.Apellido";
                                        $mre = mysqli_query($con,$msql);
                                        $fecha_actual = strtotime(date("d-m-Y",time()));

                                        while($mrow=mysqli_fetch_array($mre) )
                                        { 
                                          for($i=strtotime($mrow['inicio']);$i<=strtotime($mrow['fin']);$i+=86400){
                                            if ($i==$fecha_actual) {
                                          echo"<div class='col-md-3 col-sm-12 col-xs-12'>
                                                  <div class='panel panel-primary text-center no-boder bg-color-red'>
                                                      <div class='panel-body'>
                                                          <i class='fa fa-users fa-5x'></i>
                                                          <h3>".$mrow['Nombre']." ".$mrow['Apellido']."</h3>
                                                      </div>
                                                      <div class='panel-footer back-footer-blue'>
                                                          Saldo ".($mrow['PrecioH']+$mrow['PrecioS'])." BS
                                                      </div>
                                                      <div class='panel-footer back-footer-blue'>
                                                          Entrada ".$mrow['inicio']."
                                                      </div>
                                                      <div class='panel-footer back-footer-blue'>
                                                          Salida ".$mrow['fin']."
                                                      </div>
                                                  </div>  
                                          </div>";
                                              
                                            }
                                          }
                                        }
                                        ?>
                                           
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
         <!-- /. Registrar Cliente con su respectiva Habitacion  -->
                  <!-- Modal -->
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Registrar Habitacion</h4>
            </div>
              <div class="modal-body">
                  <!-- code -->
                  <div class="row">                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            INFORMACION PERSONAL
                        </div>
                        <div class="panel-body">
                        <form action="admin/reservar.php" name="form" method="post">
                            <div class="form-group">
                                <label>Cedula de identidad o Pasaporte</label>
                                <input name="ci" class="form-control" value="0">               
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input name="nombre" class="form-control" required="" >
                            </div>
                               <div class="form-group">
                                <label>Apellido</label>
                                <input name="apellido" class="form-control" >        
                               </div>
                            <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control" value="-" >
                                            
                            </div>
                                <?php
                                  
                                $countries = array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");

                                ?>
                            <div class="form-group">
                                <label>Nacionalidad</label>
                                <select name="pais" class="form-control" >
                                    <option value selected >-</option>
                                    <?php
                                    foreach($countries as $key => $value):
                                    echo '<option value="'.$value.'">'.$value.'</option>';
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Telefono o Celular</label>
                                <input name="telf" type ="text" class="form-control" value="0" > 
                             </div>

                        </div>                        
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                     INFORMACIÓN DE RESERVA
                        </div>
                        <div class="panel-body">
                              <div class="form-group">
                                <label>Tipo de Habitacion
                                </label>
                                <select id="valor" name="thabi" class="form-control"  onchange ="AsignarPrecio(this.value)">
                                   <option value selected ></option>
                                    <?php 
                                    $sqlC="SELECT Id,Thabitacion FROM habitacion GROUP BY Thabitacion ORDER BY Id";
                                    $result1=$con->query($sqlC);
                                    while ($d1=$result1->fetch_assoc()) { ?>
                                     <option > <?php echo $d1['Thabitacion']; ?> </option>
                                     <?php }
                                     ?> 
                                </select>
                              </div>
                              <div  class="form-group" >
                                <label>No. de habitación *</label>
                                <select id = "selecionador" name="id_habi" class="form-control" >
                                    <option value selected ></option>
                                </select>

                              </div> 
                              <div class="form-group">
                                <label>Régimen de comidas</label>
                                <select name="id_comida" class="form-control">
                                    <option value="5" selected="" >Ninguno</option>
                                </select>
                              </div>
                              <div class="form-group">
                                    <label>Entrada</label>
                                    <input name="fingreso" type ="date" class="form-control">
                               </div>
                               <div class="form-group">
                                    <label>Salida</label>
                                    <input name="fsalida" type ="date" class="form-control">
                               </div>
                               <div class="form-group">
                                    <label>Precio</label>
                                    <input name="precio" class="form-control"  id="Precio">
                                    Bolivianos(Bs) <input type="radio" name="dinero" value="Bs" checked="">
                                    Dolar($) <input type="radio" name="dinero" value="Dolar">
                               </div>
                               <div class="form-group">
                                    <input type="submit" name="submit" class="col-md-12 btn btn-success btn-lg" value="Registrar" onclick="return Asegurar()">
                               </div>
                               
                       </div>
                        
                    </div>
                </div>                        
                      </form>
                            
                    </div>
                 
              </div>
          </div>
        </div>
      </div>
<!-- ------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------- -->
<!-- -----------------------------------Actualizar-------------------------------------------- -->

<!-- ------------------------------------------------------------------------------- -->

     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
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
            var AsignarPrecio= function(x){
         if (x=='Simple') { document.getElementById('Precio').value=120;
              var selector = document.getElementById('selecionador'); 
              selector.innerHTML="<?php
              $sqlS=" SELECT Id,Nrohabitacion,Thabitacion from habitacion where Thabitacion='Simple'; ";
              $result2=$con->query($sqlS);
              while ($d3=$result2->fetch_assoc()){
                echo "<option value=".$d3['Nrohabitacion']." >".$d3['Nrohabitacion']."</option>";
              }
         ?>";}
         if (x=='Doble') { document.getElementById('Precio').value=180;
             var selector = document.getElementById('selecionador');
             selector.innerHTML="<?php
             $sqlS="SELECT Nrohabitacion,Thabitacion from habitacion where Thabitacion='Doble'; ";
             $result2=$con->query($sqlS);
             while ($d3=$result2->fetch_assoc()){
              echo "<option value=".$d3['Nrohabitacion']." >".$d3['Nrohabitacion']."</option>";
            }
        ?>";}
        if (x=='Triple') { document.getElementById('Precio').value=240;
            var selector = document.getElementById('selecionador');
            selector.innerHTML="<?php
            $sqlS="SELECT Nrohabitacion,Thabitacion from habitacion where Thabitacion='Triple'; ";
            $result2=$con->query($sqlS);
            while ($d3=$result2->fetch_assoc()){
              echo "<option value=".$d3['Nrohabitacion']." >".$d3['Nrohabitacion']."</option>";
            }
         ?>";}
        if (x=='Familiar') { document.getElementById('Precio').value=280;
        var selector = document.getElementById('selecionador');
        selector.innerHTML="<?php
            $sqlS="SELECT Nrohabitacion,Thabitacion from habitacion where Thabitacion='Familiar'; ";
            $result2=$con->query($sqlS);
            while ($d3=$result2->fetch_assoc()){
              echo "<option value=".$d3['Nrohabitacion']." >".$d3['Nrohabitacion']."</option>";
            }
         ?>";}
        
        
        
      }
           
         
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
