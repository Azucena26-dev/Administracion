<?php

class postulacion_controller extends base_controller
{
    public function postulacion()
    {
        $s = new Sanitize();
        $datosusuario=array();
        $datosinformativos=array();
        $datosintereses=array();
        $datosprofesionales=array();
        $datoseconomicos=array();
        $departamento=array();
        $municipio=array();
        $documenton=array();
        $nivel=array();
        $nivelacademicop=array();
        $datos = array();
        if(!empty($_GET['carnet'])){
            $carneten=$_GET['carnet'];
            $carnet=base64_decode($carneten);
            $dasp= new datosaspirante();
            $datos=$dasp->consultapre_formulario($carnet);
            $datosusuario=$dasp->consultadatospersonales_usuario($carnet);
            $datosinformativos=$dasp->consultadatospersonales_informativos($carnet);
            $datosintereses=$dasp->consultadatospersonales_intereses($carnet);
            $datosprofesionales=$dasp->consultadatospersonales_profesionales($carnet);
            $datoseconomicos=$dasp->consultadatospersonales_economicos($carnet);
            $departamento=$dasp->consultardepartamento_postulacion($carnet);
            $municipio=$dasp->consultarmunicipio_postulacion($carnet);
            $documenton=$dasp->consultardocumento_postulacion($carnet);
            $nivel=$dasp->consultarnivel_postulacion($carnet);
            $nivelacademicop=$dasp->nivelacademico();


        }

        require_once $this->_helpers->linkTo('ingresoKodigo.php', 'Views', 'require');
       
    }



public function consultaraspirantes(){
        $genero = $this->request["genero"];
        $gr = new genero();
        $data = array();
        $dataList = $gr->consultargenero($genero);
        foreach ($dataList as $d) {
        $carnet = $d['carnet_alumno'];
            array_push($data, array(
                    $d['primer_nombre'],
                    $d['segundo_nombre'],
                    $d['primer_apellido'],
                  
'<a  href="' . $this->_helpers->linkTo("postulacion/postulacion") . '?carnet=' .base64_encode($d['carnet_alumno'])   .'" class=""> <img src= '.$this->_helpers->linkTo("assets/img/").'focus.png></a>',
'<a onclick="existeGeneracion(' . $d['carnet_alumno'] . ')" class=""><img src="../assets/img/shield.png"></a>',
'<a  onclick="existeGeneracionR(' . $d['carnet_alumno'] . ')" class=""><img src="../assets/img/cancel.png"></a>'
     
                )
            );
        }

        echo json_encode($data);
    }


    public function actualizageneracion(){
        $pm = new perfil_model();
        $generacionn = $_POST["generacionn"];
        $nombre = $_POST["nombre"];
        $descripcion =$_POST["descripcion"];
        $fecha_inicio = $_POST["fecha_inicio"];
        $fecha_fin = $_POST["fecha_fin"];

        $acgeneraciones=$pm->actualizarGeneracion($generacionn,$nombre,$descripcion,$fecha_inicio,$fecha_fin); 
    
    }


    
    public function agregargeneracion(){
        $pm = new perfil_model();
        $nombre = $_POST["nombre"];
        $descripcion =$_POST["descripcion"];
        $fecha_inicio = $_POST["fecha_inicio"];
        $fecha_fin = $_POST["fecha_fin"];

        $aggeneraciones=$pm->agregarGeneracion($nombre,$descripcion,$fecha_inicio,$fecha_fin); 
        

  
    }



public function consultaraspirantestabla(){
        $gr = new genero();
        $data = array();
        $dasp= new datosaspirante();
        $dataList = $gr->consultargenerotabla();
        foreach ($dataList as $d) {
            $carnet_alumno = $d['carnet_alumno'];
            array_push($data, array(
                    $d['primer_nombre'],
                    $d['segundo_nombre'],
                    $d['primer_apellido'],     
                  

'<a  href="' . $this->_helpers->linkTo("postulacion/postulacion") . '?carnet=' .base64_encode($d['carnet_alumno'])   .'" class=""> <img src= '.$this->_helpers->linkTo("assets/img/").'focus.png></a>',
'<a onclick="existeGeneracion(' . $d['carnet_alumno'] . ')" class=""><img src= '.$this->_helpers->linkTo("assets/img/").'shield.png></a>',
'<a onclick="existeGeneracionR(' . $d['carnet_alumno'] . ')" class=""><img src= '.$this->_helpers->linkTo("assets/img/").'shield.png></a>',
'<a  href="' . $this->_helpers->linkTo("postulacion/consultacandidatosdesaprobados")   . '?carnet=' .base64_encode($d['carnet_alumno'])   .'" class=""><img src="../assets/img/cancel.png"></a>'

       
                )
            );
        }

        echo json_encode($data);
    }



