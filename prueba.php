<?php 
include('plantillaFactura.php');
require('conexion.php');
$id=$_GET['id']	;	
 $sql = "SELECT reservacion.Id,reservacion.Id_cliente,cliente.Nombre,habitacion.Thabitacion,habitacion.Nrohabitacion,servicios.Tcomida,servicios.PrecioC,reservacion.Fsalida,reservacion.PrecioH,reservacion.PrecioS, reservacion.Fingreso,reservacion.Nro_dias,cliente.Apellido,cliente.Nacionalidad,cliente.Ci,cliente.Celular,cliente.Email FROM cliente 
                                    INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente
                                     INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion 
                                     INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio
                                     where reservacion.Id=$id";


$result=$con->query($sql);
$d=$result->fetch_assoc();
$cliente = $d['Id_cliente'];
$pdf= new PDF('L','mm',array(180,220));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(9,22,196);
$pdf->Cell(70,10,'Recibo Nro:'.$d['Id'],0,0,'L');
$pdf->Setfont('Arial', 'B', 10);	
$pdf->SetTextColor(10,10,10);
$pdf->SetX(100);
$pdf->Cell(10,10,'Hotel Santa Cecilia',0,0,'C');
$pdf->Ln(5);
$pdf->SetX(100);
$pdf->Cell(10,10,'Calle Potosi 386',0,0,'C');
$pdf->Ln(5);
$pdf->SetX(100);
$pdf->Cell(10,10,'Sucre-Bolivia',0,0,'C');
$pdf->Ln(5);
$pdf->SetX(100);
$pdf->Cell(10,10,'64-41304 ---  70315145',0,0,'C');
$pdf->Ln(5);
$pdf->Ln(20);
$pdf->SetFillColor(10,14,91);
$pdf->SetTextColor(255,255,255);
$pdf->SetX(15);
$pdf->Setfont('Arial','B', 10);
$pdf->Cell(90,6,'Recibo A',0,1,'L','true');	
$pdf->SetY(20);
$pdf->SetX(148);
$pdf->Cell(0,0, $pdf->Image('Imagen\qr.png'),0,0,'C');		
$pdf->SetY(35);
$pdf->SetX(14);
$pdf->Setfont('Arial','', 10);	
$pdf->SetTextColor(0,0,0);
$pdf->Cell(34,51.5,'Nombre: '. $d['Nombre']." ".$d['Apellido'],'true');
$pdf->Ln(5);
$pdf->SetX(14);
$pdf->Cell(34,51.5,'Ci: '.$d['Ci'],'true');
$pdf->Ln(5);
$pdf->SetX(14);
$pdf->Cell(34,51.5,'Nacionalidad: '.$d['Nacionalidad'],'true');
$pdf->Ln(5);
$pdf->SetX(14);
$pdf->Cell(34,51.5,'Celular: '.$d['Celular'],'true');	
$pdf->Ln(5);
$pdf->SetX(14);
$pdf->Cell(34,51.5,'Email: '.$d['Email'],'true');
$pdf->Ln(30);
$pdf->SetFillColor(10,14,91);
$pdf->SetTextColor(255,255,255);
$pdf->SetX(15);
$pdf->Cell(80,6,'Administrador',0,0,'L',1);
$pdf->Cell(50,6,'Fecha',0,0,'L',1);
$pdf->Cell(45,6,'Forma de Pago',0,1,'L',1);
$pdf->SetFont('Arial','',10);
$pdf->SetX(15);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(80,6,'Administrador',0,0,'L',1);
$pdf->Cell(50,6,date('d/m/Y H:i'),0,0,'L',1);
$pdf->Cell(45,6,'Efectivo',0,1,'L',1);
$pdf->Ln(2);
$pdf->SetFillColor(10,14,91);
$pdf->SetTextColor(255,255,255);
$pdf->SetX(15);
$pdf->Cell(55,6,'Concepto',0,0,'L',1);
$pdf->Cell(50,6,'Precio Unitario',0,0,'L',1);
$pdf->Cell(20,6,'Dias',0,0,'L',1);
$pdf->Cell(50,6,'Precio Total',0,1,'C',1);
$pdf->Ln(2);
$pdf->SetFont('Arial','',10);
$pdf->SetX(15);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,6,'Habitacion '.$d['Thabitacion'],0,0,'L',1);
$pdf->Cell(60,6,round($d['PrecioH']/$d['Nro_dias'])." Bs",0,0,'C',1);
$pdf->Cell(20,6,$d['Nro_dias'],0,0,'C',1);
$pdf->Cell(40,6,($d['PrecioH'])." Bs",0,1,'R',1); 
$sql1 = "SELECT reservacion.Id,reservacion.PrecioS,reservacion.Id_cliente,cliente.Nombre,habitacion.Thabitacion,habitacion.Nrohabitacion,servicios.Tcomida,servicios.PrecioC,reservacion.Fsalida,reservacion.PrecioH,reservacion.PrecioS, reservacion.Fingreso,reservacion.Nro_dias,cliente.Apellido,cliente.Nacionalidad,cliente.Ci,cliente.Celular,cliente.Email FROM cliente 
                                   INNER JOIN reservacion ON cliente.Id=reservacion.Id_cliente
                                    INNER JOIN habitacion ON habitacion.Id = reservacion.Id_habitacion 
                                    INNER JOIN servicios ON servicios.Id = reservacion.Id_servicio
                                    where reservacion.Id_cliente=$cliente";
$res=$con->query($sql1);
	$suma = 0;
while($r=$res->fetch_assoc()){
$suma+=$r['PrecioS'];
if($r['Tcomida'] != 'Ninguno'){
$pdf->SetFont('Arial','',10);
$pdf->SetX(15);
$pdf->SetFillColor(255,255,255);	
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,6,$r['Tcomida'],0,0,'L',1);
$pdf->Cell(60,6,$r['PrecioS']." Bs",0,0,'C',1);
$pdf->Cell(20,6,"-",0,0,'C',1);
$pdf->Cell(40	,6,$r['PrecioS']." Bs",0,1,'R',1);  
}
}
$pdf->Ln(8);
$pdf->SetFont('Arial','B',13);
$pdf->SetX(140);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(20,6,'Total : ',0,0,'L',1);
$pdf->SetX(160);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,6,($d['PrecioH']+$suma)." Bs",0,0,'L',1);

$pdf->Output();


 ?>


