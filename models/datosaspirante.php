<?php
class datosaspirante extends ORM
{

 public function consultapre_formulario($carnet_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM pre_formulario WHERE carnet_alumno =:carnet_alumno" ; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultadatospersonales_usuario($carnet_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM datospersonales_usuario WHERE carnet_alumno =:carnet_alumno" ; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }



    public function consultadatospersonales_informativos($carnet_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM datospersonales_informativos WHERE carnet_alumno =:carnet_alumno"; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultadatospersonales_intereses($carnet_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM datospersonales_intereses WHERE carnet_alumno =:carnet_alumno"; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }
    
    public function consultadatospersonales_profesionales($carnet_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM datospersonales_profesionales WHERE carnet_alumno =:carnet_alumno "; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function consultadatospersonales_economicos($carnet_alumno)
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM datospersonales_economicos WHERE carnet_alumno =:carnet_alumno"; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


#municipios
     public function municipio()
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM municipios where id_departamento = $id";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function generacion1()
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


    public function consultarMunicipios(){
        $result = 0;
        try {
            $sql = "SELECT * FROM  municipios;";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }


#departamentos

    public function departamento()
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM departamento WHERE 1";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


   public function nivelacademico()
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM nivel_academico";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


   public function tipo_documentos()
    {
        $result = 0;
        try {
            $sql = "SELECT * FROM tipo_documento";
            $all = $this->getConn()->prepare($sql);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

 public function consultardepartamento_postulacion($carnet_alumno)
    {
        $result = 0;
        try {
            
            $sql = "SELECT departamento.id_departamento,departamento.departamento FROM departamento 
            INNER JOIN datospersonales_usuario ON departamento.id_departamento = datospersonales_usuario.id_departamento AND datospersonales_usuario.carnet_alumno =:carnet_alumno"; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function consultarmunicipio_postulacion($carnet_alumno)
    {
        $result = 0;
        try {
            
            $sql = "SELECT municipios.id_municipio,municipio FROM municipios INNER JOIN datospersonales_usuario ON municipios.id_municipio = datospersonales_usuario.id_municipio AND datospersonales_usuario.carnet_alumno =:carnet_alumno"; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }
    

    public function consultardocumento_postulacion($carnet_alumno)
    {
        $result = 0;
        try {
            
            $sql = "SELECT tipo_documento.id_tipo_documento,tipo_documento.nombre FROM tipo_documento INNER JOIN datospersonales_usuario ON tipo_documento.id_tipo_documento = datospersonales_usuario.id_tipo_documento AND datospersonales_usuario.carnet_alumno =:carnet_alumno"; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function consultarnivel_postulacion($carnet_alumno)
    {
        $result = 0;
        try {
            
            $sql = "SELECT nivel_academico.id_nivel_academico,tipo_nivel_academico FROM nivel_academico INNER JOIN datospersonales_usuario ON nivel_academico.id_nivel_academico = datospersonales_usuario.id_nivel_academico AND datospersonales_usuario.carnet_alumno =:carnet_alumno"; // se le cambio carnetalumno
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }



       public function consultarMunicipiosPorDepto($depto){
        $result = 0;
        try {                    
            $sql = "SELECT * FROM municipios WHERE id_departamento= :id_depto";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_depto', $depto, PDO::PARAM_INT);
            $all->execute();
            $result = $all->fetchAll(PDO::FETCH_ASSOC);                    
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }



       public function cambiodeEstadoAlumno($carnet_alumno, $gener){
        $result = 0;
        try {                    
            $sql = "UPDATE datospersonales_usuario SET id_estado=2,Generaciones_idGeneraciones=:gener WHERE carnet_alumno = :carnet_alumno";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_STR);
            $all->bindParam(':gener', $gener, PDO::PARAM_INT);
            $all->execute();
                  
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }




       public function cambiodeEstadoAlumnoDesaprobado($carnet_alumno,$gener,$razon){
        $result = 0;
        try {                    
            $sql = "UPDATE datospersonales_usuario SET id_estado=5,Generaciones_idGeneraciones=:gener,descripcion_rechazo=:razon WHERE carnet_alumno = :carnet_alumno";
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':carnet_alumno', $carnet_alumno, PDO::PARAM_STR);
            $all->bindParam(':razon', $razon, PDO::PARAM_STR);
            $all->bindParam(':gener', $gener, PDO::PARAM_INT);
            $all->execute();
                  
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }
    
}
?>