<?php
class datospersonales_profesionales extends ORM
{

       public function actualizarprofesionales(
           $trabajo, 
           $trabajabas,
           $roltrabajo,
           $trabajo_formal,
           $sueldo,
           $horario,
           $recursos_gastos)
    {
        $result = 0;
        try {
            $sql = "UPDATE datospersonales_profesionales
            SET 
              trabajo_previo = :trabajo,
              tipo_trabajo = :trabajabas,
              puesto_trabajo = :roltrabajo,
              trabajo_formal = :trabajo_formal,
              sueldo_mensual = :sueldo,
              horario = :horario,
              recursos_pagar = :recursos_gastos

            WHERE carnet_alumno = :carnet_alumno;";

            $all = $this->getConn()->prepare($sql);
            //$all->bindParam(':id_pre_formulario',$_SESSION["vId_preformulario"], PDO::PARAM_INT);
            //$all->bindParam(':carnet',$_SESSION["vCarnet"], PDO::PARAM_INT);
            $all->bindParam(':trabajo', $trabajo, PDO::PARAM_STR);
            $all->bindParam(':trabajabas', $trabajabas, PDO::PARAM_STR);
            $all->bindParam(':roltrabajo', $roltrabajo, PDO::PARAM_STR);
            $all->bindParam(':trabajo_formal', $trabajo_formal, PDO::PARAM_INT);
            $all->bindParam(':sueldo', $sueldo, PDO::PARAM_INT);
            $all->bindParam(':horario', $horario, PDO::PARAM_STR);//
            $all->bindParam(':recursos_gastos', $recursos_gastos, PDO::PARAM_STR);
           $all->bindParam(':carnet_alumno',$_SESSION["vId"], PDO::PARAM_INT);  
            $all->execute();
       } catch (Exception $e) {
           echo $e->getMessage();
       }
       return $result;
   }

    

    
}
?>