let idSeleccionado = null;

document.addEventListener("DOMContentLoaded", function () {

    cargarSecciones();

});

async function cargarSecciones() {

    const respuesta = await fetch("php/secciones.php");
    const datos = await respuesta.json();

    const selectFiltro = document.getElementById("seccion");
    const selectModal = document.getElementById("id_seccion");

    selectFiltro.innerHTML = "";
    selectModal.innerHTML = "";

    for (let i = 0; i < datos.length; i++) {

        let seccion = datos[i];

        selectFiltro.innerHTML +=
            '<option value="' + seccion.id_seccion + '">' +
            seccion.nombre_seccion +
            '</option>';

        selectModal.innerHTML +=
            '<option value="' + seccion.id_seccion + '">' +
            seccion.nombre_seccion +
            '</option>';
    }

    cargarEstudiantes(selectFiltro.value);

}



async function cargarEstudiantes(idSeccion){

    const respuesta = await fetch(
        `php/obtener.php?id_seccion=${idSeccion}`
    );

    const datos = await respuesta.json();

    const cuerpoTabla =
    document.getElementById("cuerpoTabla");

    cuerpoTabla.innerHTML = "";

    datos.forEach(estudiante => {



        let estado =
        estudiante.estado === "Activo"
        ? '<span class="activo">Activo</span>'
        : '<span class="inactivo">Inactivo</span>';

        let genero =
        estudiante.genero === "F"
        ? '<span class="femenino">F</span>'
        : '<span class="masculino">M</span>';

        cuerpoTabla.innerHTML += `
            <tr data-id="${estudiante.id_estudiante}">
                <td>${estudiante.nie}</td>
                <td>${estudiante.apellidos}</td>
                <td>${estudiante.nombres}</td>
                <td>${estudiante.fecha_nacimiento}</td>
                <td>${estudiante.edad}</td>
                <td>${genero}</td>
                <td>${estudiante.direccion}</td>
                <td>${estado}</td>
            </tr>
        `;

    });

    seleccionarFilas();

}



function seleccionarFilas(){

    const filas =
    document.querySelectorAll("#cuerpoTabla tr");

    filas.forEach(fila => {

        fila.addEventListener("click", () => {

            filas.forEach(f => {
                f.classList.remove("seleccionado");
            });

            fila.classList.add("seleccionado");

            idSeleccionado =    
            fila.dataset.id;

        });

    });

}



document.addEventListener("change", function (e) {

    if (e.target.id == "seccion") {

        cargarEstudiantes(e.target.value);

    }

});

const modal = document.getElementById("modal");

document.getElementById("btnAgregar")
.addEventListener("click", function () {

    document.getElementById("frmEstudiante")
    .reset();

    document.getElementById("id_estudiante")
    .value = "";

    modal.style.display = "flex";

});

document.getElementById("btnCerrar")
.addEventListener("click", function () {

    modal.style.display = "none";

});



document
.getElementById("frmEstudiante")
.addEventListener("submit", async(e)=>{

    e.preventDefault();

    const datos =
    new FormData(e.target);

    const url =
    document.getElementById("id_estudiante").value == ""
    ?
    "php/guardar.php"
    :
    "php/editar.php";

    const respuesta =
    await fetch(
        url,
        {
            method:"POST",
            body:datos
        }
    );

    const resultado =
    await respuesta.json();

    alert(resultado.mensaje);

    if(resultado.ok){

        modal.style.display = "none";

        cargarEstudiantes(
            document.getElementById("seccion").value
        );

    }

});




document
.getElementById("btnEditar")
.addEventListener("click", async()=>{

    if(!idSeleccionado){

        alert("Seleccione un estudiante");

        return;
    }

    const respuesta =
    await fetch(
        `php/obtenerUno.php?id=${idSeleccionado}`
    );

    const estudiante =
    await respuesta.json();

    document.getElementById("id_estudiante").value =
    estudiante.id_estudiante;

    document.getElementById("nie").value =
    estudiante.nie;

    document.getElementById("apellidos").value =
    estudiante.apellidos;

    document.getElementById("nombres").value =
    estudiante.nombres;

    document.getElementById("fecha_nacimiento").value =
    estudiante.fecha_nacimiento;

    document.getElementById("genero").value =
    estudiante.genero;

    document.getElementById("direccion").value =
    estudiante.direccion;

    document.getElementById("estado").value =
    estudiante.estado;

    document.getElementById("id_seccion").value =
    estudiante.id_seccion;

    modal.style.display = "flex";

});




document.getElementById("btnEliminar")
.addEventListener("click", async function () {

    if (idSeleccionado == null) {

        alert("Seleccione un estudiante");
        return;

    }

    let confirmar =
    confirm("¿Desea eliminar este estudiante?");

    if (confirmar == false) {

        return;

    }

    const datos = new FormData();

    datos.append("id", idSeleccionado);

    const respuesta = await fetch(
        "php/eliminar.php",
        {
            method: "POST",
            body: datos
        }
    );

    const resultado =
    await respuesta.json();

    alert(resultado.mensaje);

    if (resultado.ok) {

        idSeleccionado = null;

        cargarEstudiantes(
            document.getElementById("seccion").value
        );

    }

});