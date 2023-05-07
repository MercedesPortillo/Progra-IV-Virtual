var accion = 'nuevo',
    idAlumnos = 0;
document.addEventListener("DOMContentLoaded", e=>{
    frmAlumnos.addEventListener("submit", event=>{
        event.preventDefault();
        let alumno = {
            nombre: txtnombre.value,
            direccion: txtdireccion.value,
            telefono: txttelefono.value,
            dui: txtdui.value
        };
        fetch('procesar.php?accion=${accion}&alumno=${JSON.stringify(alumno)}')
        .then(resp=>resp.json())
        .then(data=>{
            if( data ){
                nuevoAlumno();
                obtenerDatosAlumnnos();
            }else{
                alert("Error al intentar guardar el registro");
                console.log( data );
            }
        }).catch(er=>{
            console.log( er );
        });
    });
    obtenerDatosAlumnnos();
});
function eliminarAlumno(alumno){
    if( confirm('Esta seguro de eliminar a ${alumno.nombre}?') ){
        fetch('procesar.php?accion=eliminar&idAlumno=${alumno.idAlumno}')
        .then(resp=>resp.json())
        .then(data=>{
            if( data ){
                nuevoAlumno();
                obtenerDatosAlumnnos();
            }else{
                alert("Error al intentar eliminar el registro");
                console.log( data );
            }
        }).catch(er=>{
            console.log( er );
        });
    }
}
function modificarAlumno(alumno){
    accion = 'modificar';
    alumno = alumno.idAlumno;
    txtnombre.value = alumno.nombre;
    txtdireccion.value = alumno.direccion;
    txttelefono.value = alumno.telefono;
    txtdui.value = alumno.dui;
}
function obtenerDatosAlumnnos(){
    fetch('procesar.php?accion=consultar')
    .then(resp=>resp.json())
    .then(alumnos=>{
        let filas = '',
            $tblAlumnos = document.querySelector('#tblAlumnos> tbody');
        alumnos.forEach(alumno=>{
            filas += `
                <tr onClick='modificarAlumnos(${JSON.stringify(alumno)})'>
                    <td>${alumno.nombre}</td>
                    <td>${alumno.direccion}</td>
                    <td>${alumno.telefono}</td>
                    <td>${alumno.dui}</td>
                    <td>
                        <button class="btn btn-danger" onClick='eliminaralumnos(${JSON.stringify(alumno)})'>DEL</button>
                    </td>
                </tr>
            `;
        });
        $tblAlumnos.innerHTML = filas;
    })
    .catch(err=>{
        console.log(err);
    })
}
function nuevoAlumno(){
    accion = 'nuevo';
    idAlumnos = 0;
    txtnombre.value = "";
    txtdireccion.value = "";
    txttelefono.value = "";
    txtdui.value = "";
}