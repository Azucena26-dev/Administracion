<?php

class sesion_controller extends base_controller
{

    private $cantidadIntentosMaxima = 5;

    /**
     * @return int
     */
    public function getCantidadIntentosMaxima()
    {
        return $this->cantidadIntentosMaxima;
    }

    /**
     * @param int $cantidadIntentosMaxima
     */
    public function setCantidadIntentosMaxima($cantidadIntentosMaxima)
    {
        $this->cantidadIntentosMaxima = $cantidadIntentosMaxima;
    }


    public function login(){
        require_once $this->_helpers->linkTo('password_compatibility_library.php', 'Libs', 'require');
       if(isset($this->request['nombre_usuario']) && !empty($this->request['nombre_usuario'])
       && isset($this->request['password']) && !empty($this->request['password'])){
           $userA = array();
           $s = new Sanitize();
           $nombre_usuario = $s->cleanTags($this->request['nombre_usuario']);
           $contrasena = $s->cleanTags($this->request['password']);

           $u = new Usuario();
           $userA = $u->consultarUsuarioPorNombre($nombre_usuario);           

           if(count($userA)>0){
               $loginUser = $u->consultarUsuarioPorId($userA[0]['id_usuario']);
               if($loginUser[0]['intento_inicio'] != $this->getCantidadIntentosMaxima()) {
                   if (password_verify($contrasena, $loginUser[0]['contrasenia'])) {
                       $_SESSION['id'] = $loginUser[0]['id_usuario'];
                       $_SESSION['username'] = $loginUser[0]['usuario'];
                       $_SESSION['id_rol'] = $loginUser[0]['id_rol'];                       
                       $_SESSION['imagen_perfil'] = $loginUser[0]['imagen_perfil'];
                       $this->reiniciarIntentosFallidos($loginUser[0]['id_usuario']);
                       #Inicio Gestion_Menu
                       $_SESSION['id_menu'] = $u->cargar_menu($_SESSION['id_rol'],$_SESSION['id']);
                       #Fin GestionMenu
                       echo $this->responseJSON(array('mensaje'=>'success')); exit;
                   } else {
                       $intento = $this->agregarIntentoFallido($loginUser);
                        if($intento != $this->getCantidadIntentosMaxima()){
                            echo $this->responseJSON(array('mensaje' => 'invalid'));
                            exit;
                        } else {
                            $this->bloquearUsuario($loginUser[0]['id_usuario']);
                            echo $this->responseJSON(array('mensaje'=>'blocked')); exit;
                        }
                   }
               } else {
                   $this->bloquearUsuario($loginUser[0]['id_usuario']);
                   echo $this->responseJSON(array('mensaje'=>'blocked')); exit;
               }
           } else {
               echo $this->responseJSON(array('mensaje'=>'empty')); exit;
           }
       } else{
           echo $this->responseJSON(array('mensaje'=>'error')); exit;
       }

    }

    public function recobrarContrasena(){
        if(!empty($this->request['correo']) && isset($this->request['correo'])){
            $correo = $this->request['correo'];
            $user = new Usuario();
            $usuario = $user->consultarUsuarioPorCorreo($correo);
            $link = $this->_helpers->linkTo('sesion/cambiar');

            if(!empty($usuario) && $usuario != 0){
                $codigo = $this->generarCodigo($user->getConn());
                $user->actualizarCodigoRecuperacion($codigo,$usuario[0]["id_usuario"]);

                $emailForgotPass = new SendEmail();
                $emailForgotPass->setName($usuario[0]['usuario']);
                $emailForgotPass->setEmail($correo);
                $emailForgotPass->setSubject('Recobrar contraseña');
                $emailForgotPass->setEmailBody($emailForgotPass->generateBody($emailForgotPass->contenidoRecuperarContrasena($usuario[0]['usuario'],$codigo,$link)));

                $result = $emailForgotPass->sendEmailadmin();
                if($result=="success"){
                    echo $this->responseJSON(array('mensaje'=>'success')); exit;
                } else {
                    echo $this->responseJSON(array('mensaje'=>'error')); exit;
                }
            } else {
                echo $this->responseJSON(array('mensaje'=>'empty')); exit;
            }
        } else {
            echo $this->responseJSON(array('mensaje'=>'error')); exit;
        }

    }