    public function consultacandidatos()
    {
        
    $gr = new genero();
    $tipo_genero = $gr->tipo_genero();
    $s = new Sanitize();
    $gn = new perfil_model();
    $generaciones=array();
    $generaciones=$gn->consultarGeneraciones();
    $ultima=array();
    $ultima=$gn->consultarFechaUltimaGeneracion(); 
    
    
    
    if(!empty($_GET["carnet"])){
        $gener=$ultima[0]['idGeneraciones'];
        $carnet = $_GET["carnet"];
        $gener = $_GET["gener"];
        $dasp= new datosaspirante();
       
        $cambiodeEstadoAlumno=$dasp->cambiodeEstadoAlumno($carnet,$gener);  
        

    }
        //$datos = " aqui van los datos";
        // echo json_encode($datos);
        require_once $this->_helpers->linkTo('consultarpostulacion.php', 'Views', 'require');
    }



    public function consutaModal()
    {
    $s = new Sanitize();
    
     
            $id_generacion = $this->request["generacionn"];
            $pm = new perfil_model();
            $generacionnueva = $pm->consultarGeneracion($id_generacion);

            $generacion=(json_encode($generacionnueva));

            echo $generacion;

      }

      public function consultarFechaGeneracion()
      {
          $pm = new perfil_model();
          $ultimaGeneracion = $pm->consultarFechaUltimaGeneracion();
          $ultima=(json_encode($ultimaGeneracion));
          echo $ultima;
      }



