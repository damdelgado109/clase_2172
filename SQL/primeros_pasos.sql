
  SHOW DATABASES;

  CREATE DATABASE curso_2172;

	USE curso_2172;
 		
	SHOW TABLES;

	CREATE TABLE persona (	
		nombre VARCHAR(30),
		apellido VARCHAR(30),
		fechaNacimiento DATE,
		altura SMALLINT(3),
		cedula INT(10)			
	);

	SHOW CREATE TABLE persona;

	
	SELECT * FROM persona;

	DROP TABLE persona;
	
	INSERT INTO persona (nombre,apellido,fechaNacimiento,cedula)
		VALUES ("Damian", "Delgado", "1987-09-10", 6666666); 



