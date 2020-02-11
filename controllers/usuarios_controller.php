<?php
/**
 * Created by PhpStorm.
 * Date: 03/08/2018
 * Time: 15:52
 */

class usuarios_controller extends base_controller
{
    public function crear()
    {
        if($_SESSION['id_rol'] == "3"){
            $r = new Roles();
            $roles = $r->consultarRolesUsuario();
            require_once $this->_helpers->linkTo('usuarios/crear_usuarios.php', 'Views', 'require');
        } else {
            header("Location: ".$this->_helpers->linkTo('index/dashboard'));
        }
    }


    public function consultar()
    {
        if($_SESSION['id_rol'] == "3"){
        $data = array();
        $usuarios = array();
        $r = new Roles();
        $roles = $r->consultarRoles();
        $u = new Usuario();
        $id_rol = isset($this->params[0]) && !empty($this->params[0]) ? $this->params[0] : $roles[0]["id_rol"];
        if (is_numeric($id_rol)) {
            $dataList = $u->consultarUsuariosPorRol($id_rol);
            foreach ($dataList as $d) {
                array_push($data, array(
                        $d['usuario'],
                        $d['correo'],
                        $d['rol'],
                        $d['estado'])
                );
            }
        }
        $usuarios = json_encode($data);
        require_once $this->_helpers->linkTo('usuarios/consultar_usuarios.php', 'Views', 'require');
        } else {
            header("Location: ".$this->_helpers->linkTo('index/dashboard'));
        }
    }

    public function actualizar()
    {
        if($_SESSION['id_rol'] == "3"){
        $data = array();
        $usuarios = array();
        $r = new Roles();
        $roles = $r->consultarRoles();
        $u = new Usuario();
        $id_rol = isset($this->params[0]) && !empty($this->params[0]) ? $this->params[0] : $roles[0]["id_rol"];
        if (is_numeric($id_rol)) {
            $dataList = $u->consultarUsuariosPorRol($id_rol);
            foreach ($dataList as $d) {
                array_push($data, array(
                        $d['usuario'],
                        $d['correo'],
                        $d['rol'],
                        $d['estado'],
                        '<a type="button" href="' . $this->_helpers->linkTo("usuarios/usuarioActualizar") . '/' . $d['id_usuario'] . '" class="btn btn-round btn-info">Actualizar</a>')
                );
            }
        }
        $usuarios = json_encode($data);
        require_once $this->_helpers->linkTo('usuarios/actualizar_usuarios.php', 'Views', 'require');
        } else {
            header("Location: ".$this->_helpers->linkTo('index/dashboard'));
        }
    }

    public function usuarioActualizar()
    {
        if($_SESSION['id_rol'] == "3"){
        $s = new Sanitize();
        $usuario = array();
        if (isset($this->params[0]) && !empty($this->params[0])) {
            $id = $s->onlyNumbers($s->cleanTags($this->params[0]));
            $u = new Usuario();
            $usuario = $u->consultarUsuariosPorId($id);
        }
        require_once $this->_helpers->linkTo('usuarios/editar_usuarios.php', 'Views', 'require');
        } else {
            header("Location: ".$this->_helpers->linkTo('index/dashboard'));
        }
    }


