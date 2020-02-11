<?php
class tipo_documento extends ORM
{

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

    
}
?>