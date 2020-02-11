<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Panel administrador admin" />
    <meta name="author" content="admin" />
    <title>Actualizar usuarios | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
    <?php $this->renderPartial('head', 'php') ?>
    <!-- data tables -->
    <link href="<?php echo $this->_helpers->linkTo('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css', 'Assets') ?>"
          rel="stylesheet" type="text/css"/>
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
                            <li class="active">Actualizar usuarios</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Buscar</header>
                            </div>
                            <div class="card-body " id="bar-parent5">
                                <form class="form-inline">
                                    <div class="form-group mb-2">
                                        <label for="staticEmail2" class="sr-only"></label>
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Seleccione el rol">
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inputPassword2" class="sr-only">Rol</label>
                                        <select class="form-control" id="rol" name="rol">
                                            <?php foreach ($roles as $r) {?>
                                                <option value="<?php echo $r['id_rol']?>"><?php echo $r['rol']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <button type="button" class="btn btn-primary btn-block" onclick="buscarUsuarios()">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Actualizar usuarios</header>
                                <div class="tools">
                                    <a class="fa fa-repeat btn-color box-refresh" onclick="refreshTable()"></a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="dataTable" class="display" style="width: 100%"></table>
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
    <?php require_once "views/partials/_footer.php"; ?>
    <!-- end footer -->

</div>
<?php require_once "views/partials/_outputJs.php"; ?>
<!-- data tables -->
<script src="<?php echo $this->_helpers->linkTo('plugins/datatables/jquery.dataTables.min.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js', 'Assets') ?>"></script>

<script>
    $(document).ready(function () {
        var dataSet = <?php echo $usuarios;?>;
        $('#dataTable').DataTable({
            data: dataSet,
            columns: [
                {title: "Usuario"},
                {title: "Correo Electronico"},
                {title: "Rol Establecido"},
                {title: "Estado"},
                {title: "Acción"}
            ]
        });

        var idrol = '<?php echo $id_rol;?>';
        $("#rol option[value="+idrol+"]").prop('selected', true);
    });

    function refreshTable() {
        var dataSet = <?php echo $usuarios;?>;
        var table = $('#dataTable').DataTable();
        table.search('').draw();
        table.clear().rows.add(dataSet).draw();
    }
    function buscarUsuarios() {
        var rootLocation = "/admin/usuarios/actualizar";
        var rol = $('#rol').val();
        window.location.href = rootLocation + "/" + rol;
    }
</script>
</body>
</html>