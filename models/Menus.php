<?php
/**
 * Created by PhpStorm.
 * User: Azucena

 * Time: 12:43 AM
 */

class Menus extends ORM
{
    public function consultarMenusPermisosEspeciales()
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM menus WHERE especial = 1 ";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarMenuPadre($menu){
        $result = 0;
        try {
            $sql = "SELECT id_menu_padre FROM menus WHERE id_menu = :id_menu ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(":id_menu", $menu, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }
}