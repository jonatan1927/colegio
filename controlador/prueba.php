<?php
date_default_timezone_set("America/Bogota");
require '../dao/ExamenDao.php';
require '../dao/CursoDao.php';
require '../dto/ExamenDto.php';
require'../controlador/sessions.php';
$mecha = date("Y") . "-" . date("m") . "-" . date("d")." ".date("H").":".  date("i").":".  date("s");
$exa = $_POST['codigo'];
$exada = new ExamenDao();
$tuso = $exada->verificar($exa);
if ($tuso==1) {
    header('Location:../estudiante/presentarexamen.php?error=1');   
}  else {
 $fechas = $exada->fecha($exa);
foreach ($fechas as $vv) {
    $inicio = $vv['a'];
    $final =  $vv['b'];  
}
$hoy= new DateTime($mecha);
$uno= new DateTime($inicio);
$dos= new DateTime($final);
if ($hoy<$uno) {
  header('Location:../estudiante/presentarexamen.php?error=2');    
} elseif ($dos<$hoy) {
  header('Location:../estudiante/presentarexamen.php?error=3');  
}  else {
$objses = new Sessions();
$objses->init();
$objses->set('puchi', $exa);
   header('Location:../estudiante/prueba.php');    
}
    }
 

