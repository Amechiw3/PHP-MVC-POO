/*=================================
VALIDAR REGISTRO
=================================*/

function validarCambio() {

    var usuario = document.querySelector("#usuario").value;
    var password = document.querySelector("#password").value;
    var email = document.querySelector("#email").value;

    //VaLIDACION USUARIO
    if(usuario != ""){
        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres > 12){
            document.querySelector("div[id='validarUsuario']").innerHTML = "Escriba por favor menos de 12 caracteres.";
            return false;
        } else {
            document.querySelector("div[id='validarUsuario']").innerHTML = "";            
        }

        if(!expresion.test(usuario)){
            document.querySelector("div[id='validarUsuario']").innerHTML = "No escriba caracteres especiales";
            return false;
        } else {
            document.querySelector("div[id='validarUsuario']").innerHTML = "";
        }
    } else {
        return false;
    }

    //VALIDACION PASSWORD
    if(password != ""){
        var caracteres = password.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(password < 8){
            document.querySelector("div[id='validarPassword']").innerHTML = "Escriba por favor mas de 8 caracteres.";
            return false;
        }

        if(!expresion.test(password)){
            document.querySelector("div[id='validarPassword']").innerHTML = "No escriba caracteres especiales";
            return false;
        }

    }

    //VALIDACION PASSWORD
    if(email != ""){
        var expresion = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(!expresion.test(email)){
            document.querySelector("div[id='validarEmail']").innerHTML = "2Escriba un correo electrónico correctamente";
            return false;
        } else {
            document.querySelector("div[id='validarEmail']").innerHTML = "";
        }

    } else {
        return false;
    }

    return true;

}

/*==== FIN VALIDAR REGISTRO ====*/