    public function cambiar() {
        require_once $this->_helpers->linkTo('cambiar.php', 'Views', 'require');
    }

    public function recuperar() {
        if(!empty($this->request['codigo']) && isset($this->request['codigo'])){
            $s = new Sanitize();
            $codigo = $s->onlyNumbers($this->request['codigo']);
            $u = new Usuario();
            $result = $u->consultarUsuarioPorCodigo($codigo);

            if($result != 0 && !empty($result)){
                $_SESSION['codigo'] = $codigo;
                echo $this->responseJSON(array('mensaje'=>'success')); exit;
            } else {
                echo $this->responseJSON(array('mensaje'=>'empty')); exit;
            }
        } else {
            echo $this->responseJSON(array('mensaje'=>'error')); exit;
        }
    }

    public function resetPass() {
        require_once $this->_helpers->linkTo('password_compatibility_library.php', 'Libs', 'require');
        if(!empty($this->request['pass']) && isset($this->request['pass']) ){
            $pass = $this->request['pass'];
            $s = new Sanitize();
            $u = new Usuario();
            if($s->validarContrasena($pass)){
                $usuario = $u->consultarUsuarioPorCodigo($_SESSION['codigo']);
                $result = $u->cambiarContrasenia2(password_hash($pass, PASSWORD_DEFAULT),$usuario[0]["id_usuario"]);
                $u->borrarCodigo($usuario[0]["id_usuario"]);
                $u->reiniciarIntentos($usuario[0]["id_usuario"]);
                $u->desbloquearUsuario($usuario[0]["id_usuario"]);
            } else {
                echo $this->responseJSON(array('mensaje'=>'invalid',"dato" => $s->validarContrasena($pass))); exit;
            }

            if($result != 0 && !empty($result)){
                echo $this->responseJSON(array('mensaje'=>'success')); exit;
            } else {
                echo $this->responseJSON(array('mensaje'=>'empty')); exit;
            }

        } else {
            echo $this->responseJSON(array('mensaje'=>'error')); exit;
        }
    }

    public function cambiarContrasena(){
        require_once $this->_helpers->linkTo('cambiar_contrasena_usuario.php', 'Views', 'require');
    }
    private function generarCodigo($conn){
        $code = '';
        for($i = 0; $i < 5; $i++){
            $code .= mt_rand(1, 9);
        }
        $stmt = $conn->prepare('SELECT id_usuario FROM usuarios WHERE codigo_recuperacion = ?');
        $stmt->bindParam(1, $code);
        $stmt->execute();

        if(count($stmt->fetchAll(PDO::FETCH_ASSOC)) > 0){
            $code = $this->generateCode($conn);
        }

        return $code;
    }
    public function agregarIntentoFallido($userA){
        $usuario = new Usuario();
        $usuario->setId_usuario($userA[0]['id_usuario']);
        $usuario->setContrasenia($userA[0]['contrasenia']);
        $usuario->setCorreo($userA[0]['correo']);
        $usuario->setId_rol($userA[0]['id_rol']);
        $usuario->setImagen_perfil($userA[0]['imagen_perfil']);
        $usuario->setIntento_inicio($userA[0]['intento_inicio']+1);
        $usuario->setActivo($userA[0]['activo']);
        $usuario->actualizarUsuario();
        return $userA[0]['intento_inicio']+1;

    }

    public function reiniciarIntentosFallidos($id){
        $usuario = new Usuario();
        $usuario->reiniciarIntentos($id);
    }

    public function bloquearUsuario($id){
        $usuario = new Usuario();
        $usuario->bloquearUsuario($id);
    }

    public function logout(){
        session_destroy();
        header('Location: ' . $this->_helpers->linkTo(''));
    }
     public function sinPermiso(){
      require_once $this->_helpers->linkTo('partials/_sinPermiso.php', 'Views', 'require');
    }
} 