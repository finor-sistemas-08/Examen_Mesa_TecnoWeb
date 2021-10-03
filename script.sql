create database examen;
drop database examen;
use examen;
create table empleado(
  id_emp int(10) AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(30) NOT NULL,
  paterno varchar(30) NOT NULL,
  materno varchar(30),
  pagoHora int,
  cargo varchar(50),
  tipoD int(1) NOT NULL,
  tipoA int(1) NOT NULL
);

-- Consultas
INSERT INTO empleado(nombre,paterno,materno,pagoHora,cargo,tipoD,tipoA)values("Richard","Parada","Claure",70,"",1,0);
select *from empleado;
--Obtener el último ID de la tabla Empleado
select max(id_emp) from empleado;