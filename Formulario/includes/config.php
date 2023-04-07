<?php

// function conectarDB(){
//     $db = mysqli_connect('localhost', 'root', 'root', 'formulario');

//     if (!$db) {
//         echo "Error al conectar";
//         exit;
//     }
    
//     return $db;

// }


// try {
    
//     $db = new PDO("oci:dbname=//localhost:1521/XE", "HR", "HR");
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

// } catch(PDOException $e) {
//     echo "Error al conectar a la base de datos: " . $e->getMessage();
// }


$host = 'localhost'; // el servidor donde está alojada la base de datos
$dbname = 'formulario'; // el nombre de la base de datos
$username = 'root'; // el nombre de usuario de la base de datos
$password = 'root'; // la contraseña del usuario de la base de datos

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // configurar el modo de error para PDO
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch(PDOException $e) {
    echo "Error al conectar: " . $e->getMessage();
}

?>
