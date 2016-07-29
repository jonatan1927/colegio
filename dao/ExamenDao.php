<?php
class ExamenDao { 
    public function registrarExamen (ExamenDto $examenDto) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO examen VALUES(?,?,?,?)");
            $query->bindParam(1, $examenDto->getIdExamen());
            $query->bindParam(2, $examenDto->getCurso());
            $query->bindParam(3, $examenDto->getHoraInicio());   
            $query->bindParam(4, $examenDto->getHoraFinal()); 
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    
public function verificar ($idexamen) {
        $cnn = Conexion::getConexion();
        $rojo = 0;
        $mensaje = 0;
        try {
            $query = $cnn->prepare('select * from examen where id= ? ');
            $query->bindParam(1, $idexamen);
            $query->execute();
            $rojo = $query->rowCount();
       } catch (Exception $ex) {
           echo 'Error' . $ex->getMessage();
        }
      if ($rojo==0){
      $mensaje = 1;
      } else {
       }
         $cnn=null;
            return $mensaje;
      }

        public function fecha($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select horaInicio as a, horaFinal as b from examen where id= ? ';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    } 
    
}

