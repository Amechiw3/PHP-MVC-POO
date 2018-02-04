/*=================================
VALIDAR REGISTRO
=================================*/

function validarIngreso() {

    var usuario = document.querySelector("#usuario").value;
    var password = document.querySelector("#password").value;

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
    return true;

}


/*==== FIN VALIDAR REGISTRO ====*/