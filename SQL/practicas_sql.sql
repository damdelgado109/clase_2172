
SHOW TABLES;

DROP TABLE persona;

countryIsoTresDigitos

country_iso_tres_digitos

country_iso_3_digitos

SHOW CREATE TABLE autores;

CREATE TABLE autores (
	id INT(10) NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	nacionalidad CHAR(3) COMMENT 'Hace referencia al country ISO 3 Digitos', 
    fechaNacimiento DATE,   
	fechaMuerte DATE,
	PRIMARY KEY(id)
);

CREATE TABLE generos (
	id INT(5) NOT NULL AUTO_INCREMENT, 
	nombre VARCHAR(50) NOT NULL,
	descripcion TEXT,
	PRIMARY KEY(id)
);



CREATE TABLE libros (
	id INT(50) NOT NULL AUTO_INCREMENT, 
	titulo VARCHAR(50) NOT NULL,
	ibsn VARCHAR(100),
	prologo TEXT,
	imagen VARCHAR(50),
	editorial VARCHAR(20),
	anio YEAR,
	id_autor INT(10), 
	PRIMARY KEY(id),
	KEY id_autor(id_autor),
	CONSTRAINT fk_idAutor_id FOREIGN KEY (id_autor) REFERENCES autores(id)
);

* ID: INT(100)
* id_libro: INT(50)
* id_genero(5)

CREATE TABLE libros_generos(
	id INT(100) NOT NULL AUTO_INCREMENT,
	id_libro INT(50) NOT NULL,
	id_genero INT(5) NOT NULL,
	PRIMARY KEY(id),
	KEY id_libro(id_libro),
	KEY id_genero(id_genero),
	CONSTRAINT fk_idLibro_id FOREIGN KEY (id_libro) REFERENCES libros(id),
	CONSTRAINT fk_idGenero_id FOREIGN KEY (id_genero) REFERENCES generos(id)
);



SELECT * FROM generos;

SELECT * FROM generos WHERE id = 2;

SELECT * FROM generos WHERE nombre = "Accion";

SELECT * FROM generos WHERE nombre = "aCciOn";

DELETE FROM generos WHERE id = 2;

DELETE FROM generos WHERE id = 9;

DELETE FROM generos WHERE nombre = "Accion";

DELETE FROM generos;

UPDATE generos SET
	nombre = "Juego",
	descripcion = "Soy la descripcion de juego"
	WHERE id = 17	
	


INSERT INTO generos (nombre,descripcion) VALUES ("Accion", "Son genero de accion");

SQL Error [1064] [42000]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '-VALUES ("Accion", "Son genero de accion")' at line 2
SQL Error [1064] [42000]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'generos (nombre,descripcion) VALUES ("Accion", "Son genero de accion")' at line 1
SQL Error [1136] [21S01]: Column count doesnt match value count at row 1
SQL Error [1364] [HY000]: Field 'nombre' doesn't have a default value
'

INSERT INTO generos (nombre) VALUES ("Accion");

INSERT INTO generos (id,nombre) VALUES (2,"Accion");

INSERT INTO generos (nombre, descripcion) VALUES ("Policial","");

INSERT INTO generos (descripcion) VALUES ("Soy una descripcion");

INSERT INTO generos (nombre, descripcion) VALUES ("Romance","Son para los romanticos");

INSERT INTO generos (id,nombre, descripcion) VALUES (7, "Aventura","Es de accion disfrasada");

INSERT INTO generos (nombre, descripcion) VALUES ("Normal","es uno normal");

INSERT INTO generos (id,nombre, descripcion) VALUES (5, "Fantasia","Es harry potter y otros mas");

INSERT generos SET
	nombre = "Ciencia Ficcion",
	descripcion = "Extraterrestres";

INSERT INTO generos (nombre, descripcion) VALUES ("Normal","Es el mas normal de todos");

INSERT INTO generos (nombre, descripcion) VALUES ("Accion","MAs accion y todo");


