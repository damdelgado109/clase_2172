
	CREATE TABLE `clientes` (
	  id INT(10) NOT NULL AUTO_INCREMENT,
	  nombre VARCHAR(50) NOT NULL,
	  apellido VARCHAR(50) NOT NULL,
	  telefono VARCHAR(10),
	  mail VARCHAR(100),
	  estado ENUM("Activado","Desactivado","Borrado"),
	  PRIMARY KEY (id)
	)

	SHOW tables;


	CREATE TABLE facturas (
	  id int(100) NOT NULL AUTO_INCREMENT,
	  id_cliente int(10) NOT NULL,
	  fecha DATETIME NOT NULL,
	  PRIMARY KEY (id),
	  KEY id_cliente (id_cliente),
	  CONSTRAINT fk_cliente_id FOREIGN KEY (id_cliente) REFERENCES clientes (id)
	);

	CREATE TABLE factura_libro (
	  id BIGINT(100) NOT NULL AUTO_INCREMENT,
	  id_factura INT(10) NOT NULL,
	  id_libro INT(50) NOT NULL,
	  PRIMARY KEY (id),
	  KEY id_factura (id_factura),
	  KEY id_libro (id_libro),
	  CONSTRAINT fk_factura_id FOREIGN KEY (id_factura) REFERENCES facturas (id),
	  CONSTRAINT fk_libro_id FOREIGN KEY (id_libro) REFERENCES libros (id)
  );

 	ALTER TABLE libros ADD precio INT(6);
 
  	ALTER TABLE libros DROP COLUMN precio;
 
	ALTER TABLE libros ADD precio int(6) AFTER ibsn;
	
	SELECT NOW();

	INSERT INTO facturas SET 
		id_cliente = 1,
		fecha = NOW();
	
	SELECT * FROM facturas;
	
	SELECT id,precio FROM libros;
	1	100
	3	200
	4	150
	5	300
	6	210
	7	160

	SELECT * FROM factura_libro;

	ALTER TABLE factura_libro ADD precio int(6);

	INSERT INTO factura_libro SET 
		id_factura = 5,
		id_libro = 3,
		precio = 180;

	
		SELECT 	fl.id_factura,
				f.id_cliente,
				c.nombre AS nombreCliente ,
				fl.id_libro,
				l.titulo,
				fl.precio,
				'pesos Uruguayos' AS moneda,
				f.fecha AS fechaServidor,
				DATE_SUB(f.fecha, INTERVAL 3 HOUR) AS fechaUruguay
			FROM factura_libro fl
			INNER JOIN libros l ON l.id = fl.id_libro
			INNER JOIN facturas f ON f.id = fl.id_factura
			INNER JOIN clientes c ON c.id = f.id_cliente;
			
	
		SELECT 	fl.id_factura,
				MAX(f.id_cliente),
				MAX(c.nombre) AS nombreCliente,					
				SUM(fl.precio) AS totalVenta,
				SUM(l.precio) AS totalPosible,
				f.fecha AS fechaServidor
			FROM factura_libro fl
			INNER JOIN libros l ON l.id = fl.id_libro
			INNER JOIN facturas f ON f.id = fl.id_factura
			INNER JOIN clientes c ON c.id = f.id_cliente	
			GROUP BY fl.id_factura
			
	