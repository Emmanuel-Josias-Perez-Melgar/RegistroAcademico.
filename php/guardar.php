<?php

require_once "conexion.php";

$conexion = new Conexion();
$cn = $conexion->conectar();

$idSeccion = $_GET["id_seccion"];

$sql = $cn->prepare("
    SELECT
        id_estudiante,
        nie,
        apellidos,
        nombres,
        fecha_nacimiento,
        edad,
        direccion,
        estado
    FROM vista_estudiantes
    WHERE id_seccion = ?
");

$sql->bind_param("i", $idSeccion);

$sql->execute();

$resultado = $sql->get_result();

$datos = [];

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

header("Content-Type: application/json");
echo json_encode($datos);

?>