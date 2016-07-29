<?php
require '../modelo/Conexion.php';

class CursoDao {  
 public function registrarCurso (CursoDto $cursoDto) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO curso VALUES(?,?,?)");
            $query->bindParam(1, $cursoDto->getIdCurso());
            $query->bindParam(2, $cursoDto->getNombre());
            $query->bindParam(3, $cursoDto->getUsuario());            
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    
public function verificar ($idcurso) {
        $cnn = Conexion::getConexion();
        $rojo = 0;
        $mensaje = 0;
        try {
            $query = $cnn->prepare('select * from curso where id= ? ');
            $query->bindParam(1, $idcurso);
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
}
?>


