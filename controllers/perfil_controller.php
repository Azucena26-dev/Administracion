<?php
class perfil_controller extends base_controller
{

    public function consultarPerfiltabla()
    {
        $gr       = new perfil_model();
        $data     = array();
        $dataList = $gr->consultarPerfilEstadoTabla();
        foreach ($dataList as $d) {
            $carnet_alumno = $d['carnet_alumno'];
            $id_estado     = $d['id_estado'];
            array_push($data, array(
                $d['carnet_alumno'],
                $d['primer_nombre'],
                $d['primer_apellido'],
                $d['nombre_estado'],
                $d['id_estado'] != 4 && $d['id_estado'] != 5 && $d['id_estado'] != 6 && $d['id_estado'] != 8 ?
                '<a onclick="cambioEstado(' . $d['carnet_alumno'] . ',' . $d['id_estado'] . ')"><img src=' . $this->_helpers->linkTo("assets/img/") . 'shield.png></a>' : '<a onclick="cambioEstado_alumno(' . $d['carnet_alumno'] . ')"><img src=' . $this->_helpers->linkTo("assets/img/") . 'cancelar.png></a>',
                 $d['id_estado'] != 4 && $d['id_estado'] != 5 && $d['id_estado'] != 6 && $d['id_estado'] != 8 ? 
                '<a  onclick="cambioEstadoReprobado(' . $d['carnet_alumno'] . ',' . $d['id_estado'] . ')"><img src='.$this->_helpers->linkTo("assets/img/").'cancel.png></a>' : '<a onclick="cambioEstado_alumno(' . $d['carnet_alumno'] . ')"><img src=' . $this->_helpers->linkTo("assets/img/") . 'cancelar.png></a>',
                 $d['id_estado'] != 4 && $d['id_estado'] != 5 && $d['id_estado'] != 6 && $d['id_estado'] != 8 ? 
                '<a onclick="cambioEstadoDesercion(' . $d['carnet_alumno'] . ',' . $d['id_estado'] . ')"><img src=' . $this->_helpers->linkTo("assets/img/") . 'sad.png></a></a>': '<a onclick="cambioEstadoAlumnoDesercion(' . $d['carnet_alumno'] . ')"><img src=' . $this->_helpers->linkTo("assets/img/") . 'cancelar.png></a>',

            )
            );
        }

        echo json_encode($data);
    }

#controlador para la vista que muestra el boton buscar por genero
    public function consultarporEstadoGeneracionParametros()
    {
        $id_estadoPerfil = $this->request["perfil"];
        $generacion      = $this->request["generacion"];
        $id_parametro    = $this->request["estado"];
        $anio    = $this->request["anio"];
        $gr              = new genero();
        $data            = array();
        if (empty($id_estadoPerfil) and empty($generacion) and !empty($id_parametro)) {

            $dataList = $gr->consultarEstadoParametro($id_parametro);
        } else
        if (!empty($id_estadoPerfil) and empty($generacion) and empty($id_parametro)) {

            $dataList = $gr->consultarEstado($id_estadoPerfil);} else
        if (empty($id_estadoPerfil) and !empty($generacion) and empty($id_parametro)) {
            $dataList = $gr->Consultargeneraciones($generacion);
        } else
        if (empty($id_estadoPerfil) and !empty($generacion) and !empty($id_parametro)) {
            $dataList = $gr->consultarGeneracionParametro($generacion, $id_parametro);
        } else
        if (!empty($id_estadoPerfil) and !empty($generacion) and empty($id_parametro)) {
            $dataList = $gr->consultarEstadoGeneracion($generacion, $id_estadoPerfil);
        } else
        if (!empty($id_estadoPerfil) and empty($generacion) and !empty($id_parametro)) {
            $dataList = $gr->consultarEstadosParametro($id_estadoPerfil, $id_parametro);
        } else
        if (!empty($id_estadoPerfil) and !empty($generacion) and !empty($id_parametro)) {
            $dataList = $gr->consultarEstadosParametroGeneracion($id_estadoPerfil, $generacion, $id_parametro);
        }

        foreach ($dataList as $d) {
            $carnet    = $d['carnet_alumno'];
            $id_estado = $d['id_estado'];
            array_push($data, array(
                $d['carnet_alumno'],
                $d['primer_nombre'],
                $d['primer_apellido'],
                $d['nombre_estado'],
                $d['id_estado'] != 4 && $d['id_estado'] != 5 && $d['id_estado'] != 6 && $d['id_estado'] != 8 ?
                '<a onclick="cambioEstado(' . $d['carnet_alumno'] . ',' . $d['id_estado'] . ')"><img src=' . $this->_helpers->linkTo("assets/img/") . 'shield.png></a>' : '<a onclick="cambioEstado_alumno(' . $d['carnet_alumno'] . ')"><img src=' . $this->_helpers->linkTo("assets/img/") . 'cancelar.png></a>',
                 $d['id_estado'] != 4 && $d['id_estado'] != 5 && $d['id_estado'] != 6 && $d['id_estado'] != 8 ? 
                '<a  onclick="cambioEstadoReprobado(' . $d['carnet_alumno'] . ',' . $d['id_estado'] . ')"><img src='.$this->_helpers->linkTo("assets/img/").'cancel.png></a>' : '<a onclick="cambioEstado_alumno(' . $d['carnet_alumno'] . ')"><img src=' . $this->_helpers->linkTo("assets/img/") . 'cancelar.png></a>',
                  $d['id_estado'] != 4 &&$d['id_estado'] != 5 && $d['id_estado'] != 6 && $d['id_estado'] != 8 && $id_parametro != 3 && $id_parametro != 2 && $id_parametro != 1 ? 
                '<a onclick="cambioEstadoDesercion(' . $d['carnet_alumno'] . ',' . $d['id_estado'] . ')"><img src=' . $this->_helpers->linkTo("assets/img/") . 'sad.png></a></a>': '<a onclick="cambioEstadoAlumnoDesercion(' . $d['carnet_alumno'] . ',' . $d['id_estado'] . ' )"><img src=' . $this->_helpers->linkTo("assets/img/") . 'cancelar.png></a>',

            )
            );
        }
        echo json_encode($data);
    }

