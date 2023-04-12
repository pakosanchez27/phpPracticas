<?php

require 'includes/config.php';


// Arreglo de errores
$errores = [];

$nombre = '';
$apellido = '';
$email = '';
$pass = '' ;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    
    // enciptamos el password 
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    

    // Verificar si el correo ya existe
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $consulta = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

    if ($email == $consulta['email'] ) {
        $errores[] = 'Ya hay una cuenta con este email';
    }
    // Verificar si los campos estan vacios
    if (!$nombre ) {
        $errores[] = 'Ningun campo debe estar vacio';
    }
    

    //cosas cuando ya no hay errores

    if (empty($errores)) {
        // la consulta de inserccion

        $query = "INSERT INTO usuarios (nombre, apellido, email, pass) VALUES ('$nombre', '$apellido', '$email', '$hash')";
        $insertar = $db->query($query);

        if ($insertar){
            header("location: /login.php");
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/admin.css">

    <title>Sign up</title>
</head>

<body>
    <div class="principal">
        <div class="card">
            <div class="hero"></div>
            <div class="contenido">
                <div class="navegacion">
                    <div class="logo">
                        <img src="src/img/logo.png" alt="logo" class="imagen">
                        <p class="logo-nombre">CleanKode<span>®</span></p>
                    </div>
                    <div class="enlaces">

                    </div>

                </div>
                <div class="registro">
                    <div class="bienvenida">
                        <h1 class="bienvenida__titulo">Crea una cuenta nueva<span>.</span></h1>
                        <p>Ya tienes cuenta? <span><a href="login.php">Inciar Sesión</a></span></p>
                    </div>
                    <div class="formulario">
                        <form id="formulario" method="POST" action="singup.php">

                            <div class="input nombre">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" placeholder="ej. Montserrat">
                            </div>

                            <div class="input apellido">
                                <label for="apellido">Apellido</label>
                                <input type="text" id="apellido" name="apellido" placeholder="ej. Ramirez">
                            </div>
                            <div class="input email">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="ej. correo@correo.com">
                            </div>
                            <div class="input password">
                                <label for="password">password</label>
                                <input type="password" id="pass" name="pass" placeholder="******">
                            </div>

                            <div class="input crear">
                                <input class="btnCrear " type="submit" id="btnCrear" value="Crear Cuenta">
                            </div>
                            <div class="input limpiar">
                                <input class="btnlimpiar" type="submit" id="limpiar" value="Limpiar">
                            </div>
                            <div class="error">
                                <?php foreach ($errores as $error) : ?>
                                    <p><?php echo $error ?></p>
                                <?php endforeach ?>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>

</html>