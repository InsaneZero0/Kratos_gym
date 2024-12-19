<?php
require_once("c://xampp/htdocs/login/controller/homeController.php");
require_once("c://xampp/htdocs/login/vendor/autoload.php");  // Cargar automáticamente las dependencias instaladas con Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$obj = new homeController();

$correo = $_POST['correo'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';
$confirmarContraseña = $_POST['confirmarContraseña'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$domicilio = $_POST['domicilio'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$codigo_postal = $_POST['codigo_postal'] ?? '';
$genero = $_POST['genero'] ?? '';

$error = "";
if (empty($correo) || empty($contraseña) || empty($confirmarContraseña) || empty($nombre) || empty($apellidos) || empty($domicilio) || empty($telefono) || empty($codigo_postal) || empty($genero)) {
    $error .= "<li>Completa todos los campos</li>";
    header("Location:signup.php?error=" . urlencode($error) . "&correo=" . urlencode($correo) . "&nombre=" . urlencode($nombre) . "&apellidos=" . urlencode($apellidos) . "&domicilio=" . urlencode($domicilio) . "&telefono=" . urlencode($telefono) . "&codigo_postal=" . urlencode($codigo_postal) . "&genero=" . urlencode($genero));
    exit();
} 

if ($contraseña !== $confirmarContraseña) {
    $error = "<li>Las contraseñas son diferentes</li>";
    header("Location:signup.php?error=" . urlencode($error) . "&correo=" . urlencode($correo) . "&nombre=" . urlencode($nombre) . "&apellidos=" . urlencode($apellidos) . "&domicilio=" . urlencode($domicilio) . "&telefono=" . urlencode($telefono) . "&codigo_postal=" . urlencode($codigo_postal) . "&genero=" . urlencode($genero));
    exit();
}

if ($obj->correoExiste($correo)) {
    $error = "<li>El correo ya está registrado</li>";
    header("Location:signup.php?error=" . urlencode($error) . "&correo=" . urlencode($correo) . "&nombre=" . urlencode($nombre) . "&apellidos=" . urlencode($apellidos) . "&domicilio=" . urlencode($domicilio) . "&telefono=" . urlencode($telefono) . "&codigo_postal=" . urlencode($codigo_postal) . "&genero=" . urlencode($genero));
    exit();
}

$resultado = $obj->guardarUsuario($correo, $contraseña, $nombre, $apellidos, $domicilio, $telefono, $codigo_postal, $genero);
if ($resultado === false) {
    $error = "<li>Error al registrar usuario</li>";
    header("Location:signup.php?error=" . urlencode($error) . "&correo=" . urlencode($correo) . "&nombre=" . urlencode($nombre) . "&apellidos=" . urlencode($apellidos) . "&domicilio=" . urlencode($domicilio) . "&telefono=" . urlencode($telefono) . "&codigo_postal=" . urlencode($codigo_postal) . "&genero=" . urlencode($genero));
    exit();
}

// Enviar correo de confirmación
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Servidor SMTP de Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'zamorachapa50@gmail.com';  // Tu dirección de correo electrónico de Gmail
    $mail->Password = 'ieoejsemwvvuzloa';  // La contraseña de tu cuenta de Gmail
    $mail->SMTPSecure = 'tls';  // Usa TLS
    $mail->Port = 587;  // El puerto para TLS

    // Destinatarios
    $mail->setFrom('zamorachapa50@gmail.com', 'Kratos Gym');  // Remitente del correo
    $mail->addAddress($correo, $nombre);  // Añadir el destinatario

    // Contenido del correo
    $mail->isHTML(true);  // Configurar el formato del correo en HTML
    $mail->Subject = 'Confirmación de Registro';
    $mail->Body    = 'Hola ' . $nombre . ',<br><br>Gracias por registrarte en Kratos Gym. Haz clic en el siguiente enlace para confirmar tu correo electrónico:<br><br><a href="http://localhost/login/view/home/confirmar.php?email=' . $correo . '">Confirmar Correo Electrónico</a><br><br>Gracias,<br>Kratos Gym';

    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
}

header("Location:login.php");
exit();
?>
