<?php
class datospersonales_intereses extends ORM
{

   #FUNCION PARA GUARDAR LOS DATOS PERSONALES_INTERESES
   public function actualizarintereses(
       $interes_tecnologia,
       $nivel_programacion,
       $actividades,
       $tiene_computadora,
       $tiene_internet,
       $acceder_internet,
       $frecuencia_internet,
       $tiene_smartphone,
       $frecuencia_computadora,
       $posibilidad_etapa_examen
       )
    {
        $result = 0;
        try {
            $sql = "UPDATE datospersonales_intereses
            SET 
              puntaje_tecnologia = :interes_tecnologia,
              nivel_programacion = :nivel_programacion,
              actividades = :actividades,
              computadora = :tiene_computadora,
              internet = :tiene_internet,
              acceso_internet = :acceder_internet,
              frecuencia_internet = :frecuencia_internet,
              smartphone = :tiene_smartphone,
              frecuencia_computadora = :frecuencia_computadora,
              acceso_examen = :posibilidad_etapa_examen
     
            WHERE carnet_alumno = :carnet_alumno;";
           
           $all = $this->getConn()->prepare($sql);
           // $all->bindParam(':id_pre_formulario',$_SESSION["vId_preformulario"], PDO::PARAM_INT);
           // $all->bindParam(':carnet',$_SESSION["vCarnet"], PDO::PARAM_INT);
            $all->bindParam(':interes_tecnologia', $interes_tecnologia, PDO::PARAM_INT);
            $all->bindParam(':nivel_programacion', $nivel_programacion, PDO::PARAM_STR);
            $all->bindParam(':actividades', $actividades, PDO::PARAM_STR);
            $all->bindParam(':tiene_computadora', $tiene_computadora, PDO::PARAM_INT);
            $all->bindParam(':tiene_internet', $tiene_internet, PDO::PARAM_INT);
            $all->bindParam(':acceder_internet', $acceder_internet, PDO::PARAM_STR);
            $all->bindParam(':frecuencia_internet', $frecuencia_internet, PDO::PARAM_STR);
            $all->bindParam(':tiene_smartphone', $tiene_smartphone, PDO::PARAM_INT);
            $all->bindParam(':frecuencia_computadora', $frecuencia_computadora, PDO::PARAM_STR);
            $all->bindParam(':posibilidad_etapa_examen', $posibilidad_etapa_examen, PDO::PARAM_INT);
            $all->bindParam(':carnet_alumno',$_SESSION["vId"], PDO::PARAM_INT);  
  // ENVIAR TODOS LOS ID DE LAS TABLAS  id_datospersonales_intereses         
            $all->execute();
       } catch (Exception $e) {
           echo $e->getMessage();
       }
       return $result;
   }
}
?>

