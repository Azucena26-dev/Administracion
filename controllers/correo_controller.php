<?php  
class correo_controller extends base_controller{
// FUNCION QUE ENVIARA EL CORREO
    public function enviar()
    {
        try {

            $datosCorreo='Kodigo';

            if ($datosCorreo == null) {
                echo $this->responseJSON(array('mensaje' => 'error'));exit;
            } else {
                $emailC = new SendEmail();

                $result = $emailC->sendEmailKodigo();
                if ($result == "success") {
                    echo $this->responseJSON(array('mensaje' => 'success', 'result' => $result));exit;
                } else {
                    echo $this->responseJSON(array('mensaje' => 'error', 'result' => $result));exit;
                }
              $result = $emailC->sendEmailKodigo();

            }
        } catch (Exception $e) {
            echo "General Error.<br>" . $e->getMessage();
        }
    }


    }
?>