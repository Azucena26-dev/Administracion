<?php
    class correo extends ORM {
    public function consultarAspirantePorCorreo($vId_preformulario)
    {

        $result = 0;
        try {
            $sql  = 'SELECT

              pref.correo_electronico
              FROM pre_formulario pref
              INNER JOIN datospersonales_usuario dts ON pref.id_pre_formulario=dts.id_pre_formulario
              WHERE dts.id_pre_formulario= :vId_preformulario ';
        $all = $this->getConn()->prepare($sql);
        $all->bindParam(':vId_preformulario',$vId_preformulario, PDO::PARAM_INT);
        $all->execute();
        $result = $all->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }




   public function updateCorreoEnviado($vId_preformulario)
    {
      $correo_inscripcion=date('yy-m-d h:m:s');

        $result = 0;
        try {
            $sql = "UPDATE datospersonales_usuario
                SET 
                  id_pre_formulario =:id_pre_formulario,
                  correo_inscripcion =now()
                WHERE id_pre_formulario =:id_pre_formulario ;";
            
            $all = $this->getConn()->prepare($sql);
            $all->bindParam(':id_pre_formulario',$_SESSION["vId_preformulario"], PDO::PARAM_INT);
            $all->bindParam(':correo_inscripcion', $correo_inscripcion, PDO::PARAM_INT);
            $all->execute();
       } catch (Exception $e) {
           echo $e->getMessage();
       }
       return $result;
   }



}

//fin php
?>