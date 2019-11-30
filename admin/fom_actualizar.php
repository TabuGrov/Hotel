
   <?php 
		include('../conexion.php');
		$id=$_GET['id'];
		$sql="SELECT Id,Tcomida,PrecioC FROM servicios where Id=$id";
		$result=$con->query($sql);
		$fila=$result->fetch_assoc();
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
                <div class="row">
                    <div class="col-md-7 col-sm-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                             ACTUALIZAR RESERVACION
                            </div>
                            <div class="panel-body">
                            
                                <div class="form-group">
                               
                               
                               
                                <form action="actualizarsev.php" method="POST" enctype="multipart/form-data">
                               <label for="producto">ID:</label>
                                <input type="text" hidden="" class="form-control" value=" <?php echo $id; ?> " name="" disabled>
		                        <input type="hidden" name="id" value="<?php echo $id; ?>">
		
        <label for="producto">TIPO COMIDA:</label>
		<input type="text" name="comida" class="form-control" value="<?php echo $fila['Tcomida']; ?>">
		<LAbel> PRECIO </LAbel>
        <input type="text"  class="form-control" name="precio" value="<?php echo $fila['PrecioC']; ?> ">
		<br>
 		 <input type="submit" value="Actualizar" class="btn btn-success">
 	                        	
 	</form> 
                               <!--     <label>TIPO COMIDA</label>
                                    <input name="nombre" class="form-control" value="Grover" disabled>
                                





                                </div>
                                <div class="form-group">
                                <label>Régimen de comidas</label>
                                <select name="id_comida" class="form-control" required>
                                    <option value selected=""></option>
                                   
                                </select>-->
                              
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
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>


























    <!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
  <form action="actualizarsev.php" method="POST" enctype="multipart/form-data">
		<input type="text" hidden="" value=" <?php echo $id; ?> " name="id">
		<label for="producto">TIPO COMIDA:</label>
		<input type="text" name="comida" value="<?php echo $fila['Tcomida']; ?>">
		<LAbel> PRECIO </LAbel>
        <input type="text" name="precio" value="<?php echo $fila['PrecioC']; ?> ">
		<br>
		
 		<br><br>
 		<input type="submit" value="Actualizar">
 		<input type="reset" value="Borrar">
 	</form> 


</body>
</html>*/-->