INSERT INTO generos (nombre,descripcion) VALUES
	("Naturaleza","Son los que miran discovery"),
	("Futbol", "Futbol"),
	("Amor", ''),
	("Autos", NULL),
	("Terror", "Los que dan miedo");

-- Soy comentario


SELECT * FROM generos;


-- Si pongo % al principio y despues al final busca cualquier conicidencia que tenga Ac
SELECT * FROM generos WHERE nombre LIKE "%Ac%";	
	
SELECT * FROM generos WHERE nombre LIKE "%ci%";	

-- Aca empiezo la busqueda con Ac
SELECT * FROM generos WHERE nombre LIKE "Ac%";	

SELECT * FROM generos WHERE nombre LIKE "ci%";	

-- Poniendo el comodin al principio busca los textos que terminan en on
SELECT * FROM generos WHERE nombre LIKE "%on";	
	
SELECT * FROM generos WHERE nombre LIKE "%cc%on";	

SELECT * FROM generos WHERE nombre LIKE "%cia%on";

-- Buscamos por descripcion vacia
SELECT * FROM generos WHERE descripcion = "";

-- Traigo las descripciones que esta en nulo
SELECT * FROM generos WHERE descripcion IS NULL; 
-- Traigo todos los reistros que no son nulos
SELECT * FROM generos WHERE descripcion IS NOT NULL;

-- Traigo los registros distintos a vacio
SELECT * FROM generos WHERE descripcion != "";
SELECT * FROM generos WHERE descripcion <> "";

-- Traigo todos los generos que el nombre tenga al menos una o y la descripcion sea no sea vacia
SELECT * FROM generos WHERE nombre LIKE ("%o%") AND descripcion <> "";

-- Busco por una lista
SELECT * FROM generos WHERE nombre IN ('Accion', 'Ficcion', 'Romance', 'Comedia', 'Drama');
-- Busco todo lo que no estan en esa lista
SELECT * FROM generos WHERE nombre NOT IN ('Accion', 'Ficcion', 'Romance', 'Comedia', 'Drama');

-- Incluimos generos por nombre
SELECT * FROM generos WHERE nombre = "Accion" OR nombre = "Ficcion" OR nombre = "Romance" 
			OR nombre = "Comedia" OR nombre = "Drama";
		
-- Excluimos los generos por nombre
SELECT * FROM generos WHERE nombre != "Accion" AND nombre != "Ficcion" AND nombre != "Romance" 
			AND nombre != "Comedia" AND nombre != "Drama";

-- Traigo todos los generos que son mayores a 10
SELECT * FROM generos WHERE id >10;
-- Traigo todos los generos que son mayores e iguales a 10 
SELECT * FROM generos WHERE id >= 10;
-- Traigo todos los generos que son menores a 10
SELECT * FROM generos WHERE id < 10;
-- Traigo todos los generos que son menores e iguales a 10 
SELECT * FROM generos WHERE id <= 10;
-- Traigo todos lo generos que son mayores a 5 y menores a 10
SELECT * FROM generos WHERE id > 5 AND id < 11;
-- Traigo todos los generos que estan entre el 5 y el 10 incluyendolos 
SELECT * FROM generos WHERE id BETWEEN 5 AND 10;


-- Traemos los nombre de los generos
SELECT nombre FROM generos;
-- Traemos nombre y la descripcion de los generos
SELECT nombre,descripcion FROM generos;
-- Traemos nombre,id,descripcion de los generos
SELECT nombre,id,descripcion FROM generos;

-- Aca agregamos una alias al id de la tabla y lo llamamos numero_genero
-- * El alias me permite renombrar la tabla o campo a mi gusto
SELECT nombre, id AS numero_genero, descripcion FROM generos;
-- Realizamos el orden en la tabla
SELECT nombre, id AS numero_genero, descripcion FROM generos ORDER BY nombre;
-- Realizamos el orden Decendente
SELECT nombre, id AS numero_genero, descripcion FROM generos ORDER BY nombre DESC;
-- Realizamos el orden acendente
SELECT nombre, id AS numero_genero, descripcion FROM generos ORDER BY nombre ASC;
-- Realizamos orden acendete para nombre y decendente para el id
SELECT nombre, id AS numero_genero, descripcion FROM generos ORDER BY nombre ASC, id DESC;


