<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}
		

		//$respuesta = Paginas::enlacesPaginasModel($enlaces);
		$respuesta = (new Paginas)->enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#REGISTRO DE USUARIOS
	#-------------------------------------------------------------
	public function registroUsuariosController() {
		
		if(isset($_POST["btnRegistro"])){
			
			#PREG_MATCH REALIZA UNA COMPARACION CON UNA EXPRESIÖN REGULAR
			
			if( preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuario"]) &&
			    preg_match('/^[a-zA-Z0-9]*$/', $_POST["password"]) &&
			    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"])){
				
				//
				$encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
				$datos = array("usuario"=>$_POST["usuario"],
							   "password"=>$encriptar,
							   "email"=>$_POST["email"]
				);
				
				$respuesta = (new Datos)->registroUsuariosModel($datos, "usuarios");

				if($respuesta == "success"){
					//header("location:index.php?action=ok");
					header("location:ok");
				} else {
					header("location:index.php");
					
				}

			}
			
		}

	}

	#INGRESO DE USUARIOS
	#-------------------------------------------------------------
	public function ingresoUsuariosController() {
		if(isset($_POST["btnIngreso"])){
			
			
			if( preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuario"]) &&
			    preg_match('/^[a-zA-Z0-9]*$/', $_POST["password"])) {

				$encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array(	"usuario"=>$_POST["usuario"],
								"password"=>$encriptar
				);
				
				$respuesta = (new Datos)->IngresoUsuariosModel($datos, "usuarios");

				$intentos = $respuesta["intentos"];
				$usuario =$_POST["usuario"];
				$maximoIntentos = 3;

				if($intentos < $maximoIntentos) {
					if($respuesta["Usuario"] == $_POST["usuario"] && $respuesta["Password"] == $encriptar) {

						session_start();
						$_SESSION["validar"] = true;

						$intentos = 0;
						$datos = array("usuarioActual"=>$usuario,
								   "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = (new Datos)->IntentosUsuariosModel($datos, "usuarios");



						header("location:usuarios");

					} else {
						$intentos++;

						$datos = array("usuarioActual"=>$usuario,
									"actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = (new Datos)->IntentosUsuariosModel($datos, "usuarios");

						header("location:=fallo&int=$intentos");
						
					}
				} else {
					$intentos = 0;
					$datos = array("usuarioActual"=>$usuario,
								   "actualizarIntentos"=>$intentos);

					$respuestaActualizarIntentos = (new Datos)->IntentosUsuariosModel($datos, "usuarios");
					header("location:captcha");
					
				}

			}

		}

	}

	#LISTAR USUARIOS
	#-------------------------------------------------------------
	public function listarUsuariosController() {
		
		$respuesta = (new Datos)->ListarUsuariosModel("usuarios");

		foreach ($respuesta as $row => $item) {
			echo'<tr>
				<td>'. $item["Usuario"] .'</td>
				<td>'. $item["Password"] .'</td>
				<td>'. $item["Email"] .'</td>
				<td>
					<a class="btn btn-primary btn-sm btn-block" href="editar/'. $item["UsuarioID"] .'">
						<i class="fa fa-pencil" aria-hidden="true"></i> Editar
					</a>
				</td>
				<td>
					<a class="btn btn-danger btn-sm btn-block" href="index.php?action=usuarios&id='. $item["UsuarioID"] .'">
						<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar
					</a>						
				</td>
			</tr>';
		}
		
	}

	#OBTENER USUARIO
	#-------------------------------------------------------------
	public function obtenerUsuariosController() {
		
		$datos = $_GET["id"];
		$respuesta = (new Datos)->ObtenerUsuariosModel($datos, "usuarios");

		//var_dump($respuesta);

		echo'<input type="hidden" value="'. $respuesta["UsuarioID"] .'" name="usuarioID">			
			<div class="form-group row">
				<label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Máximo 12 caracteres" id="usuario" value="'. $respuesta["Usuario"] .'" name="usuario" maxlength="13" required>
					
				</div>
				<div class="col-sm-12" id="validarUsuario">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Contraseña</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="'. $respuesta["Password"] .'" id="password" placeholder="Minimo 8 caracteres, incluir número(s) y mayúsculas" name="password" required>
				</div>		
				<div class="col-sm-12" id="validarPassword">
				</div>
			</div>
				
				
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Correo Electronico</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Escriba un correo electrónico valido" value="'. $respuesta["Email"] .'" name="email" required>
				</div>
				<div class="col-sm-12" id="validarEmail">
				</div>
			</div>';
		
	}

	#ACTUALIZAR USUARIO
	#-------------------------------------------------------------
	public function actualizarUsuariosController() {
		
		if(isset($_POST["btnActualizar"])) {

			if( preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuario"]) &&
			    preg_match('/^[a-zA-Z0-9]*$/', $_POST["password"]) &&
			    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"])) {
				
				$encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			
				$datos = array( "usuarioID"=>$_POST["usuarioID"],
								"usuario"=>$_POST["usuario"],
								"password"=>$encriptar,
								"email"=>$_POST["email"]
				);

				$respuesta = (new Datos)->ActualizarUsuariosModel($datos, "usuarios");


				if($respuesta == "success"){
					//header("location:index.php?action=cambio");
					header("location:cambio");
					
				} else {
					echo "Fallo al actualizar";
					
				}

			}

		}
		
	}

	#ELIMINAR USUARIO
	#-------------------------------------------------------------
	public function eliminarUsuariosController() {

		if(isset($_GET["id"])){
		
			$datos = $_GET["id"];
			$respuesta = (new Datos)->EliminarUsuariosModel($datos, "usuarios");

			//var_dump($respuesta);

			if($respuesta == "success"){

				header("location:usuarios");
				//header("location:index.php?action=usuarios");

			} else {
				
				header("location:index.php");
					
			}
		}
		
	}


	#VALIDAR USUARIO
	#-------------------------------------------------------------
	public function	validarUsuarioController($usuario){
		$datos = $usuario;

		$respuesta = (new Datos)->ValidarUsuariosModel($datos, "usuarios");

		if(count($respuesta["Usuario"]) > 0){
			
			echo 1;

		} else {

			echo 0;

		}
	}

	#VALIDAR EMAIL
	#-------------------------------------------------------------
	public function	validarEmailController($email){
		$datos = $email;

		$respuesta = (new Datos)->ValidarEmailModel($datos, "usuarios");

		if(count($respuesta["Email"]) > 0){			
			echo 1;

		} else {

			echo 0;

		}
	}

}
