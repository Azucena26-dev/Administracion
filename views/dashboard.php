<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Panel administrador KODIGO"/>
    <meta name="author" content="KODIGO"/>
    <title>Estudiante| <?php echo GlobalValuesPage::TitleGlobal; ?></title>
    <?php $this->renderPartial('head', 'php') ?>
    <style>
        .state-overview .value h1, .state-overview .value p {
            font-size: 12px !important
        }
    </style>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-blue white-sidebar-color logo-blue">
<div class="page-wrapper">
    <?php require_once "partials/_header_top.php"; ?>
    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
        <?php require_once "partials/_menu.php"; ?>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Inicio</div>
                        </div>
                    </div>
                    <!-- add content here -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header> Bienvenido! <?php echo $_SESSION['username'] ?></header>
                            </div>
                            <div class="card-body ">El éxito no se logra sólo con cualidades especiales. Es sobre todo un trabajo de constancia, de método y de organización !
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
                <?php require_once "partials/_footer.php"; ?>
                <!-- end footer -->
            </div>
            <?php require_once "partials/_outputJs.php"; ?>
            <script>
                function buscarUsuarios() {
                    var rootLocation = "/admin/agenda/registrarActividades";
                    window.location.href = rootLocation;
                }
            </script>
</body>
</html>