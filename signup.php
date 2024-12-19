<?php
    require_once("c://xampp/htdocs/login/view/head/head.php");
    if(!empty($_SESSION['usuario'])){
        header("Location:panel_control.php");

    }
?>

<div class="fondo-login">   
    <div class="icon">
        <a href="/login/index.php">
             <i class="fa-solid fa-dumbbell dumbbell-icon"></i>
        </a>
    </div>
    <div class="titulo">    
        Crear cuenta en Kratos gym
    </div>
    <form action= "store.php" method="POST" class="col-3 login" autocomplete="off">
    <div class="row">
        <div class="col-6">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" value="<?=(!empty($_GET['nombre'])) ? $_GET['nombre'] : ""?>" class="form-control" id="nombre">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" value="<?=(!empty($_GET['apellidos'])) ? $_GET['apellidos'] : ""?>" class="form-control" id="apellidos">
        </div>
        <div class="mb-3">
            <label for="domicilio" class="form-label">Domicilio</label>
            <input type="text" name="domicilio" value="<?=(!empty($_GET['domicilio'])) ? $_GET['domicilio'] : ""?>" class="form-control" id="domicilio">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" value="<?=(!empty($_GET['telefono'])) ? $_GET['telefono'] : ""?>" class="form-control" id="telefono">
        </div>
</div>  
    <div class="col-6">
        <div class="mb-3">
            <label for="codigo_postal" class="form-label">Código Postal</label>
            <input type="text" name="codigo_postal" value="<?=(!empty($_GET['codigo_postal'])) ? $_GET['codigo_postal'] : ""?>" class="form-control" id="codigo_postal">
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <select name="genero" class="form-select form-select-md mb-3" aria-label="medium select example" id="genero">
                <option value="" selected>Selecciona tu género</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="correo" value="<?=(!empty($_GET['correo'])) ? $_GET['correo'] : ""?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">contraseña</label>
            <div class="box-eye">
                <button type="button" onclick="mostrarContraseña('password','eyepassword')">    
                    <i id="eyepassword"  class="fa-solid fa-eye changePassword"></i>   
                </button>
            </div>
            <input type="password" name="contraseña" value="<?=(!empty($_GET['contraseña'])) ? $_GET['contraseña'] : ""?>"  class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirmar contraseña</label>
            <div class="box-eye">
                <button type="button" onclick="mostrarContraseña('password2','eyepassword')">    
                    <i id="eyepassword2"  class="fa-solid fa-eye changePassword"></i>   
                </button>
            </div>
            <input type="password" name="confirmarContraseña" value="<?=(!empty($_GET['confirmarContraseña'])) ? $_GET['confirmarContraseña'] : ""?>" class="form-control" id="password2">
        </div>
        <?php if(!empty($_GET['error'])):?>
            <div id="alertError" style="margin: auto;" class="alert alert-danger mb-2" role="alert">    
                <?= !empty($_GET['error']) ? $_GET['error'] : ""?>
            </div>
        <?php endif;?>

        <div class="d-grid gap-2">    
            <button type="submit" class="btn btn-primary">CREAR CUENTA</button>
        </div>

        
    </form>
    <div class="login col-12 mt-5"> 
        Tienes una cuenta? <a href="login.php" style="text-decoration: none;" >Inicia sesion</a>
    </div>
</div>



<?php
require_once("c://xampp/htdocs/login/view/head/footer.php");
?>