<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
                <a class="navbar-brand" href="../index.php"><i class="fa fa-sign-out" ></i>Volver </a>
            </div>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a  href="../index.php"><i class="fa fa-home"></i> Página principal</a>
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
                          SERVICIOS <small></small>
                        </h1>
                    </div>
                </div> 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                         AGREGAR NUEVO SERVICIO

                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label> TIPO DE COMIDA*</label>
                                        <input name="comid" type="text" class="form-control">
                              </div>
							  
								<div class="form-group">
                                <label > PRECIO </label>
                                            <input name="pre" type="text" class="form-control">
                               </div>
                               

							 <input type="submit" name="add" value="Agregar" class="btn btn-primary"> 
							</form>
							<?php
							   include('../conexion.php');
                            if(isset($_POST['add'])){

                                    $tcomida = $_POST['comid'];
                                    $precio = $_POST['pre'];
                                     if(isset($tcomida))      
                                    $check="SELECT * FROM servicios WHERE Tcomida = '$tcomida' AND PrecioC = '$precio'";
                                        $rs = $con->query($check); 
                                      $data = $rs->fetch_assoc();  
                                  if($data['Tcomida']==$tcomida and $precio==$data['PrecioC']) {
											echo "<script type='text/javascript'> alert('ya exisyte el tipo de comida')</script>";
											
										}else
										{
							 
										
										$sql ="INSERT INTO `servicios`( `Tcomida`, `PrecioC`) VALUES ('$tcomida','$precio')" ;
										      
                                            	if($con->query($sql))
										{
										 echo '<script>alert("NUEVA FILA INSERTADA ") </script>' ;
										}else {
											echo '<script>alert(" FATAL ERROR GGG Sorry ! Check The System") </script>' ;
										}


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
                         INFORMACIÓN DE SERVICIOS

                        </div>
                        <div class="panel-body">
								<!-- Advanced Tables //PANEL POR DEFECTO -->
                    <div class="panel panel-default">
                        <?php
						   $sql = "SELECT Id , Tcomida , PrecioC from servicios where Tcomida<>'Ninguno'";

                            $re = $con->query($sql);
						?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>TIPO DE COMIDA</th>
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
                                            <td><?php echo $fila['PrecioC']?></td>
                                             <td><a href="fom_actualizar.php?id=<?php echo $fila['Id']; ?>">  <input type="submit" value="Actualizar" class="btn btn-primary"> </a>    </td>
                                             <td> 	<a href="eliminar.php?id=<?php echo $fila['Id'];    ?>"> <input type="submit" value="Eliminar" class="btn btn-danger"> </a>   </td>
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