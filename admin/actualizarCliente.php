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
                    <h1><b>Editar Cliente</b></h1><br>
                </center>
                <?php 
                    $idT=$_GET['id'];
                    $sql = "SELECT * FROM cliente 
                                     where Id=$idT";
                    $result=$con->query($sql);
                    $d=$result->fetch_assoc();
                 ?>
                <div class="row" id="contenido">
                    <div class="col-md-5 col-sm-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                             ACTUALIZAR CLIENTE
                            </div>
                            <div class="panel-body">
                            <form name="form" method="post" action="actua.php">
                                <div class="form-group">
                                    <input type="text" hidden="" value=" <?php echo $idT; ?> " name="id">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value=" <?php echo $d['Nombre']; ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input type="text" name="apellido" class="form-control" value=" <?php echo $d['Apellido']; ?>" >
                                </div>

                                 <?php

                                $countries = array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");

                                ?>
                            <div class="form-group">
                                <label>Nacionalidad</label>
                                <select name="pais" class="form-control" >
                                    <option value=" <?php echo $d['Nacionalidad']; ?>" selected > <?php echo $d['Nacionalidad']; ?></option>
                                    <?php
                                    foreach($countries as $key => $value):
                                    echo '<option value="'.$value.'">'.$value.'</option>';
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                                <div class="form-group">
                                        <label>Celular</label>
                                        <input type="text" name="celular" class="form-control" value="<?php echo $d['Celular']; ?>">
                                </div>
                                  <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $d['Email']; ?>">
                                </div>
                                <input type="submit" name="add" value="Actualizar Datos" class="btn btn-success col-md-12" onclick="return Asegurar()"> 
                            </form>

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
    <script>
        function Asegurar(){

            confirm("El cliente a sido actualizado");
        }

    </script>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
