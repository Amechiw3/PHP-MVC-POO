<?php

class Conexion {

    public function conectar() {
        $link = new PDO("mysql:host=127.0.0.1;dbname=cursophp","root", "");
        #var_dump($link);
        return $link;

    }
}

?>