<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Panel administrador admin" />
    <meta name="author" content="admin" />
    <title>Editar usuario | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
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
                        <ol class="breadcrumb page-breadcrumb pull-left">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo $this->_helpers->linkTo('index/dashboard') ?>">Inicio</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li><a href="#!">Gestionar usuarios</a><i class="fa fa-angle-right"></i></li>
                            <li><a class="parent-item"
                                   href="<?php echo $this->_helpers->linkTo('usuarios/actualizar') ?>">Actualizar usuarios</a><i class="fa fa-angle-right"></i></li>
                            <li class="active">Editar usuarios</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Editar usuario</header>
                            </div>
                            <div class="card-body " id="bar-parent">
                                <?php if(!empty($usuario) && $usuario != "0") {?>
                                <form id="form_inputs" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12 colsm-12">
                                                <div class="form-group" id="loading" style="display:none;"><img  alt="" src="<?php echo $this->_helpers->linkTo('img/ajax-loader.gif', 'Assets') ?>"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="nombre" name="nombre" type="text" class="form-control"
                                                               placeholder="Nombre" value="<?php echo $usuario[0]['nombre'] ?>"required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Apellido
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="apellido" name="apellido" type="text" class="form-control"
                                                               placeholder="Apellido" value="<?php echo $usuario[0]['apellido'] ?>"required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Nombre usuario
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="nom_usuario" name="nom_usuario" type="text" class="form-control"
                                                               placeholder="Nombre de usuario"
                                                               value="<?php echo $usuario[0]['usuario'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <a type="button"
                                                   onclick="actualizarUsuario(<?php echo $usuario[0]['id_usuario'] ?>)"
                                                   class="btn btn-primary">
                                                    Actualizar
                                                </a>
                                                <a href="<?php echo $this->_helpers->linkTo('usuarios/actualizar') ?>"
                                                   type="button" class="btn btn-primary">
                                                    Regresar
                                                </a>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Correo
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="input-icon right">
                                                        <input id="correo" name="correo" type="email" class="form-control" placeholder="Email"
                                                               value="<?php echo $usuario[0]['correo'] ?>"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Rol
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <select class="form-control input-height" id="rol" name="rol" disabled>
                                                        <?php $r = new Roles();
                                                        $roles = $r->consultarRoles(); ?>
                                                        <?php foreach ($roles as $r) { ?>
                                                            <option value="<?php echo $r['id_rol'] ?>"><?php echo $r['rol'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Estado
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <select class="form-control input-height" id="estado" name="estado">
                                                        <option value="1">Activo</option>
                                                        <option value="2">No activo</option>
                                                        <option value="bloqueado">Bloqueado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php } else  {?>
                                    <h5>Usuario no encontrado</h5>
                                <?php }?>
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
<script>
    $(document).ready(function () {
        var id = "<?php echo $usuario[0]['id_rol']?>";
        $("#rol option[value=" + id + "]").prop('selected', true);
        var id_estado = "<?php echo $usuario[0]['activo']?>";
        if(id_estado == "0"){
            id_estado = "bloqueado";
        }
        $("#estado option[value=" + id_estado + "]").prop('selected', true);
    });

    function actualizarUsuario(id) {

        $.validator.addMethod("lettersAndNumbersOnly", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);
        }, "");

        $("#form_inputs").validate({
            rules: {
                nom_usuario: {
                    required: true,
                    lettersAndNumbersOnly: true
                },
                nombre: {
                    required: true,
                    lettersAndNumbersOnly: true
                },
                apellido: {
                    required: true,
                    lettersAndNumbersOnly: true
                },
                correo: {
                    required: true,
                    email: true
                },
                rol: "required",
                estado: "required"
            },

            messages: {
                nom_usuario: {
                    required: "Ingrese nombre de usuario",
                    lettersAndNumbersOnly: 'El nombre de usuario solo debe contener letras y números'
                },
                nombre: {
                    required: "Ingrese el nombre",
                    lettersAndNumbersOnly: 'El nombre solo debe contener letras y números'
                },
                apellido: {
                    required: "Ingrese el apellido",
                    lettersAndNumbersOnly: 'El apellido solo debe contener letras y números'
                },
                correo: {
                    required: "Ingrese correo electrónico",
                    email: "Ingrese un correo electrónico válido"
                },

                rol: "Seleccione un rol",
                estado: "Seleccione un estado"
            }
        });
        if ($("#form_inputs").valid()) {
            $("#loading").removeAttr('style');
            var url_form = '/admin/usuarios/actualizarUsuario';
            var str = $("#form_inputs").serialize() + '&id=' + id;
            var text1 = "Usuario actualizado!";
            var text2 = "Usuario no actualizado";
            var mensajeRedireccion = " Será redirigido a la página de actualizar usuario";
            var urlRedireccion = "/admin/usuarios/actualizar";
            var tipoRedireccion = "success";
            ajax_call(url_form,str,text1,text2,"1",mensajeRedireccion,urlRedireccion,tipoRedireccion);
        }

    }

</script>
</body>
</html>