<?php
class index_controller extends base_controller{
    
    public function index() {    	
        require_once $this->_helpers->linkTo('index.php', 'Views', 'require');
    }
    public function dashboard() {
        date_default_timezone_set('America/El_Salvador');

        require_once $this->_helpers->linkTo('dashboard.php', 'Views', 'require');
    }

    // CONSULTAR MUNICIPIOS POR DEPARTAMENTO

    public function consultarMunicipios(){
    
        $d = new datosaspirante();        
        $municipio = "";
        $id_departamento = $this->request["id_departamento"];
        $municipios = $d->consultarMunicipiosPorDepto($id_departamento);

        foreach ($municipios as $d) {            
            $municipio .= "<option value=" . $d['id_municipio'] . ">" . $d['municipio'] . "</option>";
            
        }
        echo $municipio;
        
    }
// FIN CONSULTAR MUNICIPIOS POR DEPARTAMENTO
}