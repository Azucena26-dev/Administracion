var wizard = $("#wizard").steps();
$.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[ a-záéíóúüñ]*$/i.test(value);
}, "");
// Add step
/*
wizard.steps(
    "add", {
    title: "HTML code",
    content: "<strong>HTML code</strong>"
    }
);
*/
wizard.steps("add");
var form = $("#form_inputs").show();
form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex) {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young
        if (newIndex === 3 && Number($("#age-2").val()) < 18) {
            return false;
        }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex) {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onStepChanged: function(event, currentIndex, priorIndex) {
        // Used to skip the "Warning" step if the user is old enough.
        if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
            form.steps("next");
        }
        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
        if (currentIndex === 2 && priorIndex === 3) {
            form.steps("previous");
        }
    },
    onFinishing: function(event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function(event, currentIndex) {
        var url_form = "/admin/actualizardatoscandidatos/actualizarsolicitud";
        var str = $("#form_inputs").serialize();
        var text1 = "Registro Exitoso";
        var text2 = "Error en el Registro!";
        var mensajeRedireccion = "  ";
        var urlRedireccion = "/admin/postulacion/actualizaraceptado"; // aca deveria de ponerse la direccion de la pagina web
        var tipoRedireccion = "success";
        //console.log('prueba');
        ajax_call_validacion(url_form, str, text1, text2, "1", mensajeRedireccion, urlRedireccion, tipoRedireccion);
    }
}).validate({
    errorPlacement: function errorPlacement(error, element) {
        element.before(error);
    },
    rules: {
       genero: {
            required: true
        },
        fecha_nacimiento: {
            required: true
            
        },
        documento: {
            required: true
            
        },
        ndocumento: {
            required: true
            
        },
        nivelacademicopersonal: {
            required: true
        },
        direccion: {
            required: true
        },
        tiene_hijos: {
            required: true
        },
        estudiante_activo: {
            required: true
        },
        departamento: {
            required: true
        },
        carrera: {
            lettersonly: true
        },
        ce_procedencia: {
            lettersonly: true
        },
        id_usuario: {
            required: true
        },
        limite: {
            required: true
        },
        ingresar: {
            required: true
        },
        quees_kodigo: {
            required: true
        },
        aceptado_kodigo: {
            required: true
        },
        interes_tecnologia: {
            required: true
        },
        nivel_programacion: {
            required: true
        },
        actividades: {
            required: true
        },
        tiene_computadora: {
            required: true
        },
        tiene_internet: {
            required: true
        },
        acceder_internet: {
            required: true
        },
        frecuencia_internet: {
            required: true
        },
        tiene_smartphone: {
            required: true
        },
        frecuencia_computadora: {
            required: true
        },
        trabajo: {
            required: true
        },
        trabajabas: {
            lettersonly: true
        },
        roltrabajo: {
            lettersonly: true
        },
        recursos_gastos: {
            required: true
        },
        nivelacademico: {
            required: true
        },
        personas_casa: {
            required: true
           
        },  confirmo_honestidad: {
            required: true
          
        } ,ingreso_familiar:{
            required: true
        }
          
    },
    messages: {
       
        genero: {
            required: "Requerido"
        },
        fecha_nacimiento: {
            required: "Requerido"
           
        },
        documento: {
            required: "Requerido"
           
        },
        ndocumento: {
            required: "Requerido"
            
        },
        nivelacademicopersonal: {
            required: "Requerido"
           
        },
        direccion: {
            required: "Requerido"
            
        },
        tiene_hijos: {
            required: "Requerido"
            
        }
        ,
        estudiante_activo: {
            required: "Requerido"
            
        },
        departamento: {
            required: "Requerido"
            
        },
       
        ce_procedencia: {
            lettersonly: "Ingrese solo letras y espacios"
        },
        limite: {
            required: "Requerido"
        },
        ingresar: {
            required: "Requerido"
        },
        quees_kodigo: {
            required: "Requerido"
        },
        aceptado_kodigo: {
            required: "Requerido"
        },
        interes_tecnologia: {
            required: "Requerido"
        },
        nivel_programacion: {
            required: "Requerido"
        },
        actividades: {
            required: "Requerido"
        },
        tiene_computadora: {
            required: "Requerido"
        },
        tiene_internet: {
            required: "Requerido"
        },
        acceder_internet: {
            required: "Requerido"
        },
        frecuencia_internet: {
            required: "Requerido"
        },
        tiene_smartphone: {
            required: "Requerido"
        },
        frecuencia_computadora: {
            required: "Requerido"
        },
        trabajo: {
            required: "Requerido"
        },

        recursos_gastos: {
            required: "Requerido"
        }, 
        nivelacademico: {
            required: "Requerido"
        },
        nivelacademico: {
            required: "Requerido"
        },
        personas_casa: {
            required: "Requerido"
          
        },
        confirmo_honestidad: {
            required: "Requerido"
          
        },ingreso_familiar:{
            required: "Requerido"
        }
        


    }
    
});
$("#example-vertical").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical"
});


