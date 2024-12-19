<?php
require_once("c://xampp/htdocs/login/controller/homeController.php");
session_start();

// Verificar si el usuario está logueado
if (empty($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$obj = new homeController();
$correo = $_SESSION['usuario'];

// Obtener la información del usuario desde la base de datos
$usuario = $obj->obtenerInformacionUsuario($correo);

if (!$usuario) {
    echo "No se pudo obtener la información del perfil.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <style>
        /* Estilo básico para el botón */
        .boton-regresar {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .boton-regresar:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Perfil de Usuario</h1>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
    <p><strong>Apellidos:</strong> <?php echo htmlspecialchars($usuario['apellidos']); ?></p>
    <p><strong>Domicilio:</strong> <?php echo htmlspecialchars($usuario['domicilio']); ?></p>
    <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($usuario['telefono']); ?></p>
    <p><strong>Código Postal:</strong> <?php echo htmlspecialchars($usuario['codigo_postal']); ?></p>
    <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>

    <!-- Botón para regresar a la página principal -->
    <a href="/login/view/home/panel_control.php" class="boton-regresar">Regresar a la Página Principal</a>
</body>
</html>


