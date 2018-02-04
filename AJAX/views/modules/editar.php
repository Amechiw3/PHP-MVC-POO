<?php
session_start();

if(!$_SESSION["validar"]) {

	header("location:index.php?action=ingresar");

	exit();

}

?>
<h1>EDITAR USUARIO</h1>

<form method="POST" onsubmit="return validarCambio()">
	
<?php

	$actualizar = new MvcController();
	$actualizar -> obtenerUsuariosController();

?>

	<input type="submit" value="Actualizar" class="btn btn-success" name="btnActualizar">

</form>

<?php
	$actualizar -> actualizarUsuariosController();
?>