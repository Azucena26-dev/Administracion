
    //NOMBRES PARA LOS SELECT

    $(document).ready(function () {
        $('#genero').select2({
                placeholder: 'Seleccione género',
                allowClear: false
            });
            $('#generacion').select2({
                placeholder: 'Seleccione Generacion',
                allowClear: false
            });

});
    /*CAMBIO AL ELEGIR UN GRADO DIFERENTE EN LA TABLA*/
    $(document).ready(function () {
       
    tabla();
           
    });



//funcion para validar si hay una generacion activa

function validargeneracionactiva(){
var fechaActual = new Date();

var rootLocation = "/admin/postulacion/consultarFechaGeneracion";
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            success: function (dt) {
              if(dt.length<1){
                fecha2=000000;
              }else{
              fecha=(dt[0]['fecha_fin_generacion']);
               fecha2=new Date(fecha);
              }
              //Validacion si la generacion aun no ha terminado
              if(fechaActual >= fecha2){
              $("#modalGeneracion").modal('toggle'); 
               
              }else{
                swal({
                    title: "¡Ups, ha ocurrido un error!",
                    text: "No es posible crear una nueva generación, la generación actual termina el  ("+fecha+")",
                    type: "info",
                    
                    });
              }

            },
            error: function (dt) {
              
            }
               
        });

      }





     function tabla() {
        //var genero = $("#genero").val();
        var rootLocation = '/admin/postulacion/consultaraspirantestabla';
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
           // data: {genero},
            success: function (dt) {
                var table = $('#dataTable').DataTable({
                    destroy: true,
                    data: dt,
                    columns: [
                        {title: "Primer Nombre"},
                        {title: "Segundo Nombre"},
                        {title: "Primer Apellido"},
                        {title: "Ver perfil"},
                        {title: "Aprobar"},
                        {title: "Rechazar"}
                    ]
                });

            }
        });
    }


    function buscarAlumnos() {
        var genero = $('#genero').val();
        var rootLocation = "/admin/postulacion/consultaraspirantes";
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {genero},
            success: function (dt) {
                var table = $('#dataTable').DataTable({
                    destroy: true,
                    data: dt,
                    columns: [
                        {title: "Primer Nombre"},
                        {title: "Segundo Nombre"},
                        {title: "Primer Apellido"},
                        {title: "Ver perfil"},
                        {title: "Aprobar"},
                        {title: "Rechazar"}
                    ]
                });

            }
        });
       
        //window.location.href = rootLocation + "/" + genero;
    }


    function ultimaGeneracion() {
    var fechaNueva = $('#generacion_inicioN').val();
      fechaNueva = new Date(fechaNueva);
    
        var rootLocation = "/admin/postulacion/consultarFechaGeneracion";
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            success: function (dt) {
              if(dt.length<1){
                fecha2=000000;
              }else{
               fecha=(dt[0]['fecha_fin_generacion']);
               fecha2=new Date(fecha);
              }


                if(fechaNueva>=fecha2){
                agregarGeneracion();
                setTimeout(function(){
                direccion="/admin/postulacion/consultacandidatos";
                window.location.href=direccion;
                        }, 2000);
               }
               else{
                swal({
                    title: "¡Ups, ha ocurrido un error!",
                    text: "La fecha de la nueva generacion debe ser posterior a la ultima generación creada("+fecha+")",
                    type: "warning",
                    timer:4000,
                    });
                      $("#modalGeneracion").modal('toggle'); 
                        setTimeout(function(){
                        $("#modalGeneracion").modal("show");
                        $('#generacion_finalN').val("");
                        $('#generacion_inicioN').val("") ;
                        }, 4000);
               }
            },
            error: function (dt) {
              
            }
               
        });
      
    }
    function creaunageneracion(){
      swal({
                    title: "¡Ups, ha ocurrido un error!",
                    text: "No tienes creada una generacion, ve a crear una nueva",
                    type: "error",
                    
                    });
    }
    function creaunageneracion2(){
      swal({
                    title: "¡Ups, ha ocurrido un error!",
                    text: "No tienes creada una generacion vigente, ve a crear una nueva.",
                    type: "error",
                    
                    });
    }

