<?php
require_once 'fw/Core.php';

$core = new Core();
if(isset($_REQUEST['route'])){
    $core->init($_REQUEST);
    #SESION DE INACTIVIDAD
    $inactividad = (30*60);
    if(isset($_SESSION['nw'])){
        $sessionTTL = time() - $_SESSION['nw'];
        if ($sessionTTL > $inactividad){
            unset($_SESSION['nw']);
            session_destroy();
            echo "<script>swal({
                showCancelButton: false,
                showConfirmButton:false,
                title: 'Tiempo de espera agotado',
                type: 'info',
                });
                setTimeout(function(){
                    parent.parent.window.location='/admin/';
                    },2000); </script>";
        }
    }
    #CREACION DE VARIABLE PARA SESION ACTIVA
    $_SESSION['nw'] =  time();
    #FIN SESION
}else{
    $_REQUEST['route'] = 'index';
    $core->init($_REQUEST);

    
}