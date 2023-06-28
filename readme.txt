CREATE TABLE paises(
	id_pais INT PRIMARY KEY AUTO_INCREMENT,
    nombre_pais VARCHAR(40) NOT NULL UNIQUE     
);
CREATE TABLE departamentos(
	id_departamento INT PRIMARY KEY AUTO_INCREMENT,
    nombre_departamento VARCHAR(40) NOT NULL,
    id_pais_departamento INT NOT NULL,
    FOREIGN KEY (id_pais_departamento)REFERENCES paises(id_pais)
);
CREATE TABLE regiones(
	id_region INT PRIMARY KEY AUTO_INCREMENT,
    nombre_region VARCHAR(40) NOT NULL,
    id_departamento_region INT NOT NULL,
    FOREIGN KEY (id_departamento_region)REFERENCES departamentos(id_departamento)
);
CREATE TABLE campers(
	id_camper INT PRIMARY KEY AUTO_INCREMENT,
    numeroId_camper VARCHAR(15) UNIQUE,
    nombre_camper VARCHAR(40) NOT NULL,
    apellido_camper VARCHAR(40) NOT NULL,
    fechaDeNacimiento_camper DATE NOT NULL,
    id_region_camper INT NOT NULL,
    FOREIGN KEY (id_region_camper)REFERENCES regiones(id_region)
);
INSERT INTO paises (nombre_pais) VALUES 
("peru"),
("rusia"),
("argentina");

INSERT INTO departamentos (nombre_departamento, id_pais_departamento) VALUES 
("departamento01",1), 
("departamento02",1), 
("departamento03",1);

INSERT INTO regiones (nombre_region, id_departamento_region) VALUES 
("region01",1),
("region02",1),
("region03",1);