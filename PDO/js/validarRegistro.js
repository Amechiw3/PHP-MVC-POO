/*=================================
VALIDAR REGISTRO
=================================*/

function validarRegistro(){
	var usuario = document.querySelector("#usuario").value;
	var password = document.querySelector("#password").value;
	var email = document.querySelector("#email").value;
	var terminos = document.querySelector("#terminos").checked;

	/* VALIDAR USUARIO */
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

	}

	/* VALIDAR PASSWORD */
	if(password != ""){

		var caracteres = password.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres < 8){
			document.querySelector("div[id='validarPassword']").innerHTML = "Escriba por favor mas de 8 caracteres.";

			return false;
		} else {
            document.querySelector("div[id='validarPassword']").innerHTML = "";
        }

		if(!expresion.test(password)){

			document.querySelector("div[id='validarPassword']").innerHTML = "No escriba caracteres especiales";

			return false;

		}

	}

	/* VALIDAR EMAIL*/
	if(email != ""){
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!expresion.test(email)){
			document.querySelector("div[id='validarEmail']").innerHTML = "Escriba un correo electrónico correctamente";
			return false;
		} else {
            document.querySelector("div[id='validarEmail']").innerHTML = "";
        }

	}

	/* VALIDAR TÉRMINOS*/

	if(!terminos){
        document.querySelector("div[id='validarTerminos']").innerHTML = "No se logro el registro, acepte términos y condiciones";
        
		document.querySelector("#usuario").value = usuario;	
		document.querySelector("#password").value = password;	
		document.querySelector("#email").value = email;

		return false;
	} else {
		document.querySelector("div[id='validarTerminos']").innerHTML = "";
        
    }
    
    
return true;

}


/*==== FIN VALIDAR REGISTRO ====*/