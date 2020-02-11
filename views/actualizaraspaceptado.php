<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Panel administrador Kodigo" />
    <meta name="author" content="kodigo" />
    <!--select2-->
    <link href="<?php echo $this->_helpers->linkTo('plugins/select2/css/select2.css', 'Assets') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo $this->_helpers->linkTo('plugins/select2/css/select2-bootstrap.min.css', 'Assets') ?>" rel="stylesheet" type="text/css">

    <title>Actualizar datos aspirante | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
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
                            <li><a href="#!">Gestionar inscripción aspirantes</a><i class="fa fa-angle-right"></i></li>
                            <li class="active">Actualizar información </li>
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
                                <form>
                                    <div class="form-inline">
                                        <div class="form-group ">
                                            <input type="text" readonly class="form-control-plaintext" id="" value="Seleccione:">
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <select class="form-control select2" id="anio" name="anio" style="width:200px">
                                                <?php foreach ($fechaGeneracion as $p) {?>
                                                    <option ></option>
                                                    <option value="<?php echo $p['dtfecha']?>"> <?php echo $p['dtfecha']?></option>
                                                <?php }?>
                                            </select>
                                        </div>

                                        <div class="form-group mx-sm-3 mb-2">
                                            <select class="form-control select2" id="generacion" name="generacion" style="width:200px">
                                                <?php foreach ($generaciones as $g) {?>
                                                    <option></option>
                                                    <option value="<?php echo $g['idGeneraciones'] ?>"> <?php echo $g['nombre'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <select class="form-control select2" id="perfil" name="perfil" style="width:200px" >
                                                <?php foreach ($perfiles as $p) {?>
                                                    <option></option>
                                                    <option value="<?php echo $p['id_estado'] ?>"> <?php echo $p['nombre_estado'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>

                                          <div class="form-group mx-sm-3 mb-2">
                                            <select class="form-control select2" id="estado" name="estado" style="width:200px" >
                                                <?php foreach ($parametros as $p) {?>
                                                    <option></option>
                                                    <option value="<?php echo $p['idparametros'] ?>"> <?php echo $p['titulo_parametro'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <a type="button" class="" onclick="buscarAlumnos()"><img src="../assets/img/search.png"></a>
                                        </div>
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
                                <header>Actualizar información</header>
                                <div class="tools">
                                    <a class="fa fa-repeat btn-color box-refresh" onclick="refreshTable()"></a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="dataTable" class="display" style="width: 100%">
                                        
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
    <?php require_once "views/partials/_footer.php"; ?>
    <!-- end footer -->

</div>
<?php require_once "views/partials/_outputJs.php"; ?>
<!-- data tables -->
<script src="<?php echo $this->_helpers->linkTo('plugins/datatables/jquery.dataTables.min.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js', 'Assets') ?>"></script>
<!--select2-->
<script src="<?php echo $this->_helpers->linkTo('plugins/select2/js/select2.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('js/pages/select2/select2-init.js', 'Assets') ?>"></script>

<!--FUNCIONALIDADES DEL SELECT-->
<script>
    //NOMBRES PARA LOS SELECT

    $(document).ready(function () {
        $('#perfil').select2({
                placeholder: 'Seleccione una Fase',
                allowClear: false
            });

        $('#estado').select2({
                placeholder: 'Seleccione un Estado',
                allowClear: false
            });

        $('#generacion').select2({
                placeholder: 'Seleccione Generacion',
                allowClear: false
            });
         $('#anio').select2({
                placeholder: 'Seleccione Año',
                allowClear: false
            });

});
    /*CAMBIO AL ELEGIR UN GRADO DIFERENTE EN LA TABLA*/
    $(document).ready(function () {
       
    tabla();
           
    });


     function tabla() {
        //var genero = $("#genero").val();
        var rootLocation = '/admin/postulacion/actualizaraspirantestabla';
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
           // data: {genero},
            success: function (dt) {
                var table = $('#dataTable').DataTable({
                    destroy: true,
                    data: dt,
                    columns: [
                        {title: "Carnet"},
                        {title: "Nombre"},
                        {title: "Apellido"},
                        {title: "Actualizar perfil"}
 
                    ]
                });

            }
        });
    }


    function buscarAlumnos() {
        var perfil = $('#perfil').val();
        var generacion = $('#generacion').val();
        var estado = $('#estado').val();
        var anio = $('#anio').val();
        var rootLocation = "/admin/postulacion/actualizaraspirantes";
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: rootLocation,
            data: {perfil,
                generacion,
                estado,anio},
            success: function (dt) {
                var table = $('#dataTable').DataTable({
                    destroy: true,
                    data: dt,
                    columns: [
                        {title: "Carnet"},
                        {title: "Nombre"},
                        {title: "Apellido"},
                        {title: "Actualizar perfil"}
                    ]
                });

            }
        });
       
    }




//FUNCION GENERACIONES POR ANIO
$("#anio").change(function(){        
    var baselocation ='/admin/postulacion/consultargeneracionesAnio'
        var anio = document.getElementById("anio").value;
        $.post(baselocation,{anio: anio},function (data) {
            $("#generacion").html(data);
        });
});

//FIN FUNCION GENERACIONES POR ANIO



</script>



</body>
</html>