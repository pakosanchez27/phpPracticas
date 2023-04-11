-- Tabla para el login

CREATE TABLE usuarios (
  id INT NOT NULL AUTO_INCREMENT,
  correo VARCHAR(255) NOT NULL,
  contrasena VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

-- Tabla de registro
CREATE TABLE formulario (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  sexo VARCHAR(20) NOT NULL,
  carrera VARCHAR(100) NOT NULL
);