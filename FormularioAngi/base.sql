CREATE TABLE registros (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  fecha DATE NOT NULL,
  email VARCHAR(50) NOT NULL,
  sexo VARCHAR(10) NOT NULL,
  plan VARCHAR(20) NOT NULL
);