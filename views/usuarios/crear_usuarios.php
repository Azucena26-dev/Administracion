<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Panel administrador admin" />
    <meta name="author" content="admin" />
    <title>Crear usuario | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
    <?php $this->renderPartial('head', 'php') ?>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-blue white-sidebar-color logo-blue">
<div class="page-wrapper">
    <?php require_once "views/partials/_header_top.php";?>

    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
        <?php require_once "views/partials/_menu.php";?>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <ol class="breadcrumb page-breadcrumb pull-left">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo $this->_helpers->linkTo('index/dashboard') ?>">Inicio</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li><a href="#!">Gestionar usuarios</a><i class="fa fa-angle-right"></i></li>
                            <li class="active">Crear usuario</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Crear usuario</header>
                            </div>
                            <div class="card-body " id="bar-parent">
                                <form id="form_inputs" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" style="display: none;" id="mensaje_error">
                                                    <div class="alert alert-danger" >
                                                        Las contraseñas no coinciden!
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: none;" id="username_error">
                                                    <div class="alert alert-danger" >
                                                        Ya existe un usuario registrado con ese nombre de usuario!
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: none;" id="email_error">
                                                    <div class="alert alert-danger" >
                                                        Ya existe un usuario registrado con ese correo!
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: none;" id="loading">
                                                    <img  alt="" src="<?php echo $this->_helpers->linkTo('img/ajax-loader.gif', 'Assets') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Apellido
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellido" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Nombre de usuario
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="nom_usuario" name="nom_usuario" type="text" class="form-control" placeholder="Nombre de usuario" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Correo
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="correo" name="correo" type="email" class="form-control" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a type="button" onclick="crearUsuario()" class="btn btn-primary">Registrar</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Contraseña
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="contrasenia" name="contrasenia" type="password" class="form-control" placeholder="Ingrese la contraseña" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label"> Confirmar contraseña
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="confirmar_contrasenia" name="confirmar_contrasenia" type="password" class="form-control" placeholder="Confirme contraseña" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Rol
                                                    </label>
                                                    <span class="required"> * </span>
                                                    <select class="form-control input-height" id="rol" name="rol">
                                                        <?php foreach ($roles as $r) {?>
                                                            <option value="<?php echo $r['id_rol']?>"><?php echo $r['rol']?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Estado
                                                    </label>
                                                    <span class="required"> * </span>
                                                    <select class="form-control input-height" id="estado" name="estado">
                                                        <option value="1">Activo</option>
                                                        <option value="2">No activo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page content -->
        <!-- end chat sidebar -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <?php require_once "views/partials/_footer.php";?>
    <!-- end footer -->
</div>
<?php require_once "views/partials/_outputJs.php";?>
<script>


    function crearUsuario() {
        $.validator.addMethod("lettersAndNumbersOnly", function (value, element) {
            return this.optional(element) || /^([a-z0-9 _-]+)$/.test(value);
        }, "");

        /**
         * Custom validator for contains at least one lower-case letter
         */
        $.validator.addMethod("atLeastOneLowercaseLetter", function (value, element) {
            return this.optional(element) || /[a-z]+/.test(value);
        }, "");

        /**
         * Custom validator for contains at least one upper-case letter.
         */
        $.validator.addMethod("atLeastOneUppercaseLetter", function (value, element) {
            return this.optional(element) || /[A-Z]+/.test(value);
        }, "");

        /**
         * Custom validator for contains at least one number.
         */
        $.validator.addMethod("atLeastOneNumber", function (value, element) {
            return this.optional(element) || /[0-9]+/.test(value);
        }, "");

        /**
         * Custom validator for contains at least one symbol.
         */
        $.validator.addMethod("atLeastOneSymbol", function (value, element) {
            return this.optional(element) || /[!@#$%^&*]+/.test(value);
        }, "");

        $("#form_inputs").validate({
            rules: {
                nom_usuario: {
                    required : true,
                    lettersAndNumbersOnly: true
                },
                nombre: {
                    required : true,
                    lettersAndNumbersOnly: true
                },
                apellido: {
                    required : true,
                    lettersAndNumbersOnly: true
                },
                correo: {
                    required: true,
                    email: true
                },
                contrasenia: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    atLeastOneLowercaseLetter: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true
                },
                confirmar_contrasenia: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    atLeastOneLowercaseLetter: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true
                },
                rol: "required",
                estado: "required"
            },

            messages: {
                nom_usuario: {
                    required : "Ingrese nombre de usuario",
                    lettersAndNumbersOnly: 'El nombre de usuario solo debe contener letras minúsculas y números'
                },
                nombre: {
                    required : "Ingrese el nombre",
                    lettersAndNumbersOnly: 'El nombre solo debe contener letras minúsculas y números'
                },
                apellido: {
                    required : "Ingrese el apellido",
                    lettersAndNumbersOnly: 'El apellido solo debe contener letras minúsculas y números'
                },
                correo: {
                    required: "Ingrese correo electrónico",
                    email: "Ingrese un correo electrónico válido"
                },
                contrasenia: {
                    required: "Ingrese la contraseña",
                    minlength: "La contraseña debe contener como minimo 8 caracteres",
                    maxlength: "La contraseña debe contener como máximo 20 caracteres",
                    atLeastOneLowercaseLetter: "La contraseña debe contener al menos una minúscula",
                    atLeastOneUppercaseLetter: "La contraseña debe contener al menos una mayúscula",
                    atLeastOneNumber: "La contraseña debe contener al menos un dígito",
                    atLeastOneSymbol: "La contraseña debe contener al menos uno de los siguientes símbolos: !@#$%^&*"
                },
                confirmar_contrasenia: {
                    required: "Ingrese la contraseña",
                    minlength: "La contraseña debe contener como minimo 8 caracteres",
                    maxlength: "La contraseña debe contener como máximo 20 caracteres",
                    atLeastOneLowercaseLetter: "La contraseña debe contener al menos una minúscula",
                    atLeastOneUppercaseLetter: "La contraseña debe contener al menos una mayúscula",
                    atLeastOneNumber: "La contraseña debe contener al menos un dígito",
                    atLeastOneSymbol: "La contraseña debe contener al menos uno de los siguientes símbolos: !@#$%^&*"
                },
                rol: "Seleccione un rol",
                estado: "Seleccione un estado"
            }
        });
        var url_form = "/admin/usuarios/crearUsuario";
        var pass = $("#contrasenia").val();
        var c_pass = $("#confirmar_contrasenia").val();
        var text1 = "Usuario creado con éxito!";
        var text2 = "Usuario no creado!";
        var mensajeRedireccion = " Será redirigido a la página de crear usuario";
        var urlRedireccion = "/admin/usuarios/crear";
        var tipoRedireccion = "success";
        $("#mensaje_error").attr('style', 'display:none;');
        $("#username_error").attr('style', 'display:none;');
        $("#email_error").attr('style', 'display:none;');
        if(pass == c_pass){
            var str = $("#form_inputs").serialize();
            if($("#form_inputs").valid()){
                $("#loading").removeAttr('style');
                crearUser(url_form,str,text1,text2,"1",mensajeRedireccion,urlRedireccion,tipoRedireccion);
            }
        } else {
            $("#mensaje_error").removeAttr("style")
        }

    }

    function crearUser(url_form,str,text1,text2,alert,mensajeRedireccion,urlRedireccion,tipoRedireccion){
        $.ajax({
            url: url_form,
            dataType: 'json',
            type: 'POST',
            data: str,
            success: function (dt) {
                if (dt.mensaje == 'success') {
                    cleanInputs_1();
                    if(alert == "1"){
                        alerta_redireccion_1(text1,mensajeRedireccion,urlRedireccion,tipoRedireccion);
                    }
                } else {
                   if(dt.mensaje == 'invalidUsername'){
                       $("#username_error").removeAttr("style")
                   } else {
                       if(dt.mensaje == 'invalidEmail'){
                           $("#email_error").removeAttr("style")
                       } else {
                           console.log(dt.mensaje);
                       }
                   }
                }
                $("#loading").attr('style', 'display:none;');
            },
            error: function (d) {
                alerta_redireccion_1(text2,mensajeRedireccion,urlRedireccion,"error");
                $("#loading").attr('style', 'display:none;');
            }
        });
    }

    //limpiar los input
    function cleanInputs_1() {
        $("#form_inputs")[0].reset();
    };

    function alerta_redireccion_1(mensaje1,mensajeRedireccion,urlRedireccion,tipoRedireccion) {
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

</script>

</body>
</html>