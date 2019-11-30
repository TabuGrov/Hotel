<?php 		
include('conexion.php');
 require('fpdf/fpdf.php');
class PDF extends FPDF
{

	function Header(){
		$this->Image('Imagen\hotel1.jpg',15,15,20);
		$this->Setfont('Arial','B', 15);	
		$this->SetTextColor(034,113,179);
		$this->SetX(150);
		

	} 
	function Footer()
	{	
		$this->SetY(-15);
		$this->Setfont('Arial','I',12);
		$this->Cell(0,10,'Vuelva Pronto !!',0,0,'C');
	}
 }
 ?>