    public function consultacandidatosdesaprobados()
    {
        
    $gr = new genero();
    $tipo_genero = $gr->tipo_genero();
    $s = new Sanitize();
    $ultima=array();
    $gn = new perfil_model();
    $ultima=$gn->consultarFechaUltimaGeneracion(); 

    $gener=$ultima[0]['idGeneraciones'];

    
    if(!empty($_GET["carnet"])){
        $carnet = $_GET["carnet"];
        $razon = $_GET["razon"];
        
     //   $carnet = $s->onlyNumbers($s->cleanTags($this->params[0]));
        $dasp= new datosaspirante();   
        $cambiodeEstadoAlumnoDesaprobado=$dasp->cambiodeEstadoAlumnoDesaprobado($carnet,$gener,$razon);

        }
        require_once $this->_helpers->linkTo('consultarpostulacion.php', 'Views', 'require');
    }


# controlador para la vista de la solicitud con la informacion del aspirante
 public function actualizarcandidatos()
    {
        #tipo de documentos
        $t_doc = new tipo_documento();
        $tipo_documentos = $t_doc->tipo_documentos();
        //MUNICIPIOS 
        $muUsuario = new datosaspirante();
        $municipios = $muUsuario->consultarMunicipios();
        #deparatamentos
        $dep = new datosaspirante();
        $departamento = $dep->departamento();

        $s = new Sanitize();
        $datosusuario=array();
        $datosinformativos=array();
        $datosintereses=array();
        $datosprofesionales=array();
        $datoseconomicos=array();
        $datos = array();
        $nivelacademicop=array();
        $departamento=array();
        $municipios=array();
        if(!empty($_GET['carnet'])){
            $carneten=$_GET['carnet'];
            $carnet=base64_decode($carneten);
            $dasp= new datosaspirante();
            $datos=$dasp->consultapre_formulario($carnet);
            $datosusuario=$dasp->consultadatospersonales_usuario($carnet);
            $datosinformativos=$dasp->consultadatospersonales_informativos($carnet);
            $datosintereses=$dasp->consultadatospersonales_intereses($carnet);
            $datosprofesionales=$dasp->consultadatospersonales_profesionales($carnet);
            $datoseconomicos=$dasp->consultadatospersonales_economicos($carnet);
            $id_dep=$dasp->consultardepartamento_postulacion($carnet);
            $departamento=$dasp->departamento();
            $municipio=$dasp->consultarmunicipio_postulacion($carnet);
            $muni_base=$dasp->consultarMunicipios();
            $documenton=$dasp->consultardocumento_postulacion($carnet);
            $tipo_documentos =$dasp->tipo_documentos();
            $nivel=$dasp->consultarnivel_postulacion($carnet);
            $nivelacademicop=$dasp->nivelacademico();

        }


        require_once $this->_helpers->linkTo('actualizaraspiranteaceptado.php', 'Views', 'require');
    }



#controlador para la vista que muestra el boton buscar por genero
    public function actualizaraspirantes(){
        $id_estado = $this->request["perfil"];
        $generacion = $this->request["generacion"];
        $id_parametro = $this->request["estado"];
        $anio = $this->request["anio"];
        $gr = new genero();
        $data = array();
        if ( empty($id_estado) and empty($generacion) and !empty($id_parametro) ){

            $dataList = $gr->consultarEstadoParametro($id_parametro);
        }
        else 
             if (! empty($id_estado) and empty($generacion) and empty($id_parametro) ){

                $dataList = $gr->consultarEstado($id_estado);}
        else
        if  ( empty($id_estado) and !empty($generacion) and empty($id_parametro) ){
            $dataList = $gr->Consultargeneraciones($generacion);
        }

        else
        if  ( empty($id_estado) and !empty($generacion) and !empty($id_parametro) ){
            $dataList = $gr->consultarGeneracionParametro($generacion,$id_parametro);
        }
        else
            if ( !empty($id_estado) and !empty($generacion) and empty($id_parametro) ){
            $dataList = $gr->consultarEstadoGeneracion($generacion,$id_estado);
        }
        else
            if ( !empty($id_estado) and empty($generacion) and !empty($id_parametro) ){
            $dataList = $gr->consultarEstadosParametro($id_estado,$id_parametro);
                }
        else
            if ( !empty($id_estado) and !empty($generacion) and !empty($id_parametro) ){
            $dataList = $gr->consultarEstadosParametroGeneracion($id_estado,$generacion,$id_parametro);
                }
        else
            if ( empty($id_estado) and empty($generacion) and empty($id_parametro) and !empty($anio)){
            $dataList = $gr->consultar_alumno_Fecha_anio($anio);
                }
//AQUI IRIA ANIO                
        foreach ($dataList as $d) {
        $carnet = $d['carnet_alumno'];
            array_push($data, array(
                    $d['carnet_alumno'],
                    $d['primer_nombre'],
                    $d['primer_apellido'],                                     
                    '<a type="button" href="' . $this->_helpers->linkTo("postulacion/actualizarcandidatos") . '/carnet=' . $d['carnet_alumno']  .'" class=""><img src="../assets/img/pencil.png"></a>'
     
                )
            );
        }
        echo json_encode($data);
    }

#controlador para la tabla que se muestra con el boton actualizar perfil
    public function actualizaraspirantestabla(){
        $gr = new genero();
        $data = array();
        $dataList = $gr->consultarEStadotabla();
        foreach ($dataList as $d) {
            $carnet = $d['carnet_alumno'];
            array_push($data, array(
                    $d['carnet_alumno'],
                    $d['primer_nombre'],
                    $d['primer_apellido'],                                       
                    '<a type="button" href="' . $this->_helpers->linkTo("postulacion/actualizarcandidatos") .  '?carnet=' .base64_encode($d['carnet_alumno'])   .'" class=""><img src="../assets/img/pencil.png"></a>'
                   
                )
            );
        }
        echo json_encode($data);
    }

# controlador para la vista donde a la solicitud llena
    public function actualizaraceptado()
    {
        

    $gr = new genero();
    $estados = $gr->estados();
    
    $pm = new perfil_model();
    $perfiles = $pm->consultarPerfil();
    $parametros=$pm->consultarParametros();
    $generaciones=$pm->consultarGeneraciones();
    $fechaGeneracion=$gr->consultarFecha_anio();
  
require_once $this->_helpers->linkTo('actualizaraspaceptado.php', 'Views', 'require');
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