    public function consultarEstados()
    {
        $gr      = new genero();
        $estados = $gr->estados();

        $pm           = new perfil_model();
        $perfiles     = $pm->consultarPerfil();
        $parametros   = $pm->consultarParametros();
        $generaciones = $pm->consultarGeneraciones();
        $fechaGeneracion=$gr->consultarFecha_anio();
        require_once $this->_helpers->linkTo('verPerfiles.php', 'Views', 'require');
    }

    public function actualizarFase()
    {
        if (!empty($_REQUEST['carnet'])) {
            $carnet                 = $_REQUEST['carnet'];
            $pm                     = new perfil_model();
            $actualizaestadousuario = $pm->actualizaestadousuario($carnet);
        }

        if (!empty($_REQUEST['id_estado']) and !empty($_REQUEST['carnet'])) {
            $carnet       = $_REQUEST['carnet'];
            $id_estado    = $_REQUEST['id_estado'];
            $idparametros = 1;
            $pm           = new perfil_model();
            $ingreso      = $pm->ingresarEstadosUsuarioParametro($carnet, $id_estado, $idparametros);
        }

        //echo $carnet;
    }



public function actualizarFaseReprobado(){

 if (!empty($_REQUEST['carnet'])) {
            $carnet                 = $_REQUEST['carnet'];
            $pm                     = new perfil_model();
            $actualizaestadousuario = $pm->actualizaestadoReprobado($carnet);
        }

    if (!empty($_REQUEST['id_estado']) and !empty($_REQUEST['carnet']) ){                        
        $carnet = $_REQUEST['carnet'];
        $id_estado = $_REQUEST['id_estado'];
        $idparametros = 2;
        $pm = new perfil_model();
        $ingreso=$pm->ingresarEstadosUsuarioParametro($carnet,$id_estado,$idparametros);
    }

   // echo $carnet;
}


public function actualizarFaseDesercion(){

 if (!empty($_REQUEST['carnet'])) {
            $carnet                 = $_REQUEST['carnet'];
            $pm                     = new perfil_model();
            $actualizaestadousuario = $pm->actualizaestadoDesertado($carnet);
        }

        if (!empty($_REQUEST['id_estado']) and !empty($_REQUEST['carnet'])) {
            $carnet       = $_REQUEST['carnet'];
            $id_estado    = $_REQUEST['id_estado'];
            $idparametros = 3;
            $pm           = new perfil_model();
            $ingreso      = $pm->ingresarEstadosUsuarioParametro($carnet, $id_estado, $idparametros);
        }

       // echo $carnet;
}


 public function ingresoDescripcionDesertado()
    {


            $descripcion  = $this->request["descripcion"];
            $carnet_alumno  = $this->request["carnet"];
            $id_parametros    = 3;
            $pm = new perfil_model();
            $descripcionobtenida = $pm->ingresarDescripcionDesertado($descripcion,$carnet_alumno,$id_parametros);

      }


 public function consultaDescripcionDesertado()
    {

            $carnet_alumno  = $this->request["carnet"];
            $pm = new perfil_model();
            $descripcionobtenida = $pm->ConsultarDescripcionDesertado($carnet_alumno);
            echo json_encode($descripcionobtenida);
            

      }



      // CONSULTAR GENERACIONES POR ANIO

    public function consultargeneracionesAnio(){
    
        $d = new genero();        

        $generacion = "";
        $anio = $this->request["anio"];
        $generaciones = $d->consultarGeneracionsporAnio($anio);

        foreach ($generaciones as $g) {            
            $generacion .= "<option value=" . $g['idGeneraciones'] . ">" . $g['nombre'] . "</option>";
            
        }
        echo $generacion;
        
    }
// FIN CONSULTAR ONSULTAR GENERACIONES POR ANIO 

 




}
?>