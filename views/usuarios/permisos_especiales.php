<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Responsive Admin Template"/>
    <meta name="author" content="SmartUniversity"/>
    <title>Permisos Especiales | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
    <?php $this->renderPartial('head', 'php') ?>
</head>
<style>
    .error {
        color: red;
    }
</style>
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
                                     href="<?php echo $this->_helpers->linkTo('index/dashboard') ?>">Inicio</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Permisos<i class="fa fa-angle-right"></i></li>
                            </li>
                            <li class="active">Permisos Especiales</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Permisos Especiales</header>
                            </div>
                            <div class="card-body " id="bar-parent">
                                <form class="form-horizontal" id="form_inputs">
                                    <div class="form-body">
                                        <div class="form-group"  id="usuario" name="usuario">
                                            <label class="control-label">Seleccione el Usuario: <span class="required"> * </span></label>
                                            <div class="input-icon right">
                                                <select class="form-control" id="id_usuario" name="id_usuario">
                                                    <option value="0">---Seleccione---</option>
                                                    <?php foreach ($usuario as $user) {?>
                                                        <option value="<?php echo $user['id_usuario']?>"><?php echo $user['usuario']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group"  id="menuP" name="menuP">
                                            <label class="control-label">Seleccione la opcion de menu: <span class="required"> * </span></label>
                                            <div class="input-icon right">
                                                <select class="form-control" id="id_menu" name="id_menu">
                                                <option value="0">---Seleccione---</option>
                                                    <?php foreach ($privilegios as $pv) {?>
                                                        <option value="<?php echo $pv['id_menu']?>"><?php echo $pv['menu']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group"  id="" name="">
                                            <label class="control-label">Seleccione la opcion de menu: <span class="required"> * </span></label>
                                            <div class="input-icon right">
                                                <input>
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
<!-- end js include path -->
<script src="<?php echo $this->_helpers->linkTo('js/parsley.js', 'Assets') ?>"></script>


<?php require_once "views/partials/_outputJs.php"; ?>
<script>
/*Activar DIV*/
document.getElementById('menuP').style.display = 'none';
$("#usuario").change(function(){
     if ($("#id_usuario").val() != 0) {
        document.getElementById('menuP').style.display = 'block';
        $("#id_menu").val(0);
    } else if ($("#id_usuario").val() == 0) {
         document.getElementById('menuP').style.display = 'none';
    }
});
 /*Llamada a BD*/
$("#menuP").change(function(){
    
    var url_form = "/admin/usuarios/buscarPE";
    var str = $("form").serialize();//$("#id_usuario").val();
    //alert(str);
    buscarPrivilegioE(url_form, str);
});
</script>
</body>
</html>


