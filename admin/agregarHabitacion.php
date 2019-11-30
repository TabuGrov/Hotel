 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habitacion</title>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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

                    <li>
                        <a  href="habitacion.php"><i class="fa fa-dashboard"></i>Estado de las habitaciones</a>
                    </li>
                    <li>
                        <a  class="active-menu" href="agregarHabitacion.php"><i class="fa fa-plus-circle"></i>Agregar habitación</a>
                    </li>
                    <li>
                        <a  href="eliminarHabitacion.php"><i class="fa fa-desktop"></i>Eliminar habitación</a>
                    </li>
                    

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                          NUEVO CUARTO <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                         AGREGAR NUEVA Habitacion

                        </div>
                        <div class="panel-body">
                        <form name="form" method="post">
                            
                              
                                <div class="form-group">
                                    <label>Tipo de Habitacion</label>
                                    <select name="opcion" class="form-control" required>
                                        <option value selected ></option>
                                        <option value="Simple">Simple</option>
                                        <option value="Doble">Double</option>
                                        <option value="Triple">Triple</option>
                                        <option value="Familiar">Familiar</option>
                                    </select>
                               </div>
                            <div class="form-group">
                                <label> Numero de habitacion</label>
                                    <input type="number" name="Nhabitacion" class="form-control" required>
                              </div>
                                          
                                            
                             <input type="submit" name="add" value="añadir habitacion" class="btn btn-primary"> 
                            </form>
                            <?php
                             include('../conexion.php');
                             
                           if(isset($_POST['add']))
                             {
                                    $Nhabitacion=$_POST['Nhabitacion'];
                                    $opcion = $_POST['opcion'];
                                    
                                    $sql ="INSERT INTO habitacion( Nrohabitacion,Thabitacion,Estado) 
                                    VALUES ($Nhabitacion,'$opcion',1)" ;
                                    if($con->query($sql))
                                    {
                                     echo '<script>alert("habitacion añadida") </script>' ;
                                    }else {
                                        echo '<script>alert("Lo siento, no se pudo añadir") </script>' ;
                                    }
                             }
                                                         
                            
                            ?>
                        </div>
                        
                    </div>
                </div>
                
                  
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                         INFORMACIÓN DE HABITACIONES

                        </div>
                        <div class="panel-body">
                                <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <?php
                           $sql = "SELECT Id, Nrohabitacion, Thabitacion from habitacion";
                           $re = $con->query($sql);


                        ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipo habitacion</th>
                                            <th>Numero Habitacion</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        
                                        <?php

                                            while ($fila = $re->fetch_assoc()){
                                                ?>

                                                <tr>
                                                    <td><?php echo $fila['Id']?></td>
                                                    <td><?php  echo $fila['Thabitacion']?></td>
                                                    <td><?php  echo $fila['Nrohabitacion']?></td>
                                               </tr>
                                               <?php 
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
                </div>
                
               
            </div>
                    
            
                
                    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
    

</body>
</html>


