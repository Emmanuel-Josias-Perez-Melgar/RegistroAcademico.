<?php

require_once "conexion.php";

$conexion = new Conexion();
$cn = $conexion->conectar();

$resultado = $cn->query("
    SELECT id_seccion, nombre_seccion
    FROM seccion
");

$datos = [];

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

header("Content-Type: application/json");
echo json_encode($datos);

?>