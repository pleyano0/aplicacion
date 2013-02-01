<?php
include_once("funciones.php");
switch ($_GET['action']) {
	case 'modificar_usuario':
		$user = $_GET['usuario'];
		$datos = sqlReader("select * from usuarios where nombre_usuario = '$user'");
		echo $datos[0]['email'] . "%%" . $datos[0]['provincia'] . "%%" . $datos[0]['sexo'] . "%%" . $datos[0]['rol'] . "%%" . $datos[0]['avatar'];
		break;
	case 'actualizar_usuario':
		$user = $_GET['usuario'];
		$email = $_GET['email'];
		$sexo = $_GET['sexo'];
		$provincia = $_GET['provincia'];
		$rol = $_GET['rol'];
		$sexo = $_GET['sexo'];
		$avatar = $_GET['avatar'];
		$datos = sqlWriter("update usuarios set email = '$email', sexo = '$sexo', provincia = '$provincia', rol = '$rol', avatar = '$avatar', sexo = '$sexo' where nombre_usuario = '$user'");
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
		$datos = sqlWriter("insert into usuarios (nombre_usuario, contrasena, email, rol, provincia, sexo, avatar) values ('$user', '$contrasena', '$email', '$rol', '$provincia', '$sexo', '$avatar')");
		break;
	case 'insertar_carrera':
		$carrera = $_GET['carrera'];
		$piloto = $_GET['piloto'];
		$posini = $_GET['posini'];
		$posfin = $_GET['posfin'];
		$tiempo = $_GET['tiempo'];
		$vueltas = $_GET['vueltas'];
		$datos = sqlWriter("insert into resultados (claveCarrera, numPiloto, parrilla, vueltas, tiempo, posicion) values ($carrera, $piloto, $posini, $posfin, '$tiempo', $vueltas)");
		break;
	case 'consultar_carrera':
		$piloto = $_GET['piloto'];
		$carrera = $_GET['carrera'];
		$datos = sqlReader("select * from resultados where numPiloto = " . $piloto . " and claveCarrera = " . $carrera);
		print_r([$datos]);
		echo $datos[0]['claveCarrera'] . "%%" . $datos['numPiloto'] . "%%" . $datos['parrilla'] . "%%" . $datos['vueltas'] . "%%" . $datos['tiempo'] . "%%" . $datos['posicion'] ;
		break;
}

?>