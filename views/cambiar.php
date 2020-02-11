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

    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="limiter">
    <div class="container-login100 page-background" id="form_login">
        <div class="wrap-login100">
            <form class="login100-form validate-form" id="codigo_form" >
					<span class="login100-form-logo">
							<img alt="" src="<?php echo $this->_helpers->linkTo('img/KodiGo.png', 'Assets') ?>">
					</span>
                <p class="text-center txt-small-heading">
                    Recuperar contraseña
                </p>
                <div id="successSent" class="alert alert-success" style="display:none;">
                    Código enviado!
                </div>

                <div id="failSent" class="alert alert-danger" style="display:none;">
                    Código no enviado!
                </div>
                <div id="emptyRec" class="alert alert-warning" style="display:none">
                    Código no encontrado!
                </div>
                <div  style="text-align: center;">
                    <img id="loading" style="display:none;" alt="" src="<?php echo $this->_helpers->linkTo('img/ajax-loader.gif', 'Assets') ?>">
                </div>
                <br>
                <div class="form-group">
                    <input class="form-control" type="text" id="codigo" name="codigo" placeholder="Ingrese el código" required>
                </div>
                <div class="container-login100-form-btn">
                    <a class="login100-form-btn" onclick="enviarCodigo()" id="detailButton">
                        Enviar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- start js include path -->
<script src="<?php echo $this->_helpers->linkTo('plugins/jquery/jquery.min.js', 'Assets') ?>" ></script>
<!-- bootstrap -->
<script src="<?php echo $this->_helpers->linkTo('plugins/bootstrap/js/bootstrap.min.js', 'Assets') ?>" ></script>
<!-- end js include path -->
<script src="<?php echo $this->_helpers->linkTo('js/pages/extra-pages/pages.js', 'Assets') ?>" ></script>

<script src="<?php echo $this->_helpers->linkTo('plugins/jquery-validation/js/jquery.validate.min.js', 'Assets') ?>" ></script>
<script>

    $("#codigo_form").submit(function (e) {
        e.preventDefault();
    });

    function enviarCodigo() {
        $.validator.addMethod("numbersOnly", function (value, element) {
            return this.optional(element) || /^[0-9]+$/i.test(value);
        });
        $("#codigo_form").validate({
            rules: {
                codigo: {
                    required : true,
                    numbersOnly: true
                }
            },

            messages: {
                codigo: {
                    required : "Ingrese el código",
                    numbersOnly: "Porfavor ingrese solo números"
                }
            }
        });
        var rootLocation = '/admin/sesion/recuperar';
        var codigo = $('#codigo').val();
        var redirectrootLocation = "/admin/sesion/cambiarContrasena";
        if ($('#codigo_form').valid()) {
            $("#failSent").attr('style', 'display:none;');
            $("#successSent").attr('style', 'display:none;');
            $("#emptyRec").attr('style', 'display:none;');
            $("#loading").removeAttr('style');
            $.ajax({
                method: 'POST',
                dataType: 'json',
                url: rootLocation,
                data: {
                    codigo:codigo
                },
                success: function (dt) {
                    $("#loading").attr('style', 'display:none;');
                    if(dt.mensaje == "success"){
                        window.location.replace(redirectrootLocation);
                    } else {
                        if(dt.mensaje == "empty") {
                            $("#emptyRec").removeAttr('style');
                        } else {
                            $("#failSent").removeAttr('style');
                        }
                    }
                },
                error: function (d) {
                    $("#loading").attr('style', 'display:none;');
                    $("#successSent").attr('style', 'display:none;');
                    $("#empty").attr('style', 'display:none;');
                    $("#failSent").removeAttr('style');
                }
            });
        }
    }

</script>
</body>
</html>