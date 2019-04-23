//VALIDAR AL ELIMINAR
function validationDelete($url,$title) {
    if (confirm("Desea eiminar "+$title)) {
        window.location.replace($url);
    }
}
