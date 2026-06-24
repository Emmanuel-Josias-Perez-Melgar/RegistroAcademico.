<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Académico</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="contenedor">

        <div class="titulo">
            <h2>INSTITUTO NACIONAL "GENERAL FRANCISCO MENÉNDEZ"</h2>
            <h3>RECUPERACIÓN SEGUNDO PERIODO - MÓDULOS - 2-3, 2-4</h3>
        </div>

        <div class="barra-superior">

            <div class="botones">
                <button id="btnAgregar">Agregar</button>
                <button id="btnEditar">Editar</button>
                <button id="btnEliminar">Eliminar</button>
            </div>

            <div class="filtro">
                <label>SECCIÓN:</label>

                <select id="seccion">
                </select>
            </div>

        </div>

        <div class="tabla-contenedor">

            <table id="tablaEstudiantes">

                <thead>
                    <tr>
                        <th>NIE</th>
                        <th>APELLIDOS</th>
                        <th>NOMBRES</th>
                        <th>FECHA NACIMIENTO</th>
                        <th>EDAD</th>
                        <th>GENERO</th>
                        <th>DIRECCIÓN</th>
                        <th>ESTADO</th>
                    </tr>
                </thead>

                <tbody id="cuerpoTabla">
                </tbody>

            </table>

        </div>

    </div>

    <div id="modal" class="modal">

        <div class="modal-contenido">

            <h3>Datos del Estudiante</h3>

            <form id="frmEstudiante">

                <input type="hidden" name="id_estudiante" id="id_estudiante">

                <div class="grupo">
                    <label>NIE</label>
                    <input type="text" name="nie" id="nie" required>
                </div>

                <div class="grupo">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" required>
                </div>

                <div class="grupo">
                    <label>Nombres</label>
                    <input type="text" name="nombres" id="nombres" required>
                </div>

                <div class="grupo">
                    <label>Fecha Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                </div>

                <div class="grupo">
                    <label>Género</label>

                    <select name="genero" id="genero">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>

                <div class="grupo">
                    <label>Dirección</label>
                    <input type="text" name="direccion" id="direccion" required>
                </div>

                <div class="grupo">
                    <label>Estado</label>

                    <select name="estado" id="estado">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>

                <div class="grupo">
                    <label>Sección</label>

                    <select name="id_seccion" id="id_seccion">
                    </select>
                </div>

                <div class="acciones">
                    <button type="submit">Guardar</button>
                    <button type="button" id="btnCerrar">Cancelar</button>
                </div>

            </form>

        </div>

    </div>

    <script src="js/app.js"></script>

</body>
</html>