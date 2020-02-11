<?php
class datospersonales_economicos extends ORM{

   #FUNCION PARA GUARDAR LOS DATOS PERSONALES_ECONOMICOS
   public function actualizareconomico($nivelacademico,$ingreso_familiar,$personas_casa)
    {
        $result = 0;
        try {
            $sql = "UPDATE datospersonales_economicos
            SET 
              id_nivel_academico = :nivelacademico,
              ingresos_familiares = :ingreso_familiar,
              cantidad_personas = :personas_casa
            WHERE carnet_alumno = :carnet_alumno;";
            
            $all = $this->getConn()->prepare($sql);
           
            $all->bindParam(':nivelacademico', $nivelacademico, PDO::PARAM_INT);
            $all->bindParam(':ingreso_familiar', $ingreso_familiar, PDO::PARAM_INT);
            $all->bindParam(':personas_casa', $personas_casa, PDO::PARAM_INT);
            $all->bindParam(':carnet_alumno',$_SESSION["vId"], PDO::PARAM_INT);  
            $all->execute();
       } catch (Exception $e) {
           echo $e->getMessage();
       }
       return $result;
   }

    
}
?>