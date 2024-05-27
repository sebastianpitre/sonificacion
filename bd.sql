CREATE DATABASE IF NOT EXISTS sueloscbc;
USE sueloscbc;

CREATE TABLE informacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    lote VARCHAR(50),
    coordenada1 FLOAT,
    coordenada2 FLOAT,
    color VARCHAR(20),
    fecha_agregado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
