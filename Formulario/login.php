<?php

require 'includes/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

//    Consulta 
 
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $db->query($sql);
$dato = $result->fetch(PDO::FETCH_ASSOC);
$errores = [];

if($dato){
    if(password_verify($pass, $dato['pass'])){
        
        session_start();
                    // Llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $dato['nombre'];
                    $_SESSION['login'] = true;

                    header('Location: /dashboard.php');
    }else{
        $errores[] = 'Datos incorrectos';
    }
} else{
    $errores[] = 'Usuario no existe';
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
                        <h1 class="bienvenida__titulo">Inicia Sesión<span>.</span></h1>
                        <p>Aún no tienes cuenta? <span><a href="singup.php">Registrarse</a></span></p>
                    </div>
                    <div class="formulario-login">
                        <form id="formulario" method="POST">
                            
                          
                            <div class="input login-email">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="ej. correo@correo.com">
                            </div>
                            <div class="input login-password">
                                <label for="password">password</label>
                                <input type="password" id="password" name="pass" placeholder="******">
                            </div>        
                            
                                <div class="input crear">
                                    <input class="btnEntrar " type="submit" id="btnEntrar" value="Entrar" >
                                </div>
                                
                            
                        </form>
                         <div class="error">
                                <?php foreach ($errores as $error) : ?>
                                    <p><?php echo $error ?></p>
                                <?php endforeach ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>

</html>