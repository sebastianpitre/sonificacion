
CREATE DATABASE IF NOT EXISTS bd_portafolio;


USE bd_portafolio; 

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) NOT NULL,
   ruta_imagen VARCHAR(255),
  `contrasena` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO usuarios (nombre_usuario, contrasena) VALUES ('vanesa', '1234');


CREATE TABLE proyectos (
    id_proyecto INT AUTO_INCREMENT PRIMARY KEY,
    nombre_proyecto VARCHAR(255),
    etapas VARCHAR(255),
    ruta_imagen VARCHAR(255),
    descripcion_proyecto TEXT,
    enlace_proyecto TEXT

);

CREATE TABLE certificados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_certf VARCHAR(255) NOT NULL,
    ruta_documento VARCHAR(255) NOT NULL
);


