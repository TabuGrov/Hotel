<?php
include('../conexion.php');
$rsql ="select * from habitacion";
$rre=mysqli_query($con,$rsql);

?>							 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Hotel Santa Cecilia</title>
	<!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts--> 
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
                <a class="navbar-brand" href="../index.php"><i class="fa fa-sign-out" ></i>VOLVER</a>
            </div>

           
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="habitacion.php"><i class="fa fa-dashboard"></i>Estado de la habitación</a>
                    </li>
					<li>
                        <a   href="agregarHabitacion.php"><i class="fa fa-plus-circle"></i>Agregar habitación</a>
                    </li>
                    <li>
                        <a  class="active-menu" href="eliminarHabitacion.php"><i class="fa fa-pencil-square-o"></i> Eliminar habitación
</a>
                    </li>
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                          	ELIMINAR HABITACIÓN
 <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                       Eliminar habitación

                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>Seleccione Nro de la habitación</label>
                                           <select name="id"  class="form-control" required>
												<option value selected ></option>
												<?php
												while($rrow=mysqli_fetch_array($rre))
												{
												$value = $rrow['Id'];
												  echo '<option value="'.$value.'">'.$value.'</option>';
												
												
												}
												?>
                                                
                                            </select>
                              </div>
							  
								
							 <input type="submit" name="del" value="Eliminar habitacion" class="btn btn-danger"> 
							</form>
							<?php
							 include('../conexion.php');
							 
							 if(isset($_POST['del']))
							 {
								$did = $_POST['id'];
								
								
								$sql ="DELETE FROM `habitacion` WHERE id = '$did'" ;
								if(mysqli_query($con,$sql))
								{
								 echo '<script type="text/javascript">alert("Habitacion Eliminida") </script>' ;
									
								}else {
									echo '<script>alert("Lo siento No se pudo eliminar la habitacion") </script>' ;
								}
							 }
							
							?>
                        </div>
                        
                    </div>
                </div>
                
                  
           <?php
						include ('../conexion.php');
						$sql = "select * from habitacion";
						$re = mysqli_query($con,$sql)
				?>
                <div class="row">
				
				
				<?php

										while($row= mysqli_fetch_array($re))
										{
												$Id = $row['Thabitacion'];
											if($Id == "Simple") 
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['Thabitacion']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['Id']."

														</div>
													</div>
												</div>";
											}
											else if($Id == "Doble") 
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-green'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['Thabitacion']."</h3>
														</div>
														<div class='panel-footer back-footer-green'>
															".$row['Id']."

														</div>
													</div>
												</div>";
											}
											else if($Id =="Triple")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-brown'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['Thabitacion']."</h3>
														</div>
														<div class='panel-footer back-footer-brown'>
															".$row['Id']."

														</div>
													</div>
												</div>";
											
											}
											else if($Id =="Familiar")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-red'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['Thabitacion']."</h3>
														</div>
														<div class='panel-footer back-footer-red'>
															".$row['Id']."

														</div>
													</div>
												</div>";
											
											}
											 	
										}
									?>
                    
                </div>
            <?php
				
			ob_end_flush();
			?>
                    
            
				
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