//FUNCION PARA ACTIVAR O NO LOS INPUT SEGUN RESPUESTA
function activarRB1(){
    traba1 = document.getElementById("trabajo1");
    traba2 = document.getElementById("trabajo2");
   
    if( traba1.checked){
        traba2.checked = false; 
    }
    
}

function activarRB2(){
    traba1 = document.getElementById("trabajo1");
    traba2 = document.getElementById("trabajo2");
   
    if( traba2.checked){
        traba1.checked = false; 
    }
    
}

//FUNCION PARA ACTIVAR O NO LOS INPUT SEGUN RESPUESTA
function trabajoFuncion(sel){
        diva = document.getElementById("trabajabas");
        divb = document.getElementById("roltrabajo");
        traba1 = document.getElementById("trabajo1");
        traba2 = document.getElementById("trabajo2");
       
        divd = document.getElementById("sueldo");
        dive = document.getElementById("horario");


       

 if (sel.value=="No, nunca he trabajado"){
         //limpiando Select
        $("#trabajabas").html(""); 
        $("#horario").html(""); 
        //limpiando valores escritos por el usuario
        $(roltrabajo).val('');
        $(sueldo).val('');
        //$("#horario").html("");
        //Deshabilitando los input
        diva.disabled = true;
        divb.disabled = true;
        traba1.checked = false;
        traba2.checked = false;
        traba1.disabled = true;
        traba2.disabled = true;
        divd.disabled = true;
        dive.disabled = true;
      }else{
       
         //Reasignando valores a select Trabajabas


        //Reasignando valores a select Horario
        
   
       
       //Habilitando los input
        diva.disabled = false;
        divb.disabled = false;
        traba1.disabled=false;
        traba2.disabled=false;
       
    
        divd.disabled = false;
        dive.disabled = false;
        diva.required = true;
        //Asignando requeridos 
        diva.title ="Requerido";
        divb.required = true;
        divb.title ="Requerido";
        

        //divc.title ="Requerido";
        divd.required = true;
        divd.title ="Requerido";
        dive.required = true;
        dive.title ="Requerido";
      }
}

function nivelFuncion(sel){
    
    div2 = document.getElementById("carrera");
    div3 = document.getElementById("ce_procedencia");
    div2.disabled = true;
    div3.disabled = true;
    
   
if (sel.value=="8"){
    $(carrera).val('');
    $(ce_procedencia).val('');
       div2.disabled = true;
       div2.required = false;
       div3.disabled = true; 
       div3.required = false;
} if (sel.value=="1"||sel.value=="2"){
    $(carrera).val('');
    div2.disabled = true;
    div3.disabled = false;
    div2.required = false;
    div3.required = true;

    div3.title ="Requerido";
} if((sel.value!="1")&&(sel.value!="2")&&(sel.value!="8")){
    div2.disabled = false;
    div3.disabled = false;
    div2.required = true;
    div3.required = true;
    div2.title ="Requerido";
    div3.title ="Requerido";
}

}







