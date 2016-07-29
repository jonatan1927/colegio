<?php
class PruebaDao { 
    public function registrarPrueba (PruebaDto $examenDto) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO prueba VALUES(?,?)");
            $query->bindParam(1, $examenDto->getIdExamen());
            $query->bindParam(2, $examenDto->getIdPregunta());  
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
}
        public function preguntas($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select pregunta.rta as a, pregunta.descrip as b, prueba.idPregunta as c from prueba
inner join pregunta on (prueba.idPregunta = pregunta.id)
where prueba.idExamen= ? ';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    } 



        }