<?php
include_once('PDF.php');
include_once('../dao/CalificacionDao.php');
require'../controlador/sessions.php';
$objses = new Sessions();
$objses->init();
$user = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null ;
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null ;
if($user == ''){
	 header('Location:../usuario.php?error=2');
}
 
$seleccion = new CalificacionDao;
 
$datosReporte = $seleccion->seleccionar_datos($cedula);
 
$pdf = new PDF();
 
$pdf->AddPage();
 
$miCabecera = array( 'Curso', 'Alumno', 'Examen', 'Calificación');
 
$pdf->tablaHorizontal($miCabecera, $datosReporte);
 
$pdf->Output(); //Salida al navegador
?>