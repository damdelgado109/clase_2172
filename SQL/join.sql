
	use curso_2172;

	SHOW tables;
	
	SHOW CREATE TABLE libros_generos;

	CREATE TABLE `libros_generos` (
	  `id` int(100) NOT NULL AUTO_INCREMENT,
	  `id_libro` int(50) NOT NULL,
	  `id_genero` int(5) NOT NULL,
	  PRIMARY KEY (`id`),
	  KEY `id_libro` (`id_libro`),
	  KEY `id_genero` (`id_genero`),
	  CONSTRAINT `fk_idGenero_id` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
	  CONSTRAINT `fk_idLibro_id` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`)
	)

	SELECT * FROM generos g ;
	
	3	Policial
	4	Romance
	5	Fantasia
	7	Aventura
	8	Normal
	10	Ciencia Ficcion
	11	Naturaleza
	12	Futbol
	13	Amor
	14	Autos
	15	Terror
	17	Juego
	18	Normal
	19	Accion
	
	SELECT * FROM libros l WHERE l.id = 1;

1	Campeones de america y el mundo
3	Soy celeste
4	Oceanos Profundos
5	Selvas peligrosas
6	Selvas Del Norte
7	Selvas Del Sur

	SELECT * FROM libros_generos lg ;	

	INSERT INTO libros_generos (id_libro, id_genero) VALUES (1,3);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (1,12);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (1,15);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (1,18);
	
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (3,3);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (3,19);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (3,8);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (3,7);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (3,4);

	INSERT INTO libros_generos (id_libro, id_genero) VALUES (4,10);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (4,11);

	INSERT INTO libros_generos (id_libro, id_genero) VALUES (5,3);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (5,19);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (5,8);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (5,7);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (5,4);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (5,10);
	INSERT INTO libros_generos (id_libro, id_genero) VALUES (5,11);

	SELECT * FROM 	libros_generos;

    -- Consulta Magica
	SELECT 	lg.id_genero,
			a.nacionalidad, 	
			count(lg.id) AS totalRegistro,
			max(lg.id_libro) AS libroMaximo,
			min(lg.id_libro) AS libroMinimo,
			max(lg.id) AS idRegistoMax
		FROM libros_generos lg  
		INNER JOIN libros l ON l.id = lg.id_libro
		INNER JOIN autores a ON a.id = l.id_autor 
		GROUP BY lg.id_genero, a.nacionalidad  


		SELECT * FROM libros_generos WHERE id_genero = 3;
		1,3,5		
		SELECT * FROM libros l WHERE id IN (1,3,5);
		1,5,6		
		SELECT * FROM autores a WHERE id IN (1,5,6);


		SELECT * 
			FROM libros l
			INNER JOIN autores a ON a.id = l.id_autor
			WHERE a.nacionalidad = "ARA";  	
			
		
		SELECT * 
			FROM libros
			WHERE id_autor IN (SELECT id FROM autores WHERE nacionalidad = "ARA");
		
		
		
		
		SELECT * FROM autores WHERE nacionalidad = "ARA";
	
	
	
	
	

