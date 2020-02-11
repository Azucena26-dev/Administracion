<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Panel administrador Kodigo" />
    <meta name="author" content="kodigo" />
    <!--select2-->
    <link href="<?php echo $this->_helpers->linkTo('plugins/select2/css/select2.css', 'Assets') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo $this->_helpers->linkTo('plugins/select2/css/select2-bootstrap.min.css', 'Assets') ?>" rel="stylesheet" type="text/css">

    <title>Consultar Inscripción | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
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
                            <li class="active">Aprobar o desaprobar candidatos</li>
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
                                        <div class="form-group mb-2">
                                            Seleccione Genero:
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <select class="form-control select2" id="genero" name="genero" style="width:250px">
                                                <?php foreach ($tipo_genero as $gr) {?>
                                                    <option></option>
                                                    <option> <?php echo $gr['genero']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        

                                        <div class="form-group mx-sm-3 mb-2">
                                    <a type="button" class="" onclick="buscarAlumnos()"><img src="../assets/img/search.png"></a>
                                        </div>
                                        <div class="form-group mb-2">
                                           Generaciones:
                                        </div>
                                       



                                        <div class="form-group mx-sm-3 mb-2">
                                    <a type="button" data-toggle="modal" onclick="validargeneracionactiva()"><img src="../assets/img/plus.png"></a>
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                    <a type="button" data-toggle="modal" data-target="#modalConsultarGeneracion"><img src="../assets/img/pencil.png"></a>
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
                                <header>Aprobar o desaprobar candidatos</header>
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


<div class="modal fade" id="modalGeneracion" tabindex="-1" role="dialog" aria-labelledby="modalGeneracionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGeneracionLabel">Agregar Generación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreN" name="nombreN" require>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descripción:</label>
            <textarea class="form-control" id="descripcionN" name="descripcionN" require></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha de inicio:</label>
            <input type="date" class="form-control" id="generacion_inicioN" name="generacion_inicioN" value="" min="2019-01-01" max="2090-12-31" require>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha de finalización:</label>
            <input type="date" class="form-control" id="generacion_finalN" name="generacion_finalN" value="" min="2019-01-01" max="2090-12-31" require>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary"  onClick="ultimaGeneracion()" >Guardar</button>
       
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modalEditarGeneracion" tabindex="-1" role="dialog" aria-labelledby="modalEditarGeneracionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGeneracionLabel">Editar Generación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name ="nombre"  require>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name ="descripcion" require></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha de inicio:</label>
            <input type="date" class="form-control" id="generacion_inicio" name="generacion_inicio" value="" min="2019-01-01" max="2090-12-31" require>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha de finalización:</label>
            <input type="date" class="form-control" id="generacion_fin" name="generacion_fin" value="" min="2019-01-01" max="2090-12-31" require>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" onClick="ultimaGeneracionEditar()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="modalConsultarGeneracion" tabindex="-1" role="dialog" aria-labelledby="modalConsultarGeneracionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalConsultarGeneracionLabel">Consultar Generación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group mx-sm-3 mb-2">
          <select class="form-control select2" id="generacionn" name="generacionn" style="width:250px">
               <?php foreach ($generaciones as $g) {?>
                <option></option>
                <option value="<?php echo $g['idGeneraciones']?>"> <?php echo $g['nombre']?></option>
                <?php }?>
            </select>
        </div>
                   
         <a id="editar" name="editar" type="button"  data-toggle="modal" data-dismiss="modal" data-target="" onClick="enviarGeneracion()"  class=""><img src="../assets/img/pencil.png"></a>
                   



          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
    
      
      </div>
    </div>
  </div>
</div>


<?php require_once "views/partials/_outputJs.php"; ?>
<!-- data tables -->
<script src="<?php echo $this->_helpers->linkTo('plugins/datatables/jquery.dataTables.min.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js', 'Assets') ?>"></script>
<!--select2-->
<script src="<?php echo $this->_helpers->linkTo('plugins/select2/js/select2.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('js/pages/select2/select2-init.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('js/perfil_fases/consultapostulacion.js', 'Assets') ?>"> </script>


</body>
</html>