<?php

require_once "conexion.php";

$conexion = new Conexion();
$cn = $conexion->conectar();

$id_estudiante = $_POST["id_estudiante"];
$nie = $_POST["nie"];
$apellidos = $_POST["apellidos"];
$nombres = $_POST["nombres"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$genero = $_POST["genero"];
$direccion = $_POST["direccion"];
$estado = $_POST["estado"];
$id_seccion = $_POST["id_seccion"];

$sql = $cn->prepare("
    UPDATE estudiante
    SET
        nie = ?,
        apellidos = ?,
        nombres = ?,
        fecha_nacimiento = ?,
        genero = ?,
        direccion = ?,
        estado = ?,
        id_seccion = ?
    WHERE id_estudiante = ?
");

$sql->bind_param(
    "sssssssii",
    $nie,
    $apellidos,
    $nombres,
    $fecha_nacimiento,
    $genero,
    $direccion,
    $estado,
    $id_seccion,
    $id_estudiante
);

$respuesta = [];

if ($sql->execute()) {

    $respuesta["ok"] = true;
    $respuesta["mensaje"] = "Estudiante actualizado";

} else {

    $respuesta["ok"] = false;
    $respuesta["mensaje"] = "Error al actualizar";

}

header("Content-Type: application/json");
echo json_encode($respuesta);

?>