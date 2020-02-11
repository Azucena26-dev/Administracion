//funcion para guardar
function guardar(url_form,str,text1,text2){     
    $.ajax({
        url: url_form,
        dataType: 'json',
        type: 'POST',          
        data: str,
        success: function (dt) {
                    if (dt.mensaje == 'success') {
                        $.toast({
                            heading: 'Exito',
                            text: text1,
                            showHideTransition: 'slide',
                            icon: 'success'
                        });
                        cleanInputs();
                    } else {
                        $.toast({
                            heading: 'Error',
                            text: text2,
                            showHideTransition: 'fade',
                            icon: 'error'
                        });
                    }
                },
        error: function (d) {
                    $.toast({
                        heading: 'Error',
                        text: text2,
                        showHideTransition: 'fade',
                        icon: 'error'
                    });
                }                
      });
};
//limpiar los input
function cleanInputs() {
      $("#form_inputs")[0].reset();
};
//limpiar un bloque de div
function limpiarDiv(){
    document.getElementById('nuevaContra').style.display='none';
    $("#contra2").val('');
};
//expresion regular para la contraseña
function exp(expRegular){
    var pass= document.getElementById('contra2').value;
    var expresion=new RegExp(expRegular);
    if(expresion.test(pass)){
        return true;
    }else{
        return false;
    }
}
//funcion para guardar
function buscarPrivilegioE(url_form,str){     
    $.ajax({
        url: url_form,
        dataType: 'json',
        type: 'POST',          
        data: str,
        success: function (dt) {
            console.log(dt.menu);
            $("#origen").html(dt);
            /*var json = JSON.parse(dt);
            for (arreglo in json) {
                //$("#id_ing_muestra").val(json[arreglo].id_ing_muestra);
                alert(json[arreglo].id_menu);
            } */ 
        }
                        
      });
};