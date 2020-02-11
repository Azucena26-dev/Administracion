<?php
/**
 * Created by PhpStorm.
 * User: Azucena
 * Time: 7:47 PM
 */
class HashParam
{
    private $salt = "UXVNxM9vbf6H6TZQ";
    private $hash;
    function __construct()
    {
        $this->hash = new Hashids\Hashids($this->salt);
    }

    public function encriptar($parametro)
    {
        return $this->hash->encode($parametro);
    }

    public function desencriptar($parametro)
    {
        return $this->hash->decode($parametro);
    }
}