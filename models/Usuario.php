<?php

class Usuario extends ORM
{
    private $id_usuario;
    private $id_rol;
    private $usuario;
    private $contrasenia;
    private $activo;
    private $correo;
    private $nombre;
    private $apellido;
    private $intento_inicio;
    private $imagen_perfil;


    protected static function getTable()
    {
        return 'usuarios';
    }

    protected static function getPk()
    {
        return 'id_usuario';
    }

    protected static function getFk()
    {
        return ['Roles' => 'id_rol'];
    }

    /**
     * @return mixed
     */
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getId_rol()
    {
        return $this->id_rol;
    }

    /**
     * @param mixed $id_rol
     */
    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * @param mixed $contrasenia
     */
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getIntento_inicio()
    {
        return $this->intento_inicio;
    }

    /**
     * @param mixed $intento_inicio
     */
    public function setIntento_inicio($intento_inicio)
    {
        $this->intento_inicio = $intento_inicio;
    }

    /**
     * @return mixed
     */
    public function getImagen_perfil()
    {
        return $this->imagen_perfil;
    }

    /**
     * @param mixed $imagen_perfil
     */
    public function setImagen_perfil($imagen_perfil)
    {
        $this->imagen_perfil = $imagen_perfil;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }



    public function consultarUsuarioPorNombre($nombre_usuario)
    {
        $u = array();
        try {
            $u = $this->createQueryBuilder()
                ->columns('id_usuario,id_rol,usuario,contrasenia,activo,correo,intento_inicio,imagen_perfil')
                ->where('usuario = :username AND activo = 1', array(':username' => $nombre_usuario))
                ->take(1)
                ->getRawResult();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $u;
    }

    public function consultarUsuarioPorId($id)
    {
        $u = array();
        try {
            $u = $this->createQueryBuilder()
                ->columns('id_usuario,id_rol,usuario,contrasenia,activo,correo,intento_inicio,imagen_perfil')
                ->where('id_usuario = :id AND activo = 1', array(':id' => $id))
                ->take(1)
                ->getRawResult();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $u;
    }

    public function actualizarUsuario()
    {
        try {
            $result = $this->update();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function createUsuarios()
    {
        $result = 0;
        try {
            $result = $this->create();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function crearNuevoUsuario(){
        $result = 0;
        try {
            $sql ="INSERT INTO `usuarios`(`id_rol`, `usuario`, `nombre`, `apellido`, `contrasenia`, `activo`, `correo`) 
                   VALUES (:id_rol,:usuario,:nombre,:apellido,:contrasenia,:activo,:correo)";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_rol', $this->id_rol, PDO::PARAM_INT);
            $all->bindParam(':usuario', $this->usuario, PDO::PARAM_STR);
            $all->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $all->bindParam(':apellido', $this->apellido, PDO::PARAM_STR);
            $all->bindParam(':contrasenia', $this->contrasenia, PDO::PARAM_STR);
            $all->bindParam(':correo', $this->correo, PDO::PARAM_STR);
            $all->bindParam(':activo', $this->activo, PDO::PARAM_INT);
            $result = $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function crearNuevoUsuarioConId(){
        $result = 0;
        try {
            $sql ="INSERT INTO `usuarios`(`id_rol`, `usuario`, `nombre`, `apellido`, `contrasenia`, `activo`, `correo`) 
                   VALUES (:id_rol,:usuario,:nombre,:apellido,:contrasenia,:activo,:correo)";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_rol', $this->id_rol, PDO::PARAM_INT);
            $all->bindParam(':usuario', $this->usuario, PDO::PARAM_STR);
            $all->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $all->bindParam(':apellido', $this->apellido, PDO::PARAM_STR);
            $all->bindParam(':contrasenia', $this->contrasenia, PDO::PARAM_STR);
            $all->bindParam(':correo', $this->correo, PDO::PARAM_STR);
            $all->bindParam(':activo', $this->activo, PDO::PARAM_INT);
            $all->execute();
            $result = $this->getConn()->lastInsertId();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function bloquearUsuario($id)
    {
        $result = 0;
        try {
            $sql = "UPDATE " . Usuario::getTable()
                . " SET activo = 0"
                . " WHERE id_usuario = :id";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id', $id, PDO::PARAM_INT);
            $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function desbloquearUsuario($id)
    {
        $result = 0;
        try {
            $sql = "UPDATE " . Usuario::getTable()
                . " SET activo = 1"
                . " WHERE id_usuario = :id";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id', $id, PDO::PARAM_INT);
            $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function reiniciarIntentos($id)
    {
        $result = 0;
        try {
            $sql = "UPDATE " . Usuario::getTable()
                . " SET intento_inicio = 0"
                . " WHERE id_usuario = :id";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id', $id, PDO::PARAM_INT);
            $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function consultarUsuarioPorCorreo($correo)
    {

        $result = 0;
        try {
            $select = 'SELECT id_usuario,usuario FROM usuarios WHERE correo = ?';
            $stmt = $this->getConn()->prepare($select);
            $stmt->bindParam(1, $correo, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function cargar_menu($id_rol,$id_user){
        $result = 0;
        try {
            $sql = "SELECT m.id_menu,IFNULL(m.id_menu_padre,0) as id_menu_padre,m.menu,ruta,icono,p.activo,m.clase FROM privilegios p "
                ."INNER JOIN roles r on p.id_rol = r.id_rol "
                ."INNER JOIN menus m on p.id_menu =  m.id_menu "
                ."WHERE p.id_rol = :id_rol AND p.activo = 1 AND m.id_menu != 1 "
                ."UNION "
                ."SELECT m.id_menu,IFNULL(m.id_menu_padre,0) as id_menu_padre,m.menu,ruta,icono,p.activo,m.clase FROM privilegios_especiales p "
                ."INNER JOIN usuarios u on u.id_usuario = p.id_usuario "
                ."INNER JOIN menus m on p.id_menu =  m.id_menu "
                ."WHERE u.id_usuario = :id_user AND p.activo = 1 AND m.id_menu != 1 ORDER BY id_menu ASC";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $all->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarUsuarioPorCodigo($codigo)
    {

        $result = 0;
        try {
            $select = 'SELECT id_usuario,usuario FROM usuarios WHERE codigo_recuperacion = ?';
            $stmt = $this->getConn()->prepare($select);
            $stmt->bindParam(1, $codigo, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarNombreDeUsuarioUnico($nomUsuario)
    {

        $result = 0;
        try {
            $select = "SELECT `id_usuario` FROM `usuarios` WHERE `usuario` = :nomUsuario";
            $stmt = $this->getConn()->prepare($select);
            $stmt->bindParam(":nomUsuario", $nomUsuario, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarCorreoUnico($correo)
    {

        $result = 0;
        try {
            $select = "SELECT `id_usuario` FROM `usuarios` WHERE `correo` = :correo";
            $stmt = $this->getConn()->prepare($select);
            $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function cargar_permisosE($id_usuario)
    {
        $result = 0;
        try {
            $sql = "SELECT id_menu,id_menu_padre,menu,ruta,icono,id_rol,id_menu_p,id_usuario_p,activo_p from cargar_menus WHERE id_usuario_p = :id_usuario";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function actualizarCodigoRecuperacion($codigo, $id)
    {

        $result = 0;
        try {
            $select = 'UPDATE usuarios SET codigo_recuperacion = ? WHERE id_usuario = ?';
            $stmt = $this->getConn()->prepare($select);
            $stmt->bindParam(1, $codigo, PDO::PARAM_INT);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $result = $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarUsuarios()
    {
        $result = 0;
        try {
            $sql = "SELECT id_usuario,usuario,correo,rol,IF(activo = 1,'Activo',IF(activo = 2,'No activo','Bloqueado')) estado from usuarios inner join roles on usuarios.id_rol = roles.id_rol ";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarUsuariosPorRol($rol)
    {
        $result = 0;
        try {
            $sql = "SELECT id_usuario,usuario,correo,rol,IF(activo = 1,'Activo',IF(activo = 2,'No activo','Bloqueado')) estado , usuarios.id_rol, nombre, apellido
                    FROM usuarios 
                    INNER JOIN roles on usuarios.id_rol = roles.id_rol AND usuarios.id_rol = :rol";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(":rol", $rol, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarUsuariosPorRolActivos($rol)
    {
        $result = 0;
        try {
            $sql = "SELECT id_usuario,usuario,correo,rol,IF(activo = 1,'Activo',IF(activo = 2,'No activo','Bloqueado')) estado , usuarios.id_rol, nombre, apellido
                    FROM usuarios 
                    INNER JOIN roles on usuarios.id_rol = roles.id_rol AND usuarios.id_rol = :rol AND activo = 1";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(":rol", $rol, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarUsuariosPorId($id_usuario)
    {
        $result = 0;
        try {
            $sql = "SELECT id_usuario,usuario,correo,rol,u.id_rol,IF(activo = 1,'Activo',IF(activo = 2,'No activo','Bloqueado')) estado , u.activo , imagen_perfil , nombre, apellido
                    FROM usuarios u inner join roles r on u.id_rol = r.id_rol 
                    WHERE id_usuario = :id_usuario";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function cambiarContrasenia2($pass, $id)
    {
        $result = 0;
        try {
            $sql = "UPDATE " . Usuario::getTable()
                . " SET contrasenia= :pass"
                . " WHERE id_usuario = :id";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':pass', $pass, PDO::PARAM_STR);
            $all->bindParam(':id', $id, PDO::PARAM_STR);
            $result = $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarU()
    {
        $result = 0;
        try {

            $sql = "SELECT * FROM usuarios";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function borrarCodigo($id)
    {
        $result = 0;
        try {
            $sql = "UPDATE " . Usuario::getTable()
                . " SET codigo_recuperacion = 0"
                . " WHERE id_usuario = :id";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function cambiarContrasenia($pass, $id)
    {
        $result = 0;
        try {
            $sql = "UPDATE " . Usuario::getTable()
                . " SET contrasenia= :pass"
                . " WHERE id_usuario = :id";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':pass', $pass, PDO::PARAM_STR);
            $all->bindParam(':id', $id, PDO::PARAM_STR);
            $result = $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function actualizarNuevoUsuario($correo, $activo, $id,$nombre,$apellido)
    {
        $result = 0;
        try {
            $sql = "UPDATE " . Usuario::getTable()
                . " SET correo = :correo , activo = :activo, nombre = :nombre, apellido = :apellido"
                . " WHERE id_usuario = :id";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':correo', $correo, PDO::PARAM_STR);
            $all->bindParam(':activo', $activo, PDO::PARAM_STR);
            $all->bindParam(':apellido', $apellido, PDO::PARAM_STR);
            $all->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $all->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }
    #cargar privilegios
    public function privilegiosE(){
        $result = 0;
        try {
            $sql = "SELECT m.id_menu,m.menu,"
                ."IFNULL(p.id_menu,0) menuP,"
                ."IFNULL(p.id_usuario,0)usuarioP,"
                ."IFNULL(p.activo,0) activoP FROM menus AS m "
                ."LEFT JOIN privilegios_especiales AS p ON (m.id_menu = p.id_menu) "
                ."WHERE m.id_menu !=1 "
                ."AND m.id_menu=17 OR m.id_menu=18 OR m.id_menu=19 OR m.id_menu=20 "
                ."OR m.id_menu=21 OR m.id_menu=22 OR m.id_menu=23 OR m.id_menu=24 "
                ."OR m.id_menu=37 OR m.id_menu=38 OR m.id_menu=39 OR m.id_menu=40 "
                ."OR m.id_menu=67 OR m.id_menu=68 OR m.id_menu=69 OR m.id_menu=70 "
                ."OR m.id_menu=71 OR m.id_menu=72 OR m.id_menu=73 OR m.id_menu=74 "
                ."OR m.id_menu=75 OR m.id_menu=76 OR m.id_menu=80 "
                ."ORDER BY m.id_menu ASC";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }
    public function privilegiosE1($id_usuario){
        $result = 0;
        try {
            $sql = "SELECT m.id_menu,m.menu,"
                ."IFNULL(p.id_menu,0) menuP,"
                ."IFNULL(p.id_usuario,0)usuarioP,"
                ."IFNULL(p.activo,0) activoP FROM menus AS m "
                ."LEFT JOIN privilegios_especiales AS p ON (m.id_menu = p.id_menu) "
                ."WHERE m.id_menu !=1 AND p.id_usuario = :id_usuario ORDER BY m.id_menu ASC";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    //**************************nuevos metodos "Gestionar Inscripción de Alumnos" *********************//

//consultar datos del alumno CONSULTAR EXPEDIENTE
    public function consultarExpedienteAlumno()
    {
        $result = 0;
        try {

            $sql = "SELECT * FROM expediente_alumnos";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }//FIN consultarExpedienteAlumno

//cosultar expediente alumno llena el archivo consultarExp_reg.php en vistas
    public function consultarExpedienteAlumnoid($id_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM expediente_alumnos WHERE id_alumno =  :id_alumno ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }



// consulta en contoller Inscripcion consulta basica.....*********************************************
    public function consultarAlumno()
    {
        $result = 0;
        try {

            $sql = "SELECT * FROM consultar_reg";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }//FIN consultarExpedienteAlumno

    public function consultarAlumnoid($id_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM consultar_reg WHERE id_alumno =  :id_alumno ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    ///****************************************Actualizar******************************************

    public function consultarActualizarInscripcion($id_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM consultar_reg WHERE id_alumno =  :id_alumno ;";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(":rol", $rol, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarParvularia()
    {
        $result = 0;
        try {

            $sql = "SELECT * FROM consultar_reg c, grados g
            WHERE id_ciclo = 4";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function consultarBasica()
    {
        $result = 0;
        try {

            $sql = "SELECT * FROM consultar_reg c, grados g
                    WHERE id_ciclo != 4 AND id_ciclo != 5";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function consultarBachillerato()
    {
        $result = 0;
        try {

            $sql = "SELECT * FROM consultar_reg c, grados g
            WHERE id_ciclo = 5";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    //*****************************************************************************************

    public function actualizarConducta($alumno,$anio,$periodo,$aspecto,$observacion){
        $result = 0;
        try {
            $sql = "UPDATE `conductas` SET `observacion`= :observacion 
                    WHERE `id_anio` = :id_anio AND `id_periodo` = :id_periodo AND `id_alumno` = :id_alumno 
                    AND `id_aspecto_conducta` = :id_aspecto_conducta";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':observacion', $observacion, PDO::PARAM_STR);
            $all->bindParam(':id_alumno', $alumno, PDO::PARAM_INT);
            $all->bindParam(':id_anio', $anio, PDO::PARAM_INT);
            $all->bindParam(':id_periodo', $periodo, PDO::PARAM_INT);
            $all->bindParam(':id_aspecto_conducta', $aspecto, PDO::PARAM_INT);
            $result = $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }


    //**********ACTUALIAZAR


    public function consultarActualizarBasica($id_grado)
    {
        $result = 0;
        try {
            $sql = "SELECT *
                    FROM alumnos a, grados g,grados_docentes gd
                    WHERE a.id_grado = g.id_grado AND gd.id_grado=g.id_grado
                    AND g.id_ciclo != 4 AND g.id_ciclo != 5 AND gd.id_grado = :id_grado;";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_grado', $id_grado, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }



    public function consultarActualizarParvularia($id_grado)
    {
        $result = 0;
        try {
        $sql = "SELECT *
                    FROM alumnos a, grados g,grados_docentes gd
                    WHERE a.id_grado = g.id_grado AND gd.id_grado=g.id_grado
                    AND g.id_ciclo = 4 AND gd.id_grado = :id_grado";
            //$sql="SELECT * FROM grados WHERE id_grado = :id_grado;";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_grado', $id_grado, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function consultarActualizarBachillerato($id_grado)
    {
        $result = 0;
        try {
            $sql = "SELECT *
                    FROM alumnos a, grados g,grados_docentes gd
                    WHERE a.id_grado = g.id_grado AND gd.id_grado=g.id_grado
                    AND g.id_ciclo = 5 AND gd.id_grado = :id_grado;";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_grado', $id_grado, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function consultarActualizarAlumnoid($id_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM alumnos a, grados g, zonas z
WHERE a.id_grado = g.`id_grado` and a.id_alumno =  :id_alumno ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function consultarActualizarAlumnoid2($id_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM alumnos a WHERE a.id_alumno =  :id_alumno ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }
    //para asistemcia
      public function exp1($id_alumno)
    {
        $result = 0;
        try {
            $sql = " SELECT * FROM alumnos a, asistencias s
            WHERE a.id_alumno = s.id_alumno
            AND a.id_alumno =  :id_alumno ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    //para conducta
      public function exp2($id_alumno)
    {
        $result = 0;
        try {
            $sql = " SELECT * FROM alumnos a, conductas c,aspectos_conducta ac,periodos p
WHERE a.id_alumno = c.id_alumno
AND c.id_periodo = p.id_periodo
AND c.id_aspecto_conducta = ac.id_aspecto_conducta
AND a.id_alumno = :id_alumno ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    //para notas 

    public function exp3($id_alumno)
    {
        $result = 0;
        try {
            $sql = " SELECT * FROM alumnos a, notas n,asignaturas ag
WHERE a.id_alumno = n.id_alumno
AND a.id_alumno = :id_alumno ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }




    public function consultarview($id_alumno)
    {
        $result = 0;
        try {
            $sql = " SELECT * FROM consultar_reg
                WHERE id_alumno =  :id_alumno ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


//DESINCRIBIR ALUMONOS CONSULTA


    public function desInsBachillerato($id_alumno)
    {
        $result = 0;
        try {
            $sql = "
            SELECT * FROM alumnos a, estados_alumnos e, grados g
            WHERE  a.id_grado = g.`id_grado`
            AND g.id_ciclo = 5";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function actualizarImagenPerfil($id,$imagen_perfil)
    {
        $result = 0;
        try {
            $sql = "UPDATE " . Usuario::getTable()
                . " SET imagen_perfil= :imagen_perfil"
                . " WHERE id_usuario = :id";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':imagen_perfil', $imagen_perfil, PDO::PARAM_STR);
            $all->bindParam(':id', $id, PDO::PARAM_STR);
            $result = $all->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

}