//FUNCION PARA APROBAR
    function existeGeneracion(carnet) {

        var rootLocation = "/admin/postulacion/consultarFechaGeneracion";
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            success: function (dt) {
              var acceso = true
              if(dt.length<1){
                acceso = false
                creaunageneracion();
              }
              if(dt.length>=1){
                fechaActual = new Date();
                

                fechaBD=(new Date(dt[0]['fecha_fin_generacion']+"T23:59:59"));
               //alert(fechaActual);
              // alert(new Date(fechaBD));
                if(fechaBD<fechaActual)
                {
                  acceso = false
                  creaunageneracion2();
                }else if(acceso){
              gener=(dt[0]['idGeneraciones']);
              
                    swal({
                    title: "¿Deseas aprobar al aspirante?",
                    text:  "El aspirante con carné ("+carnet+") pasará a la etapa de examen",
                    type:  "info",
                    showCancelButton: true,
                   // confirmButtonClass: "btn-danger",
                    confirmButtonText: "Si, aprobar",
                    closeOnConfirm: false
                  },
                  function(){
                    swal("Aspirante Aprobado!", "El aspirante con carné ("+carnet+") ha sido aprobado.", "success");
                    direccion="/admin/postulacion/consultacandidatos?carnet="+carnet+"&gener="+gener;
                    window.location.href=direccion;
                  });



              }
            }
            },
            error: function (dt) {
              
            }
               
        });
      
    }


    
    function existeGeneracionR(carnet) {

var rootLocation = "/admin/postulacion/consultarFechaGeneracion";
$.ajax({
    method: 'POST',
    dataType: 'json',
    url: rootLocation,
    success: function (dt) {
      var acceso = true;
      if(dt.length<1){
        creaunageneracion();
         acceso = false;
      }else if(dt.length>=1){
        fechaActual = new Date();
        fechaBD=(dt[0]['fecha_fin_generacion']);
        if(fechaBD<fechaActual)
        {
          acceso = false;
          creaunageneracion2();
        }

      } 
      
      if(acceso){
        gener=(dt[0]['idGeneraciones']);
              
        swal({
          title: "¿Deseas rechazar al aspirante?",
          text:  "El aspirante con carné ("+carnet+") pasará a estado de rechazado",
          type: "input",
          showCancelButton: true,
          confirmButtonText: "Si, rechazar",
          closeOnConfirm: false,
          inputPlaceholder: "Ingrese la razón"
        }, function (inputValue) {
        //  if (inputValue === false) return false;
          if (inputValue === "") {
            swal.showInputError("Es necesario escribir la razón");
            return false
          }
          swal("Aspirante Reprobado!", "El aspirante con carné ("+carnet+") ha sido rechazado.", "success");
              direccion="/admin/postulacion/consultacandidatosdesaprobados?carnet="+carnet+"&gener="+gener+"&razon="+inputValue;
              window.location.href=direccion;
        });
             

        }
      },
      error: function (dt) {
        
      }
         
  });

}

    function ultimaGeneracionEditar() {
      var fechaNueva = $('#generacion_inicio').val();
      fechaNueva = new Date(fechaNueva);
      var fechaNueva2 = $('#generacion_fin').val();
      fechaNueva2 = new Date(fechaNueva2);
        var rootLocation = "/admin/postulacion/consultarFechaGeneracion";
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            success: function (dt) {
               
               //fecha=(dt[0]['fecha_fin_generacion']);
               //fecha2=new Date(fecha);

               if(fechaNueva<fechaNueva2){
                editarGeneracion();
                
               }
               else{
                swal({
                    title: "¡Ups, ha ocurrido un error!",
                    text: "La fecha de la nueva generacion debe ser posterior a la fecha de inicio",
                    type: "warning",
                    timer:4000,
                    });
                      $("#modalEditarGeneracion").modal('toggle'); 
                        setTimeout(function(){
                        $("#modalEditarGeneracion").modal("show");
                        $('#generacion_final').val("");
                        $('#generacion_inicio').val("") ;
                        }, 4000);        
               }
            }
        });
      
    }


    function enviarGeneracion() {
       
        var generacionn = $('#generacionn').val();
        var rootLocation = "/admin/postulacion/consutaModal";

        if(generacionn!=""){
         
        
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {generacionn},
            success: function (dt) {
                $("#modalEditarGeneracion").modal()                
                $("#nombre").val(dt[0]['nombre']);   
                $("#descripcion").val(dt[0]['descripcion']); 
                $("#generacion_inicio").val(dt[0]['fecha_inicio_generacion']);  
                $("#generacion_fin").val(dt[0]['fecha_fin_generacion']);               

            }
        });
      }else{
        swal("Debes seleccionar una generación","","info");
      }
        
    }

    $(document).on('change', '#generacion_fin', function(event) {
     
    var fin = $("#generacion_fin").val();
    var inicio = $("#generacion_inicio").val();
    var fechaF =   new Date(fin);
    var fechaI =  new Date(inicio);
      
    if(fechaF<fechaI){
      $("#modalEditarGeneracion").modal('toggle'); 
      validar();
     
      
    }

 
    });


     $(document).on('change', '#generacion_finalN', function(event) {
     
    var fin = $("#generacion_finalN").val();
    var inicio = $("#generacion_inicioN").val();
    var fechaF =   new Date(fin);
    var fechaI =  new Date(inicio);
      
    if(fechaF<fechaI){
      $("#modalGeneracion").modal('toggle'); 
      validar2();
    }

 
    });

    function validar2() {
    swal({
    title: "¡Error!",
    text: "La fecha inicial debe ser posterior a la final",
    type: "warning",
    timer:4000,
    });
   
    setTimeout(function(){
    $("#modalGeneracion").modal("show");
    $('#generacion_finalN').val("");
    $('#generacion_inicioN').val("") ;
    }, 4000);
    }


 

    function validar() {
    swal({
    title: "¡Error!",
    text: "La fecha inicial debe ser posterior a la final",
    type: "warning",
    timer:4000,
    });
   
    setTimeout(function(){
    $("#modalConsultarGeneracion").modal("show");
    }, 4000);
    }
    


    function alertaSuccess(){
    swal({
    title: "¡Registro Exitoso!",
    text: "Su registro se ha guardado con éxito",
    type: "success",
    });
 
    }

    function alertaError(){
    swal({
    title: "¡Upps!",
    text: "Ha ocurrido un problema",
    type: "error",
    });
    }

    function editarGeneracion() {
       
       var generacionn = $('#generacionn').val();
       var nombre = $('#nombre').val();
       var descripcion = $('#descripcion').val();
       var fecha_inicio = $('#generacion_inicio').val();
       var fecha_fin = $('#generacion_fin').val();
       //var $valores = explode('-', $fecha_inicio);
     
  
   
  if(!(nombre==""||descripcion==""||fecha_inicio==""||fecha_fin=="")){
    var generacionactu ={
        "generacionn":generacionn,
        "nombre":nombre,
        "descripcion":descripcion,
        "fecha_inicio":fecha_inicio,
        "fecha_fin":fecha_fin
       };
       
       var rootLocation = "/admin/postulacion/actualizageneracion";
       $.ajax({
           method: 'POST',
          
           url: rootLocation,
           data: generacionactu,
           success: function (dt) {
            $("#modalEditarGeneracion").modal('toggle');    
            alertaSuccess();
            setTimeout(function(){
                direccion="/admin/postulacion/consultacandidatos";
                window.location.href=direccion;
                        }, 2000); 
          
           },
           error: function () {
            alertaError();
           },
       });
 }else{
  $("#modalEditarGeneracion").modal('toggle'); 
  swal({
    title: "¡Datos incompletos!",
    text: "Debes ingresar todos los datos para actualizar una generación",
    type: "error",
    });
    $("#modalEditarGeneracion").modal('show');  

 }
       
   }


   function agregarGeneracion() {
       
       var nombre = $('#nombreN').val();
       var descripcion = $('#descripcionN').val();
       var fecha_inicio = $('#generacion_inicioN').val();
       var fecha_fin = $('#generacion_finalN').val();
   
       var generacionadd ={
        "nombre":nombre,
        "descripcion":descripcion,
        "fecha_inicio":fecha_inicio,
        "fecha_fin":fecha_fin
       };
       var rootLocation = "/admin/postulacion/agregargeneracion";
       $.ajax({
           method: 'POST',
           
           url: rootLocation,
           data: generacionadd,
           success: function (dt) {
            alertaSuccess();
            $("#modalGeneracion").modal('toggle'); 
            $('#nombreN').val("");
            $('#descripcionN').val("");
            $('#generacion_inicioN').val("");
            $('#generacion_finalN').val("");          
           },
           error: function (dt) {
            alertaSuccess();
           },
       }); 
       
   }


