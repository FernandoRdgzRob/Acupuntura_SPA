DROP DATABASE usuario7;

CREATE DATABASE usuario7;

USE usuario7;

CREATE TABLE info_marca(id_marca INT AUTO_INCREMENT NOT NULL, nombre_marca VARCHAR(50) NOT NULL, PRIMARY KEY(id_marca));

CREATE TABLE info_proveedor(id_proveedor INT AUTO_INCREMENT NOT NULL, nombre_proveedor VARCHAR(50) NOT NULL, direccion_proveedor VARCHAR(200), PRIMARY KEY(id_proveedor));

CREATE TABLE info_principio_activo(id_principio INT AUTO_INCREMENT NOT NULL, nombre_sustancia VARCHAR(50) NOT NULL, uso_principio VARCHAR(200), PRIMARY KEY(id_principio));

CREATE TABLE info_producto(id_producto INT AUTO_INCREMENT NOT NULL, nombre_producto VARCHAR(50) NOT NULL, id_marca INT NOT NULL, cantidad_existencia INT, presentacion VARCHAR(50), uso_producto VARCHAR(200), precio_venta DECIMAL(6,2) NOT NULL, id_proveedor INT NOT NULL, observaciones VARCHAR(200), PRIMARY KEY(id_producto), FOREIGN KEY(id_marca) REFERENCES info_marca(id_marca) ON DELETE RESTRICT ON UPDATE CASCADE, FOREIGN KEY(id_proveedor) REFERENCES info_proveedor(id_proveedor) ON DELETE RESTRICT ON UPDATE CASCADE);

CREATE TABLE detalles_producto(id_detalles_prod INT AUTO_INCREMENT NOT NULL, id_producto INT NOT NULL, piso INT NOT NULL, ubicacion VARCHAR(200) NOT NULL, precio_compra DECIMAL(6,2), fecha_compra DATE NOT NULL, fecha_caducidad DATE, vendido BOOLEAN NOT NULL, PRIMARY KEY(id_detalles_prod), FOREIGN KEY(id_producto) REFERENCES info_producto(id_producto) ON DELETE RESTRICT ON UPDATE CASCADE);

CREATE TABLE lista_principios(id_producto INT NOT NULL, id_principio INT NOT NULL, PRIMARY KEY(id_producto, id_principio), FOREIGN KEY(id_producto) REFERENCES info_producto(id_producto) ON DELETE RESTRICT ON UPDATE CASCADE, FOREIGN KEY(id_principio) REFERENCES info_principio_activo(id_principio) ON DELETE RESTRICT ON UPDATE CASCADE);

CREATE TABLE info_venta(id_venta INT AUTO_INCREMENT NOT NULL, fecha_venta DATE NOT NULL, total_venta DECIMAL(6,2), PRIMARY KEY(id_venta));

CREATE TABLE detalles_venta(id_venta INT NOT NULL, id_detalles_prod INT NOT NULL, PRIMARY KEY(id_venta, id_detalles_prod), FOREIGN KEY(id_venta) REFERENCES info_venta(id_venta) ON DELETE RESTRICT ON UPDATE CASCADE, FOREIGN KEY(id_detalles_prod) REFERENCES detalles_producto(id_detalles_prod) ON DELETE RESTRICT ON UPDATE CASCADE);

create table usuarios (id_usuarios INT AUTO_INCREMENT NOT NULL, nombre_usuario varchar(100) NOT NULL, password varchar(30) NOT NULL, tipo_usuario varchar(50) NOT NULL, PRIMARY KEY(id_usuarios)); 

INSERT INTO info_proveedor(nombre_proveedor, direccion_proveedor) VALUES("PMFARMA", "Polanco, Ciudad de México");
INSERT INTO info_proveedor(nombre_proveedor, direccion_proveedor) VALUES("Takeda", "Calle 11 Sur, Puebla");
INSERT INTO info_proveedor(nombre_proveedor, direccion_proveedor) VALUES("PROLAB", "Av. 43 Pte., Puebla");
INSERT INTO info_proveedor(nombre_proveedor, direccion_proveedor) VALUES("Medix", "Av. de la Reforma, Puebla");

INSERT INTO info_marca(nombre_marca) VALUES("P&G");
INSERT INTO info_marca(nombre_marca) VALUES("Bayer");
INSERT INTO info_marca(nombre_marca) VALUES("PiSA");
INSERT INTO info_marca(nombre_marca) VALUES("Pfizer");
INSERT INTO info_marca(nombre_marca) VALUES("Genomma Lab");
INSERT INTO info_marca(nombre_marca) VALUES("RB");

INSERT INTO info_principio_activo(nombre_sustancia, uso_principio) VALUES("Paracetamol", "Fármaco con propiedades analgésicas y antipiréticas utilizado principalmente para tratar la fiebre y el resfriado");
INSERT INTO info_principio_activo(nombre_sustancia, uso_principio) VALUES("Nimesulida", "Está indicado como coadyuvante para el alivio de la inflamación, dolor y fiebre producida por infecciones agudas de las vías respiratorias superiores.");
INSERT INTO info_principio_activo(nombre_sustancia, uso_principio) VALUES("Naproxeno", "Producto auxiliar en el tratamiento antiinflamatorio de torceduras, distensiones y otros traumatismos menores en tejidos blandos.");
INSERT INTO info_principio_activo(nombre_sustancia, uso_principio) VALUES("Ácido acetilsalicílico", "Está indicado como antipirético y como antiagregante plaquetario.");
INSERT INTO info_principio_activo(nombre_sustancia, uso_principio) VALUES("Fenilefrina", "Usado principalmente como descongestivo y como un agente para dilatar la pupila e incrementar la presión arterial.");

