<?php
class homeModel {
    private $PDO;

    public function __construct() {
        require_once("c://xampp/htdocs/login/config/db.php");
        $pdo = new db();
        $this->PDO = $pdo->conexion();
    }

    public function agregarNuevoUsuario($correo, $password, $nombre, $apellidos, $domicilio, $telefono, $codigo_postal, $genero) {
        $statement = $this->PDO->prepare("INSERT INTO usuarios (correo, password, nombre, apellidos, domicilio, telefono, codigo_postal, genero, confirmado) VALUES (:correo, :password, :nombre, :apellidos, :domicilio, :telefono, :codigo_postal, :genero, 0)");
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":apellidos", $apellidos);
        $statement->bindParam(":domicilio", $domicilio);
        $statement->bindParam(":telefono", $telefono);
        $statement->bindParam(":codigo_postal", $codigo_postal);
        $statement->bindParam(":genero", $genero);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function correoExiste($correo) {
        $statement = $this->PDO->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = :correo");
        $statement->bindParam(":correo", $correo);
        $statement->execute();
        return $statement->fetchColumn() > 0;
    }

    public function obtenerclave($correo) {
        $statement = $this->PDO->prepare("SELECT password FROM usuarios WHERE correo = :correo");
        $statement->bindParam(":correo", $correo);
        return ($statement->execute()) ? $statement->fetch()['password'] : false;
    }

    public function confirmarCorreo($correo) {
        $statement = $this->PDO->prepare("UPDATE usuarios SET confirmado = 1 WHERE correo = :correo");
        $statement->bindParam(":correo", $correo);
        return $statement->execute();
    }

    public function obtenerInformacionUsuario($correo) {
        $statement = $this->PDO->prepare("SELECT nombre, apellidos, domicilio, telefono, codigo_postal, correo, genero FROM usuarios WHERE correo = :correo");
        $statement->bindParam(":correo", $correo);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
