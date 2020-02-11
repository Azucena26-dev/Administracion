<?php
class Sanitize
{
    // strip_tags() Retira las etiquetas HTML y PHP de un string
    public function cleanTags($param){
        return strip_tags($param);
    }
    // htmlspecialchars() function converts some predefined characters to HTML entities.
    public function convertToHtml($param){
        return htmlspecialchars($param);
    }
    public function onlyLetters($param){
        return preg_replace("/[^a-zA-Z]/", "", $param);
    }
    public function onlyNumbers($param){
        return preg_replace( "/[^0-9]/", "", $param );
    }
    public function onlyAlphanumerical($param){
        return preg_replace("/[^a-zA-Z0-9]/", "", $param);
    }
    public function onlyAlphanumericalAndSpaces($param){
        return preg_replace("/[^a-zA-Z0-9\s]/", "", $param);
    }
    public function onlyAlphanumericalAndDash($param){
        return preg_replace("/[^\w-]/", "", $param);
    }

    public function validateDate($date){
        $cleanValue = false;
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
            return  $cleanValue = $date;
        }
        return  $cleanValue;
    }

    function removeAmbiguousCharacters($value){
        $string = str_replace( array( "\'", '"', ',' , ';', '<', '>','{','}','[',']',':','~','(',')',"'",'`','.' ,'/'), '', $value);

        return $string;
    }
    function formatDate($date){
        return date('Y-m-d H:i:s', strtotime(str_replace('/','-',$date)));
    }


    function validarContrasena($password){
        if(preg_match('/^(?=.*\d)(?=.*[@#*\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]/',$password)){
            return true;
        } else{
            return false;
        }
    }



}