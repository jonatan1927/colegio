<?php
class PreguntaDao { 
    public function registrarPregunta (PreguntaDto $examenDto) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO pregunta VALUES(?,?,?,?,?)");
            $query->bindParam(1, $examenDto->getId());
            $query->bindParam(2, $examenDto->getRta());
            $query->bindParam(3, $examenDto->getDescrip());
            $query->bindParam(4, $examenDto->getIdCurso());   
            $query->bindParam(5, $examenDto->getEstado());  
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    
public function verificar () {
        $cnn = Conexion::getConexion();
        $rojo = 0;
        try {
            $query = $cnn->prepare('select * from pregunta');
            $query->execute();
            $rojo = $query->rowCount();
       } catch (Exception $ex) {
           echo 'Error' . $ex->getMessage();
        }
         $cnn=null;
            return $rojo;
      }
      

        public function preguntas($idCurso) {
        $cnn = Conexion::getConexion();
        try {
            $listarUsuarios = 'select id as a, descrip as b from pregunta where idCurso= ? ';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idCurso);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
     
    
}}

