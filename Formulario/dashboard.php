<?php


require 'includes/funciones.php';
$auth = estaAutenticado();
$usuario = $_SESSION['usuario'];
if(!$auth){
    header('Location: /login.php');
}

// Importar la base de datos
require 'includes/config.php';



// Realizar la consulta

$query = "SELECT * from datos";

//Traer los resultados 

$resultadoConsulta  = $db->query($query);

// Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;


$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if ($id) {

    // Eliminar el archivo
    $query = "SELECT foto FROM datos WHERE id = $id";

    // echo $query;
    $resultado = $db->query($query);
    $dato = $resultado->fetch(PDO::FETCH_ASSOC);

    unlink('imagenes/' . $dato['foto']);

    // Eliminar la propiedad
    $query = "DELETE FROM datos WHERE id = $id";
    $resultado = $db->query($query);

    if ($resultado) {
        header('Location: dashboard.php?resultado=3');
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="contenedor-dash">

        <?php if (intval($resultado) === 1) : ?>
            <p class="msj exito">Usuario registrado</p>
        <?php elseif (intval($resultado) === 2) : ?>
            <p class="msj exito">Usuario Modificado</p>
        <?php elseif (intval($resultado) === 3) : ?>
            <p class="msj exito">Usuario Eliminado</p>
        <?php endif; ?>


        <header class="header">
            <div class="header__titulo">
                <h1>Dashboard</h1> <p> Hola! <?php echo $usuario ?></p>
            </div>


            <div class="header__boton">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                </svg>
                <a href="/formulario.php" class="boton">Nuevo</a>
                
            </div>
        </header>
        <hr>

        <div class="registros">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha de nacimiento</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($dato = $resultadoConsulta->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr class="registro">
                            <td><img src="imagenes/<?php echo $dato['foto']; ?>" width="50px" height="50px"></td>
                            <td><?php echo $dato['nombre'] . " ".$dato['apellido'] ?> </td>
                            <td><?php echo $dato['email']; ?></td>
                            <td><?php echo $dato['fecha']; ?></td>
                            <td class="opc ver">
                                <a href="engine.php?id=<?php echo $dato['id']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                            <td class="opc pdf">
                                <a href="reporte.php?id=<?php echo $dato['id']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="50" height="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                        <rect x="7" y="13" width="10" height="8" rx="2" />
                                    </svg>
                                </a>
                            </td>

                            <td class="opc editar">
                                <a href="actualizar.php?id=<?php echo $dato['id']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-minus" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 20l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4h4z"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                        <path d="M16 18h4"></path>
                                    </svg>
                                </a>
                            </td>

                            <td class="opc eliminar">
                                <a href="dashboard.php?id=<?php echo $dato['id']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7h16"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        <path d="M10 12l4 4m0 -4l-4 4"></path>
                                    </svg>
                                </a>
                            </td>

                        </tr>

                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
        <div class="reporte">
            <div class="btncerrar cerrar btnImprimir">
            <a href="cerrar.php">Cerrar Sesion</a>
            </div>
            <div class="btnImprimir">
                <a href="reporteG.php">Generar reporte</a>
            </div>
        </div>

    </div>
    <script src="js/admin.js"></script>
</body>

</html>