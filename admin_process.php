<?php
include_once("funciones.php");
switch ($_GET['action']) {
	case 'modificar_usuario':
		$user = $_GET['usuario'];
		$datos = sqlReader("select * from usuarios where nombre_usuario = '$user'");
		echo $datos[0]['email'] . "%%" . $datos[0]['provincia'] . "%%" . $datos[0]['sexo'];
		break;
	case 'actualizar_usuario':
		$user = $_GET['usuario'];
		$email = $_GET['email'];
		$sexo = $_GET['sexo'];
		$provincia = $_GET['provincia'];
		$datos = sqlWriter("update usuarios set email = '$email', sexo = '$sexo', provincia = '$provincia' where nombre_usuario = '$user'");
		break;
}

?>