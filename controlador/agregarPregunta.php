<?php
require '../dao/ExamenDao.php';
require '../dao/CursoDao.php';
require '../dto/ExamenDto.php';
require '../dao/PreguntaDao.php';
require '../dto/PreguntaDto.php';
require '../dao/EnunciadoDao.php';
require '../dto/EnunciadoDto.php';
require'../controlador/sessions.php';
$objses = new Sessions();
$objses->init();
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null ;
$cod = $_POST['codigo'];
$nom = $_POST ['nombres']; 
$codi = $_POST['pre'];
$nomb = $_POST ['preg'];
$codig = $_POST['pregu'];
$nombr = $_POST ['pregun'];
$nombre = $_POST ['pregunta'];
$co = $_POST['pregunt'];   
$cdao = new CursoDao();
$pred = new PreguntaDao();
$pret = new PreguntaDto();
$enunc = new EnunciadoDto();
$enudao = new EnunciadoDao();
$d = $pred->verificar();
$da =$d+1;
$est = 0;
$suarez = 0;
$pret->setId($da);
$pret->setIdCurso($cod);
$pret->setDescrip($nom);
$pret->setRta($co);
$pret->setEstado($est);
$cars = array (array("a","b","c","d","e"),array($codi, $nomb, $codig, $nombr, $nombre));
$mens = $cdao->verificar($cod);
if ($mens==0) {
$mesi = $pred->registrarPregunta($pret);
   for ($i=0;$i<5;$i++){
       $enunc->setNominal($cars[0][$i]);
       $enunc->setDescrip($cars[1][$i]);
       $enunc->setIdPregunta($da);
      $ney = $enudao->registrarEnunciado($enunc);
      $suarez = $suarez+$ney;
}  
if ($mesi=="1" && $suarez==5) {
header('Location:../docente/preguntas.php?error=1');    
}  else {
header('Location:../docente/preguntas.php?error=2');      
}}
 else {
header('Location:../docente/preguntas.php?error=3');    
}
