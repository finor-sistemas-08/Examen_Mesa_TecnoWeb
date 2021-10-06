create database examen;
drop database examen;
use examen;
create table categoria(
id_categoria int(10) AUTO_INCREMENT PRIMARY KEY,
nombre varchar(30)
);

create table producto(
id_producto int(10) AUTO_INCREMENT PRIMARY KEY,
descripcion varchar(20) not null,
precio float,
id_categoria int(10) not null,
foreign key(id_categoria) references categoria(id_categoria)
);




