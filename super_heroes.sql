CREATE DATABASE super_heroes;
USE super_heroes;
/*Tabla de Datos*/
CREATE TABLE heroes(
	idHeroe INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(20) NOT NULL,
	imagen VARCHAR(100) NOT NULL,
	descripcion text NULL,
	editorial INT NOT NULL,
	PRIMARY KEY(idHeroe)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Tabla de Catalogo */
CREATE TABLE editorial(
	idEditorial INT NOT NULL AUTO_INCREMENT,
	editorial VARCHAR(15) NOT NULL,
	PRIMARY KEY(idEditorial)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO editorial(idEditorial, editorial) VALUES
	(1, "DC Comics"),
	(2, "Marvel Comics"),
	(3, "Shonen Jump"),
	(4, "Vertrigo"),
	(5, "Mirage Studio"),
	(6, "Icon Comics");