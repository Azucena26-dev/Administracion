<?php
class datospersonales_informativos extends ORM
{
   

       public function actualizarinformativos(
       $limite, 
       $ingresar,
       $quees_kodigo,
       $aceptado_kodigo)
    {
        $result = 0;
        try {
            $sql = "UPDATE datospersonales_informativos
            SET 
              descripcion_personal = :limite,
              razon_ingreso = :ingresar,
              descripcion_kodigo = :quees_kodigo,
              asumir_costos = :aceptado_kodigo
            WHERE carnet_alumno = :carnet_alumno;";
            
            $all = $this->getConn()->prepare($sql);
            //$all->bindParam(':id_pre_formulario',$_SESSION["vId_preformulario"], PDO::PARAM_INT);
            //$all->bindParam(':carnet',$_SESSION["vCarnet"], PDO::PARAM_INT);
            $all->bindParam(':limite', $limite, PDO::PARAM_STR); //Limite descripcion de ti mismo
            $all->bindParam(':ingresar', $ingresar, PDO::PARAM_STR);
            $all->bindParam(':quees_kodigo', $quees_kodigo, PDO::PARAM_STR);
            $all->bindParam(':aceptado_kodigo', $aceptado_kodigo, PDO::PARAM_STR);
            $all->bindParam(':carnet_alumno',$_SESSION["vId"], PDO::PARAM_INT);  
  
            $all->execute();
       } catch (Exception $e) {
           echo $e->getMessage();
       }
       return $result;
   }

   
}
?>