CREATE DATABASE IF NOT EXISTS sonificacion;

USE sonificacion;

CREATE TABLE IF NOT EXISTS lotes (
    id_lote INT AUTO_INCREMENT PRIMARY KEY,
    nombre_lote VARCHAR(255) NOT NULL,
    numero_lote VARCHAR(255) NOT NULL,
    coordenada1 DECIMAL(10, 7) NOT NULL,
    coordenada2 DECIMAL(10, 7) NOT NULL,
    color_punto VARCHAR(7) NOT NULL
);

INSERT INTO lotes (nombre_lote, numero_lote, coordenada1, coordenada2, color_punto) VALUES
('Lote A', '001', -73.239792, 10.407340, '#11cdef'),
('Lote B', '002', -73.238472, 10.402830, '#f5365c'),
('Lote C', '003', -73.239494, 10.404364, '#fb6340'),
('Lote D', '004', -73.238536, 10.403799, '#172b4d'),
('Lote E', '005', -73.236235, 10.403190, '#f4f5f7'),
('Lote F', '006', -73.234209, 10.403841, '#5e72e4'),
('Lote G', '007', -73.229505, 10.397721, '#2dce89');

CREATE TABLE IF NOT EXISTS muestras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_lote INT NOT NULL,
    muestra1 VARCHAR(255),
    muestra2 VARCHAR(255),
    muestra3 VARCHAR(255),
    FOREIGN KEY (id_lote) REFERENCES lotes(id_lote)
);

CREATE TABLE IF NOT EXISTS muestras2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_lote INT NOT NULL,
    ph DECIMAL(4, 2) NOT NULL,
    conductividad DECIMAL(5, 2) NOT NULL,
    materia_organica DECIMAL(5, 2) NOT NULL,
    fosforo DECIMAL(10, 2) NOT NULL,
    azufre DECIMAL(10, 2) NOT NULL,
    alh DECIMAL(10, 2) NOT NULL,
    al DECIMAL(10, 2) NOT NULL,
    ca DECIMAL(10, 2) NOT NULL,
    mg DECIMAL(10, 2) NOT NULL,
    k DECIMAL(10, 2) NOT NULL,
    na DECIMAL(10, 2) NOT NULL,
    cice DECIMAL(10, 2) NOT NULL,
    fe DECIMAL(10, 2) NOT NULL,
    mn DECIMAL(10, 2) NOT NULL,
    zn DECIMAL(10, 2) NOT NULL,
    cu DECIMAL(10, 2) NOT NULL,
    b DECIMAL(10, 2) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    FOREIGN KEY (id_lote) REFERENCES lotes(id_lote)
);
