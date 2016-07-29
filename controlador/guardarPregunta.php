<?php
require '../dao/ExamenDao.php';
require '../dao/CursoDao.php';
require '../dto/ExamenDto.php';
require '../dao/PruebaDao.php';
require '../dto/PruebaDto.php';
require'../controlador/sessions.php';
$codi = $_POST['cont'];
$exa = $_POST ['exa'];
for ($index = 0; $index<$codi; $index++) {
     $cod = $_POST['cod'.$index];  
 if ($cod=="0"){
 }  else {
$pru = new PruebaDto();
$prud = new PruebaDao();
$pru->setIdExamen($exa);
$pru->setIdPregunta($cod);
$result = $prud->registrarPrueba($pru);
if ($result="1") {
header('Location:../docente/inicio.php?error=1');        
}  else {
header('Location:../docente/inicio.php?error=2');     
}
 }
  
}

