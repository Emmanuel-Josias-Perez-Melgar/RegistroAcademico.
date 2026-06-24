CREATE DATABASE RegistroAcademico;
USE RegistroAcademico;

CREATE TABLE seccion(
    id_seccion INT AUTO_INCREMENT PRIMARY KEY,
    nombre_seccion VARCHAR(100) NOT NULL
);

CREATE TABLE estudiante(
    id_estudiante INT AUTO_INCREMENT PRIMARY KEY,
    nie VARCHAR(20) NOT NULL UNIQUE,
    apellidos VARCHAR(100) NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    genero ENUM('M','F') NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    estado ENUM('Activo','Inactivo') DEFAULT 'Activo',
    id_seccion INT NOT NULL,
    FOREIGN KEY (id_seccion) REFERENCES seccion(id_seccion)
);

INSERT INTO seccion(nombre_seccion) VALUES
('2-1 Desarrollo de Software (Matutino)'),
('2-2 Desarrollo de Software (Matutino)'),
('2-3 Desarrollo de Software (Matutino)'),
('2-4 Desarrollo de Software (Matutino)');

INSERT INTO estudiante
(nie, apellidos, nombres, fecha_nacimiento, genero, direccion, estado, id_seccion)
VALUES
('6690390','ALFARO QUINTANILLA','KATHERINE VANESSA','2007-01-15','F','San Salvador','Activo',1),
('19983939','AREVALO HERNANDEZ','NAHOMY CAROLINA','2007-03-21','F','Soyapango','Activo',1),
('4116634','BAUTISTA VANEGAS','KIARA EUNICE','2007-05-10','F','Apopa','Activo',1),
('4517831','CALDERON RAYMUNDO','JOSE EDUARDO','2007-09-08','M','Mejicanos','Activo',1),
('20088984','CARDONA ROSALES','AXEL GABRIEL','2007-11-12','M','Ilopango','Activo',1),
('5452197','COLORADO MELENDEZ','CRISTIAN JOSUE','2007-04-18','M','Santa Tecla','Activo',1),
('20006528','CHACON GOMEZ','JULIO MATIAS','2007-07-22','M','San Marcos','Activo',1),
('4567279','DE JESUS LOPEZ','TATIANA ALEXANDRA','2007-02-14','F','Ayutuxtepeque','Activo',1),
('19773697','DE LEON HERNANDEZ','JOSUE ENRIQUE','2007-06-09','M','Nejapa','Activo',1),
('3071771','ESCOBAR GONZALEZ','HAZEL PAMELA','2007-12-03','F','Cuscatancingo','Activo',1);

CREATE VIEW vista_estudiantes AS
SELECT
    id_estudiante,
    nie,
    apellidos,
    nombres,
    fecha_nacimiento,
    TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) AS edad,
    genero,
    direccion,
    estado,
    id_seccion
FROM estudiante;