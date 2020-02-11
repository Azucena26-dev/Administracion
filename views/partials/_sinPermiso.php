<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
<meta name="description" content="Panel administrador admin" />     <meta name="author" content="admin" />
    <title>Crear usuario | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
    <?php $this->renderPartial('head', 'php') ?>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-blue white-sidebar-color logo-blue">
<div class="page-wrapper">
    <?php require_once "views/partials/_header_top.php";?>
    <style>
        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            color: #dd4b39;
            border: 1px solid #dd4b39;
        }

        .parsley-errors-list {
            color: #dd4b39;
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            font-size: 0.9em;
            line-height: 0.9em;
            opacity: 0;

            transition: all .3s ease-in;
            -o-transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -webkit-transition: all .3s ease-in;
        }

        .parsley-errors-list.filled {
            opacity: 1;
        }
        .modal-backdrop, .modal-backdrop.in{
            display: none;
        }
    </style>
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
                        <div class=" pull-left">
                            <div class="page-title">Lamentamos las molestias!!</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo $this->_helpers->linkTo('index/dashboard') ?>">Inicio</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Por el momento no esta disponible esta opcion</header>
                            </div>
                            <div class="card-body " id="bar-parent">
                                <form id="crear_evento" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            Favor comunicarse con el administrador del sistema!!!!!
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
<!-- end js include path -->
<script src="<?php echo $this->_helpers->linkTo('js/parsley.js', 'Assets') ?>"></script>

</body>
</html>