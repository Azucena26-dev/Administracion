<?php
/**
 * Created by PhpStorm.
 * Date: 03/08/2018
 * Time: 16:14
 */

class Roles extends ORM
{
    private $id_rol;
    private $rol;


    protected static function getTable()
    {
        return 'roles';
    }

    protected static function getPk()
    {
        return 'id_rol';
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
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function consultarRoles(){
        $result = 0;
        try {
            $sql = "SELECT id_rol,rol"
                ." FROM ".roles::getTable()." as r";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }

    public function consultarRolesUsuario(){
        $result = 0;
        try {
            $sql = "SELECT id_rol,rol"
                ." FROM ".roles::getTable()." as r WHERE id_rol NOT IN(1,2)";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }

    public function consultarRolesParaPerfil(){
        $result = 0;
        try {
            $sql = "SELECT id_rol,rol"
                ." FROM ".roles::getTable()." as r WHERE id_rol != 1 AND id_rol != 2";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }

    public function consultarRolesParaPermisos(){
        $result = 0;
        try {
            $sql = "SELECT id_rol,rol"
                ." FROM ".roles::getTable()." as r WHERE id_rol != 1 AND id_rol != 2 AND id_rol != 7 AND id_rol != 3";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }


}