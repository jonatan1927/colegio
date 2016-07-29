drop database plan;
create database plan;
use plan;
/*tabla Persona*/
CREATE TABLE IF NOT EXISTS `plan`.`Usuario` (
    `cedula` VARCHAR(45) NOT NULL,
    `nombre` VARCHAR(200)  DEFAULT 'DATO NO SUMINISTRADO',
    `carnet` VARCHAR(45)  DEFAULT 'DATO NO SUMINISTRADO',
    `rol` VARCHAR(45)  DEFAULT 'DATO NO SUMINISTRADO',
    `clave` VARCHAR(45) NOT NULL DEFAULT '123456',
    PRIMARY KEY (`cedula`)
)  ENGINE=InnoDB;
/*tabla curso*/
CREATE TABLE IF NOT EXISTS `plan`.`Curso` (
    `id` VARCHAR(45) NOT NULL,
    `nombre` VARCHAR(200)  DEFAULT 'DATO NO SUMINISTRADO',
    `cedulaProfesor` VARCHAR(45) NOT NULL  DEFAULT 'DATO NO SUMINISTRADO',
    PRIMARY KEY (`id`),
INDEX `fk_Usuario_Curso1_idx` (`cedulaProfesor` ASC),
    CONSTRAINT `fk_Cur_Usu` FOREIGN KEY (`cedulaProfesor`)
        REFERENCES `plan`.`Usuario` (`cedula`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
/*tabla pregunta*/
CREATE TABLE IF NOT EXISTS `plan`.`Pregunta` (
    `id` VARCHAR(5) NOT NULL,
    `rta` VARCHAR(5) NOT NULL DEFAULT 'O',
    `descrip` VARCHAR(500) NOT NULL,
	`idCurso` VARCHAR(45) NOT NULL,
	`estado` int DEFAULT '0',
    PRIMARY KEY (`id`),
INDEX `fk_Curso_Pregunta1_idx` (`idCurso` ASC),
    CONSTRAINT `fk_Preg_Curso` FOREIGN KEY (`idCurso`)
        REFERENCES `plan`.`Curso` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
/*tabla Enunciado*/
CREATE TABLE IF NOT EXISTS `plan`.`Enunciado` (
    `id` int NOT NULL auto_increment ,
    `nominal` VARCHAR(5) NOT NULL,
    `descrip` VARCHAR(500) NOT NULL,
	`idPregunta` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`id`),
INDEX `fk_Pregunta_Enunciado1_idx` (`idPregunta` ASC),
    CONSTRAINT `fk_Enum_Pregunt` FOREIGN KEY (`idPregunta`)
        REFERENCES `plan`.`Pregunta` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
/*tabla Examen*/
CREATE TABLE IF NOT EXISTS `plan`.`Examen` (
    `id` VARCHAR(45) NOT NULL,
    `idCurso` VARCHAR(45) NOT NULL,
    `horaInicio` datetime NOT NULL,
	`horaFinal` datetime NOT NULL,
    PRIMARY KEY (`id`),
INDEX `fk_Curso_Examen1_idx` (`idCurso` ASC),
    CONSTRAINT `fk_Exam_Curso` FOREIGN KEY (`idCurso`)
        REFERENCES `plan`.`Curso` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
/*tabla Prueba*/
CREATE TABLE IF NOT EXISTS `plan`.`Prueba` (
    `idExamen` VARCHAR(45) NOT NULL,
    `idPregunta` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`idExamen`,`idPregunta`),
INDEX `fk_Examen_Prueba1_idx` (`idExamen` ASC),
    CONSTRAINT `fk_Prueba_Examen` FOREIGN KEY (`idExamen`)
        REFERENCES `plan`.`Examen` (`id`),
INDEX `fk_Pregunta_Prueba1_idx` (`idPregunta` ASC),
    CONSTRAINT `fk_Prueba_Pregunta` FOREIGN KEY (`idPregunta`)
        REFERENCES `plan`.`Pregunta` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
/*tabla Calificacion*/
CREATE TABLE IF NOT EXISTS `plan`.`Calificacion` (
    `idExamen` VARCHAR(45) NOT NULL,
    `idEstudiante` VARCHAR(45) NOT NULL,
    `Calificacion` INT NOT NULL DEFAULT '0',
    PRIMARY KEY (`idExamen`,`idEstudiante`),
INDEX `fk_Examen_Calificacion1_idx` (`idExamen` ASC),
INDEX `fk_Usuario_Calificacion1_idx` (`idEstudiante` ASC),
    CONSTRAINT `fk_Calif_Exam` FOREIGN KEY (`idExamen`)
        REFERENCES `plan`.`Examen` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_Calif_Usua` FOREIGN KEY (`idEstudiante`)
        REFERENCES `plan`.`Usuario` (`cedula`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
/*Insercion de datos*/
/*Insercion de datos usuario*/
INSERT INTO `plan`.`usuario` (`cedula`, `nombre`, `rol`) VALUES ('1014202078', 'jonathan velasquez', '0');
INSERT INTO `plan`.`usuario` (`cedula`, `nombre`, `carnet`, `rol`) VALUES ('123456', 'juan perez', '123456', '1');
INSERT INTO `plan`.`usuario` (`cedula`, `nombre`, `carnet`, `rol`) VALUES ('234567', 'jose perez', '234567', '1');
INSERT INTO `plan`.`usuario` (`cedula`, `nombre`, `rol`) VALUES ('54321', 'nelson rodriguez', '0');

/*Insercion de datos curso*/
INSERT INTO `plan`.`curso` (`id`, `nombre`, `cedulaProfesor`) VALUES ('626741', 'adsi', '1014202078');
INSERT INTO `plan`.`curso` (`id`, `nombre`, `cedulaProfesor`) VALUES ('88845', 'sistemas', '54321');

/*Insercion de datos pregunta*/
INSERT INTO `plan`.`pregunta` ( `id`, `rta`, `descrip`, `idCurso`, `estado`) VALUES ( '1','c', '¿que es un .DAO?', '88845', '0');
INSERT INTO `plan`.`pregunta` ( `id`, `rta`, `descrip`, `idCurso`, `estado`) VALUES ( '2','b', '¿que es un .DTO?', '626741', '1');
INSERT INTO `plan`.`pregunta` ( `id`, `rta`, `descrip`, `idCurso`, `estado`) VALUES ( '3','c', '¿el sistema es compuesto de¡', '88845', '0');
INSERT INTO `plan`.`pregunta` ( `id`, `rta`, `descrip`, `idCurso`, `estado`) VALUES ( '4','b', '¿que es la CPU?', '626741', '1');

/*Insercion de datos Enunciado*/
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('a', 'Base de datos', '1');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('b', 'data base', '1');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('c', 'Modelo entidad relacion', '1');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('d', 'la vista', '1');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('e', 'todas las acteriores', '1');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('a', 'la vista', '2');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('b', 'data base', '2');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('c', 'el controlador', '2');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('d', 'Base de datos', '2');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('e', 'todas las acteriores', '2');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('a', 'Base de datos', '3');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('b', 'data base', '3');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('c', 'Modelo entidad relacion', '3');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('d', 'la vista', '3');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('e', 'todas las acteriores', '3');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('a', 'la vista', '4');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('b', 'data base', '4');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('c', 'el controlador', '4');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('d', 'Base de datos', '4');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) VALUES ('e', 'todas las acteriores', '4');

/*Insercion de datos Examen*/
INSERT INTO `plan`.`examen` (`id`, `idCurso`, `horaInicio`, `horaFinal`) VALUES ('12', '626741', '2016-01-05 01:00:00', '2016-01-05 02:00:00');
INSERT INTO `plan`.`examen` (`id`, `idCurso`, `horaInicio`, `horaFinal`) VALUES ('13', '88845', '2016-01-05 01:00:00', '2016-01-05 02:00:00');

/*Insercion de datos Calificacion*/
INSERT INTO `plan`.`calificacion` (`idExamen`, `idEstudiante`, `Calificacion`) VALUES ('12', '123456', '1');
INSERT INTO `plan`.`calificacion` (`idExamen`, `idEstudiante`, `Calificacion`) VALUES ('12', '234567', '3');
INSERT INTO `plan`.`calificacion` (`idExamen`, `idEstudiante`, `Calificacion`) VALUES ('13', '123456', '2');
INSERT INTO `plan`.`calificacion` (`idExamen`, `idEstudiante`, `Calificacion`) VALUES ('13', '234567', '5');

/*Insercion de datos Calificacion*/
alter table usuario add column correo varchar (60) ;
UPDATE `plan`.`usuario` SET `correo`='nhrodriguez@sena.edu.co' WHERE `cedula`='54321';
UPDATE `plan`.`usuario` SET `correo`='jdelrojo1927@gmail.com' WHERE `cedula`='1014202078';

/*consultas*/
/*sesiones */
select count(*) from usuario where cedula='1014202078' and clave='123456';
select rol from usuario where cedula='1014202078' and clave='123456';

select count(*) from usuario where cedula='123456' and carnet='123456';
select rol from usuario where cedula='123456' and clave='123456';

/*agregar curso*/
select* from curso;
select count(*) from curso where id='8884588';
INSERT INTO `plan`.`curso` (`id`,`nombre`,`cedulaProfesor`) 
VALUES ('88845','sistemas','54321');

/*agregar preguntas*/
select count(*) from curso where id='8884588';
select count(*) from pregunta;
INSERT INTO `plan`.`pregunta` (`id`, `rta`, `descrip`, `idCurso`, `estado`) 
VALUES ('1', 'c', '¿que es un .DAO?', '88845', '0');
INSERT INTO `plan`.`enunciado` (`nominal`, `descrip`, `idPregunta`) 
VALUES ('a', 'Base de datos', '1');

/*agregar examen*/
select* from examen;
select count(*) from examen where id='8884588';
select count(*) from curso where id='8884588';
INSERT INTO `plan`.`examen` (`id`, `idCurso`, `horaInicio`, `horaFinal`) 
VALUES ('13', '88845', '2016-01-05 01:00:00', '2016-01-05 02:00:00');

/*seleccionar preguntas*/
describe pregunta;
select id, descrip from pregunta where idCurso='626741';
select* from pregunta;
UPDATE `plan`.`pregunta` SET `estado`='1' WHERE `id`='1';

/*calificaciones rol profesor */
select Curso.nombre, Usuario.nombre, Examen.id, Calificacion.calificacion
from Curso inner join Examen on (Curso.id=Examen.idCurso)
inner join Calificacion on (Examen.id=Calificacion.idExamen)
inner join Usuario on (Calificacion.idEstudiante=Usuario.cedula)
where Curso.cedulaProfesor='54321';

/*calificaciones rol alumno */
select Curso.nombre as curso ,examen.id as examen ,Usuario.nombre as docente,
 calificacion.Calificacion from curso
inner join Examen on (curso.id=Examen.idCurso)
inner join Calificacion on (Examen.id=Calificacion.idExamen)
inner join Usuario on (Curso.cedulaProfesor=Usuario.cedula)
where Calificacion.idEstudiante='234567';



use plan;
select*  from prueba; 
select* from enunciado;
describe enunciado;
select* from examen;


select pregunta.rta, pregunta.descrip, prueba.idPregunta from prueba
inner join pregunta on (prueba.idPregunta = pregunta.id)
where prueba.idExamen='65432' ; 

select nominal, descrip from enunciado where idPregunta='5';
select horaInicio as a, horaFinal as b from examen where id='54321';

select* from calificacion;


