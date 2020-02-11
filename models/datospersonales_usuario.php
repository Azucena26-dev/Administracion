<?php
class datospersonales_usuario extends ORM

{
  
   #FUNCION PARA GUARDAR LOS DATOS PERSONALES_USUARIO
   public function actualizarUsuario(
    $genero,
    $fecha_nacimiento,
    $documento,
    $ndocumento,
    $nivelacademicopersonal,
    $direccion,
    $facebook,
    $tiene_hijos,
    $estudiante_activo,
    $departamento,
    $muni,
    $carrera,
    $ce_procedencia)
   {
       $result = 0;
       try {
           $sql = "UPDATE datospersonales_usuario SET 
              
            id_departamento = :departamento,
            id_tipo_documento = :documento,
            id_nivel_academico = :nivelacademicopersonal,
            fecha_nacimiento = :fecha_nacimiento,
            numero_documento = :ndocumento,
            genero = :genero,
            direccion = :direccion,
            facebook = :facebook,
            hijos = :tiene_hijos,
            estudiante_activo = :estudiante_activo,
            carrera_estudiada = :carrera,
            centro_estudio = :ce_procedencia,
            id_municipio = :muni
        WHERE carnet_alumno = :carnet_alumno;";
          
          $all = $this->getConn()->prepare($sql);

          // $all->bindParam(':id_pre_formulario',$_SESSION["vId_preformulario"], PDO::PARAM_INT);
           $all->bindParam(':genero', $genero, PDO::PARAM_STR);
           $all->bindParam(':fecha_nacimiento', $fecha_nacimiento, PDO::PARAM_STR);
           $all->bindParam(':documento', $documento, PDO::PARAM_INT);
           $all->bindParam(':ndocumento', $ndocumento, PDO::PARAM_STR);
           $all->bindParam(':nivelacademicopersonal', $nivelacademicopersonal, PDO::PARAM_INT);
           $all->bindParam(':direccion', $direccion , PDO::PARAM_STR);
           $all->bindParam(':facebook', $facebook  , PDO::PARAM_STR);
        // $all->bindParam(':correo  ', $correo  , PDO::PARAM_STR);z
           $all->bindParam(':tiene_hijos', $tiene_hijos , PDO::PARAM_INT);
           $all->bindParam(':estudiante_activo', $estudiante_activo , PDO::PARAM_INT);
           $all->bindParam(':departamento', $departamento , PDO::PARAM_INT);
           $all->bindParam(':muni', $muni , PDO::PARAM_INT);
           $all->bindParam(':carrera', $carrera, PDO::PARAM_STR);
           $all->bindParam(':ce_procedencia', $ce_procedencia , PDO::PARAM_STR);
           //$all->bindParam(':id_usuario', $id_usuario , PDO::PARAM_INT);
          // $all->bindParam(':carnet',$_SESSION["vCarnet"], PDO::PARAM_INT);  
          $all->bindParam(':carnet_alumno',$_SESSION["vId"], PDO::PARAM_INT);  

           $all->execute();
           //$result =  $this->getConn()->lastInsertId();
       } catch (Exception $e) {
           echo $e->getMessage();
       }
       return $result;
    } 
    



}