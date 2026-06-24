<?php

require_once "conexion.php";

$conexion = new Conexion();
$cn = $conexion->conectar();

$id = $_POST["id"];

$sql = $cn->prepare("
    DELETE FROM estudiante
    WHERE id_estudiante = ?
");

$sql->bind_param("i", $id);

$respuesta = [];

if ($sql->execute()) {

    $respuesta["ok"] = true;
    $respuesta["mensaje"] = "Estudiante eliminado";

} else {

    $respuesta["ok"] = false;
    $respuesta["mensaje"] = "Error al eliminar";

}

header("Content-Type: application/json");
echo json_encode($respuesta);

?>