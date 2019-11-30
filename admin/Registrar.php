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
                        <a  href="../index.php"><i class="fa fa-home"></i> Página principal
</a>
                    </li>
                    
                    </ul>

            </div>

        </nav>
       
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVACION <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            INFORMACION PERSONAL
                        </div>
                        <div class="panel-body">
                        <form action="reservar.php" name="form" method="post">
                            <div class="form-group">
                                <label>Cedula de identidad o Pasaporte</label>
                                <input name="ci" class="form-control" required>               
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input name="nombre" class="form-control" required>
                            </div>
                               <div class="form-group">
                                <label>Apellido</label>
                                <input name="apellido" class="form-control" required>        
                               </div>
                            <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" required>
                                            
                            </div>
                                <?php

                                $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

                                ?>
                            <div class="form-group">
                                <label>Nacionalidad</label>
                                <select name="pais" class="form-control" required>
                                    <option value selected ></option>
                                    <?php
                                    foreach($countries as $key => $value):
                                    echo '<option value="'.$value.'">'.$value.'</option>';
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Telefono o Celular</label>
                                <input name="telf" type ="text" class="form-control" required> 
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
                                <select name="thabi" class="form-control" required>
                                    <option value selected ></option>
                                    <option value="Simple">Simple</option>
                                    <option value="Doble">Double</option>
                                    <option value="Triple">Triple</option>
                                    <option value="Familiar">Familiar</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>No. de habitación *</label>
                                <select name="nhabi" class="form-control" required>
                                    <option value selected ></option>
                                    <option value="1">1</option>
                                <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option> 
                                    <option value="8">8</option> 
                                    <option value="9">9</option> 
                                    <option value="10">10</option> 
                                </select>
                              </div> 
                              <div class="form-group">
                                <label>Régimen de comidas</label>
                                <select name="comida" class="form-control"required>
                                    <option value selected ></option>
                                    <option value="Solo Habitacion">Sólo habitación</option>
                                    <option value="Desayuno">Desayuno</option>
                                    <option value="Media Pizarra">Madia pizarra</option>
                                    <option value="Pension completa">Pensión completa</option>
                                    <option value="extra">Extra</option>
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
                                    <input name="precio" class="form-control" required><br>
                                    <input type="submit" name="submit" class="col-md-12 btn btn-success" value="Registrar">
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
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
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
