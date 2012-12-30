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
	case 'insertar_usuario':
		$user = $_GET['usuario'];
		$email = $_GET['email'];
		$sexo = $_GET['sexo'];
		$provincia = $_GET['provincia'];
		$contrasena = md5($_GET['contrasena']);
		$rol = $_GET['rol'];
		$sexo = $_GET['sexo'];
		$avatar = $_GET['avatar'];
		print_r($_GET);
		$datos = sqlWriter("insert into usuarios values (default, '$user', '$contrasena', '$email', '$rol', '$provincia', '$sexo', '$avatar')");
		break;
}

?>