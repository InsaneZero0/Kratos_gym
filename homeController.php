<?php
class homeController {
    private $MODEL;

    public function __construct() {
        require_once("c://xampp/htdocs/login/model/homeModel.php");
        $this->MODEL = new homeModel();
    }

    public function guardarUsuario($correo, $contraseña, $nombre, $apellidos, $domicilio, $telefono, $codigo_postal, $genero) {
        $valor = $this->MODEL->agregarNuevoUsuario(
            $this->limpiarcorreo($correo),
            $this->encriptarcontraseña($this->limpiarcadena($contraseña)),
            $this->limpiarcadena($nombre),
            $this->limpiarcadena($apellidos),
            $this->limpiarcadena($domicilio),
            $this->limpiarcadena($telefono),
            $this->limpiarcadena($codigo_postal),
            $this->limpiarcadena($genero)
        );
        return $valor;
    }

    public function correoExiste($correo) {
        return $this->MODEL->correoExiste($correo);
    }

    public function confirmarCorreo($correo) {
        return $this->MODEL->confirmarCorreo($correo);
    }

    public function limpiarcadena($campo) {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_UNSAFE_RAW);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    public function limpiarcorreo($campo) {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_SANITIZE_EMAIL);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    public function encriptarcontraseña($contraseña) {
        return password_hash($contraseña, PASSWORD_DEFAULT);
    }

    public function verificarusuario($correo, $contraseña) {
        $keydb = $this->MODEL->obtenerclave($correo);
        return (password_verify($contraseña, $keydb)) ? true : false;
    }

    public function obtenerInformacionUsuario($correo) {
        return $this->MODEL->obtenerInformacionUsuario($correo);
    }
    
}
?>
