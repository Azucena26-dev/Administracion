<?php
class perfil_model extends ORM
{

    public function consultarPerfil()
    {
        $result = 0;
        try {
           
        $sql = "SELECT * FROM estados_usuarios WHERE id_estado !='1'";
        $all = $this->getConn()->prepare($sql);
        $all->execute();
        $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

        public function consultarParametros()
    {
        $result = 0;
        try {
           
        $sql = "SELECT * FROM parametros";
        $all = $this->getConn()->prepare($sql);
        $all->execute();
        $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }



    public function consultarPerfilEstadoTabla()
    {
        $result = 0;
        try {
           
            $sql = " SELECT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.primer_apellido,estados_usuarios.nombre_estado,datospersonales_usuario.id_estado
                FROM pre_formulario 
                INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno=datospersonales_usuario.carnet_alumno
                INNER JOIN estados_usuarios ON datospersonales_usuario.id_estado = estados_usuarios.id_estado
                WHERE datospersonales_usuario.id_estado !=1";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }



#funcion para insertar los cambios de estados de los postulantes 

public function ingresarEstadosUsuarioParametro 
            (
             $carnet_alumno,
             $id_estado,
             $idparametros)
            {
       $result = 0;
       try {
           $sql = " INSERT INTO estados_usuarios_parametros
            (       
             carnet_alumno,
             id_estado,
             idparametros)
             VALUES (
                :carnet_alumno,
                :id_estado,
                :idparametros
                )";
          
          $all = $this->getConn()->prepare($sql);
          $all->bindParam(':carnet_alumno',$carnet_alumno, PDO::PARAM_STR); 
          $all->bindParam(':id_estado', $id_estado, PDO::PARAM_INT);
          $all->bindParam(':idparametros', $idparametros, PDO::PARAM_INT);
 

           $all->execute();

       } catch (Exception $e) {
           echo $e->getMessage();
       }
       return $result;
    }



        public function actualizaestadousuario($carnet_alumno){
        $result = 0;
        try {                    
            $sql = "UPDATE
                    datospersonales_usuario
                    SET 
                        id_estado = CASE 
                        WHEN id_estado = 2 THEN 3
                        WHEN id_estado = 3 THEN 4 
                        END 
                    WHERE carnet_alumno = :carnet_alumno";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_STR);
            $all->execute();
                  
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }

 public function actualizaestadoDesertado($carnet_alumno){
        $result = 0;
        try {                    
            $sql = "UPDATE
                    datospersonales_usuario
                    SET 
                        id_estado = CASE 
                        WHEN id_estado = 2 THEN 6
                        WHEN id_estado = 3 THEN 6 
                        WHEN id_estado = 4 THEN 6 
                        END 
                    WHERE carnet_alumno = :carnet_alumno";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_STR);
            $all->execute();
                  
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }
    public function actualizaestadoReprobado($carnet_alumno){
        $result = 0;
        try {                    
            $sql = "UPDATE
                    datospersonales_usuario
                    SET 
                        id_estado = CASE 
                        WHEN id_estado = 2 THEN 8
                        WHEN id_estado = 3 THEN 8 
                        WHEN id_estado = 4 THEN 8 
                        END 
                    WHERE carnet_alumno = :carnet_alumno";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_STR);
            $all->execute();
                  
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }



public function ingresarDescripcionDesertado($descripcion,$carnet_alumno,$idparametros) 
            {
       $result = 0;
       try {
           $sql = " UPDATE estados_usuarios_parametros
                    SET 
                      descripcion=:descripcion
                    WHERE carnet_alumno = :carnet_alumno AND idparametros=:idparametros;
                    ";
          
          $all = $this->getConn()->prepare($sql);
          $all->bindParam(':carnet_alumno',$carnet_alumno, PDO::PARAM_STR); 
          $all->bindParam(':idparametros', $idparametros, PDO::PARAM_INT);
          $all->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
 

           $all->execute();

       } catch (Exception $e) {
           echo $e->getMessage();
       }
       return $result;
    }


public function ConsultarDescripcionDesertado($carnet_alumno) 
            {
       $result = 0;
       try {
           $sql = " SELECT descripcion
                    FROM estados_usuarios_parametros
                    WHERE carnet_alumno = :carnet_alumno AND idparametros=3;
                    ";
          
          $all = $this->getConn()->prepare($sql);
          $all->bindParam(':carnet_alumno',$carnet_alumno, PDO::PARAM_STR); 
          $all->execute();
          $result = $all->fetchAll(PDO::FETCH_ASSOC);
       } catch (Exception $e) {
           echo $e->getMessage();
       }
       return $result;
    }



public function actualizarGeneracion($generacionn,$nombre,$descripcion,$fecha_inicio,$fecha_fin){
        $result = 0;
        try {                    
            $sql = "UPDATE generaciones SET nombre=:nombre,descripcion=:descripcion,fecha_inicio_generacion=:fecha_inicio,fecha_fin_generacion=:fecha_fin WHERE idGeneraciones = :generacionn";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':generacionn', $generacionn, PDO::PARAM_INT);
            $all->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $all->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $all->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
            $all->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
           
            $all->execute();
                  
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }


    public function agregarGeneracion($nombre,$descripcion,$fecha_inicio,$fecha_fin){
        $result = 0;
        try {                    
            $sql = "INSERT INTO generaciones(nombre,descripcion,fecha_inicio_generacion,fecha_fin_generacion) values(:nombre,:descripcion,:fecha_inicio,:fecha_fin)";
           
           
           
           
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $all->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $all->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
            $all->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
           
            $all->execute();
                  
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }


    public function consultarGeneracion($id_generacion){
        $result = 0;
        try {
           
            $sql = "SELECT * FROM generaciones WHERE idGeneraciones =:id_generacion";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_generacion', $id_generacion, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function consultarFechaUltimaGeneracion(){
        $result = 0;
        try {
           
            $sql = "SELECT *  from generaciones ORDER BY fecha_fin_generacion DESC";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_generacion', $id_generacion, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function insertarGeneracion($nombre,$descripcion,$fecha_inicio,$fecha_fin){
        $result = 0;
        try {                    
            $sql = "INSERT INTO generaciones(nombre,descripcion,fecha_inicio_generacion,fecha_fin_generacion) VALUES (:nombre,:descripcion,:fecha_inicio,:fecha_fin)";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_generacion', $id_generacion, PDO::PARAM_INT);
            $all->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $all->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $all->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
            $all->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
           
            $all->execute();
                  
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }

          public function consultarGeneraciones()
    {
        $result = 0;
        try {
           
        $sql = "SELECT * FROM generaciones";
        $all = $this->getConn()->prepare($sql);
        $all->execute();
        $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }



    
}
?>