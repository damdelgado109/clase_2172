

CREATE TABLE administradores(

	id INT(5) AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(50),
	mail VARCHAR(100),
	clave VARCHAR(100),
	estatus INT(1),
	PRIMARY KEY (id)
)