<?php
session_start();
if(isset($_SESSION['validar'])) { 
	if(!$_SESSION['validar']){
		header("location:ingresar");
		exit();
	}
} else {
	header("location:ingresar");	
	exit();	
}

?>
<h1>USUARIOS</h1>
	<table class="table table-hover">		
		<thead class="thead-dark">			
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>			
		<?php

			$ingreso = new MvcController();
			$ingreso -> listarUsuariosController();

		?>

		</tbody>
	</table>
<?php
if(isset($_GET["action"])){
	if($_GET["action"]=="cambio"){
		echo '<div id="regUpt" class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Registro actualizado</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  			<span aria-hidden="true">&times;</span>
				</button>
			  </div>
		';
	}

	if(isset($_GET["id"])){
		$ingreso -> eliminarUsuariosController();
	}
}
?>