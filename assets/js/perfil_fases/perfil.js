
    //NOMBRES PARA LOS SELECT

    $(document).ready(function () {
        $('#perfil').select2({
                placeholder: 'Seleccione una Fase',
                allowClear: false
            });

        $('#estado').select2({
                placeholder: 'Seleccione un Estado',
                allowClear: false
            });

        $('#generacion').select2({
                placeholder: 'Seleccione Generacion',
                allowClear: false
            });


        $('#anio').select2({
                placeholder: 'Seleccione Año',
                allowClear: false
            });
});
    /*CAMBIO AL ELEGIR UN GRADO DIFERENTE EN LA TABLA*/
    $(document).ready(function () {

    tabla();

    });


 function tabla() {
        var rootLocation = '/admin/perfil/consultarPerfiltabla';
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            success: function (dt) {
                var table = $('#dataTable').DataTable({
                    destroy: true,
                    data: dt,
                    columns: [
                        
                        {title: "Carnet"},
                        {title: "Nombre"},
                        {title: "Apellido"},
                        {title: "Fase"},
                        {title: "Aprobar"},
                        {title: "Reprobar"},
                        {title: "Deserción"},
                       // {title: "Descripcion"}
                        
                    ]
                });

            }
        });
    }

 function cambioEstado(carnet, id_estado){
        var rootLocation = "/admin/perfil/actualizarFase";
        var destinyLocation = "/admin/perfil/consultarEstados";


    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        //buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
        title: '¿Esta de actualizar Fase?',
        text: "¡pasara a la siguiente fase!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si ',
        cancelButtonText: ' No',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {carnet : carnet,
                id_estado : id_estado},
            success: function (dt) {
                }
            });
            swalWithBootstrapButtons.fire(
                '¡Actualizado!',
                'Usuario actualizado.',
                'success'
            )
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'La acción fue cancelada.'
            )
        }
        window.location.href = destinyLocation; //destinyLocation ruta para actualizacion de la pagina
    })
    }


function cambioEstado_alumno(carnet){

     const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger',
        },
       // buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
        title: '¡No puede cambiar de estado!',
        type: 'warning',
     confirmButtonText: 'Ok',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
            method: 'POST',
            dataType: 'json',
           // url: rootLocation,
            data: {carnet : carnet,},
            success: function (dt) {
                }
            });
            
        }  
    })

}

//MUESTRA LA DESCRIPCION DE LA DESERCION

function cambioEstadoAlumnoDesercion(carnet){
 var rootLocation = "/admin/perfil/consultaDescripcionDesertado";
 var destinyLocation = "/admin/perfil/consultarEstados";


      $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {carnet : carnet},
            success: function (dt) {
                if (dt.length<1){

                    //alert("no hay nada");
                }else{

        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            
                    },
        
                })

        swalWithBootstrapButtons.fire({
        title: "Motivo de Deserción",
        text: (dt[0]['descripcion']),
        confirmButtonText: "Ok",

    }).then((result) => {
          
     window.location.href = destinyLocation; //destinyLocation ruta para actualizacion de la pagina
    })


                }//fin else
        }//fin success
});//fin ajax
   



}


//FIN DESCRIPCION 

 function buscarAlumnos(){
        var perfil = $('#perfil').val();
        var generacion = $('#generacion').val();
        var estado = $('#estado').val();
        var anio = $('#anio').val();
        var rootLocation = "/admin/perfil/consultarporEstadoGeneracionParametros";
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {perfil,
                generacion,
                estado,anio},
            success: function (dt) {
                var table = $('#dataTable').DataTable({
                    destroy: true,
                    data: dt,
                    columns: [
                      {title: "Carnet"},
                        {title: "Nombre"},
                        {title: "Apellido"},
                        {title: "Fase"},
                        {title: "Aprobar"},
                        {title: "Reprobar"},
                        {title: "Deserción"},
                    ]
                });
            }
        });

    }


function cambioEstadoReprobado(carnet, id_estado){
        var rootLocation = "/admin/perfil/actualizarFaseReprobado";
        var destinyLocation = "/admin/perfil/consultarEstados";


    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
      
    })

    swalWithBootstrapButtons.fire({
        title: '¿Esta seguro de Reprobar a'+' '+carnet+' '+'?',
        text: "¡No pasará a la siguiente fase!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si ',
        cancelButtonText: ' No',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {carnet : carnet,
                id_estado : id_estado},
            success: function (dt) {                
                }
            });
            swalWithBootstrapButtons.fire(
                '¡Actualizado!',
                'Usuario actualizado.',
                'success'
            )            
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'La acción fue cancelada.'
            )
        }
        window.location.href = destinyLocation; //destinyLocation ruta para actualizacion de la pagina
    })
    }


function GuardarDescripcion(descripcion,carnet) {
        var rootLocation = "/admin/perfil/ingresoDescripcionDesertado";
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {descripcion:descripcion,carnet : carnet},
            success: function (dt) {

            }
        });
       
        
    }


function cambioEstadoDesercion(carnet, id_estado){
    var rootLocation = "/admin/perfil/actualizarFaseDesercion";
     var destinyLocation = "/admin/perfil/consultarEstados";
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        
    })

swalWithBootstrapButtons.fire({
  title: "Ingrese el motivo de Deserción",
        input: "text",
        showCancelButton: true,
        confirmButtonText: "Guardar",
        cancelButtonText: "Cancelar",
        inputValidator: descripcion => {
            // Si el valor es válido, debes regresar undefined. Si no, una cadena
            if (!descripcion) {
                return "Por favor ingrese un motivo de Deserción";
            } else {
                return undefined;
            }
        }
    }).then((result) => {
        if (result.value) {
            
            $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {carnet : carnet,
                id_estado : id_estado },
            success: function (dt) {

                }
            });

            var descripcion = result.value;
            GuardarDescripcion(descripcion,carnet);
            swalWithBootstrapButtons.fire(
                '¡Actualizado!',
                'Usuario actualizado.',
                'success'
            )
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'La acción fue cancelada.'
            )
           
        } 
     window.location.href = destinyLocation; //destinyLocation ruta para actualizacion de la pagina
    })




}



//FUNCION GENERACIONES POR ANIO
$("#anio").change(function(){        
    var baselocation ='/admin/perfil/consultargeneracionesAnio'
        var anio = document.getElementById("anio").value;
        $.post(baselocation,{anio: anio},function (data) {
            $("#generacion").html(data);
        });
});

//FIN FUNCION GENERACIONES POR ANIO