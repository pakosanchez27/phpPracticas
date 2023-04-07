<?php

// function conectarDB(){
//     $db = mysqli_connect('localhost', 'root', 'root', 'formulario');

//     if (!$db) {
//         echo "Error al conectar";
//         exit;
//     }
    
//     return $db;

// }


try {
    
    $db = new PDO("oci:dbname=//localhost:1521/XE", "HR", "HR");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

} catch(PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

?>
