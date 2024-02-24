Lo único que me falto fue el edit, tuve unas complicaciones con el internet y no tuve el tiempo suficiente de completar esa parte de la evaluación


-- start database
use laravelcrud;
insert into clientes (nombreCliente) values ('Soriana');
insert into clientes (nombreCliente) values ('HEB');
insert into vendedores (nombreVendedor) values ('Luis');
insert into vendedores (nombreVendedor) values ('Jorge');
insert into categorias (nombreCategoria) values ('Deportes');
insert into categorias (nombreCategoria) values ('Laravel Development');
insert into productos (nombreProducto,precioProducto) values ('Libro de Programación',100.00);
insert into productos (nombreProducto,precioProducto) values ('Raqueta de tenis',250.00);

select * from clientes;
select * from vendedores;
select * from categorias;
select * from productos;
select * from ventas;

update categorias set nombreCategoria = 'Desarrollo de personaje' where idCategoria=3;

update categorias set nombreCategoria = 'Limpieza' where idCategoria=4;
