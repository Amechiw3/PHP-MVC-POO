/*========================================
VALIDAR USUARIO EXISTENTE
=========================================*/

var usuarioExistente = false;
var emailExistente = false;

$("form[id='formRegistro'] #email").change(function(){

	var email = $("#email").val();

	var datos = new FormData();
	datos.append("email", email);

	$.ajax({
		url: "views/modules/ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			if(respuesta == 1){

				$("div[id='validarEmail']").html("El email " + email +" ya existe en nuestra base de datos");
				emailExistente = true;
				console.log("El usuario " + usuario +" ya existe en nuestra base de datos");

			} else {
				$("div[id='validarEmail']").html("");
				emailExistente = false;
				
			}
		}

	});

});

$("form[id='formRegistro'] #usuario").change(function(){

	var usuario = $("#usuario").val();

	var datos = new FormData();
	datos.append("usuario", usuario);

	$.ajax({
		url: "views/modules/ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			if(respuesta == 1){

				$("div[id='validarUsuario']").html("El usuario " + usuario +" ya existe en nuestra base de datos");
				console.log("El usuario " + usuario +" ya existe en nuestra base de datos");
				usuarioExistente = true;

			} else {
				$("div[id='validarUsuario']").html("");
				usuarioExistente = false;
				
			}
		}

	});

});




/*==== FIN VALIDAR USUARIO EXISTENTE ====*/


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
		
		if(usuarioExistente) {
			
            return false;
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

		if(emailExistente){
			return false;
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