<?php

#EXTENSION DE CLASES: los objetos puede ser extendidos, y pueden heredar propiedades y metodo.
#Para definir una clase como extension, debo definir una clase padre, y se utiliza dentro de una clase hija.
require_once "conexion.php";

class Datos extends Conexion {
    
    #REGISTRO DE USUARIOS
    #----------------------------------------------------------
    public function registroUsuariosModel($datosModel, $tabla){

        $stmt = (new conexion)->conectar()->prepare("INSERT INTO $tabla values(NULL, :usuario, :password, :email)");

        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

        if($stmt->execute()) {
            return "success";

        } else {
            return "error";

        }

        $stmt->close();

    }


    #INGRESO DE USUARIOS
    #---------------------------------------------------------
    public function IngresoUsuariosModel($datosModel, $tabla){

        $stmt = (new conexion)->conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario");
        //$stmt = (new conexion)->conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario and password = :password");

        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        //$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        
        
    }

    #INTENTOS USUARIO
    #--------------------------------------------------------
    public function IntentosUsuariosModel($datosModel, $tabla){

        $stmt = (new conexion)->conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE (Usuario = :Usuario)");
        
        $stmt->bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);        
        $stmt->bindParam(":Usuario",  $datosModel["usuarioActual"],      PDO::PARAM_STR);

        if($stmt->execute()) {
            return "success";

        } else {
            return "error";

        }

        $stmt->close();

    }

    #LISTA DE USUARIOS
    #-------------------------------------------
    public function ListarUsuariosModel($tabla){

        $stmt = (new conexion)->conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();        
        
    }
        

    #OBTENER USUARIO
    #---------------------------------------------------------
    public function ObtenerUsuariosModel($datosModel, $tabla){

        $stmt = (new conexion)->conectar()->prepare("SELECT * FROM $tabla WHERE UsuarioID = :UsuarioID");
        $stmt->bindParam(":UsuarioID", $datosModel, PDO::PARAM_INT);
        

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();        
        
    }


    #ACTUALIZAR USUARIOS
    #------------------------------------------------------------
    public function ActualizarUsuariosModel($datosModel, $tabla){

        $stmt = (new conexion)->conectar()->prepare("UPDATE $tabla SET Usuario = :usuario, Password = :password, Email = :email WHERE (UsuarioID = :UsuarioID)");
        
        $stmt->bindParam(":UsuarioID", $datosModel["usuarioID"], PDO::PARAM_INT);
        $stmt->bindParam(":usuario",   $datosModel["usuario"],   PDO::PARAM_STR);
        $stmt->bindParam(":password",  $datosModel["password"],  PDO::PARAM_STR);
        $stmt->bindParam(":email",     $datosModel["email"],     PDO::PARAM_STR);

        if($stmt->execute()) {
            return "success";

        } else {
            return "error";

        }

        $stmt->close();

    }

    #ELIMINAR USUARIO
    #----------------------------------------------------------
    public function EliminarUsuariosModel($datosModel, $tabla){

        $stmt = (new conexion)->conectar()->prepare("DELETE FROM $tabla WHERE (UsuarioID = :UsuarioID)");

        $stmt->bindParam(":UsuarioID", $datosModel, PDO::PARAM_INT);

        if($stmt->execute()) {
            return "success";

        } else {
            return "error";

        }

        $stmt->close();

    }


    #VALIDAR USUARIO
    #-----------------------------------------------------------
    public function ValidarUsuariosModel($datosModel, $tabla){
        
        $stmt = (new conexion)->conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario");

        $stmt->bindParam(":usuario", $datosModel, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
    }

    #VALIDAR USUARIO
    #-----------------------------------------------------------
    public function ValidarEmailModel($datosModel, $tabla){
        
        $stmt = (new conexion)->conectar()->prepare("SELECT * FROM $tabla WHERE email = :email");

        $stmt->bindParam(":email", $datosModel, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
    }

}