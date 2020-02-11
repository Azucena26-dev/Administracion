<!DOCTYPE html>
<html>
<head>
    <?php
    if(isset($_SESSION['id'])){
        echo '<script>window.location.href = "https://" + window.location.host+window.location.pathname+"index/dashboard"; </script>';
    }
    ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Panel administrador KODIGO" />
    <meta name="author" content="KODIGO" />
    <title>Estudiante| <?php echo GlobalValuesPage::TitleGlobal; ?></title>
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
    <link rel="shortcut icon" href="<?php echo $this->_helpers->linkTo('img/KodiGoIco.png', 'Assets') ?>" />
    <link href="<?php echo $this->_helpers->linkTo('plugins/bootstrap-sweetalert/sweet-alert.css', 'Assets') ?>" rel="stylesheet" type="text/css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="limiter">
    <div class="container-login100 page-background" id="form_login" >
        <div class="wrap-login100" style="background :#ff6600 " >
            <form class="login100-form validate-form" id="login_form" >
                <div  style="text-align: center;" >
                    <img id="loading" style="display:none; "  alt="" src="<?php echo $this->_helpers->linkTo('img/ajax-loader.gif', 'Assets') ?>">
                    <br><br>
                </div>
					<span class="login100-form-logo" >
						<img alt="" src="<?php echo $this->_helpers->linkTo('img/kodiGo.png', 'Assets') ?>">
					</span>
                <span class="login100-form-title p-b-34 p-t-27" "  >
						Iniciar sesión
					</span>
                <div class="alert alert-warning" role="alert" id="blocked" style="display:none;">
                Su cuenta fue bloqueada! Contacte al administrador
                </div>
                <div class="alert alert-danger" role="alert" id="invalid" style="display:none">
                    Contraseña inválida!
                </div>
                <div class="alert alert-danger" role="alert" id="empty" style="display:none">
                    Usuario no existe o su cuenta fue bloqueada!
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="username" id="username" placeholder="Nombre de usuario" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="pass" id="pass" placeholder="Contraseña" required>
                </div>

                <div class="container-login100-form-btn" style="btn-color:#000000">
                    <a class="login100-form-btn"  onclick="login()">
                        Iniciar sesión
                    </a>
                </div>
                <div class="text-center p-t-30" >
                    <a class="txt1" href="#!" onclick="olvidoContrasena()" >
                        Olvidó su contraseña?
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="container-login100 page-background" id="forgot_form" style="display: none">
        <div class="wrap-login100">
            <form class="login100-form validate-form" id="form_forgot">
					<span class="login100-form-logo">
							<img alt="" src="<?php echo $this->_helpers->linkTo('img/kodiGo.png', 'Assets') ?>">
					</span>
                <p class="text-center txt-small-heading">
                    Olvidó su contraseña?
                </p>
                <div id="successSent" class="alert alert-success" style="display:none;">
                   Correo enviado, revise su correo y siga las instrucciones!
                </div>

                <div id="failSent" class="alert alert-danger" style="display:none;">
                    Correo no enviado!
                </div>
                <div id="emptyRec" class="alert alert-warning" style="display:none">
                    Correo no encontrado, contacte al administrador!
                </div>
                <div  style="text-align: center;">
                    <img id="loading" style="display:none;" alt="" src="<?php echo $this->_helpers->linkTo('img/ajax-loader.gif', 'Assets') ?>">
                </div>
                <br>
                <div class="form-group" data-validate = "Enter username">
                    <input class="form-control" type="text" id="correo" name="correo" placeholder="Ingrese su correo" required>
                </div>
                <div class="container-login100-form-btn">
                    <a class="login100-form-btn" onclick="enviar()" id="detailButton">
                       Enviar
                    </a>
                </div>
                <div class="text-center p-t-27">
                    <a class="txt1" href="#!" onclick="regresar()">
                        Regresar al Log in?
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
<!-- Sweet-Alert  -->
<script src="<?php echo $this->_helpers->linkTo('plugins/bootstrap-sweetalert/sweet-alert.min.js', 'Assets') ?>"></script>
<script>
    function login() {

        $("#login_form").validate({
            rules: {
                username: {
                    required : true,
                },
                pass: {
                    required: true
                }
            },

            messages: {
                username: {
                    required : "Ingrese nombre de usuario"
                },

                pass: {
                    required: "Ingrese la contraseña"
                }
            }
        });


        var rootLocation = '/admin/sesion/login';
        var redirectrootLocation = '/admin/index/dashboard';
        var nombre_usuario = $('#username').val();
        var password = $('#pass').val();
        $("#blocked").attr('style', 'display:none;');
        $("#empty").attr('style', 'display:none;');
        $("#loading").removeAttr('style');
        $("#invalid").attr('style', 'display:none;');
        if ($('#login_form').valid()) {
            $.ajax({
                method: 'POST',
                dataType: 'json',
                url: rootLocation,
                data: {
                    nombre_usuario: nombre_usuario,
                    password: password
                },
                success: function (dt) {
                    if (dt.mensaje == 'success') {
                        window.location.replace(redirectrootLocation);
                    } else {
                        if (dt.mensaje == "empty") {
                            $("#loading").attr('style', 'display:none;');
                            $("#empty").removeAttr('style');
                        } else {

                            if (dt.mensaje == "blocked") {
                                $("#blocked").removeAttr('style');

                            } else {
                                $("#invalid").removeAttr('style');
                                $("#loading").attr('style', 'display:none;');
                            }
                        }
                    }
                },

                error: function (d) {

                    $("#blocked").attr('style', 'display:none;');
                    $("#empty").attr('style', 'display:none;');
                    $("#invalid").attr('style', 'display:none;');

                }
            });
        }
    }
    
    function olvidoContrasena() {
        $("#form_login").hide();
        $("#forgot_form").show();
    }

    function regresar() {
        $("#form_login").show();
        $("#forgot_form").hide();
    }

    $("#form_forgot").submit(function (e) {
        e.preventDefault();
    });

    $("#login_form").submit(function (e) {
        e.preventDefault();
    });

    function enviar() {
        $("#form_forgot").validate({
            rules: {
                correo: {
                    required : true,
                    email: true
                }
            },

            messages: {
                correo: {
                    required : "Ingrese el correo electrónico",
                    email: "Ingrese un correo electrónico válido"
                }
            }
        });
        var rootLocation = '/admin/sesion/recobrarContrasena';
        var correo = $('#correo').val();
        $('#detailButton').prop('disabled', true);
        if ($('#form_forgot').valid()) {
            $('#detailButton').prop('disabled', false);
            $("#failSent").attr('style', 'display:none;');
            $("#successSent").attr('style', 'display:none;');
            $("#emptyRec").attr('style', 'display:none;');
            $("#loading").removeAttr('style');
            $.ajax({
                method: 'POST',
                dataType: 'json',
                url: rootLocation,
                data: {
                   correo:correo
                },
                success: function (dt) {
                    $("#loading").attr('style', 'display:none;');
                    if(dt.mensaje == "success"){
                        $("#successSent").removeAttr('style');
                        callAlert();
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
                    $('#detailButton').prop('disabled', false);
                }
            });
        }
    }

    function callAlert() {
        swal({
            title: "Correo enviado!, revise su correo y siga las instrucciones",
            text: "Será redirigido a la página de login",
            type: "success",
            showCancelButton: false,
            confirmButtonClass: 'btn-success',
            confirmButtonText: "Ok!",
            closeOnConfirm: true
        }, function () {
            var rootLocation = "/admin/";
            window.location.href = rootLocation;
        });
    }


</script>
</body>
</html>