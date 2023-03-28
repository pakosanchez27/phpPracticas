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