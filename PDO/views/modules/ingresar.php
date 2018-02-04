<h1 class="text-center">INGRESAR</h1>


	<form method="POST" onsubmit="return validarIngreso()">
		<div class="form-group row">
			<label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" maxlength="13" required>
				
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

		<button type="submit" class="btn btn-primary" name="btnIngreso">Ingresar</button>
	</form>

<?php

$ingreso = new MvcController();
$ingreso -> ingresoUsuariosController();

if(isset($_GET["action"])){
	if($_GET["action"]=="fallo"){
		echo 'Ingreso fallido, lleva ', $_GET["int"] ,' fallidos';
	}


	if($_GET["action"]=="captcha"){
		echo "Ha fallado 3 veces para ingresar, favor de ingresar el captcha";
	}
}

?>