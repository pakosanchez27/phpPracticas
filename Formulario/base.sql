-- Tabla de registros
create table datos(
	id int(11) not null auto_increment primary key,
	nombre varchar(50) not null,
      apellido varchar(50) not null,
	email varchar(50),
	sexo varchar(10) not null,
	fecha date not null,
	carrera varchar(50) not null,
	conocimiento varchar(255) not null,
	foto varchar(50),
	comentario text

); 

-- Tabla de login

create table login (
    id_user int(11) not null auto_increment primary key,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    email varchar(50),
    password varchar(255) not null,
);


-- oracle
CREATE SEQUENCE mi_secuencia START WITH 1 INCREMENT BY 1;

CREATE TABLE datos(
	id integer not null primary key,
	nombre VARCHAR(50) not null,
    apellido varchar(50) not null,
	email varchar(50),
	sexo varchar(10) not null,
	fecha date not null,
	carrera varchar(50) not null,
	conocimiento varchar(255) not null,
	foto varchar(50),
	comentario varchar(255)

); 


CREATE TRIGGER mi_disparador
BEFORE INSERT ON datos
FOR EACH ROW
BEGIN
  SELECT mi_secuencia.NEXTVAL INTO :new.id FROM datos;
END;


-- Tabla usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    email VARCHAR(100),
    pass VARCHAR(100)
);