SELECT * FROM generos g LIMIT 5;

SELECT nombre, id AS numero_genero, descripcion FROM generos ORDER BY nombre ASC, id DESC LIMIT 5;

SELECT nombre, id AS numero_genero, descripcion FROM generos ORDER BY nombre ASC, id DESC LIMIT 5;


SELECT nombre, id AS numero_genero, descripcion 
	FROM generos 
	WHERE descripcion <> ""
	ORDER BY nombre ASC, id DESC 
	LIMIT 5;

-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

SELECT * FROM autores;

INSERT INTO autores (nombre,nacionalidad,fechaNacimiento,fechaMuerte)
	VALUES 
	("Damian", "UYU", "1987-10-09",NULL),
	("Sergio", "ARA", "1957-01-03","1999-02-03"),
	("Antonella", "ITA", "1950-05-30","1990-08-30"),
	("Joaquin", "UYU", "1990-10-09",NULL),
	("Marcelo", "ARA", "1987-11-09",NULL),
	("Sofia", "UYU", "1987-05-22",NULL),
	("Graciela", "UYU", "1987-10-09",NULL),
	("Maria", "ARA", "1800-10-12","1850-11-15"),
	("Soledad", "UYU", "1960-10-09","1990-12-09");

SELECT * FROM libros ;

	INSERT libros SET
		titulo = "Campeones de america y el mundo",
		ibsn = "45613545",
		prologo = "libro de la seleccion uruguaya",
		imagen = "foto.jpg",
		editorial = "Amiga",
		anio = "2015",
		id_autor = 1;

	INSERT libros SET
		titulo = "Soy celeste",
		ibsn = "45613545",
		prologo = "Libros futbol para todos el mundo",
		imagen = "foto.jpg",
		editorial = "Santillana",
		anio = "2016",
		id_autor = 5;

	INSERT libros SET
		titulo = "Oceanos Profundos",
		ibsn = "5478789123",
		prologo = "Explora los fondos de los oceanos",
		imagen = "foto.jpg",
		editorial = "Mar",
		anio = "1990";
	
	INSERT libros SET
		titulo = "Selvas peligrosas",
		ibsn = "5566623",
		prologo = "Viaje a las selvas mas salvajes",
		imagen = "foto.jpg",
		editorial = "Mar",
		anio = "1977",
		id_autor = "6";
	
	QL Error [1452] [23000]: Cannot add or update a child row: a foreign key constraint 
	fails (`curso_2172`.`libros`, CONSTRAINT `fk_idAutor_id` FOREIGN KEY (`id_autor`) 
	REFERENCES `autores` (`id`))
	
	SELECT * FROM autores a ;

	SELECT * FROM autores WHERE fechaNacimiento >= "1980-01-01";	
	-- Contamos el total de registros que hay ne la tabla
	SELECT count(*) FROM autores;
	-- Contamos el total de registros que hay en la tabla y le agregamos un alias
	SELECT count(*) AS total FROM autores;
	-- Traemos el numero maximo del campo id de la tabla
	SELECT max(id) AS numeroMaximo FROM autores;
	-- traemos el numero minimo de la tabla
	SELECT min(id) AS numeroMinimo FROM autores;
	-- Agrupamos por nacionalidades y las devolvemos 
	SELECT nacionalidad FROM autores a GROUP BY nacionalidad;
	-- Realizamos una agrupacion por nacionalidad, las contamos, y sacamos el id maximo del autor para esa nacionalidad
	SELECT count(nacionalidad) AS total, nacionalidad,max(id) AS numeroMaximo 
			FROM autores a GROUP BY nacionalidad;

	-- 1987-10-09 convertimos en 09/10/1987	
	-- Y Año de 4 digitos 
	-- m indica el mes
	-- d indica el dia	
	SELECT id,nombre, nacionalidad, date_format(fechaNacimiento, "%d/%m/%Y")  FROM autores a ;	








		
		
		
		
		
		
		
		




























