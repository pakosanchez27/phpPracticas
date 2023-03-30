<?php

$host = 'localhost'; // el servidor donde está alojada la base de datos
$dbname = 'angelica'; // el nombre de la base de datos
$username = 'root'; // el nombre de usuario de la base de datos
$password = 'root'; // la contraseña del usuario de la base de datos

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // configurar el modo de error para PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch(PDOException $e) {
    echo "Error al conectar: " . $e->getMessage();
}

?>