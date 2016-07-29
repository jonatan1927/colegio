<?php


class CalificacionDao {  
        public function calificaciones($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select Curso.nombre as a, Usuario.nombre as b, Examen.id as c, Calificacion.calificacion as d
from Curso inner join Examen on (Curso.id=Examen.idCurso)
inner join Calificacion on (Examen.id=Calificacion.idExamen)
inner join Usuario on (Calificacion.idEstudiante=Usuario.cedula)
where Curso.cedulaProfesor= ? ';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    } 
        public function calificacionEstudiante($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select Curso.nombre as a, Usuario.nombre as b, Examen.id as c, Calificacion.calificacion as d
from Curso inner join Examen on (Curso.id=Examen.idCurso)
inner join Calificacion on (Examen.id=Calificacion.idExamen)
inner join Usuario on (Curso.cedulaProfesor=Usuario.cedula)
where Calificacion.idEstudiante= ? ';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
 public function calif (CalificacionDto $cursoDto) {
     require '../modelo/Conexion.php';
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO calificacion VALUES(?,?,?)");
            $query->bindParam(1, $cursoDto->getIdExamen());
            $query->bindParam(2, $cursoDto->getIdEstudiante());
            $query->bindParam(3, $cursoDto->getCalificacion());            
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    

public function seleccionar_datos($idUsuario)      
    {
    require '../modelo/Conexion.php';
    $cnn = Conexion::getConexion();
    try {
        $q = 'select Curso.nombre as a, Usuario.nombre as b, Examen.id as c, Calificacion.calificacion as d
from Curso inner join Examen on (Curso.id=Examen.idCurso)
inner join Calificacion on (Examen.id=Calificacion.idExamen)
inner join Usuario on (Calificacion.idEstudiante=Usuario.cedula)
where Curso.cedulaProfesor= ? ';

            $query = $cnn->prepare($q);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
}}}