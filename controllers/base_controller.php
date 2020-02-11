<?php
class base_controller extends App{
    public $request;#Request params(post, get)
    public $params;#Route params
   // protected $_security;
    public $_helpers;
    
    function __construct($params, $request){
        $this->params = $params;
        $this->request = $request;
        $this->_helpers = new Helpers();
    }

    protected function processAction($o, $a){

        if($a != 'index' && $a != 'login' && $a != 'logout' && $a !='recobrarContrasena' && $a != 'cambiar' && $a != 'recuperar'
            && $a != 'cambiarContrasena'&& $a != 'resetPass' ){
            if(isset($_SESSION['id']) || !empty($_SESSION['id'])){
                $o->$a();
            }else{
                header('Location: ' . $this->_helpers->linkTo(''));
            }
        }else{
            $o->$a();
        }        
    }

}