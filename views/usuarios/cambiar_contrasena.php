<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Responsive Admin Template"/>
    <meta name="author" content="SmartUniversity"/>
    <title>Cambiar Contraseña | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
    <?php $this->renderPartial('head', 'php') ?>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-blue white-sidebar-color logo-blue">
<div class="page-wrapper">
    <?php require_once "views/partials/_header_top.php"; ?>
    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
        <?php require_once "views/partials/_menu.php"; ?>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-left">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                   href="<?php echo $this->_helpers->linkTo('index/dashboard') ?>">Inicio</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li><a href="#!">Gestionar usuarios</a><i class="fa fa-angle-right"></i></li>
                            <li class="active">Cambiar Contraseña</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Cambiar Contraseña</header>
                            </div>
                            <div class="card-body " id="bar-parent">
                                <form class="form-horizontal" id="form_inputs">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div id="mensaje_error" class="form-group" style="display: none;">
                                                    <label class="control-label" style="text-align: left; color:red">Las
                                                        contraseñas no coinciden</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Digite la nueva contraseña: <span
                                                                class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <input name="contra1" id="contra1" type="password"
                                                               class="form-control" data-mask
                                                               placeholder="Nueva contraseña ...">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button whide type="button" onclick="guardar_f1()"
                                                            class="btn btn-primary">Cambiar Contraseña</i></button>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group" id="nuevaContra">
                                                    <label class="control-label">Repetir la nueva contraseña: <span
                                                                class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <input name="contra2" id="contra2" type="password"
                                                               class="form-control" placeholder="Repita contraseña"
                                                               required="required">
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
    <?php require_once "views/partials/_footer.php"; ?>
    <!-- end footer -->
</div>
<?php require_once "views/partials/_outputJs.php"; ?>
<!-- end js include path -->
<script src="<?php echo $this->_helpers->linkTo('js/parsley.js', 'Assets') ?>"></script>

<script>
    //Habilitar el div
    document.getElementById('nuevaContra').style.display = 'none';
    document.getElementById('mensaje_error').style.display = 'none';

    $("#contra1").keyup(function () {
        if ($(this).val() == 0) {
            document.getElementById('nuevaContra').style.display = 'none';
            document.getElementById('mensaje_error').style.display = 'none';
            $("#contra2").val('');
        } else {
            document.getElementById('nuevaContra').style.display = 'block';
        }
    });

    $("#contra2").keyup(function () {
        document.getElementById('mensaje_error').style.display = 'none';
    });
</script>
<?php require_once "views/partials/_outputJs.php"; ?>
<script>
    //llamada para guardar datos
    function guardar_f1() {

        $.validator.addMethod("lettersAndNumbersOnly", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);
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

                contra2: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    atLeastOneLowercaseLetter: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true
                },

                contra1: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    atLeastOneLowercaseLetter: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true
                }

            },

            messages: {

                contra2: {
                    required: "Ingrese la contraseña",
                    minlength: "La contraseña debe contener como minimo 8 caracteres",
                    maxlength: "La contraseña debe contener como máximo 20 caracteres",
                    atLeastOneLowercaseLetter: "La contraseña debe contener al menos una minúscula",
                    atLeastOneUppercaseLetter: "La contraseña debe contener al menos una mayúscula",
                    atLeastOneNumber: "La contraseña debe contener al menos un dígito",
                    atLeastOneSymbol: "La contraseña debe contener al menos uno de los siguientes símbolos: !@#$%^&*"
                },
                contra1: {
                    required: "Ingrese la contraseña",
                    minlength: "La contraseña debe contener como minimo 8 caracteres",
                    maxlength: "La contraseña debe contener como máximo 20 caracteres",
                    atLeastOneLowercaseLetter: "La contraseña debe contener al menos una minúscula",
                    atLeastOneUppercaseLetter: "La contraseña debe contener al menos una mayúscula",
                    atLeastOneNumber: "La contraseña debe contener al menos un dígito",
                    atLeastOneSymbol: "La contraseña debe contener al menos uno de los siguientes símbolos: !@#$%^&*"
                }

            }
        });
        if ($("#form_inputs").valid()) {
            if ($("#contra1").val() == $("#contra2").val()) {
                $("#loading").removeAttr('style');
                var url_form = '/admin/usuarios/guardar';
                var str = $("#form_inputs").serialize();
                var text1 = "Contraseña actualizada!";
                var text2 = "Contraseña no actualizado";
                var mensajeRedireccion = " Será redirigido a la página de Cambiar Contraseña";
                var urlRedireccion = "/admin/usuarios/editar";
                var tipoRedireccion = "success";
                ajax_call(url_form, str, text1, text2, "1", mensajeRedireccion, urlRedireccion, tipoRedireccion);
            } else {
                document.getElementById('mensaje_error').style.display = 'block';
            }
        }
    }

    //limpiar un bloque de div
    function limpiarDiv() {
        document.getElementById('nuevaContra').style.display = 'none';
        $("#contra2").val('');
    };

    //expresion regular para la contraseña
    function exp(expRegular) {
        var pass = document.getElementById('contra2').value;
        var expresion = new RegExp(expRegular);
        if (expresion.test(pass)) {
            return true;
        } else {
            return false;
        }
    }

</script> <!--script funcionamiento-->


</body>
</html>


