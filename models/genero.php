
<?php
class genero extends ORM
{

 public function tipo_genero()
    {
        $result = 0;
        try {
            $sql = "SELECT DISTINCT genero FROM datospersonales_usuario ";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


     public function estados()
    {
        $result = 0;
        try {
            $sql = " SELECT * FROM estados_usuarios";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

      public function Consultargeneraciones($generacion)
    {
        $result = 0;
        try {
            $sql = "SELECT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.primer_apellido,estados_usuarios.nombre_estado,datospersonales_usuario.id_estado
                FROM pre_formulario INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno = datospersonales_usuario.carnet_alumno
                    INNER JOIN generaciones ON generaciones.idGeneraciones = datospersonales_usuario.Generaciones_idGeneraciones 
                    AND datospersonales_usuario.Generaciones_idGeneraciones='$generacion'
                    INNER JOIN estados_usuarios ON datospersonales_usuario.id_estado = estados_usuarios.id_estado";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':generacion', $generacion, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarEstado($estado)
    {
        $result = 0;
        try {
           
            $sql = "SELECT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.segundo_nombre,pre_formulario.primer_apellido,estados_usuarios.nombre_estado,datospersonales_usuario.id_estado
                FROM pre_formulario INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno=datospersonales_usuario.carnet_alumno 
                INNER JOIN estados_usuarios ON datospersonales_usuario.id_estado=estados_usuarios.id_estado               
                WHERE datospersonales_usuario.id_estado='$estado'";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':estado', $estado, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarEstadoParametro($id_parametro)
    {
        $result = 0;
        try {
           
            $sql = "
            SELECT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.primer_apellido,estados_usuarios.nombre_estado,datospersonales_usuario.id_estado
                FROM pre_formulario INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno = datospersonales_usuario.carnet_alumno
                INNER JOIN estados_usuarios_parametros ON estados_usuarios_parametros.carnet_alumno = datospersonales_usuario.carnet_alumno
                INNER JOIN estados_usuarios ON estados_usuarios.id_estado = estados_usuarios_parametros.id_estado
                AND estados_usuarios_parametros.idparametros ='$id_parametro'";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_parametro', $id_parametro, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


public function consultarGeneracionParametro($generacion,$id_parametro)
    {
        $result = 0;
        try {
           
            $sql = "
                    SELECT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.primer_apellido,estados_usuarios.nombre_estado,datospersonales_usuario.id_estado
                    FROM pre_formulario 
                    INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno = datospersonales_usuario.carnet_alumno

                    INNER JOIN estados_usuarios_parametros ON estados_usuarios_parametros.carnet_alumno = datospersonales_usuario.carnet_alumno

                    INNER JOIN estados_usuarios ON estados_usuarios.id_estado = estados_usuarios_parametros.id_estado

                    INNER JOIN generaciones ON generaciones.idGeneraciones = datospersonales_usuario.Generaciones_idGeneraciones

                    AND datospersonales_usuario.Generaciones_idGeneraciones ='$generacion'
                    AND estados_usuarios_parametros.idparametros = '$id_parametro'  ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':generacion', $generacion, PDO::PARAM_INT);
            $all->bindParam(':id_parametro', $id_parametro, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


public function consultarEstadoGeneracion($generacion,$id_estado)
    {
        $result = 0;
        try {
           
            $sql = "
                SELECT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.primer_apellido,estados_usuarios.nombre_estado,datospersonales_usuario.id_estado
                FROM pre_formulario 
                INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno = datospersonales_usuario.carnet_alumno

                INNER JOIN estados_usuarios_parametros ON estados_usuarios_parametros.carnet_alumno = datospersonales_usuario.carnet_alumno

                INNER JOIN estados_usuarios ON estados_usuarios.id_estado = estados_usuarios_parametros.id_estado

                INNER JOIN generaciones ON generaciones.idGeneraciones = datospersonales_usuario.Generaciones_idGeneraciones

                AND datospersonales_usuario.Generaciones_idGeneraciones = '$generacion'
                AND estados_usuarios_parametros.id_estado = '$id_estado'  ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':generacion', $generacion, PDO::PARAM_INT);
            $all->bindParam(':id_estado', $id_estado, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


public function consultarEstadosParametro($id_estado,$id_parametro)
    {
        $result = 0;
        try {
           
            $sql = "

                SELECT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.primer_apellido,estados_usuarios.nombre_estado,datospersonales_usuario.id_estado
                FROM pre_formulario 
                INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno = datospersonales_usuario.carnet_alumno

                INNER JOIN estados_usuarios_parametros ON estados_usuarios_parametros.carnet_alumno = datospersonales_usuario.carnet_alumno

                INNER JOIN estados_usuarios ON estados_usuarios.id_estado = estados_usuarios_parametros.id_estado

                INNER JOIN generaciones ON generaciones.idGeneraciones = datospersonales_usuario.Generaciones_idGeneraciones

                AND estados_usuarios_parametros.idparametros = '$id_parametro'
                AND estados_usuarios_parametros.id_estado = '$id_estado' ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_estado', $id_estado, PDO::PARAM_INT);
            $all->bindParam(':id_parametro', $id_parametro, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

public function consultarEstadosParametroGeneracion($id_estado,$generacion,$id_parametro)
    {
        $result = 0;
        try {
           
            $sql = "
                SELECT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.primer_apellido,estados_usuarios.nombre_estado,datospersonales_usuario.id_estado
                FROM pre_formulario 
                INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno = datospersonales_usuario.carnet_alumno

                INNER JOIN estados_usuarios_parametros On estados_usuarios_parametros.carnet_alumno = datospersonales_usuario.carnet_alumno

                INNER JOIN estados_usuarios On estados_usuarios.id_estado = estados_usuarios_parametros.id_estado

                INNER JOIN generaciones On generaciones.idGeneraciones = datospersonales_usuario.Generaciones_idGeneraciones

                and estados_usuarios_parametros.idparametros = '$id_parametro'
                and estados_usuarios_parametros.id_estado = '$id_estado'
                and datospersonales_usuario.Generaciones_idGeneraciones = '$generacion' ";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_estado', $id_estado, PDO::PARAM_INT);
            $all->bindParam(':generacion', $generacion, PDO::PARAM_INT);
            $all->bindParam(':id_parametro', $id_parametro, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

       public function consultarEStadotabla()
    {
        $result = 0;
        try {
           
            $sql = "SELECT DISTINCT dts.id_estado,
prf.carnet_alumno,prf.primer_nombre,prf.segundo_nombre,prf.primer_apellido 
FROM pre_formulario prf
INNER JOIN datospersonales_usuario dts ON prf.carnet_alumno=dts.carnet_alumno; 
           ";
            $all = $this->getConn()->prepare($sql);
           // $all->bindParam(':genero', $genero, PDO::PARAM_STR);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }




    public function consultargenero($genero)
    {
        $result = 0;
        try {
           
            $sql = "SELECT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.segundo_nombre,pre_formulario.primer_apellido FROM pre_formulario INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno=datospersonales_usuario.carnet_alumno 
            WHERE datospersonales_usuario.id_estado='1' and datospersonales_usuario.genero='$genero'";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':genero', $genero, PDO::PARAM_STR);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultargenerotabla()
    {
        $result = 0;
        try {
           
            $sql = "SELECT DISTINCT
  pref.correo_electronico,pref.carnet_alumno,
  pref.primer_nombre,pref.segundo_nombre,pref.primer_apellido
FROM pre_formulario pref
INNER JOIN datospersonales_usuario dts ON pref.id_pre_formulario=dts.id_pre_formulario
WHERE dts .id_estado='1';";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }





public function consultarFecha_anio()
    {
        $result = 0;
        try {
           
            $sql = "SELECT
            DISTINCT
            YEAR (fecha_registro) as dtfecha
            FROM datospersonales_usuario";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }



public function consultar_alumno_Fecha_anio($anio)
    {
        $result = 0;
        try {
           
            $sql = "
           SELECT DISTINCT pre_formulario.carnet_alumno,pre_formulario.primer_nombre,pre_formulario.primer_apellido,datospersonales_usuario.id_estado,YEAR(datospersonales_usuario.fecha_registro)
            FROM pre_formulario INNER JOIN datospersonales_usuario ON pre_formulario.carnet_alumno = datospersonales_usuario.carnet_alumno
            WHERE YEAR(datospersonales_usuario.fecha_registro)='$anio' AND datospersonales_usuario.id_estado !=1";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':anio', $fecha_registro, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }
#Generaciones por anio 

public function consultarGeneracionsporAnio($anio){
        $result = 0;
        try {                    
            $sql = "SELECT * FROM generaciones WHERE YEAR(fecha_inicio_generacion)='$anio'";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':anio', $anio, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);                    
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }
 #fin generaciones por anio
    
}
?>