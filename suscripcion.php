<?php
require_once("c://xampp/htdocs/login/config/db.php");

$db = new db();
$conn = $db->conexion(); 

$sql = "SELECT nombre, descripcion, imagen, precio FROM productos";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripción</title>
    <link rel="stylesheet" href="/login/view/home/estilos.css">
</head>
<body>
<a href="/login/view/home/panel_control.php" class="boton-regresar">Regresar a la Página Principal</a>
    <h1>Opciones de Suscripciones</h1>

    <div class="productos">
        <?php while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)): ?> 
            <div class="producto">
                <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                <img src="/login/<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" style="width:700px; height:600px;">
                <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                <p><strong>Precio: $<?php echo htmlspecialchars($producto['precio']); ?></strong></p>
                <form action="comprar.php" method="POST">
                    <input type="hidden" name="producto" value="<?php echo htmlspecialchars($producto['nombre']); ?>">
                    <button type="submit" class="boton-comprar">Comprar</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
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
</body>
</html>
