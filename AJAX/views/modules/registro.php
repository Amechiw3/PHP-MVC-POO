<h3 class="text-center">REGISTRO DE USUARIO</h3>
<hr>
<form method="POST" onsubmit="return validarRegistro()" id="formRegistro">

	<div class="form-group row">
    	<label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
    	<div class="col-sm-10">
			<input type="text" class="form-control" placeholder="Máximo 12 caracteres" id="usuario" name="usuario" maxlength="13" required>
			
    	</div>
		<div class="col-sm-12" id="validarUsuario">
		</div>
	</div>
	
	<div class="form-group row">
    	<label for="password" class="col-sm-2 col-form-label">Contraseña</label>
    	<div class="col-sm-10">
			<input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password" placeholder="Minimo 8 caracteres, incluir número(s) y mayúsculas" name="password" required>
		</div>		
		<div class="col-sm-12" id="validarPassword">
		</div>
	</div>
		
		
	<div class="form-group row">
    	<label for="email" class="col-sm-2 col-form-label">Correo Electronico</label>
    	<div class="col-sm-10">
			<input type="email" class="form-control" id="email" placeholder="Escriba un correo electrónico valido" name="email" required>
		</div>
		<div class="col-sm-12" id="validarEmail">
		</div>
	</div>
		
	<div class="form-group row">
		<div class="col-sm-10 offset-sm-2">

			<div class="form-check">
				<label class="form-check-label">
				<input type="checkbox" class="form-check-input" id="terminos">
				Acepta terminos y condiciones
				</label>
			</div>
		</div>
		<div class="col-sm-12" id="validarTerminos">
		</div>
	</div>

	<button type="submit" class="btn btn-success" name="btnRegistro">Registrar</button>
	  
</form>

<?php

$registro = new MvcController();
$registro -> registroUsuariosController();

if(isset($_GET["action"])){
	if($_GET["action"]=="ok"){
		echo "Registro Exitoso";
	}
}

?>