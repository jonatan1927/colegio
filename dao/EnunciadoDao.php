<?php
class EnunciadoDao { 
    public function registrarEnunciado (EnunciadoDto $examenDto) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO enunciado VALUES(?,?,?,?)");
            $query->bindParam(1, $examenDto->getId());
            $query->bindParam(2, $examenDto->getNominal());
            $query->bindParam(3, $examenDto->getDescrip());
            $query->bindParam(4, $examenDto->getIdPregunta());   
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }

 
        public function respuestas($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select nominal as a, descrip as b from enunciado where idPregunta= ? ';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    } 
}
    ?>