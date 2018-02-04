<?php

require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax {
    public $validarUsuario;
    public $validarEmail;

    public function ValidarUsuarioAJAX(){
        $datos = $this->validarUsuario;

        $respuesta = (new MvcController)->validarUsuarioController($datos);

        echo $respuesta;
    }

    public function ValidarEmailAJAX(){
        $datos = $this->validarEmail;

        $respuesta = (new MvcController)->validarEmailController($datos);

        echo $respuesta;
    }
}
if(isset($_POST["usuario"])){
    $a = new Ajax();
    $a -> validarUsuario = $_POST["usuario"];
    $a -> ValidarUsuarioAJAX();
}

if(isset($_POST["email"])){
    $b = new Ajax();
    $b -> validarEmail = $_POST["email"];
    $b -> ValidarEmailAJAX();
}

