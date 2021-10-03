create database examen;
drop database examen;
create table empleado(
  id_emp int(10) AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(30),
  paterno varchar(30),
  materno varchar(30),
  tipo varchar(30)
);
create table docente(
  id_emp int not null,
  pagoHora int,
  PRIMARY KEY(id_emp),
  FOREIGN KEY(id_emp) REFERENCES Empleado(id_emp)
);
create table administrativo(
  id_emp int not null,
  cargo varchar(50),
  PRIMARY KEY(id_emp),
  FOREIGN KEY(id_emp) REFERENCES Empleado(id_emp)
);

INSERT INTO empleado(nombre,paterno,materno,tipo)values("Richard","Parada","Claure","Administrativo");
INSERT INTO empleado(nombre,paterno,materno,tipo)values("Manuel","Hinojosa","Barreras","Docente");
INSERT INTO docente(id_emp,pagoHora)values(1,8000);
INSERT INTO administrativo(id_emp,cargo)values(2,"Administrador");
select max(id_emp) from empleado;
-- Consultar empleado administrativo
select empleado.id_emp, nombre, paterno, materno, cargo
from empleado
INNER JOIN administrativo
ON empleado.id_emp = administrativo.id_emp;

-- Consultar empleado docente
select empleado.id_emp, nombre, paterno, materno, pagoHora
from empleado
INNER JOIN docente
ON empleado.id_emp = docente.id_emp;

select empleado.id_emp, nombre, paterno, materno, cargo, pagoHora
from empleado
INNER JOIN administrativo
ON empleado.id_emp = administrativo.id_emp
INNER JOIN docente
ON empleado.id_emp = docente.id_emp;

  -- Intentando mostar todo en una sola consulta
select em.id_emp, nombre, paterno, materno,tipo, cargo, pagoHora
from administrativo as ad,docente as doc,empleado as em
where em.id_emp = ad.id_emp and em.id_emp=doc.id_emp;