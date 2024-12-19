<?php
require_once("c://xampp/htdocs/login/controller/homeController.php");
$obj = new homeController();

$correo = $_GET['email'] ?? '';

if ($obj->confirmarCorreo($correo)) {
    echo 'Correo confirmado correctamente. Ahora puedes iniciar sesión.';
} else {
    echo 'Error al confirmar el correo.';
}
?>
