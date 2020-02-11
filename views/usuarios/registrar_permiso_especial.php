<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Panel administrador admin" />
    <meta name="author" content="admin" />
    <title>Permisos Especiales | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
    <?php $this->renderPartial('head', 'php') ?>
    <!-- data tables -->
    <link href="<?php echo $this->_helpers->linkTo('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css', 'Assets') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->_helpers->linkTo('plugins/select2/css/select2.css', 'Assets') ?>" rel="stylesheet"
          type="text/css">
    <link href="<?php echo $this->_helpers->linkTo('plugins/select2/css/select2-bootstrap.min.css', 'Assets') ?>"
          rel="stylesheet" type="text/css">
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
                            <li class="active">Permisos Especiales</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Seleccione grado, docente y permiso especial</header>
                                    <img id="loading"  style="display: none"
                                         src="<?php echo $this->_helpers->linkTo('img/ajax-loader.gif', 'Assets') ?>">
                                </div>
                                <div class="card-body " id="bar-parent5">
                                    <div class="row">
                                        <form class="form-inline" id="permisosEspeciales">
                                            <div class="form-group col-md-3 col-sm-12">
                                                <select class="form-control select2" id="rol" name="rol" onchange="seleccionarDocentes()">
                                                    <option selected value>Seleccione...</option>
                                                    <?php foreach ($roles as $r) {?>
                                                        <option value="<?php echo $r['id_rol']?>"><?php echo $r['rol']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-12">
                                                <select class="form-control select2" id="docente" name="docente">
                                                    <option selected value>Seleccione...</option>
                                                    <?php foreach ($usuarios as $r) {?>
                                                        <option value="<?php echo $r['id_usuario']?>"><?php echo $r['nombre']." ".$r['apellido']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-12">
                                                <select class="form-control select2" id="menu" name="menu">
                                                    <option selected value>Seleccione...</option>
                                                    <?php foreach ($menus as $e) {?>
                                                        <option value="<?php echo $e['id_menu']?>"><?php echo $e['menu']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-12">
                                                <button type="button" class="form-control btn btn-success btn-block" id="registrar" onclick="registrarPermiso()">Registrar permiso especial</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Permisos especiales activos</header>
                                </div>
                                <div class="card-body ">
                                    <div class="table-scrollable">
                                        <table id="dataTable" class="display" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Permiso</th>
                                                <th>Acción</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tablaNotas">
                                            <?php foreach ($permisosEspeciales as $a) {?>
                                                <tr>
                                                    <td><?php echo $a['nombre']?></td>
                                                    <td><?php echo $a['apellido']?></td>
                                                    <td><?php echo $a['menu']?></td>
                                                    <td><button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-danger" onclick="borrarPermiso(<?php echo $a['id_privilegios_especiales']?>,<?php echo $a['id_menu']?>,<?php echo $a['id_usuario']?>)">Borrar</button></td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
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
<!-- data tables -->
<script src="<?php echo $this->_helpers->linkTo('plugins/datatables/jquery.dataTables.min.js', 'Assets') ?>" ></script>
<script src="<?php echo $this->_helpers->linkTo('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js', 'Assets') ?>" ></script>
<script src="<?php echo $this->_helpers->linkTo('plugins/select2/js/select2.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('js/pages/select2/select2-init.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('plugins/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js', 'Assets') ?>" ></script>
<script>
    $(document).ready(function() {

        $('#rol').select2({
            placeholder: 'Seleccione el rol',
            allowClear: false
        });
        $('#docente').select2({
            placeholder: 'Seleccione el docente',
            allowClear: false
        });
        $('#menu').select2({
            placeholder: 'Seleccione el permiso',
            allowClear: false
        });

        $('#dataTable').DataTable({
            "ordering": false,
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: -1
        });


    } );

    function seleccionarDocentes() {

        $("#loading").removeAttr('style');
        $("#registrar").prop("disabled",true);
        var rootLocation = '/admin/usuarios/buscarUsuarios';
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {
                rol: $("#rol").val()
            },
            success: function (dt) {
                if (dt.mensaje == 'success') {
                    $('#docente').empty();
                    $('#docente').append($('<option>', {
                        value: '',
                        text : "Seleccione..."
                    }));
                    $.each(dt.docentes, function (i, item) {
                        $('#docente').append($('<option>', {
                            value: item.id_usuario,
                            text : item.nombre +" "+ item.apellido
                        }));
                    });

                    seleccionarPermisosAsignables();

                } else {

                }

                $("#loading").attr('style', 'display:none;');
                $("#registrar").prop("disabled",false);
            },
            error: function (d) {
                $("#loading").attr('style', 'display:none;');
                $("#registrar").prop("disabled",false);
            }
        });
    }

    function seleccionarPermisosAsignables() {
        $("#loading").removeAttr('style');
        $("#registrar").prop("disabled",true);
        var rootLocation = '/admin/usuarios/buscarPermisosAsignables';
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {
                rol: $("#rol").val()
            },
            success: function (dt) {
                if (dt.mensaje == 'success') {
                    $('#menu').empty();
                    $('#menu').append($('<option>', {
                        value: '',
                        text : "Seleccione..."
                    }));
                    $.each(dt.menu, function (i, item) {
                        $('#menu').append($('<option>', {
                            value: item.id_menu,
                            text : item.menu
                        }));
                    });
                } else {

                }

                $("#loading").attr('style', 'display:none;');
                $("#registrar").prop("disabled",false);
            },
            error: function (d) {
                $("#loading").attr('style', 'display:none;');
                $("#registrar").prop("disabled",false);
            }
        });
    }
    function registrarPermiso() {
        $("#permisosEspeciales").validate({
            rules: {
                rol: "required",
                docente: "required",
                menu: "required"
            },
            messages: {
                rol: "Seleccione el rol",
                docente: "Seleccione al docente",
                menu: "Seleccione el privilegio"
            }
        });

        var text1 = "Permiso registrado!";
        var text2 = "Permiso no registrado";
        var mensajeRedireccion = "Será redirigido a la página de permisos especiales!";
        var urlRedireccion = "/admin/usuarios/asignarPrivilegiosEspeciales";
        var tipoRedireccion = "success";

        if ($("#permisosEspeciales").valid()) {

            $("#loading").removeAttr('style');
            $("#registrar").prop("disabled",true);
            var rootLocation = '/admin/usuarios/registrarPermisos';
            $.ajax({
                method: 'POST',
                dataType: 'json',
                url: rootLocation,
                data: {
                    usuario: $("#docente").val(),
                    permiso: $("#menu").val()
                },
                success: function (dt) {
                    if (dt.mensaje == 'success') {
                        alerta_redireccion(text1, mensajeRedireccion, urlRedireccion, tipoRedireccion);
                    } else {
                        if(dt.mensaje == 'noempty'){
                            swal("Permiso Existente!", "Ya existe el permiso "+$( "#menu option:selected" ).text()+" del usuario "+$( "#docente option:selected" ).text(), "info")
                        } else {
                            tipoRedireccion = "error";
                            alerta_redireccion(text2, mensajeRedireccion, urlRedireccion, tipoRedireccion);
                        }
                    }

                    $("#loading").attr('style', 'display:none;');
                    $("#registrar").prop("disabled",false);
                },
                error: function (d) {
                    tipoRedireccion = "error";
                    alerta_redireccion(text2, mensajeRedireccion, urlRedireccion, tipoRedireccion);
                    $("#loading").attr('style', 'display:none;');
                    $("#registrar").prop("disabled",false);
                }
            });
        }

    }

    function borrarPermiso(id_privilegio, id_menu,id_usuario) {
        var text1 = "Permiso borrado!";
        var text2 = "Permiso no borrado";
        var mensajeRedireccion = "Será redirigido a la página de permisos especiales!";
        var urlRedireccion = "/admin/usuarios/asignarPrivilegiosEspeciales";
        var tipoRedireccion = "success";

        $("#loading").removeAttr('style');
        $("#registrar").prop("disabled",true);
        var rootLocation = '/admin/usuarios/borrarPermiso';
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {
                id_privilegio: id_privilegio,
                id_menu: id_menu,
                id_usuario: id_usuario
            },
            success: function (dt) {
                if (dt.mensaje == 'success') {
                    alerta_redireccion(text1, mensajeRedireccion, urlRedireccion, tipoRedireccion);
                } else {
                    tipoRedireccion = "error";
                    alerta_redireccion(text2, mensajeRedireccion, urlRedireccion, tipoRedireccion);
                }

                $("#loading").attr('style', 'display:none;');
                $("#registrar").prop("disabled",false);
            },
            error: function (d) {
                tipoRedireccion = "error";
                alerta_redireccion(text2, mensajeRedireccion, urlRedireccion, tipoRedireccion);
                $("#loading").attr('style', 'display:none;');
                $("#registrar").prop("disabled",false);
            }
        });

    }

</script>

</body>
</html>