    public function actualizarUsuario()
    {
        if(isset($this->request["nom_usuario"]) && !empty($this->request["nom_usuario"])
            && isset($this->request["correo"]) && !empty($this->request["correo"])
            && isset($this->request["nombre"]) && !empty($this->request["nombre"])
            && isset($this->request["apellido"]) && !empty($this->request["apellido"])
            && isset($this->request["estado"]) && !empty($this->request["estado"])
            && isset($this->request["id"]) && !empty($this->request["id"])) {
            try{
                $correo = $this->request["correo"];
                $apellido = $this->request["apellido"];
                $nombre = $this->request["nombre"];
                $estado = $this->request["estado"] == 'bloqueado' ? '0' : $this->request["estado"];
                $id = $this->request["id"];

                $u = new Usuario();
                $result = $u->actualizarNuevoUsuario($correo,$estado,$id,$nombre,$apellido);

                if($estado == "1"){
                    $u->reiniciarIntentos($id);
                    $u->desbloquearUsuario($id);
                }

                if($result != 0){
                    echo $this->responseJSON(array('mensaje' => 'success'));
                    exit;
                }else {
                    echo $this->responseJSON(array('mensaje' => 'error'));
                    exit;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                echo $this->responseJSON(array('mensaje' => 'error'));
                exit;

            }
        } else {
            echo $this->responseJSON(array('mensaje' => 'error'));
            exit;
        }
    }

    public function editar()
    {
        require_once $this->_helpers->linkTo('usuarios/cambiar_contrasena.php', 'Views', 'require');

    }


    public function guardar()
    {
        require_once $this->_helpers->linkTo('password_compatibility_library.php', 'Libs', 'require');
        $s = new Sanitize();
        if (isset($this->request["contra2"]) && !empty($this->request["contra2"])) {
            try {
                $contra = $this->request["contra2"];
                $password = password_hash($contra, PASSWORD_DEFAULT);
                $iduser = $_SESSION['id'];
                $usuarios = new Usuario();

                $cambio = $usuarios->cambiarContrasenia($password, $iduser);

                if($cambio != 0){
                    echo $this->responseJSON(array('mensaje' => 'success'));
                    exit;
                }else {
                    echo $this->responseJSON(array('mensaje' => 'error'));
                    exit;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                echo $this->responseJSON(array('mensaje' => 'error'));
                exit;

            }
        } else {
            echo $this->responseJSON(array('mensaje' => 'error'));
            exit;
        }
    }

    public function crearUsuario(){
        require_once $this->_helpers->linkTo('password_compatibility_library.php', 'Libs', 'require');
        if(isset($this->request["nom_usuario"]) && !empty($this->request["nom_usuario"])
            && isset($this->request["correo"]) && !empty($this->request["correo"])
            && isset($this->request["nombre"]) && !empty($this->request["nombre"])
            && isset($this->request["apellido"]) && !empty($this->request["apellido"])
            && isset($this->request["contrasenia"]) && !empty($this->request["contrasenia"])
            && isset($this->request["confirmar_contrasenia"]) && !empty($this->request["confirmar_contrasenia"])
            && isset($this->request["rol"]) && !empty($this->request["rol"])
            && isset($this->request["estado"]) && !empty($this->request["estado"])) {
            try {
                $nom_usuario = $this->request["nom_usuario"];
                $nombre = $this->request["nombre"];
                $apellido = $this->request["apellido"];
                $correo = $this->request["correo"];
                $contrasenia = $this->request["contrasenia"];
                $rol = $this->request["rol"];
                $estado = $this->request["estado"];

                $u = new Usuario();
               if(!empty($u->consultarNombreDeUsuarioUnico($nom_usuario))){
                  $result = "invalidUsername";
               } else {
                   if(!empty($u->consultarCorreoUnico($correo))){
                       $result = "invalidEmail";
                   } else {
                       $u->setId_rol($rol);
                       $u->setContrasenia(password_hash($contrasenia, PASSWORD_DEFAULT));
                       $u->setUsuario($nom_usuario);
                       $u->setNombre($nombre);
                       $u->setApellido($apellido);
                       $u->setCorreo($correo);
                       $u->setActivo($estado);

                       $result = $u->crearNuevoUsuario();
                   }
               }

               if($result != "0" && $result != ''){
                  if($result != "1"){
                      echo $this->responseJSON(array('mensaje' => $result));
                      exit;
                  } else {
                      echo $this->responseJSON(array('mensaje' => 'success'));
                      exit;
                  }
               } else {
                   echo $this->responseJSON(array('mensaje' => 'error','error' => $result));
                   exit;
               }
            } catch (Exception $e) {
                echo $e->getMessage();
                echo $this->responseJSON(array('mensaje' => 'error'));
                exit;
            }
        } else {
            echo $this->responseJSON(array('mensaje' => 'error'));
            exit;
        }
    }
    #privilegios especiales
    public function pEspecial(){
        $u = new usuario();
        $usuario = $u->consultarUsuarios();
        $privilegios = $u->privilegiosE();
        require_once $this->_helpers->linkTo('usuarios/permisos_especiales.php', 'Views', 'require');
    }
    #buscar si tiene PrivilegiosEspeciales
    public function buscarPE(){
        $s = new Sanitize();
        $u = new Usuario();
        $data = array();
        $id_user = 1;//$this->request["id_usuario"];
        $dataList = $u->privilegiosE1($id_user);
            foreach ($dataList as $d) {
                array_push($data, array(
                        $d['id_menu'],
                        $d['menu'])
                );
            }
        
        //$usuarios = json_encode($data);
        //echo $this->responseJSON($dataList);
        echo  json_encode($data);//$this->responseJSON(array('mensaje' => 'error'));        
        
    }
    #consultar expediente del alumno
    public function consultarExp(){
        #solo es prueba
        $u = new Roles();
        $roles = $u->consultarRoles();
        $us = new Usuario();
        $data = array();
        $usuarios = array();
        $dataList = $us->consultarUsuariosPorRol($_SESSION['id_rol']);
        foreach ($dataList as $d) {
            array_push($data, array(
                    $d['usuario'],
                    $d['correo'],
                    $d['rol'],
                    $d['estado'],
                    '<a type="button" href="' . $this->_helpers->linkTo("usuarios/consultarExp_reg") . '/' . $d['id_usuario'] . '" class="btn btn-round btn-info">Consultar Expediente</a>')
            );
        }
        $id_rol = $_SESSION['id_rol'];
        $usuarios = json_encode($data);
        #fin de prueba
        require_once $this->_helpers->linkTo('usuarios/consultar_expediente.php', 'Views', 'require');
    }
    #consultar expediente del alumno registro
    public function consultarExp_reg(){
        require_once $this->_helpers->linkTo('usuarios/consultarExp_reg.php', 'Views', 'require');
    }


    public function asignarPrivilegiosEspeciales(){
        if($_SESSION['id_rol'] == "1"){
        $g = new Roles();
        $roles = $g->consultarRolesParaPermisos();

        $d = new Usuario();
        $usuarios = $d->consultarUsuariosPorRolActivos($roles[0]["id_rol"]);

        $m = new PermisosEspecialesAsignables();
        $menus = $m->consultarPermisosEspecialesAsignablesPorRol($roles[0]["id_rol"]);

        $pe = new PermisosEspeciales();
        $permisosEspeciales = $pe->consultarPermisosEspeciales();

        require_once $this->_helpers->linkTo('usuarios/registrar_permiso_especial.php', 'Views', 'require');
        } else {
            header("Location: ".$this->_helpers->linkTo('index/dashboard'));
        }

    }

    public function buscarUsuarios(){
        $rol = $this->request["rol"];
        $u = new Usuario();
        $docentes = $u->consultarUsuariosPorRolActivos($rol);
        if($docentes != 0){
            echo $this->responseJSON(array('mensaje' => 'success', "docentes" => $docentes));
            exit;
        } else {
            echo $this->responseJSON(array('mensaje' => 'error'));
            exit;
        }
    }

    public function buscarPermisosAsignables(){
        $rol = $this->request["rol"];
        $m = new PermisosEspecialesAsignables();
        $menus = $m->consultarPermisosEspecialesAsignablesPorRol($rol);
        if($menus != 0){
            echo $this->responseJSON(array('mensaje' => 'success', "menu" => $menus));
            exit;
        } else {
            echo $this->responseJSON(array('mensaje' => 'error'));
            exit;
        }
    }

    public function registrarPermisos()
    {
        $docente = $this->request["usuario"];
        $permiso = $this->request["permiso"];

        $pe = new PermisosEspeciales();
        $permisos = $pe->consultarPermisosEspecialesPorUsuario($docente, $permiso);

        if (empty($permisos)) {
            $m = new Menus();
            $menuPadre = $m->consultarMenuPadre($permiso);

            $permisoPadre = $pe->consultarPermisosEspecialesPorUsuario($docente, $menuPadre[0]["id_menu_padre"]);
            if(empty($permisoPadre)){
                // Insertar menu padre
                $pe->registrarPermisoEspecial($docente, $menuPadre[0]["id_menu_padre"]);
            }
            // Insertar menu seleccionado
            $result = $pe->registrarPermisoEspecial($docente, $permiso);

            if ($result != "0") {
                echo $this->responseJSON(array('mensaje' => 'success'));
                exit;
            } else {
                echo $this->responseJSON(array('mensaje' => 'error'));
                exit;
            }

        } else {
            echo $this->responseJSON(array('mensaje' => 'noempty'));
            exit;
        }
    }


    public function borrarPermiso(){
        $id_privilegio = $this->request["id_privilegio"];
        $id_menu = $this->request["id_menu"];
        $id_usuario = $this->request["id_usuario"];

        $pe = new PermisosEspeciales();
        $privilegios = $pe->buscarPrivilegiosPorUsuario($id_usuario);

        $m = new Menus();
        $menuPadreInicial = $m->consultarMenuPadre($id_menu);

        $seleccionados = 0;
        foreach ($privilegios as $pri){
            $menuPadreTest = $m->consultarMenuPadre($pri["id_menu"]);

            if($menuPadreTest[0]["id_menu_padre"] == $menuPadreInicial[0]["id_menu_padre"]){
                $seleccionados++;
            }
        }

        if($seleccionados == 1){
            $pe->cambiarEstadoPermisoEspecial($menuPadreInicial[0]["id_menu_padre"],$id_usuario,"0");
        }

        $result = $pe->cambiarEstadoPermisoEspecial($id_menu,$id_usuario,"0");

        if ($result != "0") {
            echo $this->responseJSON(array('mensaje' => 'success'));
            exit;
        } else {
            echo $this->responseJSON(array('mensaje' => 'error'));
            exit;
        }

    }
}