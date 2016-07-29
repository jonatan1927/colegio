<?php
require '../dao/ExamenDao.php';
require '../dao/CursoDao.php';
require '../dto/ExamenDto.php';
require'../controlador/sessions.php';
$cod = $_POST['codigo'];
$co = $_POST['cod'];
$nom = $_POST ['nombres']; 
$c = $_POST['dni'];
$cur = new CursoDao();
$ela = $cur->verificar($co);
$exa = new ExamenDao();
$than = $exa->verificar($cod);
if ($than==1) {
    if ($ela==0) {
$edto = new ExamenDto();
$edto->setIdExamen($cod);
$edto->setCurso($co);
$edto->setHoraInicio($nom);
$edto->setHoraFinal($c);
$sisas = $exa->registrarExamen($edto);
if ($sisas=="1") {
$sss =new Sessions();
$sss->init();
$sss->set('plones', $co);
$sss->set('plon', $cod);
//header('Location:../docente/examen.php?error=3'); 
header('Location:../docente/preguntasexamen.php');
} else {
header('Location:../docente/examen.php?error=4');    
}
    }  else {
header('Location:../docente/examen.php?error=2');        
    }    
}  else {
header('Location:../docente/examen.php?error=1');     
}