INSERT INTO info_producto(nombre_producto, id_marca, presentacion, uso_producto, precio_venta, id_proveedor, cantidad_existencia) VALUES("XL3", (SELECT id_marca FROM info_marca WHERE id_marca=5), "Caja con 12 cápsulas", "Síntomas de procesos gripales o catarrales", 49.90, (SELECT id_proveedor FROM info_proveedor WHERE id_proveedor=1), 0);
INSERT INTO info_producto(nombre_producto, id_marca, presentacion, uso_producto, precio_venta, id_proveedor, cantidad_existencia) VALUES("Flanax", (SELECT id_marca FROM info_marca WHERE id_marca=2), "Caja con 12 cápsulas", "Producto auxiliar en el tratamiento antiinflamatorio de torceduras, distensiones y otros traumatismos menores en tejidos blandos.", 157.00, (SELECT id_proveedor FROM info_proveedor WHERE id_proveedor=2), 0);
INSERT INTO info_producto(nombre_producto, id_marca, presentacion, uso_producto, precio_venta, id_proveedor, cantidad_existencia) VALUES("Tempra", (SELECT id_marca FROM info_marca WHERE id_marca=6), "Caja con 20 tabletas", "Analgésico antipirético que alivia el dolor y fiebre, así como algunas molestias relacionadas con catarro.", 79.90, (SELECT id_proveedor FROM info_proveedor WHERE id_proveedor=4), 0);

INSERT INTO detalles_producto(id_producto, ubicacion, piso, vendido, precio_compra, fecha_caducidad, fecha_compra) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=1), "Vitrina principal", 1, FALSE, 36.00, "2021-04-01", "2018-06-08");
INSERT INTO detalles_producto(id_producto, ubicacion, piso, vendido, precio_compra, fecha_caducidad, fecha_compra) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=2), "Vitrina principal", 1, FALSE, 99.00, "2022-07-10", "2018-08-14");
INSERT INTO detalles_producto(id_producto, ubicacion, piso, vendido, precio_compra, fecha_caducidad, fecha_compra) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=1), "Estante 1", 2, FALSE, 34.00, "2022-04-01", "2019-01-09");
INSERT INTO detalles_producto(id_producto, ubicacion, piso, vendido, precio_compra, fecha_caducidad, fecha_compra) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=1), "Estante 2", 3, FALSE, 33.50, "2023-03-02", "2019-02-03");
INSERT INTO detalles_producto(id_producto, ubicacion, piso, vendido, precio_compra, fecha_caducidad, fecha_compra) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=2), "Vitrina principal", 1, FALSE, 99.00, "2023-06-06", "2018-07-20");
INSERT INTO detalles_producto(id_producto, ubicacion, piso, vendido, precio_compra, fecha_caducidad, fecha_compra) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=3), "Estante 2", 3, FALSE, 54.50, "2024-02-01", "2019-01-24");

UPDATE info_producto SET cantidad_existencia = (SELECT SUM(NOT vendido) FROM detalles_producto WHERE id_producto = 1) WHERE id_producto = 1;
UPDATE info_producto SET cantidad_existencia = (SELECT SUM(NOT vendido) FROM detalles_producto WHERE id_producto = 2) WHERE id_producto = 2;
UPDATE info_producto SET cantidad_existencia = (SELECT SUM(NOT vendido) FROM detalles_producto WHERE id_producto = 3) WHERE id_producto = 3;

INSERT INTO lista_principios(id_producto, id_principio) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=1), (SELECT id_principio FROM info_principio_activo WHERE id_principio=1));

INSERT INTO lista_principios(id_producto, id_principio) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=1), (SELECT id_principio FROM info_principio_activo WHERE id_principio=5));

INSERT INTO lista_principios(id_producto, id_principio) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=2), (SELECT id_principio FROM info_principio_activo WHERE id_principio=3));

INSERT INTO lista_principios(id_producto, id_principio) VALUES((SELECT id_producto FROM info_producto WHERE id_producto=3), (SELECT id_principio FROM info_principio_activo WHERE id_principio=1));

/* Transacción para venta */
INSERT INTO info_venta(fecha_venta) VALUES("2019-05-09");

INSERT INTO detalles_venta(id_venta, id_detalles_prod) VALUES ((SELECT id_venta FROM info_venta WHERE id_venta=1), (SELECT id_detalles_prod FROM detalles_producto WHERE id_detalles_prod=1));
UPDATE detalles_producto SET vendido = TRUE WHERE id_detalles_prod= 1;

UPDATE info_producto SET cantidad_existencia = (SELECT SUM(NOT vendido) FROM detalles_producto WHERE id_producto = 1) WHERE id_producto = 1;


INSERT INTO detalles_venta(id_venta, id_detalles_prod) VALUES ((SELECT id_venta FROM info_venta WHERE id_venta=1), (SELECT id_detalles_prod FROM detalles_producto WHERE id_detalles_prod=2));
UPDATE detalles_producto SET vendido = TRUE WHERE id_detalles_prod= 2;

UPDATE info_producto SET cantidad_existencia = (SELECT SUM(NOT vendido) FROM detalles_producto WHERE id_producto = 2) WHERE id_producto = 2;



UPDATE info_venta SET total_venta=(SELECT SUM(precio_venta) FROM info_producto INNER JOIN detalles_producto ON info_producto.id_producto = detalles_producto.id_producto INNER JOIN detalles_venta ON detalles_producto.id_detalles_prod = detalles_venta.id_detalles_prod WHERE id_venta = 1) WHERE id_venta=1;
/* Termina transacción para venta */

