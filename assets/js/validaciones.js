//VALIDAR AL ELIMINAR
function validationDelete($url,$title) {
    if (confirm("Desea eiminar "+$title)) {
        window.location.replace($url);
    }
}
if ($("#status").val()=='success'){
    alert("EXITO");
} else if($("#status").val()=='error'){
    alert("ERROR");
}
