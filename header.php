<?php
    require_once("c://xampp/htdocs/login/view/head/head.php");
?>



<div class="fondo_menu">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <?php if(empty($_SESSION['usuario'])): ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Precios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contactanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login/view/home/perfil.php">Mi Perfil</a> <!-- Usa la ruta absoluta -->
                        </li>

                    </ul>
                    <a href="/login/view/home/login.php" class="boton">Iniciar Sesión</a>
                    <a href="/login/view/home/signup.php" class="boton">Regístrate</a>

                </div>

                
                <?php else: ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pagos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php">Mi Perfil</a>
                        </li>    
                        <li class="nav-item">
                            <a class="nav-link" href="/login/view/home/suscripcion.php">Suscripciones</a>
                        </li>

                    </ul>
                    <a href="/login/view/home/pagar.php" class="boton">Pagar</a>
                    <a href="/login/view/home/logout.php" class="boton">Cerrar sesion</a>
                </div>
                <?php endif ?>

            </div>
        </nav>
    </div>
</div>

<div class="fondo">

