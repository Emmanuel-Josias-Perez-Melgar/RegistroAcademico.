<?php

class Conexion {

    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $baseDatos = "RegistroAcademico";

    public function conectar() {

        $conexion = new mysqli(
            $this->host,
            $this->usuario,
            $this->password,
            $this->baseDatos
        );

        if ($conexion->connect_error) {

            die(json_encode([
                "ok" => false,
                "mensaje" => "Error de conexión"
            ]));
        }

        $conexion->set_charset("utf8");

        return $conexion;
    }
}

?>