<?php

require_once "conexion.php";

$conexion = new Conexion();
$cn = $conexion->conectar();

$id = $_GET["id"];

$sql = $cn->prepare("
    SELECT *
    FROM estudiante
    WHERE id_estudiante = ?
");

$sql->bind_param("i", $id);

$sql->execute();

$resultado = $sql->get_result();

$fila = $resultado->fetch_assoc();

header("Content-Type: application/json");
echo json_encode($fila);

?>