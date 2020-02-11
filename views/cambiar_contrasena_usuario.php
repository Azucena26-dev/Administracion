<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Panel administrador admin" />
    <meta name="author" content="admin" />
    <title>Panel Administrador | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link rel="stylesheet" href="<?php echo $this->_helpers->linkTo('fonts/font-awesome/css/font-awesome.min.css', 'Assets') ?>">
    <link href="<?php echo $this->_helpers->linkTo('plugins/iconic/css/material-design-iconic-font.min.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="<?php echo $this->_helpers->linkTo('plugins/bootstrap/css/bootstrap.min.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="<?php echo $this->_helpers->linkTo('css/pages/extra_pages.css', 'Assets') ?>">
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo $this->_helpers->linkTo('img/KodiGo.png', 'Assets') ?>" />
    <link href="<?php echo $this->_helpers->linkTo('plugins/bootstrap-sweetalert/sweet-alert.css', 'Assets') ?>" rel="stylesheet" type="text/css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">

            <form class="login100-form validate-form" id="pass_form">
					<span class="login100-form-logo">
						<img alt="" src="<?php echo $this->_helpers->linkTo('img/KodiGo.png', 'Assets') ?>">
					</span>
                <p class="text-center txt-locked">
                   Cambiar contraseña
                </p>
                <div id="successSent" class="alert alert-success alert-dismissible fade show" style="display:none;">
                    Contraseña cambiada, por favor inicie sesión <a href="<?php echo $this->_helpers->linkTo('') ?>"><b>Iniciar sesión</b></a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="failSent" class="alert alert-danger" style="display:none;">
                    Error al cambiar contraseña!
                </div>
                <div id="emptyRec" class="alert alert-warning" style="display:none">
                </div>
                <div  style="text-align: center;">
                    <img id="loading" style="display:none;" alt="" src="<?php echo $this->_helpers->linkTo('img/ajax-loader.gif', 'Assets') ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="pass" id="pass" placeholder="Nueva contraseña" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="confirm_pass"  id="confirm_pass" placeholder="Confirme contraseña" required>
                </div>
                <div class="container-login100-form-btn">
                    <button id="detailButton" class="login100-form-btn" onclick="cambiar_pass()">
                        Cambiar contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- start js include path -->
<script src="<?php echo $this->_helpers->linkTo('plugins/jquery/jquery.min.js', 'Assets') ?>" ></script>
<!-- bootstrap -->
<script src="<?php echo $this->_helpers->linkTo('plugins/bootstrap/js/bootstrap.min.js', 'Assets') ?>" ></script>


<script src="<?php echo $this->_helpers->linkTo('plugins/jquery-validation/js/jquery.validate.min.js', 'Assets') ?>" ></script>

<!-- Sweet-Alert  -->
<script src="<?php echo $this->_helpers->linkTo('plugins/bootstrap-sweetalert/sweet-alert.min.js', 'Assets') ?>"></script>
<script>

    $("#pass_form").submit(function (e) {
        e.preventDefault();
    });

    function cambiar_pass() {
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

        $("#pass_form").validate({
            rules: {
                pass: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    atLeastOneLowercaseLetter: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true
                },
                confirm_pass: {
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
                pass: {
                    required: "Ingrese la contraseña",
                    minlength: "La contraseña debe contener como minimo 8 caracteres",
                    maxlength: "La contraseña debe contener como máximo 20 caracteres",
                    atLeastOneLowercaseLetter: "La contraseña debe contener al menos una minúscula",
                    atLeastOneUppercaseLetter: "La contraseña debe contener al menos una mayúscula",
                    atLeastOneNumber: "La contraseña debe contener al menos un dígito",
                    atLeastOneSymbol: "La contraseña debe contener al menos uno de los siguientes símbolos: !@#$%^&*"
                },
                confirm_pass: {
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
        var rootLocation = '/admin/sesion/resetPass';
        var pass = $('#pass').val();
        var confirm_pass = $('#confirm_pass').val();
        console.log(pass);console.log(confirm_pass);

        if ($('#pass_form').valid()) {
            $("#failSent").attr('style', 'display:none;');
            $("#successSent").attr('style', 'display:none;');
            $("#emptyRec").attr('style', 'display:none;');

            if (pass == confirm_pass && confirm_pass.length != 0) {
                $("#loading").removeAttr('style');
                $.
                ajax({
                    method: 'POST',
                    dataType: 'json',
                    url: rootLocation,
                    data: {
                        pass: pass,confirm_pass:confirm_pass
                    },
                    success: function (dt) {
                        $("#loading").attr('style', 'display:none;');
                        if (dt.mensaje == "success") {
                            $("#successSent").removeAttr('style');
                            callAlert();
                        } else {
                            if (dt.mensaje == "invalid") {
                                $("#emptyRec").removeAttr('style');
                                $('#emptyRec').html("La contraseña no debe contener espacios en blanco");
                            } else {
                                $("#failSent").removeAttr('style');
                            }
                        }
                    },
                    error: function (d) {
                        $("#loading").attr('style', 'display:none;');
                        $("#successSent").attr('style', 'display:none;');
                        $("#failSent").removeAttr('style');
                    }
                });

            } else {
                $("#emptyRec").removeAttr('style');
                $('#emptyRec').html("Las contraseñas no coinciden");
            }
        }
    }

    function callAlert() {
        swal({
            title: "Contraseña cambiada, por favor inicie sesión",
            text: "Será redirigido a la página de login",
            type: "success",
            showCancelButton: false,
            confirmButtonClass: 'btn-success',
            confirmButtonText: "Ok",
            closeOnConfirm: true
        }, function () {
            var rootLocation = "/admin/";
            window.location.href = rootLocation;
        });
    }

</script>
</body>
</html>