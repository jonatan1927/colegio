<?php
require '../dao/CursoDao.php';
require '../dto/CursoDto.php';
require'../controlador/sessions.php';
$objses = new Sessions();
$objses->init();
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null ;
$cod = $_POST['codigo'];
$nom = $_POST ['nombres']; 
$cso = new CursoDto();
$cdao = new CursoDao();
$cso->setIdCurso($cod);
$cso->setNombre($nom);
$cso->setUsuario($cedula);
$mens = $cdao->verificar($cod);
if ($mens==1) {
$mesi = $cdao->registrarCurso($cso); 
if ($mesi=="1") {
header('Location:../docente/curso.php?error=2');    
}  else {
header('Location:../docente/curso.php?error=3');      
}
}
 else {
header('Location:../docente/curso.php?error=1');    
}



