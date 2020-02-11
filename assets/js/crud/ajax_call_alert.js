//funcion para guardar
function ajax_call(url_form,str,text1,text2,alert,mensajeRedireccion,urlRedireccion,tipoRedireccion){
    $.ajax({
        url: url_form,
        dataType: 'json',
        type: 'POST',
        data: str,
        success: function (dt) {
            if (dt.mensaje == 'success') {
                cleanInputs();
                if(alert == "1"){
                    alerta_redireccion(text1,mensajeRedireccion,urlRedireccion,tipoRedireccion);
                }
            } else {
                alerta_redireccion(text2,mensajeRedireccion,urlRedireccion,"error");
            }
            $("#loading").attr('style', 'display:none;');
        },
        error: function (d) {
            alerta_redireccion(text2,mensajeRedireccion,urlRedireccion,"error");
            $("#loading").attr('style', 'display:none;');
        }
    });
}

//limpiar los input
function cleanInputs() {
    $("#form_inputs")[0].reset();
};

function alerta_redireccion(mensaje1,mensajeRedireccion,urlRedireccion,tipoRedireccion) {
    swal({
        title: mensaje1,
        text: mensajeRedireccion,
        type: tipoRedireccion,
        showCancelButton: false,
        confirmButtonClass: 'btn-info',
        confirmButtonText: "Ok",
        closeOnConfirm: true
    }, function () {
        var rootLocation = urlRedireccion;
        window.location.href = rootLocation;
    });
}

